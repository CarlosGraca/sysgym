/**
 * Created by MS-INSYS on 14/10/2016.
 */
$(function () {


    // DEFAULT SAVE USER FUNCTION save(_form,_form_data,form_type,callback)
    //CREATE role GROUP
        $(document).on('click','#add-role',function (e) {
            e.preventDefault();
            save($('#role-form'), $('#role-form')[0], 'create');
        });

    //EDIT role GROUP
        $(document).on('click','#update-role',function (e) {
            e.preventDefault();
            save($('#role-form'), $('#role-form')[0], 'update');
        });

    //CLICK EDIT BUTTON
    $(document).on('click','#edit-role-button',function (e) {
        e.preventDefault();
        $(this).css('display', 'none');
        field_status_change('enable', $('#role-form'));
        $('#update-role').removeAttr('style');
    });

    //DISABLE role CONSULT
    $(document).on('click','#disable-role',function (e) {
        e.preventDefault();
        change_status($(this).attr('data-key'), 'disable', $(this).attr('data-name'), $(this), 'roles/disable', 'bg-success', 'role')
    });

    //ENABLE PATIENT
    $(document).on('click','#enable-role',function (e) {
        e.preventDefault();
        change_status($(this).attr('data-key'), 'enable', $(this).attr('data-name'), $(this), 'roles/enable', 'bg-danger', 'role');
    });

    $(document).on('click','#select-all-permission',function () {
        if( $(this).is(':checked') ){
            checkUncheckAllPermission('check');
        }else{
            checkUncheckAllPermission('uncheck');
        }
    });

    $(document).on('click','input[name="permissions[]"]',function () {
        var val = null;
        var chk = $(this);
        if( chk.is(':checked') ){
            chk.parent().find('input[name="delete_permission[]"]').val('');

            if($(this).parent().parent().hasClass('bg-default')){
                $(this).parent().parent().removeClass('bg-default');
                $(this).parent().parent().addClass('bg-success');
            }

        }else{
            val = chk.val();
            chk.parent().find('input[name="delete_permission[]"]').val(val);
            if($(this).parent().parent().hasClass('bg-success')){
                $(this).parent().parent().removeClass('bg-success');
                $(this).parent().parent().addClass('bg-default');
            }
        }
    });

    $(document).on('click','.permissions',function () {

        var val = null;
        var chk = $(this).find('.permission').find('input[name="permissions[]"]');

        if( chk.is(':checked') ){
            // chk.parent().find('input[name="delete_permission[]"]').val('');
            chk.parent().find('input[name="delete_permission[]"]').val(chk.val());
            chk.prop('checked', false);
            if(chk.parent().parent().hasClass('bg-success')){
                chk.parent().parent().removeClass('bg-success');
                chk.parent().parent().addClass('bg-default');
            }

        }else{

            // val = chk.val();
            chk.parent().find('input[name="delete_permission[]"]').val('');
            chk.prop('checked', true);
            // chk.parent().find('input[name="delete_permission[]"]').val(val);
            if(chk.parent().parent().hasClass('bg-default')){
                chk.parent().parent().removeClass('bg-default');
                chk.parent().parent().addClass('bg-success');
            }

        }

    });

    // $(document).on('keypress','#search-permission',function (e) {
    //     search += e.key;
    //     // console.log(e.key);
    //    console.log(search);
    // });
    //
    // $('#search-permission').keydown(function () {
    //     $(this).trigger('keypress');
    //     console.log($(this).val());
    // });

    $("#search-permission").keyup(function () {
        //split the current value of searchInput
        var data = this.value.split(" ");
        //create a jquery object of the rows
        var tr = $("#table-permissions").find(".permissions");
        if (this.value == "") {
            tr.show();
            return;
        }
        //hide all the rows
        tr.hide();

        //Recusively filter the jquery object to get results.
        tr.filter(function (i, v) {
                var $t = $(this);
                for (var d = 0; d < data.length; ++d) {
                    if ($t.is(":contains('" + data[d] + "')")) {
                        return true;
                    }
                }
                return false;
            })
            //show the rows that match.
            .show();
    }).focus(function () {
        this.value = "";
        $(this).css({
            "color": "black"
        });
        $(this).unbind('focus');
    }).css({
        "color": "#C0C0C0"
    });

});

function checkUncheckAllPermission(_action) {

    $('#table-permissions').find('.permissions').find('.permission').each(function () {
        // $(this).find('input[name="permissions[]"]]')
        if(_action == 'check'){
            $(this).find('input[name="permissions[]"]').prop('checked', true);
            $(this).find('input[name="delete_permission[]"]').val('');
            console.log($(this).parent());
            if($(this).parent().hasClass('bg-default')){
                $(this).parent().removeClass('bg-default');
                $(this).parent().addClass('bg-success');
            }
        }
        else{
            $(this).find('input[name="permissions[]"]').prop('checked', false);
            $(this).find('input[name="delete_permission[]"]').val($(this).find('input[name="permissions[]"]').val());
            if($(this).parent().hasClass('bg-success')){
                $(this).parent().removeClass('bg-success');
                $(this).parent().addClass('bg-default');
            }
        }

    });
}
