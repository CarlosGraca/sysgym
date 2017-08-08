/**
 * Created by MS-INSYS on 14/10/2016.
 */



$(function () {

    $(document).on('change', ':file', function() {
        var type = $(this).parent().attr('data-type');
        var crop = $(this).parent().attr('data-crop');
        var avatar = $('.avatar');


        switch (type){
            case 'system':
                changeBackground(this);
                avatar = $('.avatar-system')
                break;
            case 'company':
                avatar = $('.avatar-company');
                break;
            case 'branch':
                avatar = $('.avatar-branch');
                break;
            case 'user':
                avatar = $('.avatar-user');
                break;
        
            case 'client':
                avatar = $('.avatar-client');
                break;
        
            case 'employee':
                avatar = $('.avatar-employee');
                break;

            case 'modality':
                avatar = $('.avatar-modality');
                break;
        }

        if(crop != undefined) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#croppie_modal').modal('show')
                    .find('.modal-body')
                    .load('/croppie', {type: type, src: e.target.result});
            }
            reader.readAsDataURL(this.files[0]);
        }else{
            readURL(this,avatar);
        }
        


    });

    $(document).on('click','#camera-capture',function (e) {
       e.preventDefault();
        $('#myModalLabel-md').text($(this).data('message'));
       $('#modal-md').modal('show')
           .find('.modal-body')
           .load('/camera');
    });

    //GET INPUT KEYDOWN VALUE
    $(':input').keyup(function (e) {
    e.preventDefault();
        var name = $(this).attr('name');
        if ($(this).hasClass('field-error')) {
            $(this).removeClass('field-error');
            $('.' + name).find('.has-error').css('display', 'none');
        }

        if(e.keyCode == 8){
            if($(this).val() == ''){
                if (!$(this).hasClass('field-error') && $(this)[0].hasAttribute('required')) {
                    $(this).addClass('field-error');
                }
            }
        }
    });

    $(':input').mouseout(function (e) {
        if($(this).val() == ''){
            if (!$(this).hasClass('field-error') && $(this)[0].hasAttribute('required')) {
                $(this).addClass('field-error');
            }
        }
    });


    $('select').change(function () {
        var name = $(this).attr('name');
        if ($(this).hasClass('field-error')) {
            $(this).removeClass('field-error');
            $('.' + name).find('.has-error').css('display', 'none');
        }

    });

    var url = window.location;

    var element = $('.sidebar-menu > li > a').filter(function () {
        return this.href == url.href || url.href.indexOf(this.href) == 0;
    }).addClass('active').parent();
    if (element.is('li')) {
        element.addClass('active');
    }

    if (element[0] == undefined){

        var element = $('.sidebar-menu > li.treeview > ul.treeview-menu > li > a').filter(function () {
            return this.href == url.href || url.href.indexOf(this.href) == 0;
        }).parent().addClass('active');
        if (element.is('li')) {
            element.parent().parent().addClass('active');
        }

    }

    $(document).ajaxStart(function () {
        $(".loader").css("display", "block");
        $(".loader").modal('show');
    });

    $(document).ajaxComplete(function () {
        $(".loader").css("display", "none");
        $(".loader").modal('hide');
    });

    //POPUP TOOLBAR
    $(document).on('click','#people_show_popup',function (e) {
        e.preventDefault();
        $('#myModalLabel').text($(this).attr('data-title'));
        $('#modal-ajax').modal('show')
            .find('.modal-body')
            .load($(this).data('url'));
        $('#modal-ajax').css('overflow','auto');
    });

    $('#modal-ajax').on('show.bs.modal', function (e) {
        $(document.body).css('overflow','hidden');
        $(this).find('.modal-body').css({
            width:'auto', //probably not needed
            height:'auto', //probably not needed
            'max-height':'100%'
        });
        $(this).find('.modal-dialog').css('width', $(window).width() * 0.8);
    });

    $(window).bind("load resize", function() {
        var width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
        $('#modal-ajax').find('.modal-dialog').css('width', width * 0.9);
    });

    $('#modal-ajax').on('hidden.bs.modal', function (e) {
        $(document.body).css('overflow','auto');
    });

});


//FUNCTION TO GET IMAGE LOCATION AND PUT TO USER SEE
function readURL(input,preview) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            preview.attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

//SAVE USER - IS A FUNCTIONS TO SAVE ANY USER IN SYSTEM WITH DEFAULT PARAMS YOU CAN SAVE ANY USER USING THIS FUNCTION
// PARAMS:
//  - form -> THIS IS THE FORM THAT THE DATA COME FROM
//  - form_type -> THIS ONE IS TO SEND THE TYPE OF FORM MAY BE: 'update' or 'create'

function save(_form,_form_data,form_type) {

    var type = _form.attr('method');
    var url;
    if(form_type === 'create'){
        url = _form.attr('action');
    }
    if(form_type === 'update'){
        url =  _form.attr('action');
    }
    var formData = new FormData(_form_data);

    $.ajax({
        xhr: function()
        {
            var xhr = new window.XMLHttpRequest();

            //Upload progress
            $('.progress').css('display','block');

            var p = $('.progress').find('.progress-bar');

            p.addClass('active');
            p.addClass('progress-bar-striped');
            p.removeClass('progress-bar-success');
            p.removeClass('progress-bar-danger');
            $('#files-form').css('display','none');

            xhr.upload.addEventListener("progress", function(evt){
                if (evt.lengthComputable) {
                    var percentComplete = evt.loaded / evt.total;
                    p.css('display','block');
                    //Do something with upload progress
                    if(p.attr('aria-valuenow') != evt.total){
                        p.attr('aria-valuenow',percentComplete) ;
                        p.css('width', (percentComplete * 100)+'%');
                        p.text( (percentComplete * 100).toFixed(0)+'%' );
                    }

                }
            }, false);

            //Download progress
            xhr.addEventListener("progress", function(evt){
                if (evt.lengthComputable) {
                    var percentComplete = evt.loaded / evt.total;
                    //Do something with download progress

                    if(p.attr('aria-valuenow')){
                        // console.log(percentComplete*100);
                        p.removeClass('active');
                        p.removeClass('progress-bar-striped');
                        p.addClass('progress-bar-success');

                        if( $('#files-form')[0] != undefined ){
                            setTimeout(function(){
                                $('.progress').css('display','none');
                                $('#files-form')[0].reset();
                                $('#files-form').css('display','block');
                                p.attr('aria-valuenow',0) ;
                                p.css('width', (0)+'%');
                                p.text( (0).toFixed(0)+'%' );
                            }, 2000);
                        }

                    }

                }
            }, false);
            return xhr;
        },
        type: type,
        url: url,
        data: formData,
        dataType: 'json',
        success: function (data) {

            if (data.type == 'error')
                toastr.error(data.message,{timeOut: 5000} ).css("width","300px");
            else
                toastr.success(data.message,{timeOut: 5000} ).css("width","300px");

            switch (data.form){
                case 'client':
                    if(data.type=='success') {

                        if (form_type == 'create') {
                            field_status_change('disable', _form);
                            window.location = data.url;
                        } else {
                            $('#edit-client-button').removeAttr('style');
                            $('#update-client').css('display', 'none');
                            field_status_change('disable', _form);
                        }
                    }
                    break;

                case 'system':
                    if(data.type=='success') {
                        $('#update-system').css('display', 'none');
                        field_status_change('disable', _form);
                        $('#edit-system-button').removeAttr('style');
                        timezone = data.timezone;
                        reloadPage();
                    }
                    break;

                case 'employee':
                    if(data.type=='success') {

                        if (form_type == 'create') {
                            $('#add-employee').css('display', 'none');
                            field_status_change('disable', _form);
                        } else {
                            $('#update-employee').css('display', 'none');
                            $('#edit-employee-button').removeAttr('style');
                            field_status_change('disable', _form);
                        }
                    }
                    break;
                case 'employees_category':
                    if(data.type=='success') {
                        if (form_type == 'create') {
                            $('#add-employees_category').css('display','none');
                        }else{
                            $('#update-employees_category').css('display','none');
                            $('#edit-employees_category-button').removeAttr('style');
                            field_status_change('disable',$('#employees_category-form'));
                        }
                    }
                    break;
                case 'branches':
                    if(data.type == 'success'){
                        if(form_type == 'create'){
                            $('#branch_id').val(data.id);
                            $('#item_id').val(data.id);
                            $('#add-branch').css('display', 'none');
                            field_status_change('disable',$('#branches-form'));
                            schedule_button_action('disable');
                            $('#edit-branch-button').removeAttr('style');
                            schedule_save();
                            _deleted_id = [];
                            all_data = [];

                            window.location = data.url;
                        }else{
                            $('#update-branch').css('display', 'none');
                            field_status_change('disable',$('#branches-form'));
                            schedule_button_action('disable');
                            $('#edit-branch-button').removeAttr('style');
                            schedule_save();
                            _deleted_id = [];
                            all_data = [];
                        }
                    }

                    break;
                case 'company':
                    if(data.type=='success') {
                        if (form_type == 'create') {
                            $('#add-company').css('display','none');
                        }else{
                            field_status_change('disable',$('#company-form'));
                            $('#update-company').css('display','none');
                            $('#edit-company-button').removeAttr('style');
                        }
                    }
                    break;
                case 'modality':
                    if(data.type=='success') {
                        if (form_type == 'create') {

                            $('#modality_id').val(data.id);
                            $('#item_id').val(data.id);
                            $('#add-modality').css('display', 'none');
                            field_status_change('disable', $('#modality-form'));
                            schedule_button_action('disable');
                            $('#edit-modality-button').removeAttr('style');
                            matriculation_modality_save();

                        } else {
                            $('#update-modality').css('display', 'none');
                            field_status_change('disable', $('#modality-form'));
                            schedule_button_action('disable');
                            $('#edit-modality-button').removeAttr('style');
                            matriculation_modality_save()
                        }
                    }

                    break;
                case 'roles':
                    if(data.type == 'success') {
                        if (form_type == 'create'){
                            $('#role_id').val(data.id);
                            window.location = data.url;
                        }
                        else {
                            field_status_change('disable', _form);
                            $('#edit-role-button').removeAttr('style');
                            $('#update-role').css('display', 'none');
                            reloadPage();
                        }
                    }
                    break;
                case 'menu':
                    if(data.type == 'success') {
                        if (form_type == 'create'){
                            $('#menu_id').val(data.id);
                            window.location = data.url;
                        }
                        else {
                            field_status_change('disable', _form);
                            $('#edit-menu-button').removeAttr('style');
                            $('#update-menu').css('display', 'none');
                            reloadPage();
                        }
                    }
                    break;
                case 'user':
                    if(data.type == 'success') {
                        if (form_type == 'update'){
                            field_status_change('disable', _form);
                            $('#edit-user-button').removeAttr('style');
                            $('#update-user').css('display', 'none');
                            reloadPage();
                        }
                    }
                    break;
                case 'permissions':
                    if(data.type == 'success') {
                        if (form_type == 'create')
                            _form.trigger('reset');
                        else {
                            field_status_change('disable', _form);
                            $('#edit-permission-button').removeAttr('style');
                            $('#update-permission').css('display', 'none');
                        }
                    }
                    break;
                case 'matriculation':
                    if(data.type == 'success') {
                        if (form_type == 'create') {
                            $('#matriculation_id').val(data.id);
                            matriculation_modality_save();
                            window.location = data.url;
                            schedule_button_action('disable');
                        }
                        else {
                            field_status_change('disable', _form);
                            $('#add-matriculation_consult').addClass('disabled');
                            $('#edit-matriculation-button').removeAttr('style');
                            $('#update-matriculation').css('display', 'none');
                            // matriculation_modality_save();
                            schedule_button_action('disable');
                        }
                    }
                    break;
                case 'payment':
                    if(data.type == 'success') {
                            field_status_change('disable', _form);
                            $('#add-payments').addClass('disabled');
                            $('#edit-payment-button').removeAttr('style');
                            $('#update-payment').css('display', 'none');
                            payment_procedure_save();
                    }
                    break;
                case 'modalities':
                    if(form_type=='create') {
                        _form.trigger('reset');
                        $('.avatar-' + data.form).attr('src', '/img/clinic/doctor_icon.png');
                    }else{
                        field_status_change('disable',_form);
                        $('#edit-modalities-button').removeAttr('style');
                        $('#edit-modalities').css('display','none');
                    }
                    break;

                case 'license_generator':
                    field_status_change('disable',_form);
                    $('#generate-license').css('display','none');
                    break;

                case 'license':
                    if(data.type == 'success'){
                        field_status_change('disable',_form);
                        $('#add-license').css('display','none');
                    }
                    break;

                case 'files':
                    if(data.type == 'success') {
                        file_table_data(data.values);
                    }else {
                        var p = $('.progress').find('.progress-bar');
                        p.removeClass('active');
                        p.removeClass('progress-bar-striped');
                        p.addClass('progress-bar-danger');
                    }

                    break;

                case 'backup':
                    if(data.type === 'success') {
                        // backup_table_data(data.values);
                        // $('#modal-md').modal('hide');

                        if($('#backup-upload-message').hasClass('callout-danger'))
                            $('#backup-upload-message').removeClass('callout-danger');

                        $('#backup-upload-message').addClass('callout-success');
                        $('#backup-upload-message').find('#message').text(data.message);
                        $('#backup-upload-message').show();

                        // $('#backup-upload-message').fadeOut(5000);

                        // location.reload();
                        $('#backup-list').load('backups_list');
                    }else {
                        var p = $('.progress').find('.progress-bar');
                        p.removeClass('active');
                        p.removeClass('progress-bar-striped');
                        p.addClass('progress-bar-danger');

                        if($('#backup-upload-message').hasClass('callout-success'))
                            $('#backup-upload-message').removeClass('callout-success');

                        $('#backup-upload-message').addClass('callout-danger');
                        $('#backup-upload-message').find('#message').text(data.message);
                        $('#backup-upload-message').show();

                        // $('#backup-upload-message').fadeOut(5000);
                    }

                    break;

                case 'profile':
                    if(data.type == 'success') {
                        if (form_type == 'update'){
                            field_status_change('disable', _form);
                            $('#edit-accounts-profile-button').removeAttr('style');
                            $('#update-accounts-profile').css('display', 'none');
                            reloadPage();
                        }
                    }
                    break;

                case 'accounts-setting':
                    if(data.type == 'success') {
                        if (form_type == 'update'){
                            field_status_change('disable', _form);
                            $('#edit-accounts-setting-button').removeAttr('style');
                            $('#update-accounts-setting').css('display', 'none');
                            reloadPage();
                        }
                    }
                    break;

                case 'password':
                    if(data.type == 'success') {
                        if (form_type == 'update'){
                            _form.trigger('reset');

                            bootbox.alert({
                                title: 'Password Change',
                                message: data.change_password_message,
                                size: 'small',
                                callback: function () {
                                    window.location = data.url;
                                }
                            });

                        }
                    }
                    break;

            }

        },
        error: function (data) {
            console.log('Error:', data);
            if( data.status === 422) {
                $errors = data.responseJSON;
                var errorsHtml= _required_field_text;
                var aux = 0;
                $.each( $errors, function( key, value ) {
                    //errorsHtml += '<li>' + value[0] + '</li>'; //showing only the first error.
                    console.log(key);
                    if(aux == 0){
                        $('#'+key).addClass('field-error').focus();
                    }else{
                        $('#'+key).addClass('field-error');
                    }
                    aux++;
                    //$('.'+key).find('.has-error').text(value[0]).css('display','block');
                });

                toastr.error(errorsHtml,{timeOut: 5000} ).css("width","500px");
            }else if(data.status === 200){
                toastr.error(data.responseText,{timeOut: 5000} ).css("width","500px");
            }
        },
        cache: false,
        contentType: false,
        processData: false
    });
    return false;
}


//
function field_status_change(action,_form) {
    var inputs = _form.find(':input');
    if (action == 'disable') {
        inputs.each(function () {
            // console.log();
            if($(this).attr('type') != 'hidden')
                $(this).attr('disabled', 'disabled');

        });
    }

    if (action == 'enable') {
        inputs.each(function () {
            $(this).removeAttr('disabled');
        });
    }
}


//FUNCTION TO DISABLE AND ENABLE STATUS
function change_status(_id, _type, _name_item, _tr, url, _tr_class, _form) {
    bootbox.confirm({
        title: ' <i> ' + _type.toUpperCase() + ' '+_form.toUpperCase()+ ' <strong>'+ _name_item.toUpperCase() + '</strong></i> ?',
        message: _confirm_alert_text,
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

                $.ajax({
                    type: 'POST',
                    url: url,
                    data: {id: _id},
                    dataType: 'json',
                    success: function (data) {
                        if (data.type == 'error'){
                            toastr.error(data.message, {timeOut: 5000}).css("width", "300px");
                        }else{

                            if(_form == 'matriculation'){
                                //GENERATE BUDGET PAYMENT VAL
                                if(data.action == 'approve'){
                                    bootbox.confirm({
                                        title: 'Do you want generate payment?',
                                        message: 'This action will generate payment.',
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
                                                url = '/matriculation/payment';
                                                $.ajax({
                                                    type: 'POST',
                                                    url: url,
                                                    data: {id: _id},
                                                    dataType: 'json',
                                                    success: function (data) {
                                                        toastr.success(data.message, {timeOut: 5000}).css("width", "300px");
                                                        location.reload();
                                                    },
                                                    error: function () {

                                                    }
                                                });

                                            }
                                        }
                                    });
                                }else{
                                    location.reload();
                                }
                                
                            }else
                                toastr.success(data.message, {timeOut: 5000}).css("width", "300px");

                            if(_form == 'employees_category')
                                location.reload();

                            if(_type == 'enable'){
                                _tr.parent().find('#edit-'+_form).css('display','initial');
                                _tr.parent().find('#enable-'+_form).css('display','none');
                                _tr.parent().find('#disable-'+_form).css('display','initial');

                            }else if(_type == 'disable'){
                                _tr.parent().find('#edit-'+_form).css('display','none');
                                _tr.parent().find('#enable-'+_form).css('display','initial');
                                _tr.parent().find('#disable-'+_form).css('display','none');
                            }

                            _tr.parent().parent().removeClass(_tr_class);
                            _tr.parent().parent().addClass(data.status_color);


                        }

                    },
                    error: function () {

                    }
                });
            }
        }
    });
}

// THIS FUNCTION PUT CURRENCY FORMAT TO OBJECT IN HTML VIEW
function getCurrency(_value, _object, _option) {
    
    $.get('/currency_format/' + _value, function (data) {
        switch (_option){
            case 'text':
                _object.text(data);
                break;
            case 'val':
                _object.val(data);
                break;
        }
    });
}

function reloadPage() {
    bootbox.confirm({
        title: 'Do you want reload this page?',
        message: 'This action refresh your current page.',
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
                location.reload();
            }
        }
    });
}

function get_row_sum_total_value(_table_id,_row_class,_column_class) {
    var total = 0;
    $(_table_id).find(_row_class).each(function () {
        total += parseFloat($(this).find(_column_class).attr('data-value'));
    });
    return total;
}

//POPOVER
function setPopOver(field) {
    if(field === 'name'){
        $('#user-name').popover({
            html:true,
            content: '',
            title:'Edit',
            footer:'Footer',
            placement:'right',
            trigger:'click',
            template:'<div class="popover col-md-6"><button type="button" class="close close-popover" data-dismiss="modal" aria-label="Close" style="margin: 5px;"><span aria-hidden="true">×</span></button><div class="arrow"></div><h3 class="popover-title"></h3><div class="popover-content popover-name"></div></div>',
        });
    }

    if(field === 'email'){
        $('#user-email').popover({
            html:true,
            content: '',
            title:'Edit',
            footer:'Footer',
            placement:'right',
            trigger:'click',
            template:'<div class="popover col-md-6"><button type="button" class="close close-popover" data-dismiss="modal" aria-label="Close" style="margin: 5px;"><span aria-hidden="true">×</span></button><div class="arrow"></div><h3 class="popover-title"></h3><div class="popover-content popover-email"></div></div>',
        });
    }

    if(field === 'matriculation_teeth'){
        $('.matriculation-modalities').popover({
            html:true,
            content: '',
            title:'Select Teeth',
            footer:'Footer',
            placement:'bottom',
            trigger:'click',
            template:'<div class="popover col-md-6"><button type="button" class="close close-popover" data-dismiss="modal" aria-label="Close" style="margin: 5px;"><span aria-hidden="true">×</span></button><div class="arrow"></div><h3 class="popover-title"></h3><div class="popover-content popover-matriculation-modalities"></div></div>',
        });
    }

    if(field === 'payment-value'){
        $('.payment-value').popover({
            html:true,
            content: '',
            title:'Payment Value',
            footer:'Footer',
            placement:'bottom',
            trigger:'click',
            template:'<div class="popover col-md-6"><button type="button" class="close close-popover" data-dismiss="modal" aria-label="Close" style="margin: 5px;"><span aria-hidden="true">×</span></button><div class="arrow"></div><h3 class="popover-title"></h3><div class="popover-content popover-payment-value"></div></div>',
        });
    }

    if(field === 'm_modality-discount'){
        // console.log('Aqui!');
        $('.m_modality-discount').popover({
            html:true,
            content: '',
            title:'Discount Value',
            footer:'Footer',
            placement:'bottom',
            trigger:'click',
            template:'<div class="popover col-md-6"><button type="button" class="close close-popover" data-dismiss="modal" aria-label="Close" style="margin: 5px;"><span aria-hidden="true">×</span></button><div class="arrow"></div><h3 class="popover-title"></h3><div class="popover-content popover-m_modality-discount"></div></div>',
        });
    }

    if(field === 'branch-select'){
        $('.branch-select').popover({
            html:true,
            content: '',
            title:'Select Branch',
            footer:'Footer',
            placement:'bottom',
            trigger:'click',
            template:'<div class="popover col-md-12"><button type="button" class="close close-popover" data-dismiss="modal" aria-label="Close" style="margin: 5px;"><span aria-hidden="true">×</span></button><div class="arrow"></div><h3 class="popover-title"></h3><div class="popover-content popover-branch-select"></div></div>',
        });
    }
}


//SCHEDULE SET BUTTON ACTIONS
function action_button(_action) {
    if (_action == 'enable'){
        $('.action_button').css('display','table-cell');
    }else{
        $('.action_button').css('display','none');
    }
}

