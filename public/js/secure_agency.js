/**
 * Created by MS-INSYS on 14/10/2016.
 */
$(function () {

    // DEFAULT SAVE USER FUNCTION save(_form,_form_data,form_type,callback)
    //BUTTON EVENT TO SAVE NEW EMPLOYEE
    $('#add-secure_agency').click(function () {
        save($('#secure_agency-form'), $('#secure_agency-form')[0], 'create');
        fieldstatus('disable',$('#secure_agency-form'));
    });

    //BOTÃO EDITAR CLIENTE
    $('#edit-secure_agency').click(function () {
        save($('#secure_agency-form'), $('#secure_agency-form')[0], 'update');
        $(this).css('display', 'none');
        fieldstatus('disable',$('#secure_agency-form'));
        $('#edit-secure_agency-button').removeAttr('style');
    });

    $('#edit-secure_agency-button').click(function () {
        $(this).css('display', 'none');
        fieldstatus('enable',$('#secure_agency-form'));
        $('#edit-secure_agency').removeAttr('style');
    });

    //$("#phone").inputmask({"mask":"(999) 999-9999"});

});