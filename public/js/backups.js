$(function () {

    $(document).on('click','#create-backup',function (e) {
        e.preventDefault();
        var url = $(this).attr('data-url');

        $.ajax({
            type: 'GET',
            url: url,
            dataType: 'json',
            success: function (data) {

                if (data.type == 'error'){
                    toastr.error(data.message, {timeOut: 5000}).css("width", "300px");
                }else{
                    toastr.success(data.message, {timeOut: 5000}).css("width", "300px");
                    $('#backup-list').load('backups_list');

                }

            },
            error: function () {

            }
        });

    });

    $(document).on('click','#remove-backup',function (e) {
        e.preventDefault();
        var _this = $(this);
        var url = _this.attr('data-url');
        var _id = _this.attr('data-key');
        var _fileName = _this.attr('data-name');

        bootbox.confirm({
            title: _confirm_alert_text,
            message: _this.attr('data-message'),
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

                    $.ajax({
                        type: 'POST',
                        url: url,
                        data: {id: _id, fileName: _fileName},
                        dataType: 'json',
                        success: function (data) {

                            if (data.type == 'error'){
                                toastr.error(data.message, {timeOut: 5000}).css("width", "300px");
                            }else{
                                toastr.success(data.message, {timeOut: 5000}).css("width", "300px");
                                $('#backup-list').load('backups_list');

                            }

                        },
                        error: function () {

                        }
                    });

                }else{

                }
            }
        });

    });

    $(document).on('click','#restore-backup',function (e) {
        e.preventDefault();
        var _this = $(this);
        var url = _this.attr('data-url');
        var _id = _this.attr('data-key');
        var _fileName = _this.attr('data-name');

        bootbox.confirm({
            title: ' <i> ' + _this.attr('data-type').toUpperCase() + ' '+_this.attr('data-form').toUpperCase()+ ' <strong>'+ _fileName.toUpperCase() + '</strong></i> ?',
            message: _this.attr('data-message'),
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

                    $.ajax({
                        type: 'POST',
                        url: url,
                        data: {id: _id, fileName: _fileName},
                        dataType: 'json',
                        success: function (data) {

                            if (data.type == 'error'){
                                toastr.error(data.message, {timeOut: 5000}).css("width", "300px");
                            }else{
                                toastr.success(data.message, {timeOut: 5000}).css("width", "300px");
                                    // location.reload();
                                $('#backup-list').load('backups_list');

                            }

                        },
                        error: function () {

                        }
                    });

                }else{

                }
            }
        });

    });

    $(document).on('click','#upload-backup',function (e) {
        e.preventDefault();
        $('#myModalLabel-md').html('<i class="fa fa-cloud-upload"></i> ');
        $('#myModalLabel-md').append($(this).attr('data-title'));

        $('#modal-md').modal('show')
            .find('.modal-body')
            .load($(this).data('url'));
    });

    $(document).on('click','#upload-backup-save',function (e) {
        e.preventDefault();
        var _file = $(':file');

        if(_file.val() == ''){

            if($('#backup-upload-message').hasClass('callout-success'))
                $('#backup-upload-message').removeClass('callout-success');

            // toastr.error('no file browsed',{timeOut: 5000} ).css("width","300px");
            $('#backup-upload-message').addClass('callout-danger');
            $('#backup-upload-message').find('#message').text('No File Browsed');
            $('#backup-upload-message').show();

            // $('#backup-upload-message').fadeOut(5000);

        }else {
            save($('#backup-form'), $('#backup-form')[0], 'create');
        }
    });

});
