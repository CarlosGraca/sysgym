/**
 * Created by MS-INSYS on 14/10/2016.
 */
$(function () {


// DEFAULT SAVE USER FUNCTION saveUser(_form,_form_data,form_type,callback)
//BUTTON EVENT TO SAVE NEW EMPLOYEE
    $('#add-employee').click(function () {
        save($('#employee-form'), $('#employee-form')[0], 'create');
    });

//BOTÃO EDITAR CLIENTE
    $('#edit-employee').click(function () {
        save($('#employee-form'), $('#employee-form')[0], 'update');
        fieldstatus('disable',$('#employee-form'));
    });

    $('#edit-employee-button').click(function () {
        $(this).css('display', 'none');
        fieldstatus('enable', $('#employee-form'));
        $('#edit-employee').removeAttr('style');
    });
//$('#table-employee').dataTable();
});