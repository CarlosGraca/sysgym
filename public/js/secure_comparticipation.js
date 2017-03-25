/**
 * Created by MS-INSYS on 14/10/2016.
 */
    // DEFAULT SAVE USER FUNCTION save(_form,_form_data,form_type,callback)
    //BUTTON EVENT TO SAVE NEW EMPLOYEE
$(function () {
    // DEFAULT SAVE USER FUNCTION save(_form,_form_data,form_type,callback)
    //CREATE secure_comparticipation
    $(document).on('click','#add-secure_comparticipation',function () {
        save($('#secure_comparticipation-form'), $('#secure_comparticipation-form')[0], 'create');
    });

    //EDIT secure_comparticipation
    $(document).on('click','#edit-secure_comparticipation',function () {
        save($('#secure_comparticipation-form'), $('#secure_comparticipation-form')[0], 'update');
    });

    //CLICK EDIT BUTTON
    $(document).on('click','#edit-secure_comparticipation-button',function () {
        $(this).css('display', 'none');
        field_status_change('enable', $('#secure_comparticipation-form'));
        $('#edit-secure_comparticipation').removeAttr('style');
    });

    //DISABLE secure_comparticipation
    $(document).on('click','#disable-secure_comparticipation',function () {
        change_status($(this).attr('data-key'), 'disable', $(this).attr('data-name'), $(this), 'secure_comparticipation/disable', 'bg-success', 'secure_comparticipation')
    });

    //ENABLE PATIENT
    $(document).on('click','#enable-secure_comparticipation',function () {
        change_status($(this).attr('data-key'), 'enable', $(this).attr('data-name'), $(this), 'secure_comparticipation/enable', 'bg-danger', 'secure_comparticipation');
    }); 
});
