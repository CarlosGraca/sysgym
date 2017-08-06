/**
 * Created by MS-INSYS on 16/07/2017.
 */

$(function () {
    $(document).on('click','#update-accounts-profile',function (e) {
        e.preventDefault();
        save($('#profile-form'), $('#profile-form')[0], 'update');
    });

    //CLICK EDIT BUTTON
    $(document).on('click','#edit-accounts-profile-button',function (e) {
        e.preventDefault();
        $(this).css('display', 'none');
        field_status_change('enable', $('#profile-form'));
        $('#update-accounts-profile').removeAttr('style');
    });


    $(document).on('click','#update-accounts-setting',function (e) {
        e.preventDefault();
        save($('#setting-form'), $('#setting-form')[0], 'update');
    });

    //CLICK EDIT BUTTON
    $(document).on('click','#edit-accounts-setting-button',function (e) {
        e.preventDefault();
        $(this).css('display', 'none');
        field_status_change('enable', $('#setting-form'));
        $('#update-accounts-setting').removeAttr('style');
    });

    $(document).on('click','#password-change-submit',function (e) {
        e.preventDefault();
        if(validatePasswordForm()){
            save($('#password-form'), $('#password-form')[0], 'update');
        }

    });
});

function validatePasswordForm() {
    var count = 0;
    $('#password-form').find(':input').each(function () {
        if($(this).val() == ''){
            if (!$(this).hasClass('field-error') && $(this)[0].hasAttribute('required')) {
                $(this).addClass('field-error');
            }
            count++;
        }
    });

    if(count > 0){
        toastr.error('FILL ALL REQUIRED FIELD (*)',{timeOut: 5000} ).css("width","500px");
        return false;
    }


    if(count == 0){
        if($('#new_password').val() != $('#confirm_new_password').val()){
            toastr.error('THE NEW PASSWORD AND THE CONFIRM NEW IS NOT THE SAME!',{timeOut: 5000} ).css("width","500px");
            $('#new_password').addClass('field-error');
            $('#confirm_new_password').addClass('field-error');
            return false;
        }else if($('#new_password').val().length < 6){
            toastr.error('THE PASSWORD HAS LESS 6 CHARACTER!',{timeOut: 5000} ).css("width","500px");
            $('#new_password').addClass('field-error');
            $('#confirm_new_password').addClass('field-error');
            return false;
        }
    }

    return true;
}
