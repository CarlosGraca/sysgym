/**
 * Created by MS-INSYS on 14/10/2016.
 */
$(function () {


    // DEFAULT SAVE USER FUNCTION save(_form,_form_data,form_type,callback)
    //CREATE permission GROUP
        $(document).on('click','#add-permission',function (e) {
            e.preventDefault();
            save($('#permission-form'), $('#permission-form')[0], 'create');
        });

    //EDIT permission GROUP
        $(document).on('click','#update-permission',function (e) {
            e.preventDefault();
            save($('#permission-form'), $('#permission-form')[0], 'update');
        });

    //CLICK EDIT BUTTON
    $(document).on('click','#edit-permission-button',function (e) {
        e.preventDefault();
        $(this).css('display', 'none');
        field_status_change('enable', $('#permission-form'));
        $('#update-permission').removeAttr('style');
    });

    //DISABLE permission CONSULT
    $(document).on('click','#disable-permission',function (e) {
        e.preventDefault();
        change_status($(this).attr('data-key'), 'disable', $(this).attr('data-name'), $(this), 'permissions/disable', 'bg-success', 'permission')
    });

    //ENABLE PATIENT
    $(document).on('click','#enable-permission',function (e) {
        e.preventDefault();
        change_status($(this).attr('data-key'), 'enable', $(this).attr('data-name'), $(this), 'permissions/enable', 'bg-danger', 'permission');
    });

});