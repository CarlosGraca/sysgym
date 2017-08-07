/**
 * Created by MS-INSYS on 18/12/2016.
 */
$(function () {

    //BUTTON EDIT COMPANY
    $(document).on('click','#update-company',function(){
        save($('#company-form'),$('#company-form')[0],'update');
    });

    $(document).on('click','#edit-company-button',function () {
        $(this).css('display', 'none');
        field_status_change('enable',$('#company-form'));
        $('#update-company').removeAttr('style');
    });

});