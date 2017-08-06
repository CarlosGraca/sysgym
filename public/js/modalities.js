/**
 * Created by MS-INSYS on 14/10/2016.
 */
$(function () {


    // DEFAULT SAVE USER FUNCTION save(_form,_form_data,form_type,callback)
    //CREATE modality GROUP
        $(document).on('click','#add-modality',function (e) {
            e.preventDefault();
            save($('#modality-form'), $('#modality-form')[0], 'create');
        });

    //EDIT modality GROUP
        $(document).on('click','#update-modality',function (e) {
            e.preventDefault();
            save($('#modality-form'), $('#modality-form')[0], 'update');
        });

    //CLICK EDIT BUTTON
    $(document).on('click','#edit-modality-button',function (e) {
        e.preventDefault();
        $(this).css('display', 'none');
        field_status_change('enable', $('#modality-form'));
        $('#update-modality').removeAttr('style');
        schedule_button_action('enable');

    });

    //DISABLE modality CONSULT
    $(document).on('click','#disable-modality',function (e) {
        e.preventDefault();
        change_status($(this).attr('data-key'), 'disable', $(this).attr('data-name'), $(this), 'modalities/disable', 'bg-success', 'modality')
    });

    //ENABLE PATIENT
    $(document).on('click','#enable-modality',function (e) {
        e.preventDefault();
        change_status($(this).attr('data-key'), 'enable', $(this).attr('data-name'), $(this), 'modalities/enable', 'bg-danger', 'modality');
    });

});