/**
 * Created by MS-INSYS on 27/10/2016.
 */
$(function () {


    $('#add-budget_consult').on('click', function () {
        var consult_type_id = $('#budget_consult_type_id').val();
        if (consult_type_id == '') {
            toastr.error('SELECT CONSULT TYPE', {timeOut: 5000}).css("width", "500px");
            return false;
        } else {
            var table = $('#table-budget');
            var secure_agency_id = $('#secure_agency_id').val();
            if ($('#has_secure').val() == 1) {

                $.ajax({
                    url: '/consult_procedure/get_consult',
                    type: 'POST',
                    data: {consult_type_id: consult_type_id, secure_agency_id: secure_agency_id},
                    dataType: 'json',
                    success: function (data) {
                        if (data.length != 0) {
                            $('#consult_type_id').val('');
                            $("#budget_consult_type_id option[value='" + consult_type_id + "']").remove();
                            console.log(data);
                            var total = parseFloat(data.total) + parseFloat($('#sum-total').attr('data-value'));
                            $('#sum-total').attr('data-value', total);

                            $.get('/currency_format/' + total, function (data) {
                                $('#sum-total').text(data);
                            });

                            table.find('#budget_with_secure').append(
                                '<tr class="budget_table" data-key="' + consult_type_id + '" data-total="' + data.total + '">' +
                                '<td class="name">' + data.name + '</td>' +
                                '<td>' + data.price + '</td>' +
                                '<td>' + data.max_value + '</td>' +
                                '<td>' + data.total_price + '</td>' +
                                '<td> <a href="#!" class="remover_item"><i class="fa fa-trash"></i></a> </td>' +
                                '</tr>'
                            );
                        } else {

                        }

                    }
                });

            } else {
                $.getJSON('/consult_type/' + consult_type_id, function (data) {
                    $('#budget_consult_type_id').val('');
                    $("#budget_consult_type_id option[value='" + consult_type_id + "']").remove();

                    var total = parseFloat(data.total) + parseFloat($('#sum-total').attr('data-value'));
                    $('#sum-total').attr('data-value', total);

                    $.get('/currency_format/' + total, function (data) {
                        $('#sum-total').text(data);
                    });

                    table.find('#budget_without_secure').append(
                        '<tr class="budget_table" data-key="' + consult_type_id + '" data-total="' + data.total + '">' +
                        '<td class="name">' + data.name + '</td>' +
                        '<td>' + data.price + '</td>' +
                        '<td>' + data.total_price + '</td>' +
                        '<td> <a href="#!" class="remover_item"><i class="fa fa-trash"></i></a> </td>' +
                        '</tr>'
                    );
                });
            }

        }
    });

//$('#table-budget').dataTable();

    $(document).on('click', '.remover_item', function () {
        var _can = confirm('Are you sure?');

        if(_can)
            removeBudgetTableValues($(this));
       /* var tr_parent = $(this).parent().parent();

        var total = parseFloat($('#sum-total').attr('data-value')) - parseFloat(tr_parent.attr('data-total'));
        $('#sum-total').attr('data-value', total);

        $.get('/currency_format/' + total, function (data) {
            $('#sum-total').text(data);
        });

        $('#budget_consult_type_id').append('<option value="' + tr_parent.data('key') + '">' + tr_parent.find('.name').text() + '</option>');
        tr_parent.remove();
        */
    });


    if ($('#sum-total')[0] != undefined) {
        var total = parseFloat($('#sum-total').attr('data-value'));
        $.get('/currency_format/' + total, function (data) {
            $('#sum-total').text(data);
        });
    }


    $('#reset-budget').on('click', function () {

        var _remover = $('.remover_item');

        _remover.each(function () {
            removeBudgetTableValues($(this));
        });

        $('#budget-form').trigger('reset');
        $('.avatar-patient').attr('src','/img/avatar.png');

        $('#secure_agency').css('display','none');
    });

});
//CONSULT GET TEETH FUNCTIONS
$(function () {
    $.contextMenu({
        selector: '#context-menu-one',
        callback: function(key, options) {
            var m = "clicked: " + key;
            window.console && console.log(m) || alert(m);
        },
        items: {
            "edit": {name: "Edit", icon: "edit"},
             "cut": {name: "Cut", icon: "cut"},
             copy: {name: "Copy", icon: "copy"},
            "paste": {name: "Paste", icon: "paste"},
            "delete": {name: "Delete", icon: "delete"},
            "sep1": "---------",
            "quit": {name: "Quit", icon: function(){
                return 'context-menu-icon context-menu-icon-quit';
            }}
        }
    });
});

function removeBudgetTableValues(_item) {
    var tr_parent = _item.parent().parent();

    var total = parseFloat($('#sum-total').attr('data-value')) - parseFloat(tr_parent.attr('data-total'));
    $('#sum-total').attr('data-value', total);

    $.get('/currency_format/' + total, function (data) {
        $('#sum-total').text(data);
    });

    $('#budget_consult_type_id').append('<option value="' + tr_parent.data('key') + '">' + tr_parent.find('.name').text() + '</option>');
    tr_parent.remove();
}