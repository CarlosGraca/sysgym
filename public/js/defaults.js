/**
 * Created by MS-INSYS on 14/10/2016.
 */


$(document).on('change', ':file', function() {
    var type = $(this).parent().attr('data-type');
    var avatar = $('.avatar');

    switch (type){
        case 'system':
            changeBackground(this);
            avatar = $('.avatar-system')
            break;
        case 'company':
            avatar = $('.avatar-company');
            break;
        case 'user':
            avatar = $('.avatar-user');
            break;

        case 'patient':
            avatar = $('.avatar-patient');
            break;

        case 'employee':
            avatar = $('.avatar-employee');
            break;
    }
    readURL(this,avatar);
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

function save(_form,_form_data,form_type,_branches_schedule) {

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
                case 'patient':
                    
                        $('#add-patient').css('display','none');
                        $('#edit-patient').css('display','none');
                        $('#edit-patient-button').removeAttr('style');
                        if(form_type == 'create'){
                            var patient_url = $('#patient_detail').attr('href');
                            $('#patient_detail').attr('href',patient_url+'/'+data.id);
                            $('#patient_detail').removeAttr('style');
                            fieldstatus('disable',$('#patient-form'));
                        }else{
                            fieldstatus('disable',$('#patient-form'));
                        }
                    
                    break;

                case 'system':
                        $('#edit-system').css('display','none');
                        fieldstatus('disable',$('#system-form'));
                        $('#edit-system-button').removeAttr('style');
                        timezone = data.timezone;
                    break;

                case 'employee':
                        $('#add-employee').css('display','none');
                        $('#edit-employee').css('display','none');
                        $('#edit-employee-button').removeAttr('style');
                        if(form_type == 'create'){
                            var employee_url = $('#patient_detail').attr('href');
                            $('#employee_detail').attr('href',employee_url+'/'+data.values);
                            $('#employee_detail').removeAttr('style');
                            fieldstatus('disable',$('#employee-form'));
                        }
                    break;
                case 'category':
                    $('#add-category').css('display','none');
                    $('#edit-category').css('display','none');
                    break;
                case 'branches':
                   // $('#add-branch').css('display','none');
                   // $('#edit-branch').css('display','none');
                    $('#branch_id').val(data.id);

                    break;
                case 'company':
                    $('#add-company').css('display','none');
                    $('#edit-company').css('display','none');
                    break;
                case 'agency':
                    $('#add-secure_agency').css('display','none');
                    $('#edit-secure_agency').css('display','none');
                    break;
                case 'consult_type':
                    if(form_type=='create')
                        _form.reset;
                    //$('#add-consult_type').css('display','none');
                    //$('#edit-consult_type').css('display','none');
                   // setTableValue(data,form_type);
                    break;
                case 'secure_comparticipation':
                    $('#add-secure_comparticipation').css('display','none');
                    $('#edit-secure_comparticipation').css('display','none');
                break;
                case 'consult_agenda':
                    //$('#modal').find('#add-consult_agenda').css('display','none');
                    //$('#modal').find('#edit-consult_agenda').css('display','none');
                   // $('#modal').modal('hide');
                    if(form_type=='create'){
                        $('#add-consult_agenda').css('display', 'none');
                    }else{
                        $('#edit-consult_agenda').css('display', 'none');
                    }

                    fieldstatus('disable',$('#consult_agenda-form'));
                    $('#edit-consult_agenda-button').removeAttr('style');

                    $('#calendar').fullCalendar('refetchEvents');
                    break;

                case 'license_generator':
                        fieldstatus('disable',$('#license-generator-form'));
                        $('#generate-license').css('display','none');
                    break;

                case 'license':
                    if(data.type == 'success'){
                        fieldstatus('disable',$('#license-form'));
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

$(function () {

    //GET INPUT KEYDOWN VALUE
    $(':input').keyup(function (e) {

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

    $(document).ajaxStart(function () {
        $(".loader").css("display", "block");
        $(".loader").modal('show');
    });

    $(document).ajaxComplete(function () {
        $(".loader").css("display", "none");
        $(".loader").modal('hide');
    });


});
    
function fieldstatus(action,_form) {
    var inputs = _form.find(':input');
    if (action == 'disable') {
        inputs.each(function () {
            inputs.attr('disabled', 'disabled');
        });
    }

    if (action == 'enable') {
        inputs.each(function () {
            inputs.removeAttr('disabled');
        });
    }
}