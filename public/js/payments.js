var all_payment_procedure_data = [];


$(function () {

    var clicked_payment = null;
    var _payment_total = 0;
    var _payment_total_discount = 0;

    // setPopOver('payment-value');

    //POPOVER CHANGE BUDGET TEETH
    // $(document).on('show.bs.popover','.payment-value',function () {
    //     clicked_payment = $(this);
    //     var _val = $(this).attr('data-value');
    //     $.post('/edit/payment-value/field',{val: _val },function (data) {
    //         $('.popover-payment-value').html(data);
    //         $('.popover-payment-value').find('#payment-value').focus();
    //     });
    // });


    if($('#payment_type').val() != 'monthly')
        $('#div_month').css('display','none');
    else
        $('#div_month').removeAttr('style');

    $(document).on('change','#payment_type',function (e) {
        e.preventDefault();
        if($(this).val() != 'monthly')
            $('#div_month').css('display','none');
        else
            $('#div_month').removeAttr('style');

    });

    sumSubtotal ('.payment-price','.t-payment-price');
    sumSubtotal ('.payment-discount','.t-payment-discount');
    set_total_in_table();

    _payment_total = get_payment_total_value('.payment-total');
    _payment_total_discount =get_payment_total_value_discount('.payment-discount');
    

    getCurrency(_payment_total, $('#payment-sum-total'), 'text');
    getCurrency(_payment_total_discount, $('#payment-sum-discount'), 'text');


    $(".h-check-payment").change(function () {
        console.log('oopp');
        //$("input[name='check-payment']").prop('checked', $(this).prop("checked"));
        $('.check-payment').prop('checked', $(this).prop("checked"));
    });
    
    /*$(".payment-free").change(function () {        
        console.log($(this));
        $(this).prop('checked', $(this).prop("checked"));
    });*/


    $(document).on("click", '#add-payment',function () {
        save_payment();
    });
    
    // $(document).on('keydown','#payment-value',function (e) {
    //     if(e.keyCode == 13) {
    //         pop_save();
    //     }
    // });

    // $(document).on('click','#pay-all',function (e) {
    //     e.preventDefault();
    //
    //     $('#table-payment-procedure').find('.payment-procedure').each(function () {
    //         var total = parseFloat($(this).find('.payment-total').attr('data-value') - $(this).find('.payment-value-paid').attr('data-value'));
    //         $(this).find('.payment-remaining').attr('data-value',0);
    //         $(this).find('.payment-value').attr('data-value', total);
    //         getCurrency(total , $(this).find('.payment-value'), 'text' );
    //         getCurrency(0 , $(this).find('.payment-remaining'), 'text' );
    //
    //     });
  
    // });

    $(document).on('click','#update-payment',function (e) {
        e.preventDefault();
        save($('#payment-form'),$('#payment-form')[0],'update');
    });

    $(document).on('click','#edit-payment-button',function(e){
        e.preventDefault();
        $('#update-payment').removeAttr('style');
        $(this).css('display','none');
        field_status_change('enable',$('#payment-form'));
    });
    
    //////SAVE_PAGAMENTO
    function save_payment() {
        var requestData = [];
        var url = '/payments';
        _client_id      = $('#client_id').val();
        _payment_method = $('#payment_method').val();
        _note           = $('#note').val();
        _item_type      = 'MUSCULATION';
        _type           = $('#payment_type').val();
        //$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
        $('#table-payment-modality').find('.payment-modality').each(function (e,d) {     
            var data = [];
           // var requestData = [];
            _item_id        = $(this).find('.payment-id-matricula').attr('data-value');
            _value_pay      = parseFloat($(this).find('.t-payment-price').attr('data-value'));
            _start_date      = $(this).find('.payment-start-date').val();
            _end_date       = $(this).find('.payment-end-date').val();
            _discount       = $(this).find('.payment-discount').val();
            _free           = $(this).find('.payment-free').val();
            
            _free = _free != null ?_free:0;
            
            data = {item_id:_item_id,item_type:_item_type,client_id:_client_id,payment_method:_payment_method,
                    value_pay:_value_pay,start_date:_start_date,
                    end_date:_end_date,discount:_discount,free:_free,note:_note,type:_type};
            requestData.push(data);
            
        });       
        requestData=JSON.stringify(requestData);
        console.log(requestData);
        $.ajax({
            url: url,
            type: 'POST',
            contentType: 'application/json',
            data: requestData,
            success: function (data) {
                $('.loader-name').css('display', 'none');
                 console.log(data.message);
                if (data.type === 'success') {
                    toastr.success(data.message, {timeOut: 5000}).css("width", "300px");
                }

                if (data.type === 'error') {

                    toastr.error(data.message, {timeOut: 5000}).css("width", "300px");
                }
            },
            error: function(data){
                if( data.responseJSON ) {          
                    $errors = data.responseJSON; 
                    var errorsHtml= '';
                    $.each( $errors, function( key, value ) {
                        errorsHtml += '<li>' + value[0] + '</li>'; //showing only the first error.
                    });
                    toastr.error(errorsHtml,{timeOut: 5000} ).css("width","500px");                    
                }
            }
        });
    }

    //SAVE VALUE FROM EDIT POPUP
    function pop_save() {
        var url = '/update/payment-value/field';
        $('.loader-name').css('display','block');
        $('#field-payment-value').css('display','none');

        if(clicked_payment != null) {

            var _payment_procedure_tr = clicked_payment.parent();
            var _value_total = _payment_procedure_tr.find('.payment-total').data('value');
            var _value_paid = _payment_procedure_tr.find('.payment-value-paid').data('value');
            var _remaining_total = 0;
            $.ajax({
                url: url,
                data: {val: $('#payment-value').val(), total: _value_total, paid: _value_paid},
                type: 'POST',
                dataType: 'json',
                success: function (data) {
                    $('.loader-name').css('display', 'none');

                    if (data.type === 'success') {
                        toastr.success(data.message, {timeOut: 5000}).css("width", "300px");
                    }

                    if (data.type === 'error') {
                        toastr.error(data.message, {timeOut: 5000}).css("width", "300px");
                    }

                    clicked_payment.attr('data-value', data.value);
                    clicked_payment.text(data.format_value);

                    _payment_procedure_tr.find('.payment-remaining').attr('data-value', data.remaining);
                    _payment_procedure_tr.find('.payment-remaining').text(data.format_remaining);
                    $('#save-payment-value').parents(".popover").popover('hide');

                    _payment_total = get_payment_total_value('.payment-value');
                    _remaining_total = parseFloat(_payment_remaining_total - _payment_total);

                    $('#payment-sum-total').attr('data-value', _payment_total);

                    getCurrency(_payment_total, $('#payment-sum-total'), 'text');
                    getCurrency(_remaining_total, $('#remaining_value'), 'val');
                }
            });
            return false;
        }
    }
});

function get_payment_total_value(_class) {
    var total = 0;
    $('#table-payment-modality').find('.payment-modality').each(function () {
        total += parseFloat($(this).find(_class).attr('data-value'));
       // console.log(total);
    });
    //console.log(total);
    return total;
}

function get_payment_total_value_discount(_class) {
    var price = 0;
    var total = 0;
    var discoutnt  = 0;
    $('#table-payment-modality').find('.payment-modality').each(function (e,d) {       
        price = parseFloat($(this).find('.t-payment-price').attr('data-value'));
        discount =  parseFloat($(this).find('.payment-discount').val());
        
        total += price - ((price*discount)/100);
    });
    getCurrency(total, $(this).find('.payment-sum-discount'), 'text');
    return total;
}

function set_total_in_table() {
    var price = 0;
    var total = 0;
    var discoutnt  = 0;
    $('#table-payment-modality').find('.payment-modality').each(function (e,d) {       
        total = parseFloat($(this).find('.t-payment-price').attr('data-value'));
        discount =  parseFloat($(this).find('.payment-discount').val());
        total = total - ((total*discount)/100);
        $(this).find('.payment-total').attr('data-value', total);
        getCurrency(total, $(this).find('.payment-total'), 'text');
    });
    return total;
}

function sumSubtotal (_class_input,_class_data_value){
    $('#table-payment-modality .payment-modality').on('keyup',_class_input,function(e,d){
        e.preventDefault();

        var  new_price = $(e.currentTarget).val();
             new_price = new_price.replace('.','');
             $(e.delegateTarget).find(_class_data_value).attr('data-value', new_price);

        set_total_in_table();

        _payment_total = get_payment_total_value('.payment-total');
        _payment_total_discount = get_payment_total_value_discount('.payment-discount');    

        getCurrency(_payment_total, $('#payment-sum-total'), 'text');
        getCurrency(_payment_total_discount, $('#payment-sum-discount'), 'text');    
        
    });   
}

//GET DATA FROM PAYMENT PROCEDURE TABLE
function getTablePaymentProcedureData(_table) {
    var data =  {};
    var _row = _table.find('.payment-procedure');
    
    _row.each(function () {
        var _id = $(this).attr('data-key');
        var value = $(this).find('.payment-value').attr('data-value');
        // var procedure_id = $(this).find('.payment-value').attr('data-value');
        var remaining = $(this).find('.payment-remaining').attr('data-value');

        data =  {
            id : _id,
            // procedure_id : procedure_id,
            value: value,
            remaining: remaining
        };

        all_payment_procedure_data.push(data);

        data = {};
    });
}

//SAVE SCHEDULE TO BRANCH
function payment_procedure_save() {
    getTablePaymentProcedureData($('#table-payment-procedure'));

    var matriculation_id = $('#matriculation_id').val();
    var payment_id = $('#payment_id').val();

    if(matriculation_id != '' && matriculation_id != undefined){
        var url = '/payments/procedure';

        $.ajax({
            type: 'POST',
            url: url,
            data: {procedure: JSON.stringify(all_payment_procedure_data), matriculation_id: matriculation_id, payment_id: payment_id},
            dataType: 'json',
            success: function (data) {
                all_payment_procedure_data = [];
                console.log(data);
            },
            error: function () {

            }
        });
    }
}

function full_modality_table() {
    var client_id = $('#client_id').val();
    var url = '/modalities/client';
    $.ajax({
        type: 'POST',
        url: url,
        data: {id: client_id},
        dataType: 'json',
        success: function (data) {
            // all_payment_procedure_data = [];
            // console.log(data);
            full_payment_modality_table(data.modalities);
        },
        error: function () {

        }
    });
}

function full_payment_modality_table(data) {
    clear_payment_table();
    var _table = $('#table-payment-modality');
    for (var i=0; i<data.length; i++){
        _table.append(
            '<tr class="payment-modality" data-key="'+data[i].modality_id+'">'
                +'<td class="payment-modality-name">'+data[i].name+'</td>'
                +'<td class="text-center payment-price" data-value="'+data[i].price+'">'+data[i].price_text+'</td>'
                +'<td class="text-center payment-iva" data-value="'+data[i].iva+'">'+data[i].iva+' %</td>'
                +'<td class="text-center payment-discount" data-value="'+data[i].discount+'">'+data[i].discount_text+'</td>'
                +'<td class="text-center payment-total" data-value="'+data[i].total+'">'+data[i].total_text+'</td>' +
                // +'<td class="text-right payment-value" data-value="0">'+data[i].value_text+'</td>' +
            '</tr>'
        );
    }
    // setPopOver('payment-value');
    //PAYMENT TOTAL
    var total = get_payment_total_value('.payment-total');
    $('#payment-sum-total').attr('data-value', total);
    getCurrency(total, $('#payment-sum-total'), 'text');

    //PAYMENT TOTAL DISCOUNT
    var total_discount = get_payment_total_value('.payment-discount');
    $('#payment-sum-discount').attr('data-value', total_discount);
    getCurrency(total_discount, $('#payment-sum-discount'), 'text');
}

function clear_payment_table() {
    var _table = $('#table-payment-modality');
    _table.find('.payment-modality').each(function () {
       $(this).remove() ;
    });

    // var total = 0;
    // $('#payment-sum-total').attr('data-value', total);
    // getCurrency(total, $('#payment-sum-total'), 'text');
}

