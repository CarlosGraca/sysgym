/**
 * Created by MS-INSYS on 27/10/2016.
 */
var _deleted_modality_id = [];
var all_modality_data = [];
var _val_modality =  parseInt( $('#last-modality_id').text() == '' ? 0 : $('#last-modality_id').text() );

$(function () {
    var clicked_m_modality_discount = null;
    
    //POPOVER AT DISCOUNT
    setPopOver('m_modality-discount');

    $(document).on('click','#add-matriculation_modality', function (e) {
        e.preventDefault();
        var modality_id = $('#modality_id').val();
        if (modality_id == '') {
            toastr.error($(this).attr('data-message'), {timeOut: 5000}).css("width", "500px");
            return false;
        } else {

            _val_modality = _val_modality + 1;
            console.log(_val_modality);

            var table = $('#table-matriculation-modality');
            
            $.getJSON('/modalities/' + modality_id, function (data) {
                $('#modality_id').val('');
                $('#modality').val('');
                
                var total = parseFloat(data.total) + parseFloat($('#matriculation-sum-total').attr('data-value'));

                $('#matriculation-sum-total').attr('data-value', total);
                $('#total').val(total);
                getCurrency(total, $('#matriculation-sum-total'), 'text');
                PutMatriculationTableValue(data,table,modality_id, _val_modality);
            });
            
        }
        
    });

    $(document).on('click', '.remove-modality-row', function (e) {
        e.preventDefault();

        var remove = $(this);
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
                    removeMatriculationTableValues(remove);
                }
            }
        });
    });
    
    //SAVE BUDGET
    //BOTÃO ADICIONAR CLIENTE
    $(document).on('click','#add-matriculation',function(e){
        e.preventDefault();
        save($('#matriculation-form'),$('#matriculation-form')[0],'create');
    });

    //BOTÃO EDITAR CLIENTE
    $(document).on('click','#update-matriculation',function(e){
        e.preventDefault();
        save($('#matriculation-form'),$('#matriculation-form')[0],'update');
    });

    $(document).on('click','#edit-matriculation-button',function(e){
        e.preventDefault();
        $('#client').removeAttr('disabled');
        $('#note').removeAttr('disabled');
        $('#modality').removeAttr('disabled');
        $('#add-matriculation_consult').removeClass('disabled');

        $('#update-matriculation').removeAttr('style');
        $(this).css('display','none');

        schedule_button_action('enable');

    });

    $(document).on('click','#next-step-payment',function (e) {
        e.preventDefault();
        var client_id = $('#client_id').val();
        window.location = '/payments/create?idCliente='+client_id;
    });

    //APPROVE BUDGET
    $(document).on('click','#approve-matriculation',function (e) {
        e.preventDefault();
        change_status($(this).attr('data-key'), 'approve', $(this).attr('data-name'), $(this), '/matriculation/approve', 'bg-success', 'matriculation');
    });
    
    //APPROVE BUDGET
    $(document).on('click','#reject-matriculation',function (e) {
        e.preventDefault();
        change_status($(this).attr('data-key'), 'reject', $(this).attr('data-name'), $(this), '/matriculation/reject', 'bg-danger', 'matriculation');
    });

    //APPROVE BUDGET
    $(document).on('click','#cancel-matriculation',function (e) {
        e.preventDefault();
        change_status($(this).attr('data-key'), 'cancel', $(this).attr('data-name'), $(this), '/matriculation/cancel', 'bg-warning', 'matriculation');
    });

    //APPROVE BUDGET
    $(document).on('click','#publish-matriculation',function (e) {
        e.preventDefault();
        change_status($(this).attr('data-key'), 'publish', $(this).attr('data-name'), $(this), '/matriculation/publish', 'bg-info', 'matriculation');
    });



    $(document).on('click','#reset-matriculation', function (e) {
        e.preventDefault();

        var _remover = $('.remover_item');

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

                    _remover.each(function () {
                        removeMatriculationTableValues($(this));
                    });

                    $('#matriculation-form').trigger('reset');
                    $('.avatar-client').attr('src', '/img/avatar.png');
                    
                }
            }
        });
    });

    //POPOVER CHANGE BUDGET TEETH
    $(document).on('show.bs.popover','.m_modality-discount',function () {
        clicked_m_modality_discount = $(this);
        var _val = $(this).attr('data-value');
        $.post('/edit/m_modality-discount/field',{val: _val },function (data) {
            $('.popover-m_modality-discount').html(data);
            $('.popover-m_modality-discount').find('#m_modality-discount').focus();
        });
    });
    
    //
    $(document).on("click", '#save-m_modality-discount',function () {
        pop_m_modality_discount_save();
    });

    $(document).on('keydown','#m_modality-discount',function (e) {
        if(e.keyCode == 13) {
            pop_m_modality_discount_save();
        }
    });

    //SAVE VALUE FROM EDIT POPUP
    function pop_m_modality_discount_save() {
        var url = '/update/m_modality-discount/field';
        $('.loader-name').css('display','block');
        $('#field-m_modality-discount').css('display','none');

        if(clicked_m_modality_discount != null) {

            var _matriculation_modality_tr = clicked_m_modality_discount.parent();
            var _m_modality_total = _matriculation_modality_tr.data('total');
            // var _value_paid = _matriculation_modality_tr.find('.m_modality-value-paid').data('value');
            var _sum_total = 0;
            var _sum_discount = 0;
            $.ajax({
                url: url,
                data: {val: $('#m_modality-discount').val(), total: _m_modality_total},
                type: 'POST',
                dataType: 'json',
                success: function (data) {
                    $('.loader-name').css('display', 'none');

                    // if (data.type === 'error') {
                    //     toastr.error(data.message, {timeOut: 5000}).css("width", "300px");
                    // }
                    // if (data.type === 'success') {
                    //     toastr.success(data.message, {timeOut: 5000}).css("width", "300px");
                    // }

                    clicked_m_modality_discount.attr('data-value', data.discount);
                    clicked_m_modality_discount.text(data.format_discount);

                    _matriculation_modality_tr.find('.m_modality-total').attr('data-value', data.m_modality_total);
                    _matriculation_modality_tr.find('.m_modality-total').text(data.format_m_modality_total);

                    // _matriculation_modality_tr.attr('data-total', data.m_modality_total);


                    $('#save-m_modality-discount').parents(".popover").popover('hide');

                    // _m_modality_total = get_m_modality_total_value('.m_modality-value');
                    // _remaining_total = parseFloat(_m_modality_remaining_total - _m_modality_total);

                    _sum_total  = get_m_modality_total_value('.m_modality-total');
                    _sum_discount  = get_m_modality_total_value('.m_modality-discount');

                    // $('#m_modality-matriculation-sum-total').attr('data-value', _m_modality_total);
                    //
                    // getCurrency(_m_modality_total, $('#m_modality-matriculation-sum-total'), 'text');
                    getCurrency(_sum_total, $('#matriculation-sum-total'), 'text');
                    getCurrency(_sum_discount, $('#matriculation-sum-discount'), 'text');

                    $('#matriculation-sum-total').attr('data-value', _sum_total);
                    $('#total').attr('data-value', _sum_total);

                    $('#matriculation-sum-discount').attr('data-value', _sum_discount);
                }
            });
            return false;
        }
    }
    
});
//GET TOTAL
function get_m_modality_total_value(_class) {
    var total = 0;
    $('#table-matriculation-modality').find('.m_modality-table-row').each(function () {
        total += parseFloat($(this).find(_class).attr('data-value'));
    });
    return total;
}

function removeMatriculationTableValues(_item) {
    var tr_parent = _item.parent().parent();
    
    var _id = tr_parent.attr('data-key');
    _deleted_modality_id.push(_id);

    var total = parseFloat($('#matriculation-sum-total').attr('data-value')) - parseFloat(tr_parent.find('.m_modality-total').attr('data-value'));
    $('#matriculation-sum-total').attr('data-value', total);

    var discount = parseFloat($('#matriculation-sum-discount').attr('data-value')) - parseFloat(tr_parent.find('.m_modality-discount').attr('data-value'));
    $('#matriculation-sum-discount').attr('data-value', discount);

    // $('#total').val(total);
    // $('#total').val(total);

    getCurrency(total, $('#matriculation-sum-total'), 'text');
    getCurrency(discount, $('#matriculation-sum-discount'), 'text');

    tr_parent.remove();
    removeModalityTableValue(_id);
}

//THIS FUNCTION PUT VALUE ON THE BUDGET TABLE
function PutMatriculationTableValue(data,table, modality_id, _id){
        table.append(
            '<tr class="m_modality-table-row" data-key="' + _id + '" data-total="' + data.total + '">' +
                '<td class="m_modality-modality" data-value="' + modality_id + '" >' + data.name + '</td>' +
                '<td class="m_modality-price text-center" data-value="'+data.price+'" >' + data.price_text + '</td>' +
                '<td class="m_modality-iva text-center" data-value="'+data.iva+'" >' + data.iva + ' %</td>' +
                '<td class="m_modality-discount text-center" data-value="'+data.discount+'" >' + data.discount_text + '</td>' +
                '<td class="m_modality-total text-center" data-value="'+data.total+'" >' + data.total_text + '</td>' +
                '<td class="text-center action_button">' +
                    '<a href="#!remove" class="remove-modality-row" data-toggle="tooltip" title="'+_remove_text+'"><i class="fa fa-trash"></i></a> ' +
                '</td>' +
            '</tr>'
        );

    //POPOVER AT DISCOUNT
    setPopOver('m_modality-discount');
}

//GET DATA FROM BUDGET PROCEDURE TABLE
function getTableMatriculationModalityData(_table) {
    var data =  {};
    all_data = [];

    var _row = _table.find('.m_modality-table-row');
    
    _row.each(function () {
        var _id = $(this).attr('data-key');
        var modality_id = $(this).find('.m_modality-modality').attr('data-value');
        var total = $(this).find('.m_modality-total').attr('data-value');
        var price = $(this).find('.m_modality-price').attr('data-value');
        // var total_price = $(this).find('.m_modality-total').attr('data-value');
        var discount = $(this).find('.m_modality-discount').attr('data-value');

        data =  {
            id : _id,
            modality_id : modality_id,
            total : total,
            price: price,
            // total_price: total_price,
            discount: discount
        };

        all_modality_data.push(data);

        data = {};
    });
}

//REMOVE VALUE FROM TABLE DIC
function removeModalityTableValue(_id) {
    $.each(all_modality_data, function (index, value) {
        if(value.id == _id){
            delete all_modality_data[index];
        }
    });
}

//SAVE SCHEDULE TO BRANCH
function matriculation_modality_save() {
    getTableMatriculationModalityData($('#table-matriculation-modality'));

    var matriculation_id = $('#matriculation_id').val();
    var client_id = $('#client_id').val();

    if(matriculation_id != '' && matriculation_id != undefined){
        var url = '/matriculation/modality';

        $.ajax({
            type: 'POST',
            url: url,
            data: {modalities: JSON.stringify(all_modality_data), matriculation_id: matriculation_id, delete: JSON.stringify(_deleted_modality_id), client_id: client_id},
            dataType: 'json',
            success: function () {
                _deleted_modality_id = [];
                all_modality_data = [];
            },
            error: function () {

            }
        });
    }
}
