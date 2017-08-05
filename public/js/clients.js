
$(function () {

    // DEFAULT SAVE USER FUNCTION saveUser(_form,_form_data,form_type,callback)
    //ADD PATIENT
    $(document).on('click','#add-client',function (e) {
        e.preventDefault();
        save($('#client-form'), $('#client-form')[0], 'create');
    });

    //UPDATE PATIENT
    $(document).on('click','#edit-client',function (e) {
        e.preventDefault();
        save($('#client-form'), $('#client-form')[0], 'update');
    });

    //EDIT PATIENT
    $(document).on('click','#edit-client-button',function (e) {
        e.preventDefault();
        $(this).css('display', 'none');
        field_status_change('enable',$('#client-form'));
        $('#edit-client').removeAttr('style');
    });


    //POPUP TOOLBAR
    $(document).on('click','#client_add_popup',function (e) {
        e.preventDefault();
        $('#myModalLabel').text($(this).attr('data-title'));
        $('#modal').modal('show')
            .find('.modal-body')
            .load($(this).data('url'));
        $('#modal').css('overflow','auto');
    });
    

    //DISABLE PATIENT
    $(document).on('click','#disable-client',function (e) {
        e.preventDefault();
        change_status($(this).attr('data-key'), 'disable', $(this).attr('data-name'), $(this), 'clients/disable', 'bg-success', 'client')
    });

    //ENABLE PATIENT
    $(document).on('click','#enable-client',function (e) {
        e.preventDefault();
        change_status($(this).attr('data-key'), 'enable', $(this).attr('data-name'), $(this), 'clients/enable', 'bg-danger', 'client');
    });

});

