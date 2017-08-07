/**
 * Created by MS-INSYS on 14/10/2016.
 */
$(function () {


    // DEFAULT SAVE USER FUNCTION saveUser(_form,_form_data,form_type,callback)
    //BOTÃO ADICIONAR EMPLOYEE CATEGORY
    $(document).on('click','#add-employees_category',function (e) {
        e.preventDefault();
        save($('#employees_category-form'), $('#employees_category-form')[0], 'create');
    });

    //BOTÃO EDITAR CLIENTE
    $(document).on('click','#update-employees_category',function (e) {
        e.preventDefault();
        save($('#employees_category-form'), $('#employees_category-form')[0], 'update');
    });

    //CLICK EDIT BUTTON
    $(document).on('click','#edit-employees_category-button',function (e) {
        e.preventDefault();
        $(this).css('display', 'none');
        field_status_change('enable', $('#employees_category-form'));
        $('#update-employees_category').removeAttr('style');
    });

    //DISABLE role CONSULT
    $(document).on('click','#disable-employees_category',function (e) {
        e.preventDefault();
        change_status($(this).attr('data-key'), 'disable', $(this).attr('data-name'), $(this), 'employees_category/disable', 'bg-success', 'employees_category')
    });

    //ENABLE PATIENT
    $(document).on('click','#enable-employees_category',function (e) {
        e.preventDefault();
        change_status($(this).attr('data-key'), 'enable', $(this).attr('data-name'), $(this), 'employees_category/enable', 'bg-danger', 'employees_category');
    });

});
