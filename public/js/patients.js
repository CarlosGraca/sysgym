
$(function () {

    // DEFAULT SAVE USER FUNCTION saveUser(_form,_form_data,form_type,callback)
    //BOTÃO ADICIONAR CLIENTE
    $(document).on('click','#add-patient',function () {
        save($('#patient-form'), $('#patient-form')[0], 'create');
    });

    //BOTÃO EDITAR CLIENTE
    $(document).on('click','#edit-patient',function () {
        save($('#patient-form'), $('#patient-form')[0], 'update');
    });

    $(document).on('click','#edit-patient-button',function () {
        $(this).css('display', 'none');
        fieldstatus('enable',$('#patient-form'));
        $('#edit-patient').removeAttr('style');
    });


    $(document).on('click','#tool_bar_button_patients',function (e) {
        $('#myModalLabel').text('New Patient');
        $('#modal').modal('show')
            .find('.modal-body')
            .load($(this).data('url'));
        $('#modal').css('overflow','auto');
    });

});