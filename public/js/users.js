
$(function(){
    $(document).on("click", '#save-user-name',function () {
        var url = '/update/user-name/field';
        $('.loader-user-name').css('display','block');
        $('#field-user-name').css('display','none');

        $.ajax({
            url:url,
            data:{ field: 'name', value: $('input#user-name').val() },
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                $('.loader-user-name').css('display','none');
                if(data.type === 'success'){
                    toastr.success(data.message,{timeOut: 5000} ).css("width","300px");
                }

                if(data.type === 'error'){
                    toastr.error(data.message,{timeOut: 5000} ).css("width","300px");
                }

                $('#name').val(data.field_value);
                $('#save-user-name').parents(".popover").popover('hide');
                $('.user-name').text(data.field_value);
                $('.users-list-name').text(data.field_value);
                $('.users-list-name').attr('title',data.field_value);
            }
        });
        return false;
    });

    setPopOver('name');
    setPopOver('email');


    $(document).on("click", ".close-popover" , function(){
      $(this).parents(".popover").popover('hide');
    });

  //USERS DEFAULT FUNCTIONS FOR ALL USER INSIDE SYSTEM
    $('#employee_id').on('change',function () {

      if($(this).val() != ""){
        var url = '/employee/'+$(this).val();
        $.get(url,function (data) {
          console.log(data['name']);
          $('#name').val(data.name);
          $('#email').val(data.email);
        });
      }

    });

    //BUILD USER
    $(document).on('click','#user-build',function () {
      var url = $(this).data('url');
      $.get(url,function (data) {
        toastr.success(data.message,{timeOut: 5000} ).css("width","300px");
        $('#user-build').remove();
      });
    });

    //RESET PASSWORD
    $(document).on('click','#user-reset-password',function () {

        var url = $(this).data('url');

        bootbox.confirm({
            title: _confirm_alert_text,
            message: _confirm_alert_text,
            //size: 'small',
            buttons: {
                confirm: {
                    label: _yes_text,
                    className: 'btn-success'
                },
                cancel: {
                    label: _no_text,
                    className: 'btn-danger'
                }
            },
            callback: function (result) {
                if (result == true) {

                    $.get(url, function (data) {
                        if (data.type == 'error') {
                            toastr.error(data.message, {timeOut: 5000}).css("width", "300px");
                        }
                        if (data.type == 'success') {
                            toastr.success(data.message, {timeOut: 5000}).css("width", "300px");
                        }
                    });
                }
            }
        });

    });

    //POPOVER CHANGE USER-NAME
    $(document).on('show.bs.popover','#user-name',function () {
        $.post('/edit/user-name/field',function (data) {
            $('.popover-name').html(data);
        });
    });

    //POPOVER CHANGE USER-EMAIL
    // $(document).on('show.bs.popover','#user-email',function () {
    //     $.get('/edit/user/field/email',function (data) {
    //         $('.popover-email').html(data);
    //     });
    // });

    //DISABLE USER
    $(document).on('click','#disable-user',function () {
        change_status($(this).attr('data-key'), 'disable', $(this).attr('data-name'), $(this), 'users/disable', 'bg-success', 'user')
    });

    //ENABLE USER
    $(document).on('click','#enable-user',function () {
        change_status($(this).attr('data-key'), 'enable', $(this).attr('data-name'), $(this), 'users/enable', 'bg-danger', 'user');
    });


    //EDIT role GROUP
    $(document).on('click','#update-user',function (e) {
        e.preventDefault();
        save($('#user-form'), $('#user-form')[0], 'update');
    });

    //CLICK EDIT BUTTON
    $(document).on('click','#edit-user-button',function (e) {
        e.preventDefault();
        $(this).css('display', 'none');
        field_status_change('enable', $('#user-form'));
        $('#update-user').removeAttr('style');
    });
});

    

