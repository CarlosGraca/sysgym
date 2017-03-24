/**
 * Created by MS-INSYS on 13/10/2016.
 */

var _val =  parseInt( $('#last-schedules_id').text() == '' ? 0 : $('#last-schedules_id').text() );
var _deleted_id = [];
var all_data = [];
$(function () {

    //console.log(_val);

    //BOTÃO ADICIONAR CLIENTE
    $(document).on('click','#add-branch',function(){
        save($('#branches-form'),$('#branches-form')[0],'create');

        $(this).css('display', 'none');
        field_status_change('disable',$('#branches-form'));
        schedule_button_action('disable');
        $('#edit-branch-button').removeAttr('style');
        branch_schedule_save();
        _deleted_id = [];
        all_data = [];
    });

    //BOTÃO EDITAR CLIENTE
    $(document).on('click','#edit-branch',function(){
        save($('#branches-form'),$('#branches-form')[0],'update');
        $(this).css('display', 'none');
        field_status_change('disable',$('#branches-form'));
        schedule_button_action('disable');
        $('#edit-branch-button').removeAttr('style');
        branch_schedule_save();
        _deleted_id = [];
        all_data = [];
    });


    $(document).on('click','#edit-branch-button',function () {
        $(this).css('display', 'none');

        field_status_change('enable',$('#branches-form'));
        schedule_button_action('enable');

        $('#edit-branch').removeAttr('style');
    });

    $(document).on('click','#add-office_hours',function () {
        var _id = $('#office_hours_id').val();
        var _exists = validation_shedules();

        if(_exists == false) {
            if (_id == '') {
                _val = _val + 1;
                table_data(_val);
                clear_field_schedule();
            } else {
                if ($(this).attr('data-action') == 'update') {
                    edit_table_schedule_data(_id);
                }
            }
        }else{
            toastr.error('This already exists');
        }
    });

    //REMOVE SCHEDULE TABLE ITEM
    $(document).on('click','.remove_schedule',function(){
        remove_schedule($(this));
    });

    //EDIT SCHEDULE TABLE ITEM
    $(document).on('click','.edit_schedule',function(){
        edit_schedule($(this));
    });


    //COPY SCHEDULE TABLE ITEM
    $(document).on('click', '.copy_schedule',function(){
        copy_schedule($(this));
    });

    $.contextMenu({
        selector: '.office_hours_table',
        callback: function(key, options) {
            var _copy = options.$trigger.find('.copy_schedule');
            var _edit = options.$trigger.find('.edit_schedule');
            var _remove = options.$trigger.find('.remove_schedule');

            switch (key){
                case 'copy':
                    copy_schedule(_copy);
                    break;
                case 'edit':
                    edit_schedule(_edit);
                    break;
                case 'remove':
                    remove_schedule(_remove);
                    break;
            }
        },
        items: {
            "edit": {name:(_edit_text == undefined ? 'Edit': _edit_text), icon: "edit"},
            "copy": {name: (_copy_text  == undefined ? 'Copy' : _copy_text ), icon: "fa-clone"},
            "remove": {name:(_remove_text  == undefined ? 'Remove' : _remove_text), icon: "delete"},
        }
    });

});

//SCHEDULE SET BUTTON ACTIONS
function schedule_button_action(_action) {
    if (_action == 'enable'){
        $('.action_button').css('visibility','visible');
        //$('.action_button').css('display','block');
    }else{
        $('.action_button').css('visibility','hidden');
      //  $('.action_button').css('display','none');
    }

}

//CLEAR SCHEDULE FIELDS
function clear_field_schedule() {
    $('#branch_week').val(null);
    $('#start_time').val(null);
    $('#end_time').val(null);
    $('#office_hours_id').val(null);
}

//REMOVE SCHEDULE TABLE DATA
function remove_table_schedule_data(_item) {
    var tr_parent = _item.parent().parent();
    var _id = tr_parent.attr('data-key');
    _deleted_id.push(_id);
    tr_parent.remove();
    console.log(_deleted_id);
    removeTableValue(_id);
}

function edit_table_schedule_data(_id) {
    var table = $('.office_hours_table');

    var week_name = $("#branch_week option:selected").text();
    var week_value = $('#branch_week').val();
    var start_time = $('#start_time').val();
    var end_time = $('#end_time').val();


    table.each(function () {
        if($(this).attr('data-key') == _id){
            $(this).find('.week_name').attr('data-value',week_value);
            $(this).find('.week_name').text(week_name);
            $(this).find('.start_time').text(start_time);
            $(this).find('.end_time').text(end_time);
        }
    });

    clear_field_schedule();
}

//PUT VALUE AT SCHEDULE TABLE
function table_data(value) {
    var table = $('#table-office_hours');
    var week_name = $("#branch_week option:selected").text();
    var week_value = $('#branch_week').val();
    var start_time = $('#start_time').val();
    var end_time = $('#end_time').val();

    var max = '00:00:00';
    var min = '23:59:00';
    var append = null;
    var type = null;
    table.find('.office_hours_table').each(function () {
        //console.log($(this).attr('data-key'));
        if($(this).attr('data-week') == week_value) {
            if(start_time > $(this).find('.start_time').text()){
                if(start_time >= max ){
                    max = start_time;
                    append = $(this);
                    type = 'after';
                }
                console.log('max: '+max);
                // console.log(week_value);
            }else{

                if(start_time < min ){
                    min = start_time;
                    append = $(this);
                    type = 'before';
                    console.log('min: '+min);
                }
            }

        }

    });

    if(append == null){
        switch (week_value){
            case 'monday':
                type = 'before';
                append = table.find('.office_hours_table')[0];
            break;
            case 'tuesday':
                table.find('.office_hours_table').each(function () {
                    if($(this).attr('data-week') == 'monday') {
                        append = $(this);
                        type = 'after';
                    }
                });

                if(append == null){
                    type = 'before';
                    append = table.find('.office_hours_table')[0];
                }

            break;
            case 'wednesday':
                table.find('.office_hours_table').each(function () {
                    if($(this).attr('data-week') == 'tuesday') {
                        append = $(this);
                        type = 'after';
                    }
                });

                if(append == null){
                    type = 'before';
                    append = table.find('.office_hours_table')[0];
                }
            break;
            case 'thursday':
                table.find('.office_hours_table').each(function () {
                    if($(this).attr('data-week') == 'wednesday') {
                        append = $(this);
                        type = 'after';
                    }
                });
                if(append == null){
                    type = 'before';
                    append = table.find('.office_hours_table')[0];
                }

            break;
            case 'friday':
                table.find('.office_hours_table').each(function () {
                    if($(this).attr('data-week') == 'thursday') {
                        append = $(this);
                        type = 'after';
                    }
                });

                if(append == null){
                    type = 'before';
                    append = table.find('.office_hours_table')[0];
                }
            break;
            case 'saturday':
                table.find('.office_hours_table').each(function () {
                    if($(this).attr('data-week') == 'friday') {
                        append = $(this);
                        type = 'after';
                    }
                });

                if(append == null){
                    type = 'before';
                    append = table.find('.office_hours_table')[0];
                }
            break;
            case 'sunday':
                table.find('.office_hours_table').each(function () {
                    if($(this).attr('data-week') == 'saturday') {
                        append = $(this);
                        type = 'after';
                    }
                });
                if(append == null){
                    type = 'before';
                    append = table.find('.office_hours_table')[0];
                }
            break;
        }

    }

     // console.log(append);
    // console.log(max);
    var table_html = $(
        '<tr class="office_hours_table" data-key="' + value + '" data-week="'+week_value+'">' +
        '<td class="week_name" data-value="'+week_value+'">' + week_name + '</td>' +
        '<td class="start_time" >' + start_time + '</td>' +
        '<td class="end_time" >' + end_time + '</td>' +
        '<td class="action_button"> ' +
        '<a href="#!copy" class="copy_schedule" data-toggle="tooltip" title="'+_copy_text+'"><i class="fa fa-clone"></i></a> ' +
        '<a href="#!edit" class="edit_schedule" data-toggle="tooltip" title="'+_edit_text+'"><i class="fa fa-edit"></i></a> ' +
        '<a href="#!remove" class="remove_schedule" data-toggle="tooltip" title="'+_remove_text+'"><i class="fa fa-trash"></i></a> ' +
        '</td>' +
        '</tr>'
    );
    // table.append
   type =='after' ?  table_html.insertAfter(append) : table_html.insertBefore(append);


}


//SAVE SCHEDULE TO BRANCH
function branch_schedule_save() {
    getTableScheduleData($('#table-office_hours'));

    var branch_id = $('#branch_id').val();

    if(branch_id != '' && branch_id != undefined){
        var url = '/schedule';

        $.ajax({
            type: 'POST',
            url: url,
            data: {schedule: JSON.stringify(all_data), branch_id: branch_id, delete: JSON.stringify(_deleted_id)},
            dataType: 'json',
            success: function (data) {
                console.log(data);
            },
            error: function () {

            }
        });
    }
}

//GET MAX SCHEDULE ID VALUE
function getMax() {
    var max = 0;
    var _table =  $('.office_hours_table');

    if(_table != undefined){
        _table.each(function () {
            var _data_key = parseInt($(this).attr('data-key'));
            if (max < _data_key){
                max = _data_key;
            }
        });
    }
    return max;
}


//GET DATA FROM SCHEDULE TABLE
function getTableScheduleData(_table) {
    var data =  {};
    all_data = [];

    var _row = _table.find('.office_hours_table');


    _row.each(function () {
        var _id = $(this).attr('data-key');
        var week_value = $(this).find('.week_name').attr('data-value');
        var start_time = $(this).find('.start_time').text();
        var end_time = $(this).find('.end_time').text();

        data =  {
            id : _id,
            week_day : week_value,
            start_time: start_time,
            end_time: end_time
        };

        all_data.push(data);

        data = {};
    });
}

//REMOVE VALUE FROM TABLE DIC
function removeTableValue(_id) {
    $.each(all_data, function (index, value) {
        if(value.id == _id){
            delete all_data[index];
        }
    });
}

//TRANSFORM DIC VALUE TO ARRAY
// FORMAT [{ID, WEEK_DAY, START_TIME, END_TIME}]

//VALIDATION SCHEDULE BEFORE SAVE.
function validation_shedules() {
    var _table = $('#table-office_hours');
    var _input_week_value = $('#branch_week').val();
    var _input_start_time = $('#start_time').val();
    var _input_end_time = $('#end_time').val();
    var _input_id = $('#office_hours_id').val() == '' ? 0 : $('#office_hours_id').val() ;

    var _row = _table.find('.office_hours_table');
    var _is = false;

    _row.each(function () {
        var _id = $(this).attr('data-key');
        var week_value = $(this).find('.week_name').attr('data-value');
        var start_time = $(this).find('.start_time').text();
        var end_time = $(this).find('.end_time').text();

        if(_input_id != _id) {
            if (_input_week_value == week_value) {
                if ((_input_start_time > start_time || _input_end_time > start_time) && (_input_start_time < end_time || _input_end_time < end_time)) {
                    _is = true;
                }
            }
        }

    });
    return _is; //RETURN FALSE IF NOT EXIST
}

//FUNCTIONS COPY, EDIT AND REMOVE
function copy_schedule (_element) {

    var item = _element.parent().parent();

    var week_value = item.find('.week_name').attr('data-value');
    var start_time = item.find('.start_time').text();
    var end_time = item.find('.end_time').text();

    $('#branch_week').val(week_value);
    $('#start_time').val(start_time);
    $('#end_time').val(end_time);

    $('#add-office_hours').attr('data-action','create');
}

function edit_schedule(_element) {

    var item = _element.parent().parent();

    var item_id = item.attr('data-key');
    var week_value = item.find('.week_name').attr('data-value');
    var start_time = item.find('.start_time').text();
    var end_time = item.find('.end_time').text();

    $('#office_hours_id').val(item_id);
    $('#branch_week').val(week_value);
    $('#start_time').val(start_time);
    $('#end_time').val(end_time);

    $('#add-office_hours').attr('data-action','update');
}

function remove_schedule(_element){

    // var _alert = confirm(_confirm_alert_text);
    //
    // if (_alert){
    bootbox.confirm({
        title: _confirm_alert_text,
        message: 'This action can\'t be undone',
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
                remove_table_schedule_data(_element);
            }
        }
    });


}