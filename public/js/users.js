
$(function(){
    $(document).on("click", '#save-name',function () {
        var url = '/update/user/field';
        $('.loader-name').css('display','block');
        $('#field-name').css('display','none');
        $.ajax({
            url:url,
            data:{field:'name',name:$('#name').val()},
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                $('.loader-name').css('display','none');
                if(data.type === 'success'){
                    toastr.success(data.message,{timeOut: 5000} ).css("width","300px");
                }

                if(data.type === 'error'){
                    toastr.error(data.message,{timeOut: 5000} ).css("width","300px");
                }

                $('#name').val(data.field_value);
                $('#save-name').parents(".popover").popover('hide');
                $('.name').text(data.field_value);
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
    $('#user-build').on('click',function () {
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
        $.get('/edit/user/field/name',function (data) {
            $('.popover-name').html(data);
        });
    });

    //POPOVER CHANGE USER-EMAIL
    $(document).on('show.bs.popover','#user-email',function () {
        $.get('/edit/user/field/email',function (data) {
            $('.popover-email').html(data);
        });
    });

    //DISABLE USER
    $(document).on('click','#disable-user',function () {
        change_status($(this).attr('data-key'), 'disable', $(this).attr('data-name'), $(this), 'users/disable', 'bg-success', 'user')
    });

    //ENABLE USER
    $(document).on('click','#enable-user',function () {
        change_status($(this).attr('data-key'), 'enable', $(this).attr('data-name'), $(this), 'users/enable', 'bg-danger', 'user');
    });
});

    

//POPOVER
function setPopOver(field) {
  if(field === 'name'){
    $('#user-name').popover({
      html:true,
      content: '',
      title:'Edit',
      footer:'Footer',
      placement:'right',
      trigger:'click',
      template:'<div class="popover col-md-6"><button type="button" class="close close-popover" data-dismiss="modal" aria-label="Close" style="margin: 5px;"><span aria-hidden="true">×</span></button><div class="arrow"></div><h3 class="popover-title"></h3><div class="popover-content popover-name"></div></div>',
    });
  }

  if(field === 'email'){
    $('#user-email').popover({
      html:true,
      content: '',
      title:'Edit',
      footer:'Footer',
      placement:'right',
      trigger:'click',
      template:'<div class="popover col-md-6"><button type="button" class="close close-popover" data-dismiss="modal" aria-label="Close" style="margin: 5px;"><span aria-hidden="true">×</span></button><div class="arrow"></div><h3 class="popover-title"></h3><div class="popover-content popover-email"></div></div>',
    });
  }
}

