/**
 * Created by MS-INSYS on 14/10/2016.
 */
$(function () {

    // DEFAULT SAVE USER FUNCTION save(_form,_form_data,form_type,callback)
    //CREATE menu GROUP
        $(document).on('click','#add-menu',function (e) {
            e.preventDefault();
            save($('#menu-form'), $('#menu-form')[0], 'create');
        });

    //EDIT menu GROUP
        $(document).on('click','#update-menu',function (e) {
            e.preventDefault();
            save($('#menu-form'), $('#menu-form')[0], 'update');
        });

    //CLICK EDIT BUTTON
    $(document).on('click','#edit-menu-button',function (e) {
        e.preventDefault();
        $(this).css('display', 'none');
        field_status_change('enable', $('#menu-form'));
        $('#update-menu').removeAttr('style');
    });

    //DISABLE menu CONSULT
    $(document).on('click','#disable-menu',function (e) {
        e.preventDefault();
        change_status($(this).attr('data-key'), 'disable', $(this).attr('data-name'), $(this), 'menus/disable', 'bg-success', 'menu')
    });

    //ENABLE PATIENT
    $(document).on('click','#enable-menu',function (e) {
        e.preventDefault();
        change_status($(this).attr('data-key'), 'enable', $(this).attr('data-name'), $(this), 'menus/enable', 'bg-danger', 'menu');
    });

});

