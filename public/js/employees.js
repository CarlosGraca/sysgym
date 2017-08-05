/**
 * Created by MS-INSYS on 14/10/2016.
 */
$(function () {


// DEFAULT SAVE USER FUNCTION saveUser(_form,_form_data,form_type,callback)
//BUTTON EVENT TO SAVE NEW EMPLOYEE
    $(document).on('click','#add-employee',function () {
        save($('#employee-form'), $('#employee-form')[0], 'create');
    });

//BOTÃO EDITAR CLIENTE
    $(document).on('click','#update-employee',function () {
        save($('#employee-form'), $('#employee-form')[0], 'update');
    });

    $(document).on('click','#edit-employee-button',function () {
        $(this).css('display', 'none');
        field_status_change('enable', $('#employee-form'));
        $('#edit-employee').removeAttr('style');
    });

    //DISABLE employee
    $(document).on('click','#disable-employee',function () {
        change_status($(this).attr('data-key'), 'disable', $(this).attr('data-name'), $(this), 'employees/disable', 'bg-success', 'employee')
    });

    //ENABLE employee
    $(document).on('click','#enable-employee',function () {
        change_status($(this).attr('data-key'), 'enable', $(this).attr('data-name'), $(this), 'employees/enable', 'bg-danger', 'employee');
    });

});