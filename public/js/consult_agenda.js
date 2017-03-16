/**
 * Created by MS-INSYS on 14/10/2016.
 */

var _event_id = 0;

$(function () {

   // console.log(_businessHours);

    //moment.updateLocale('fakeLocale', {parentLocale:localName});
    /* initialize the calendar
     -----------------------------------------------------------------*/
    $('#calendar').fullCalendar({
        defaultView: 'agendaWeek',
        header: {
            right: 'today prev,next',
            center: 'title',
            left: 'month,agendaWeek,agendaDay'
        },
        //height: auto,
        buttonText: {
            today: 'today',
            month: 'month',
            week: 'week',
            day: 'day'
        },
       // hiddenDays: [0],
        minTime: _min_time ,
        maxTime: _max_time,
        businessHours:_businessHours,
     //   lang: localName,
        //HIDE ALL DAY
        allDaySlot:false,
        //Random default events
        eventSources: [
            // your event source
            {
                url: 'agenda/get_all',
                type: 'get',
                error: function () {
                    alert('there was an error while fetching events!');
                },
                success: function () {
                    //$('.fc-scroller').slimScroll();
                    // SUCCESS LOAD DATA
                    startDashboard();
                },
                color: '#00a65a',   // a non-ajax option
                textColor: 'black' // a non-ajax option
            },
        ],
        editable: true,
        droppable: true, // this allows things to be dropped onto the calendar !!!

        /*drop: function (date, allDay) { // this function is called when something is dropped

         // retrieve the dropped element's stored Event Object
         var originalEventObject = $(this).data('eventObject');

         // we need to copy it, so that multiple events don't have a reference to the same object
         var copiedEventObject = $.extend({}, originalEventObject);

         // assign it the date that was reported
         copiedEventObject.start = date;
         copiedEventObject.allDay = allDay;
         copiedEventObject.backgroundColor = $(this).css("background-color");
         copiedEventObject.borderColor = $(this).css("border-color");

         // render the event on the calendar
         // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
         $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

         // is the "remove after drop" checkbox checked?
         if ($('#drop-remove').is(':checked')) {
         // if so, remove the element from the "Draggable Events" list
         $(this).remove();
         }

         },*/

        eventRender: function (event, element) {

            if(event.backgroundColor != 'green'){
               // console.log(element);
                element.disableDragging = false;
                element.disableResizing = false;
            }

        },

        dayClick: function (date) {

            $('#myModalLabel').text('New Consult');
            $('#modal').modal('show')
                .find('.modal-body')
                .load($('#add-agenda').data('url'), function () {
                    $(this).find('#consult_agenda-form').find('#date').val(date.format('YYYY-MM-DD'));
                    $(this).find('#consult_agenda-form').find('#start_time').val(date.format('HH:mm:SS'));
                });
        },
        timeFormat: 'H(:mm)',
        eventClick: function (event, jsEvent, view) {
            var url = 'consult_agenda/' + event.id + '/edit';
            $('#myModalLabel').text('Edit Consult');
            $('#modal').modal('show')
                .find('.modal-body')
                .load(url);
        },
        eventDrop: function (event, delta, revertFunc) {

            var _alert = confirm(_confirm_alert_text);

            if(_alert){
                var start = event.start.format('HH:mm:SS');
                var end = (event.end == null) ? start : event.end.format('HH:mm:SS');
                var date = event.start.format('YYYY-MM-DD');
                var url = 'agenda/drop_agenda';
                var type = 'post';
                var formData = {
                    'start_time': start,
                    'end_time': end,
                    'date': date,
                    'id': event.id
                };

                $.ajax({
                    type: type,
                    url: url,
                    data: formData,
                    dataType: 'json',
                    success: function (data) {
                        if (data.type == 'error') {
                            revertFunc();
                            toastr.error(data.message, {timeOut: 5000}).css("width", "300px");
                        } else {
                            $('#calendar').fullCalendar('refetchEvents');
                            toastr.success(data.message, {timeOut: 5000}).css("width", "300px");
                            startDashboard();
                        }
                    }
                });
            }else{
                revertFunc();
            }

        },
        eventResize: function (event, delta, revertFunc) {
            var _alert = confirm(_confirm_alert_text);

            if(_alert) {

                var start = event.start.format('HH:mm:SS');
                var end = (event.end == null) ? start : event.end.format('HH:mm:SS');
                var date = event.start.format('YYYY-MM-DD');
                var url = 'agenda/drop_agenda';
                var type = 'post';
                var formData = {
                    'start_time': start,
                    'end_time': end,
                    'date': date,
                    'id': event.id
                };

                $.ajax({
                    type: type,
                    url: url,
                    data: formData,
                    dataType: 'json',
                    success: function (data) {
                        if (data.type == 'error') {
                            revertFunc();
                            toastr.error(data.message, {timeOut: 5000}).css("width", "300px");
                        } else {
                            startDashboard();
                        }
                    }
                });
            }else{
                revertFunc();
            }
        },
        //EVENT MOUSEHOVER
        eventMouseover:function (event, jsEvent, view) {
            _event_id = event.id;
        },
    });


    $(document).on('click','#add-agenda', function (e) {
        e.preventDefault();
        $('#myModalLabel').text('New Consult');

        $('#modal').modal('show')
            .find('.modal-body')
            .load($(this).data('url'));
    });

    $('.show-agenda-modal').on('click', function (e) {
        e.preventDefault();
        $('#myModalLabel').text('Calendar');
        $('#modal').modal('show')
            .find('.modal-body')
            .load($(this).data('url'));
       // $('#calendar').fullCalendar({});
    });

    $(document).on('click','#add-consult_agenda', function (e) {
        e.preventDefault();
        save($('#consult_agenda-form'), $('#consult_agenda-form')[0], 'create');
    });

    $(document).on('click','#edit-consult_agenda', function (e) {
        e.preventDefault();
        save($('#consult_agenda-form'), $('#consult_agenda-form')[0], 'update');
    });

    $(document).on('click','#edit-consult_agenda-button', function (e) {
        $(this).css('display', 'none');
        fieldstatus('enable',$('#consult_agenda-form'));
        $('#edit-consult_agenda').removeAttr('style');
        
        $('#add-consult_agenda').removeAttr('style');
    });



    $.contextMenu({
        selector: '.table_row_confirm',
        callback: function(key, options) {
            var _event_id = options.$trigger.attr('data-key');

            switch (key){
                case 'confirm':
                    consult_event(key,_event_id);
                    break;
                case 'cancel':
                    consult_event(key,_event_id);
                    break;
                case 'edit':
                    var url = 'consult_agenda/' + _event_id + '/edit';
                    $('#myModalLabel').text('Edit Consult');
                    $('#modal').modal('show')
                        .find('.modal-body')
                        .load(url);
                    break;
            }
           // window.console && console.log(m) || alert(m);
        },
        items: {
            "confirm": {name: "Confirm", icon: "fa-check"},
            "edit": {name: "Edit", icon: "edit"},
            "cancel": {name: "Cancel", icon: "fa-ban"},
            "notification": {name: "Send Notification", icon: "fa-send"}
        }
    });

    $.contextMenu({
        selector: '.fc-event-container',
        callback: function(key, options) {
           // var m = "clicked: " + key;
            switch (key){
                case 'confirm':
                    consult_event(key,_event_id);
                   // console.log(_event_id);
                    break;
                case 'cancel':
                    consult_event(key,_event_id);
                   // console.log(_event_id);
                    break;
                case 'edit':
                    var url = 'consult_agenda/' + _event_id + '/edit';
                    $('#myModalLabel').text('Edit Consult');
                    $('#modal').modal('show')
                        .find('.modal-body')
                        .load(url);
                break;
            }
            //window.console && console.log(m) || alert(m);
        },
        items: {
            "confirm": {name: "Confirm", icon: "fa-check"},
            "edit": {name: "Edit", icon: "edit"},
            "cancel": {name: "Cancel", icon: "fa-ban"},
            "notification": {name: "Send Notification", icon: "fa-send"}
        }
    });
    
    //AGENDA CONFIRM BUTTON
    $(document).on('click','#agenda_confirm',function () {
        var _id = $(this).attr('data-key');
        consult_event('confirm',_id);
    });

    //AGENDA CANCEL BUTTON
    $(document).on('click','#agenda_cancel',function () {
        var _id = $(this).attr('data-key');
        consult_event('cancel',_id);
    });

    //AGENDA CANCEL BUTTON
    $(document).on('click','#agenda_notificate',function () {
        var _id = $(this).attr('data-key');
        var _alert = confirm(_confirm_alert_text);
        if(_alert)
            //consult_event('cancel',_id);
            console.log('Patient Notificated');
    });

    //AGENDA RE-AGENDA BUTTON
    $(document).on('click','#agenda_re_agenda',function () {
        var _id = $(this).attr('data-key');
        consult_event('re_agenda',_id);
          //  console.log('Patient Notificated');
    });


});


//THIS EVENT IS TO CHANGE CONSULT STATUS (CONFIRM AND CANCEL)
function consult_event(_type,_id) {

    var _alert = confirm(_confirm_alert_text);

    if(_alert) {

        var url = '';
        if (_type == 'confirm') {
            url = 'consult/confirm';
        } else if (_type == 'cancel') {
            url = 'consult/cancel';
        } else if (_type == 're_agenda') {
            url = 'consult/re_agenda';
        }

        $.ajax({
            type: 'POST',
            url: url,
            data: {id: _id},
            dataType: 'json',
            success: function (data) {
                if (data.type == 'error')
                    toastr.error(data.message, {timeOut: 5000}).css("width", "300px");
                else
                    toastr.success(data.message, {timeOut: 5000}).css("width", "300px");

                $('#calendar').fullCalendar('refetchEvents');
            },
            error: function () {

            }
        });
    }
}
//loadCalendarData();

function loadCalendarData() {
    var url = 'agenda/get_all';
    $.get(url,function (data) {
        console.log(data);
        $('#calendar').fullCalendar({
            events: JSON.parse(data)
        });
    });
}

function getTableData() {
    $.get('agenda/list_agenda',function (data) {
        return data;
    });
}