$('document').ready(function () {
    
    
    $('#table-sheets').DataTable();

    $(function () {
        $(".ordem, .series, .repet, .maq").dblclick(function () {
            var conteudoOriginal = $(this).text();
            
            $(this).addClass("celulaEmEdicao");
          
            $(this).html(" <input type='text' size='30' value='" + conteudoOriginal + "' />");
            $(this).children().first().focus();

            $(this).children().first().keypress(function (e) {
                if (e.which == 13) {
                    var novoConteudo = $(this).val();
                    $(this).parent().text(novoConteudo);
                    $(this).parent().removeClass("celulaEmEdicao");
                }
            });
    		
        	$(this).children().first().blur(function(){
        		$(this).parent().text(conteudoOriginal);
        		$(this).parent().removeClass("celulaEmEdicao");
        	});
        });
    });

    $('#add-sheet').on('click',function(){ 
        var table =[];
        var token = $('meta[name="csrf_token"]').attr('content');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': token
            }
        });    

        var biceps_antebraco    = $("#table-biceps-antebraco");
        var triceps             = $("#table-triceps");
        var ombro_trapezio      = $("#table-ombro-trapezio");
        var peitoral            = $("#table-peitoral");
        var costas              = $("#table-costas");
        var quadril_perna_coxa  = $("#table-quadril-perna-coxa");
        var abdomen             = $("#table-abdomen");

        table.push(biceps_antebraco ,triceps, ombro_trapezio, peitoral, costas, quadril_perna_coxa, abdomen);
        
        var client_id = $('#client_id').val();
        if (client_id === '') {                          
             saveClient(null,'create',function (data) {
                 save_sheet(data.id,type,table)
             });           
        }else{
            save_sheet(client_id,type,table)
        }               
    });
});

function save_sheet(client_id,type,table){
    var my_url = "/sheets";
    var my_url_det = "/sheet_details";
    var total = 0;
    var row ={};
    var formData ;
    var formDataSheet = {
        client_id : client_id,
        objective : $('#objective').val(),
        type_student : $('#type_student').val(),
        training_days: $('#training_days').val(),
        date_start: $('#date_start').val(),
        kg: $('#kg').val(),
        altura: $('#altura').val(),
        note : $('#note').val()
    }  

    $.ajax({
        type: type,
        url: my_url,
        data: formDataSheet,
        dataType: 'json',           
        success: function (data ) {
           for (var t = 0; t < table.length; t++) {
                tdata = getTableData(table[t]);                    
                for (i = 0; i < tdata.length; i++) {
                    total +=1;
                    formData = tdata[i];
                    formData['sheet_id']=data.id;
                    console.log(formData);
                    $.ajax({
                        type: type,
                        url: my_url_det,
                        data: formData,
                        dataType: 'json',           
                        success: function (data) {
                            window.location = '/sheets/create';
                            console.log(data); 
                        },
                        error: function (data) {
                            console.log('Error:', data);
                            if( data.status === 422 ) {                                    
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
            }   
            if (total===0) {
                toastr.error("Tabela de exercicios vazio. Por Favor, preencher.",{timeOut: 5000} ).css("width","500px");
            }                           
        },
        error: function (data) {
            console.log('Error:', data);
            if( data.status === 422 ) {          
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

function setValCli(v) {
   $('#client_id').val();
}

function getTableData(table) {
    var data = [];
    table.find('tbody tr').each(function (rowIndex, r) {
        var cols = {};
        $(this).find('td').each(function (colIndex, c) {

            if (c.textContent.length > 0){
                if (colIndex == 0){
                    cols['exercise_id'] = c.textContent
                }else if(colIndex == 1){
                    cols['ordem'] = c.textContent              
                }else if(colIndex == 3){
                    cols['serie'] = c.textContent                
                }else if(colIndex == 4){
                    cols['repet'] = c.textContent             
                }else if(colIndex == 5){
                    cols['map'] = c.textContent
                }
            }
        });
        var length = 0;
        for(var k in cols) if(cols.hasOwnProperty(k)) length++;
        if (length == 5 ){
           data.push(cols);
        }
        
    });
    return data;
}