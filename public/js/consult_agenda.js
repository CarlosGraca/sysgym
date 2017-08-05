/**
 * Created by MS-INSYS on 14/10/2016.
 */

var _event_id = 0;
var _event_date = null;

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
            today: _today,
            month: _month,
            week: _week,
            day: _day
        },
        monthNames: _monthNames,
        monthNamesShort: _monthNamesShort,
        dayNames: _dayNames,
        dayNamesShort: _dayNamesShort,
        minTime: _min_time ,
        maxTime: _max_time,
        businessHours:_businessHours,
        // hiddenDays: [0],
        //   lang: localName,
        allDaySlot:false, //HIDE ALL DAY
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

        dayClick: function (date) {
            if(can_add_agenda){
                $('#myModalLabel').text(_add_consult_text);
                $('#modal').modal('show')
                    .find('.modal-body')
                    .load($('#add-agenda').data('url'), function () {
                        $(this).find('#consult_agenda-form').find('#date').val(date.format('YYYY-MM-DD'));
                        $(this).find('#consult_agenda-form').find('#start_time').val(date.format('HH:mm:SS'));
                    });
            }

        },
        timeFormat: 'H:mm',
        slotLabelFormat:'H:mm',
        slotDuration: '00:15:00',
        //displayEventTime: true,
        eventClick: function (event, jsEvent, view) {
            if(can_view_agenda) {
                var url = 'consult_agenda/' + event.id;
                $('#myModalLabel').text(_details_consult_text);
                $('#modal').modal('show')
                    .find('.modal-body')
                    .load(url);
            }
        },
        eventDrop: function (event, delta, revertFunc) {

            //var _alert = confirm(_confirm_alert_text);

            //if(_alert){
            if(can_edit_agenda) {
                bootbox.confirm({
                    title: _confirm_alert_text,
                    message: _confirm_alert_text,
                    //size: 'small',
                    buttons: {
                        confirm: {
                            label: _yes_text,
                            className: 'btn-success'
                        },
                        cancel: {
                            label: _no_text,
                            className: 'btn-danger'
                        }
                    },
                    callback: function (result) {
                        if (result == true) {
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
                        } else {
                            revertFunc();
                        }

                    }
                });
            }else{
                bootbox.dialog({
                    title: 'Insufficient Permission',
                    message: 'You has not permission to do that',
                    buttons:{
                        ok:{
                            label: 'Ok',
                            className: 'btn-primary'
                        }
                    }
                });
                revertFunc();
            }

        },
        eventResize: function (event, delta, revertFunc) {
          //  var _alert = confirm(_confirm_alert_text);

            if(can_edit_agenda) {
                bootbox.confirm({
                    title: _confirm_alert_text,
                    message: _confirm_alert_text,
                    //size: 'small',
                    buttons: {
                        confirm: {
                            label: _yes_text,
                            className: 'btn-success'
                        },
                        cancel: {
                            label: _no_text,
                            className: 'btn-danger'
                        }
                    },
                    callback: function (result) {
                        if (result == true) {
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
                        } else {
                            revertFunc();
                        }
                    }
                });
            }else{
                bootbox.dialog({
                    title: 'Insufficient Permission',
                    message: 'You has not permission to do that',
                    buttons:{
                        ok:{
                            label: 'Ok',
                            className: 'btn-primary'
                        }
                    }
                });
                revertFunc();
            }

        },
        //EVENT MOUSEHOVER
        eventMouseover:function (event, jsEvent, view) {
            _event_id = event.id;
            _event_date = event.date;
        }
    });


    $(document).on('click','#add-agenda', function (e) {
        e.preventDefault();
        $('#myModalLabel').text('New Consult');

        $('#modal').modal('show')
            .find('.modal-body')
            .load($(this).data('url'));
    });

    $(document).on('click','.show-agenda-modal', function (e) {
        e.preventDefault();
        $('#myModalLabel').text($(this).attr('data-title'));
        $('#modal').modal('show')
            .find('.modal-body')
            .load($(this).data('url'));
       // $('#calendar').fullCalendar({});
    });
    
    

    $(document).on('click','#add-consult_agenda', function (e) {
        // e.preventDefault();
        save($('#consult_agenda-form'), $('#consult_agenda-form')[0], 'create');
    });

    $(document).on('click','#edit-consult_agenda', function (e) {
        // e.preventDefault();
        save($('#consult_agenda-form'), $('#consult_agenda-form')[0], 'update');
    });

    $(document).on('click','#edit-consult_agenda-button', function (e) {
        $(this).css('display', 'none');
        field_status_change('enable',$('#consult_agenda-form'));
        $('#edit-consult_agenda').removeAttr('style');
        
        $('#add-consult_agenda').removeAttr('style');
    });



    $.contextMenu({
        selector: '.table_row_scheduled',
        callback: function(key, options) {
            var _event_id = options.$trigger.attr('data-key');

            switch (key){
                case 'view':
                    var url = 'consult_agenda/' + _event_id;
                    $('#myModalLabel').text(_details_consult_text);
                    $('#modal').modal('show')
                        .find('.modal-body')
                        .load(url);
                    break;
                case 'confirm':
                    consult_event(key,_event_id);
                    break;
                case 'cancel':
                    consult_event(key,_event_id);
                    break;
                case 'edit':
                    var url = 'consult_agenda/' + _event_id + '/edit';
                    $('#myModalLabel').text(_edit_consult_text);
                    $('#modal').modal('show')
                        .find('.modal-body')
                        .load(url);
                    break;
            }
        },
        items: {
            "view": {name: _view_text, icon: "fa-eye"},
            "confirm": {name: "Confirm", icon: "fa-check"},
            "edit": {name: "Edit", icon: "edit"},
            "cancel": {name: "Cancel", icon: "fa-ban"},
            "notification": {name: "Send Notification", icon: "fa-send"}
        }
    });


    //TABLE TO REAGEND
    $.contextMenu({
        selector: '.table_row_cancel',
        callback: function(key, options) {
            var _event_id = options.$trigger.attr('data-key');
            var _date = options.$trigger.attr('data-date');

            switch (key){
                case 'view':
                    var url = 'consult_agenda/' + _event_id;
                    $('#myModalLabel').text(_details_consult_text);
                    $('#modal').modal('show')
                        .find('.modal-body')
                        .load(url);
                    break;
                case 're_agenda':
                    consult_re_agenda(_event_id, _date);
                    break;
                case 'notification':
                    //consult_event(key,_event_id);
                    break;
            }
        },

         items: //(can_view_agenda && can_reagenda_agenda ?
        {
            "view": {name: _view_text, icon: "fa-eye"},
            "re_agenda": {name: "Re-Agenda", icon: "fa-repeat"},
            "notification": {name: "Send Notification", icon: "fa-send"}
        }
            // : {})
    });

    //CALENDAR CANCELED CONSULT
    $.contextMenu({
        selector: '.fc-event-container .event_canceled',
        callback: function(key, options) {

            switch (key){
                case 'view':
                    var url = 'consult_agenda/' + _event_id;
                    $('#myModalLabel').text(_details_consult_text);
                    $('#modal').modal('show')
                        .find('.modal-body')
                        .load(url);
                    break;
                case 're_agenda':
                    consult_re_agenda(_event_id, _event_date);
                    break;
                case 'notification':
                    //consult_event(key,_event_id);
                    break;
            }
        },
        items: {
            "view": {name: _view_text, icon: "fa-eye"},
            "re_agenda": {name: "Re-Agenda", icon: "fa-repeat"},
            "notification": {name: "Send Notification", icon: "fa-send"}
        }
    });

    //CALENDAR CONFIRMED CONSULT
    $.contextMenu({
        selector: '.fc-event-container .event_confirmed',
        callback: function(key, options) {

            switch (key){
                case 'view':
                    var url = 'consult_agenda/' + _event_id;
                    $('#myModalLabel').text(_details_consult_text);
                    $('#modal').modal('show')
                        .find('.modal-body')
                        .load(url);
                    break;
                case 'notification':
                    //consult_event(key,_event_id);
                    break;
            }
        },
        items: {
            "view": {name: _view_text, icon: "fa-eye"},
            "notification": {name: "Send Notification", icon: "fa-send"}
        }
    });

    //CALENDAR EXPIRED CONSULT
    $.contextMenu({
        selector: '.fc-event-container .event_expired',
        callback: function(key, options) {

            switch (key){
                case 'view':
                    var url = 'consult_agenda/' + _event_id;
                    $('#myModalLabel').text(_details_consult_text);
                    $('#modal').modal('show')
                        .find('.modal-body')
                        .load(url);
                    break;
            }
        },
        items: {
            "view": {name: _view_text, icon: "fa-eye"}
        }
    });


    //CALENDAR SCHEDULE EVENT
    $.contextMenu({
        selector: '.fc-event-container .event_scheduled',
        callback: function(key, options) {
            switch (key){
                case 'view':
                    var url = 'consult_agenda/' + _event_id;
                    $('#myModalLabel').text(_details_consult_text);
                    $('#modal').modal('show')
                        .find('.modal-body')
                        .load(url);
                    break;
                case 'confirm':
                    consult_event(key,_event_id);
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
        },
        items: {
            "view": {name: _view_text, icon: "fa-eye"},
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
            console.log('Client Notificated');
    });

    //AGENDA RE-AGENDA BUTTON
    $(document).on('click','#agenda_re_agenda',function () {
        var _id = $(this).attr('data-key');
        var _date = $(this).attr('data-date');
       
        // consult_event('re_agenda',_id);
        consult_re_agenda(_id, _date);

    });


});

//THIS FUNCTION RE-AGENDA CONSULT TO A DATE
function consult_re_agenda(_id, _date) {
    var  url = 'consult/re_agenda';
    bootbox.prompt({
        title: "Choose the date to re-agenda this consult",
        inputType: 'date',
        value:_date,
        callback: function (result) {
            // var _date = result;
            //console.log(result);
            if(result != null) {
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: {id: _id, date: result},
                    dataType: 'json',
                    success: function (data) {
                        if (data.type == 'error') {
                            toastr.error(data.message, {timeOut: 5000}).css("width", "300px");
                            $('#calendar').fullCalendar('revertFunc');
                        } else {
                            toastr.success(data.message, {timeOut: 5000}).css("width", "300px");
                            $('#calendar').fullCalendar('refetchEvents');
                            $('#consult_confirm').load('confirm_list');
                            $('#consult_cancel').load('cancel_list');
                        }

                    },
                    error: function () {

                    }
                });
            }
        }
    });
    
}

//THIS EVENT IS TO CHANGE CONSULT STATUS (CONFIRM AND CANCEL)
function consult_event(_type,_id) {

    var url = '';

    bootbox.confirm({
        title: _confirm_alert_text,
        message: _confirm_alert_text,
        //size: 'small',
        buttons: {
            confirm: {
                label: _yes_text,
                className: 'btn-success'
            },
            cancel: {
                label: _no_text,
                className: 'btn-danger'
            }
        },
        callback: function (result) {
            if(result == true){

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
                        if (data.type == 'error'){
                            toastr.error(data.message, {timeOut: 5000}).css("width", "300px");
                            $('#calendar').fullCalendar('revertFunc');
                        }else{
                            toastr.success(data.message, {timeOut: 5000}).css("width", "300px");
                            $('#calendar').fullCalendar('refetchEvents');
                            $('#consult_confirm').load('confirm_list');
                            $('#consult_cancel').load('cancel_list');
                        }

                    },
                    error: function () {

                    }
                });
            }
        }
    });
}
//loadCalendarData();
//
// function loadCalendarData() {
//     var url = 'agenda/get_all';
//     $.get(url,function (data) {
//         console.log(data);
//         $('#calendar').fullCalendar({
//             events: JSON.parse(data)
//         });
//     });
// }
//
// function getTableData() {
//     $.get('agenda/list_agenda',function (data) {
//         return data;
//     });
// }