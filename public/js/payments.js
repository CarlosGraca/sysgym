 var message_error = null;

$(function () {

    var clicked_payment = null;
    var _payment_total = 0;
    var _payment_total_discount = 0;
   
     
     
    if($('#payment_type').val() != 'monthly')
        $('#div_month').css('display','none');
    else
        $('#div_month').removeAttr('style');

    //reset
    $(".check-payment").prop("checked", false);
    $(".check-payment").click(function () {

        if ($(this).is(":checked")) {
            //checked
            $(this).addClass("selected");
            $(this).parent().attr('data-value',$(this).val());
        } else {
            //unchecked
            $(this).removeClass("selected");
            $(this).parent().attr('data-value','');
        }

    });

    //reset
    $(".payment-free").prop("checked", false);
    $(".payment-free").click(function () {

        if ($(this).is(":checked")) {
            //checked
            $(this).addClass("selected");
            $(this).val(1);
        } else {
            //unchecked
            $(this).removeClass("selected");
            $(this).val(0);
        }

    }); 

    sumSubtotal ('.payment-price','.t-payment-price');
    sumSubtotal ('.payment-discount','.t-payment-discount');
    get_payment_end_date('.payment-type','payment-end-date');

    _payment_total = get_payment_total_value('.payment-total');
    _payment_total_discount =get_payment_total_value_discount('.payment-discount');
    

    getCurrency(_payment_total, $('#payment-sum-total'), 'text');
    getCurrency(_payment_total_discount, $('#payment-sum-discount'), 'text');


    $(".h-check-payment").change(function () {
        $('.check-payment').prop('checked',$(this).prop("checked"));
        //$('.check-payment').prop('checked', $(this).prop("checked"));
        if ($('.check-payment').is(":checked")) {
            //checked
            $('.check-payment').addClass("selected");
            $('.check-payment').parent().attr('data-value',$('.check-payment').val());
        } else {
            //unchecked
            $('.check-payment').removeClass("selected");
            $('.check-payment').parent().attr('data-value','');
        }
    });
   
    $(document).on("click", '#add-payment',function (e) {
        e.preventDefault();
        if (valide_payment())
           save_payment('payments/1/edit','/payments');
        else
            toastr.error(message_error,{timeOut: 5000} ).css("width","500px");    
        message_error  = null; 
    });

    $(document).on("click", '#update-payment',function (e) {
        e.preventDefault();
        if (valide_payment())
           save_payment('payments/1/edit','/updatePaymentOption');
        else
            toastr.error(message_error,{timeOut: 5000} ).css("width","500px");    
        message_error  = null; 
    });       
    
});    

function valide_payment(){
        
        var status = 0;
        if(!($('#payment_method').val())){
            message_error = 'Field Payment Method is required.';
            return false;
        }
        $('#table-payment-modality').find('.payment-modality').each(function (e,d) { 
            _t_payment_check = $(this).find('.t-check-payment').attr('data-value');
            if (_t_payment_check){
               status = 1;  
            }
        });
        if (status === 0){
            message_error = 'Selecione pelo menos uma matricula, por favor.';
            return false;
        }
        return true;
    }
    //////SAVE_PAGAMENTO
    function save_payment(redirect,url_stored) {
        var requestData = [];
        var url = url_stored;
        _client_id      = $('#client_id').val();
        _payment_method = $('#payment_method').val();
        _note           = $('#note').val();
        _item_type      = 'MUSCULATION';
        _token           = $('input[name=_token]').val()
       // $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
        $('#table-payment-modality').find('.payment-modality').each(function (e,d) {     
            var data = [];
            _t_payment_check = $(this).find('.t-check-payment').attr('data-value');
            _item_id         = _t_payment_check;//$(this).find('.payment-id-matricula').attr('data-value');
            _value_pay       = parseFloat($(this).find('.t-payment-price').attr('data-value'));
            _start_date      = $(this).find('.payment-start-date').val();
            _end_date        = $(this).find('.payment-end-date').val();
            _discount        = $(this).find('.payment-discount').val();
            _free            = $(this).find('.payment-free').val();
            _payment_type    = $(this).find('.payment-type').val();
            _payment_id      = $(this).find('.payment-id').val();
            _free = _free != null ?_free:0;

            data = {item_id:_item_id,item_type:_item_type,client_id:_client_id,payment_method:_payment_method,
                    value_pay:_value_pay,start_date:_start_date,
                    end_date:_end_date,discount:_discount,free:_free,note:_note,type:_payment_type,payment_id:_payment_id};
            requestData.push(data);
            
        });       
        requestData=JSON.stringify(requestData);
        $.ajax({
            url: url,
            type: 'post',
            dataType: 'json',
            //contentType: 'application/json',
            data: requestData,
            success: function (data) {
                $('.loader-name').css('display', 'none');
                if(data.type=='success') {
                    toastr.success(data.message, {timeOut: 5000}).css("width", "300px");
                }else{
                    toastr.error(data.message, {timeOut: 5000}).css("width", "300px");
                } 
                window.location = load_newurl(redirect);              
            },
            error: function(data){
                if(data.status === 500){
                    toastr.error(data.statusText,{timeOut: 5000} ).css("width","500px");  
                }else if( data.responseJSON ) {
                console.log('asd');          
                    $errors = data.responseJSON; 
                    var errorsHtml= '';
                    $.each( $errors, function( key, value ) {
                        errorsHtml += '<li>' + value[0] + '</li>'; 
                    });
                    toastr.error(errorsHtml,{timeOut: 5000} ).css("width","500px");                    
                }
            }
        });
    }

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

function adicionarDiasData(dias,start_date){  
  var start_date   = new Date(start_date);
  var end_date    = new Date(start_date.getTime() + (dias * 24 * 60 * 60 * 1000));
  var day = end_date.getDate() > 9 ? end_date.getDate() : '0'+end_date.getDate();
  var month = (end_date.getMonth() + 1) > 9 ? (end_date.getMonth() + 1) : '0'+(end_date.getMonth() + 1);
  return end_date.getFullYear() + "-" + month + "-" +  day;
}

function get_payment_end_date (_class_input,_class_data_value){
    
    $('#table-payment-modality .payment-modality').on('change',_class_input,function(e,d){
        e.preventDefault();
        var _payment_start_date = $(e.delegateTarget).find('.payment-start-date').val();
        var  _payment_type = $(this).val();
        if (_payment_type === 'monthly'){
            _payment_end_date= adicionarDiasData(30,_payment_start_date);
            $(e.delegateTarget).find('.payment-end-date').val(_payment_end_date);
        }else if (_payment_type === 'daily'){
            _payment_end_date= adicionarDiasData(1,_payment_start_date);
            $(e.delegateTarget).find('.payment-end-date').val(_payment_end_date);
        }else if (_payment_type === 'weekly'){
            _payment_end_date= adicionarDiasData(7,_payment_start_date);
            $(e.delegateTarget).find('.payment-end-date').val(_payment_end_date);
        }
    });   

    $('#table-payment-modality .payment-modality').on('load',_class_input,function(e,d){
        e.preventDefault();
        var _payment_start_date = $(e.delegateTarget).find('.payment-start-date').val();
        var  _payment_type = $(this).val();
        if (_payment_type === 'monthly'){
            _payment_end_date= adicionarDiasData(30,_payment_start_date);
            $(e.delegateTarget).find('.payment-end-date').val(_payment_end_date);
        }else if (_payment_type === 'daily'){
            _payment_end_date= adicionarDiasData(1,_payment_start_date);
            $(e.delegateTarget).find('.payment-end-date').val(_payment_end_date);
        }else if (_payment_type === 'weekly'){
            _payment_end_date= adicionarDiasData(7,_payment_start_date);
            $(e.delegateTarget).find('.payment-end-date').val(_payment_end_date);
        }
    });   
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
}

function load_newurl(pathname) {
    var url_origin = window.location.origin;
    var url_search = window.location.search;
    url = url_origin+'/'+pathname+''+url_search;
    return url;
}



