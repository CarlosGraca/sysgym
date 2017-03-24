/**
 * Created by MS-INSYS on 18/12/2016.
 */
$(function () {

    //BUTTON EDIT COMPANY
    $('#edit-company').click(function(){
        save($('#company-form'),$('#company-form')[0],'update');
        $(this).css('display', 'none');
        field_status_change('disable',$('#company-form'));
        $('#edit-company-button').removeAttr('style');
    });

    $('#edit-company-button').click(function () {
        $(this).css('display', 'none');
        field_status_change('enable',$('#company-form'));
        $('#edit-company').removeAttr('style');
    });

});