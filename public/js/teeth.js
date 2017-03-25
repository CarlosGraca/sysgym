/**
 * Created by MS-INSYS on 14/10/2016.
 */
$(function () {


    // DEFAULT SAVE USER FUNCTION save(_form,_form_data,form_type,callback)
    //CREATE teeth GROUP
        $(document).on('click','#add-teeth',function () {
            save($('#teeth-form'), $('#teeth-form')[0], 'create');
        });

    //EDIT teeth GROUP
        $(document).on('click','#edit-teeth',function () {
            save($('#teeth-form'), $('#teeth-form')[0], 'update');
        });

    //CLICK EDIT BUTTON
    $(document).on('click','#edit-teeth-button',function () {
        $(this).css('display', 'none');
        field_status_change('enable', $('#teeth-form'));
        $('#edit-teeth').removeAttr('style');
    });

    //DISABLE teeth CONSULT
    $(document).on('click','#disable-teeth',function () {
        change_status($(this).attr('data-key'), 'disable', $(this).attr('data-name'), $(this), 'teeth/disable', 'bg-success', 'teeth')
    });

    //ENABLE PATIENT
    $(document).on('click','#enable-teeth',function () {
        change_status($(this).attr('data-key'), 'enable', $(this).attr('data-name'), $(this), 'teeth/enable', 'bg-danger', 'teeth');
    });

});