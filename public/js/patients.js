
$(function () {

    // DEFAULT SAVE USER FUNCTION saveUser(_form,_form_data,form_type,callback)
    //ADD PATIENT
    $(document).on('click','#add-patient',function () {
        save($('#patient-form'), $('#patient-form')[0], 'create');
    });

    //UPDATE PATIENT
    $(document).on('click','#edit-patient',function () {
        save($('#patient-form'), $('#patient-form')[0], 'update');
    });

    //EDIT PATIENT
    $(document).on('click','#edit-patient-button',function () {
        $(this).css('display', 'none');
        field_status_change('enable',$('#patient-form'));
        $('#edit-patient').removeAttr('style');
    });


    //POPUP TOOLBAR
    $(document).on('click','#tool_bar_button_patients',function (e) {
        $('#myModalLabel').text($(this).attr('data-title'));
        $('#modal').modal('show')
            .find('.modal-body')
            .load($(this).data('url'));
        $('#modal').css('overflow','auto');
    });

    //DISABLE PATIENT
    $(document).on('click','#disable-patient',function () {
        change_status($(this).attr('data-key'), 'disable', $(this).attr('data-name'), $(this), 'patients/disable', 'bg-success', 'patient')
    });

    //ENABLE PATIENT
    $(document).on('click','#enable-patient',function () {
        change_status($(this).attr('data-key'), 'enable', $(this).attr('data-name'), $(this), 'patients/enable', 'bg-danger', 'patient');
    });

});

