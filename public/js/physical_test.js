$('document').ready(function(){
    $('#table-tests').DataTable();

    today = new Date();
    day = today.getDate();
    month = today.getMonth()+1;
    year = today.getFullYear();
    $('#app_date').text(year);

    $('#dt_nasc').on('change',function(){
    	 var dt_test = new Date($('#dt_test').val());
    	 var dt_nasc = new Date($('#dt_nasc').val());
       var idade = get_idade(dt_test,dt_nasc);
        //console.log($('#dt_nasc').val());
        $('#age').val(parseInt(idade));
    });

    $('#peso').on('change',function(){
        var peso = $('#peso').val();
        if (peso) {
            var estatura = $('#estatura').val();
            var imc = get_imc(peso,estatura);
            $('#imc').val(imc);
        }
    });

    $('#estatura').on('change',function(){
        var estatura = $('#estatura').val();
        if (estatura) {
            var peso = $('#peso').val();
            var imc = get_imc(peso,estatura);
            $('#imc').val(imc);
        }
    });

    $('#gordura').on('change',function(){
        var g = $('#gordura').val();
        var p = $('#peso').val();
        var pg = get_peso_gordura(g,p);
        $('#peso_gordura').val(pg);

        var mm = get_massa_magra(p,pg);
        $('#massa_magra').val(mm);

/*
        var sex = $('#sexo').val();
        var age = parseInt($('#age').val());
        var color = getColor(g,sex,age,'gordura');
        $('#gordura').css('background',color).css('color','white');
*/
    });

    $('#peso_gordura').on('change',function(){
        var pg = $('#peso_gordura').val();
        var p = $('#peso').val();
        var mm = get_massa_magra(p,pg);
        $('#massa_magra').val(mm);
    });

    $('#cintura').on('change',function(){
        var c = $('#cintura').val();
        var q = $('#quadril').val();
        var cq = get_cintura_quatril(c,q);
        $('#rel_cin_qua').val(cq);
    });

    $('#quadril').on('change',function(){
        var c = $('#cintura').val();
        var q = $('#quadril').val();
        var cq = get_cintura_quatril(c,q);
        $('#rel_cin_qua').val(cq);
    });

});

function get_idade(date_test,date_nasc){
	var idade;
    var dt_test = new Date(date_test);
    var dt_nasc = new Date(date_nasc);
    console.log(date_nasc);
    test = dt_test.getDate()+(dt_test.getMonth()*30)+(dt_test.getFullYear()*365);
    var nasc = dt_nasc.getDate()+(dt_nasc.getMonth()*30)+(dt_nasc.getFullYear()*365);
    idade = (test - nasc)/365;
    return parseInt(idade);
}

function get_imc(peso,estatura){
    var imc = peso/(estatura/100*estatura/100);
    return imc;
}

function get_peso_gordura(gordura,peso){
    var pg = gordura/100*peso;
    return pg;
}

function get_massa_magra(peso,pesso_gordura){
    var mm = peso-pesso_gordura;
    return mm;
}

function changeIMC(){
  var imc = parseFloat($('#imc').val());
  var sex = $('#sexo').val();
  var age = parseInt($('#age').val());
  var color = getColor(imc,sex,age,'imc');
  $('#imc').css('background',color).css('color','white');
}

$(document).change('#imc',changeIMC());

function get_cintura_quatril(cintura,quatril){
    var cq;
   // console.log(cintura);
    //console.log(quatril);
    if (cintura && quatril) {
        cq = cintura/quatril;
    } else {
        cp = 0;
    }
    return parseFloat(cq).toFixed(3);
}
//POPOVER
$(function () {
  $('[data-toggle="popover"]').popover()
});

function changeSexo(sexo,idade){
  if(idade == "" || idade =='NaN'){
    toastr.error('Insira a sua data de nascimento',{timeOut: 5000} ).css("width","500px");
    $('#sexo').val('0');
    return false;
  }

  //SEXO == 1 => MASCULINO
  //SEXO == 2 => FEMININO
  //SEXO == 0 => OPÇÃO DEFAULT

  popoverClassificacao(idade,sexo);
  showAndHiddenFields(idade,sexo);
}

//CRIAR POPOVER DE CLASSIFICAÇÃO CONSOANTE A IDADE DE SEXO
$(document).on('change','#sexo',function() {
  sexo = $(this).val();
  idade = $('#age').val();
  changeSexo(sexo, idade);
});

//CHANGE FIELD COLOR
function getColor (value, sexo, idade, fieldType) {
  if(idade >= 15 && idade <= 19){
    switch (sexo) {
      case '1':

          if(fieldType == 'imc'){
            if (value >= 18 && value <= 26) {
              return 'green';
            }else{
              return 'red';
            }
          }

          if(fieldType == 'soma5_dc'){
            if (value >= 32 && value <= 58) {
              return 'green';
            }else{
              return 'red';
            }
          }

          if(fieldType == 'circunferencia'){
            if (value >= 90 && value <= 116) {
              return 'green';
            }else{
              return 'red';
            }
          }

          if(fieldType == 'cintura'){
            if (value < 90) {
              return 'green';
            }else{
              return 'red';
            }
          }

          if(fieldType == 'quadril'){
            if (value >= 90 && value <= 104) {
              return 'green';
            }else{
              return 'red';
            }
          }

          if(fieldType == 'gordura'){
            if (value >= 8 && value <= 20) {
              return 'green';
            }else{
              return 'red';
            }
          }

          if(fieldType == 'forca_abdominal'){
            if (value > 37 ) {
              return 'green';
            }else{
              return 'red';
            }
          }

          if(fieldType == 'forca_mmii'){
            if (value > 38) {
              return 'green';
            }else{
              return 'red';
            }
          }

          if(fieldType == 'flexibilidade'){
            if (value > 33 ) {
              return 'green';
            }else{
              return 'red';
            }
          }

          if(fieldType == 'forca_mmss'){
            if (value > 23 ) {
              return 'green';
            }else{
              return 'red';
            }
          }

          if(fieldType == 'frequencia_card_rep'){
            if (value >= 60 && value <= 80) {
              return 'green';
            }else{
              return 'red';
            }
          }

          if(fieldType == 'pressao_sis'){
            if (value < 104) {
              return 'green';
            }else{
              return 'red';
            }
          }

          if(fieldType == 'pressao_dis'){
            if (value >= 45 && value <= 95) {
              return 'green';
            }else{
              return 'red';
            }
          }

          if(fieldType == 'potencia_aerobica'){
            if (value > 44 ) {
              return 'green';
            }else{
              return 'red';
            }
          }



          var g = $('#massa_magra').val();
          var minPeso = parseInt(g) / (1-8/100);
          var maxPeso = parseInt(g) / (1-20/100);

          if(fieldType == 'peso'){
            if (value >= minPeso && value <= maxPeso ) {
              return 'green';
            }else{
              return 'red';
            }
          }


        break;
      case '2':
          if(fieldType == 'imc'){
            if (value >= 18 && value <= 25) {
              return 'green';
            }else{
              return 'red';
            }
          }

          $('#h_soma5_dc').attr('data-content','Mínimo: 46 - Máximo: 72');
          $('#h_circunferencia').attr('data-content','Mínimo: 74 - Máximo: 100');
          $('#h_cintura').attr('data-content','Mínimo: 56 - Máximo: 79');
          $('#h_quadril').attr('data-content','Mínimo: 80 - Máximo: 105');
          $('#h_rel_cin_qua').attr('data-content','Mínimo: < 0.75 - Máximo: 0.77');
          $('#h_gordura').attr('data-content','Mínimo: 13 - Máximo: 24');
          $('#h_forca_abdominal').attr('data-content','Mínimo: 30');
          $('#h_forca_mmii').attr('data-content','Mínimo: 22');
          $('#h_flexibilidade').attr('data-content','Mínimo: 33');
          $('#h_forca_mmss').attr('data-content','Mínimo: 18');
          $('#h_frequencia_card_rep').attr('data-content','Mínimo: 60 - Máximo: 90');
          $('#h_pressao_sis').attr('data-content','Mínimo: 80 - Máximo: 140');
          $('#h_pressao_dis').attr('data-content','Mínimo: 45 - Máximo: 90');
          $('#h_potencia_aerobica').attr('data-content','Mínimo: 36');

          var g = $('#massa_magra').val();
          var minPeso = parseInt(g) / (1-13/100);
          var maxPeso = parseInt(g) / (1-24/100);
          $('#h_peso').attr('data-content','Mínimo: '+minPeso+' - Máximo: '+maxPeso);

        break;
    }
  }

  if(idade >= 20 && idade <= 29){
    switch (sexo) {
      case '1':
          if(fieldType == 'imc'){
            if (value >= 18 && value <= 26) {
              return 'green';
            }else{
              return 'red';
            }
          }

          $('#h_soma5_dc').attr('data-content','Mínimo: 32 - Máximo: 58');
          $('#h_circunferencia').attr('data-content','Mínimo: 90 - Máximo: 120');
          $('#h_cintura').attr('data-content','< 90');
          $('#h_quadril').attr('data-content','Mínimo: 90 - Máximo: 110');
          $('#h_gordura').attr('data-content','Mínimo: 8 - Máximo: 20');
          $('#h_frequencia_card_rep').attr('data-content','Mínimo: 60 - Máximo: 80');
          $('#h_pressao_sis').attr('data-content','< 140');
          $('#h_pressao_dis').attr('data-content','Mínimo: 45 - Máximo: 95');
          $('#h_potencia_aerobica').attr('data-content','> 40');
          $('#h_forca_abdominal').attr('data-content','> 33 rep.');
          $('#h_forca_mmii').attr('data-content','> 37 cm');
          $('#h_flexibilidade').attr('data-content','> 32 cm');
          $('#h_forca_mmss').attr('data-content','> 22 rep.');


          var g = $('#massa_magra').val();
          var minPeso = parseInt(g) / (1-8/100);
          var maxPeso = parseInt(g) / (1-20/100);
          $('#h_peso').attr('data-content','Mínimo: '+minPeso+' - Máximo: '+maxPeso);


        break;
      case '2':
          if(fieldType == 'imc'){
            if (value >= 18 && value <= 25.9) {
              return 'green';
            }else{
              return 'red';
            }
          }

          $('#h_soma5_dc').attr('data-content','Mínimo: 46 - Máximo: 80.9');
          $('#h_circunferencia').attr('data-content','< 97 Excelente');
          $('#h_cintura').attr('data-content','< 80');
          $('#h_quadril').attr('data-content','< 100 Excelente');
          $('#h_rel_cin_qua').attr('data-content',' ');
          $('#h_gordura').attr('data-content','Mínimo: 13 - Máximo: 26');
          $('#h_forca_abdominal').attr('data-content','Mínimo: 25');
          $('#h_forca_mmii').attr('data-content','Mínimo: 21');
          $('#h_flexibilidade').attr('data-content','Mínimo: 33');
          $('#h_forca_mmss').attr('data-content','Mínimo: 15');
          $('#h_frequencia_card_rep').attr('data-content','Mínimo: 60 - Máximo: 90');
          $('#h_pressao_sis').attr('data-content','Mínimo: 80 - Máximo: 140');
          $('#h_pressao_dis').attr('data-content','Mínimo: 45 - Máximo: 90');
          $('#h_potencia_aerobica').attr('data-content','Mínimo: 36');

          var g = $('#massa_magra').val();
          var minPeso = parseInt(g) / (1-13/100);
          var maxPeso = parseInt(g) / (1-26/100);
          $('#h_peso').attr('data-content','Mínimo: '+minPeso+' - Máximo: '+maxPeso);

        break;
    }
  }

  if(idade >= 30 && idade <= 39){
    switch (sexo) {
      case '1':
            if(fieldType == 'imc'){
              if (value >= 18 && value <= 26) {
                return 'green';
              }else{
                return 'red';
              }
            }

          $('#h_soma5_dc').attr('data-content','Mínimo: 32 - Máximo: 58');
          $('#h_circunferencia').attr('data-content','< 43 Excelente');
          $('#h_cintura').attr('data-content','< 90');
          $('#h_quadril').attr('data-content',' ');
          $('#h_gordura').attr('data-content','Mínimo: 8 - Máximo: 20');
          $('#h_frequencia_card_rep').attr('data-content','Mínimo: 60 - Máximo: 80');
          $('#h_pressao_sis').attr('data-content','< 150');
          $('#h_pressao_dis').attr('data-content','Mínimo: 45 - Máximo: 95');
          $('#h_potencia_aerobica').attr('data-content','> 36');
          $('#h_forca_abdominal').attr('data-content','> 25 rep.');
          $('#h_forca_mmii').attr('data-content','> 32 cm');
          $('#h_flexibilidade').attr('data-content','> 32 cm');
          $('#h_forca_mmss').attr('data-content','> 13 rep.');


          var g = $('#massa_magra').val();
          var minPeso = parseInt(g) / (1-8/100);
          var maxPeso = parseInt(g) / (1-20/100);
          $('#h_peso').attr('data-content','Mínimo: '+minPeso+' - Máximo: '+maxPeso);


        break;
      case '2':
          if(fieldType == 'imc'){
            if (value >= 18 && value <= 24.9) {
              return 'green';
            }else{
              return 'red';
            }
          }
          $('#h_soma5_dc').attr('data-content','Mínimo: 46 - Máximo: 72');
          $('#h_circunferencia').attr('data-content','< 97 Excelente');
          $('#h_cintura').attr('data-content','< 80');
          $('#h_quadril').attr('data-content',' ');
          $('#h_rel_cin_qua').attr('data-content',' ');
          $('#h_gordura').attr('data-content','Mínimo: 13 - Máximo: 25');
          $('#h_forca_abdominal').attr('data-content','Mínimo: 20');
          $('#h_forca_mmii').attr('data-content','Mínimo: 20');
          $('#h_flexibilidade').attr('data-content','Mínimo: 32');
          $('#h_forca_mmss').attr('data-content','Mínimo: 13');
          $('#h_frequencia_card_rep').attr('data-content','Mínimo: 60 - Máximo: 90');
          $('#h_pressao_sis').attr('data-content','Mínimo: 80 - Máximo: 140');
          $('#h_pressao_dis').attr('data-content','Mínimo: 45 - Máximo: 90');
          $('#h_potencia_aerobica').attr('data-content','Mínimo: 35');

          var g = $('#massa_magra').val();
          var minPeso = parseInt(g) / (1-13/100);
          var maxPeso = parseInt(g) / (1-25/100);
          $('#h_peso').attr('data-content','Mínimo: '+minPeso+' - Máximo: '+maxPeso);

        break;
    }
  }

  if(idade >= 40 && idade <= 49){
    switch (sexo) {
      case '1':
          if(fieldType == 'imc'){
            if (value >= 18 && value <= 26) {
              return 'green';
            }else{
              return 'red';
            }
          }


          $('#h_soma5_dc').attr('data-content','Mínimo: 32 - Máximo: 74.9');
          $('#h_circunferencia').attr('data-content',' ');
          $('#h_cintura').attr('data-content','< 90');
          $('#h_quadril').attr('data-content',' ');
          $('#h_gordura').attr('data-content','Mínimo: 8 - Máximo: 22');
          $('#h_frequencia_card_rep').attr('data-content','Mínimo: 60 - Máximo: 80');
          $('#h_pressao_sis').attr('data-content',' ');
          $('#h_pressao_dis').attr('data-content','Mínimo: 45 - Máximo: 95');
          $('#h_potencia_aerobica').attr('data-content','> 33');
          $('#h_forca_abdominal').attr('data-content','> 17 rep.');
          $('#h_forca_mmii').attr('data-content','> 25 cm');
          $('#h_flexibilidade').attr('data-content','> 32 cm');
          $('#h_forca_mmss').attr('data-content','> 10 rep.');


          var g = $('#massa_magra').val();
          var minPeso = parseInt(g) / (1-8/100);
          var maxPeso = parseInt(g) / (1-22/100);
          $('#h_peso').attr('data-content','Mínimo: '+minPeso+' - Máximo: '+maxPeso);

        break;
      case '2':
            if(fieldType == 'imc'){
              if (value >= 18 && value <= 26) {
                return 'green';
              }else{
                return 'red';
              }
            }

          $('#h_soma5_dc').attr('data-content','Mínimo: 46 - Máximo: 72');
          $('#h_circunferencia').attr('data-content','Mínimo: 74 - Máximo: 100');
          $('#h_cintura').attr('data-content','< 80');
          $('#h_quadril').attr('data-content','Mínimo: 80 - Máximo: 105');
          $('#h_rel_cin_qua').attr('data-content',' ');
          $('#h_gordura').attr('data-content','Mínimo: 13 - Máximo: 25');
          $('#h_forca_abdominal').attr('data-content','Mínimo: 15');
          $('#h_forca_mmii').attr('data-content','Mínimo: 19');
          $('#h_flexibilidade').attr('data-content','Mínimo: 32');
          $('#h_forca_mmss').attr('data-content','Mínimo: 11');
          $('#h_frequencia_card_rep').attr('data-content','Mínimo: 60 - Máximo: 90');
          $('#h_pressao_sis').attr('data-content','Mínimo: 80 - Máximo: 140');
          $('#h_pressao_dis').attr('data-content','Mínimo: 45 - Máximo: 90');
          $('#h_potencia_aerobica').attr('data-content','Mínimo: 35');

          var g = $('#massa_magra').val();
          var minPeso = parseInt(g) / (1-13/100);
          var maxPeso = parseInt(g) / (1-25/100);
          $('#h_peso').attr('data-content','Mínimo: '+minPeso+' - Máximo: '+maxPeso);

        break;
    }
  }

  if(idade >= 50 && idade <= 59){
    switch (sexo) {
      case '1':
            if(fieldType == 'imc'){
              if (value >= 18 && value <= 26) {
                return 'green';
              }else{
                return 'red';
              }
            }

          $('#h_soma5_dc').attr('data-content','Mínimo: 32 - Máximo: 76.9');
          $('#h_circunferencia').attr('data-content',' ');
          $('#h_cintura').attr('data-content','< 90');
          $('#h_quadril').attr('data-content',' ');
          $('#h_gordura').attr('data-content','Mínimo: 8 - Máximo: 23');
          $('#h_frequencia_card_rep').attr('data-content','Mínimo: 60 - Máximo: 80');
          $('#h_pressao_sis').attr('data-content','< 140');
          $('#h_pressao_dis').attr('data-content','Mínimo: 45 - Máximo: 95');
          $('#h_potencia_aerobica').attr('data-content','> 30');
          $('#h_forca_abdominal').attr('data-content','> 13 rep.');
          $('#h_forca_mmii').attr('data-content','> 23 cm');
          $('#h_flexibilidade').attr('data-content','> 32 cm');
          $('#h_forca_mmss').attr('data-content','> 7 rep.');


          var g = $('#massa_magra').val();
          var minPeso = parseInt(g) / (1-8/100);
          var maxPeso = parseInt(g) / (1-23/100);
          $('#h_peso').attr('data-content','Mínimo: '+minPeso+' - Máximo: '+maxPeso);

        break;
      case '2':
          if(fieldType == 'imc'){
            if (value >= 18 && value <= 26) {
              return 'green';
            }else{
              return 'red';
            }
          }

          $('#h_imc').attr('data-content','Mínimo: 18 - Máximo: 26');
          $('#h_circunferencia').attr('data-content','< 97 Excelente');
          $('#h_cintura').attr('data-content','< 80');
          $('#h_quadril').attr('data-content','Mínimo: 80 - Máximo: 105');
          $('#h_rel_cin_qua').attr('data-content',' ');
          $('#h_gordura').attr('data-content','Mínimo: 13 - Máximo: 25');
          $('#h_forca_abdominal').attr('data-content','Mínimo: 11');
          $('#h_forca_mmii').attr('data-content','Mínimo: 18');
          $('#h_flexibilidade').attr('data-content','Mínimo: 32');
          $('#h_forca_mmss').attr('data-content','Mínimo: 8');
          $('#h_frequencia_card_rep').attr('data-content','Mínimo: 60 - Máximo: 90');
          $('#h_pressao_sis').attr('data-content','Mínimo: 80 - Máximo: 140');
          $('#h_pressao_dis').attr('data-content','Mínimo: 45 - Máximo: 90');
          $('#h_potencia_aerobica').attr('data-content','Mínimo: 28');

          var g = $('#massa_magra').val();
          var minPeso = parseInt(g) / (1-13/100);
          var maxPeso = parseInt(g) / (1-26/100);
          $('#h_peso').attr('data-content','Mínimo: '+minPeso+' - Máximo: '+maxPeso);

        break;
    }
  }

  if(idade >= 60 && idade <= 69){
    switch (sexo) {
      case '1':
          if(fieldType == 'imc'){
            if (value >= 18 && value <= 26.5) {
              return 'green';
            }else{
              return 'red';
            }
          }

          $('#h_imc').attr('data-content','Mínimo: 18 - Máximo: 26.5');
          $('#h_soma5_dc').attr('data-content','Mínimo: 32 - Máximo: 80.9');
          $('#h_circunferencia').attr('data-content',' ');
          $('#h_cintura').attr('data-content','< 90');
          $('#h_quadril').attr('data-content',' ');
          $('#h_gordura').attr('data-content','Mínimo: 8 - Máximo: 25');
          $('#h_frequencia_card_rep').attr('data-content','Mínimo: 60 - Máximo: 80');
          $('#h_pressao_sis').attr('data-content','< 140');
          $('#h_pressao_dis').attr('data-content','Mínimo: 45 - Máximo: 95');
          $('#h_potencia_aerobica').attr('data-content','> 23');
          $('#h_forca_abdominal').attr('data-content','> 6 rep.');
          $('#h_forca_mmii').attr('data-content','> 21 cm');
          $('#h_flexibilidade').attr('data-content','> 32 cm');
          $('#h_forca_mmss').attr('data-content','> 4 rep.');


          var g = $('#massa_magra').val();
          var minPeso = parseInt(g) / (1-8/100);
          var maxPeso = parseInt(g) / (1-25/100);
          $('#h_peso').attr('data-content','Mínimo: '+minPeso+' - Máximo: '+maxPeso);

        break;
      case '2':
          var content = '18 a 26 Excelente';
          $('#classificacao').attr('data-content',content);

          $('#h_imc').attr('data-content','Mínimo: 18 - Máximo: 26');
          $('#h_soma5_dc').attr('data-content','Mínimo: 46 - Máximo: 80.9');
          $('#h_circunferencia').attr('data-content','Mínimo: 74 - Máximo: 100');
          $('#h_cintura').attr('data-content','< 80');
          $('#h_quadril').attr('data-content','Mínimo: 80 - Máximo: 105');
          $('#h_rel_cin_qua').attr('data-content',' ');
          $('#h_gordura').attr('data-content','Mínimo: 13 - Máximo: 26');
          $('#h_potencia_aerobica').attr('data-content','Mínimo: 22');
          $('#h_forca_abdominal').attr('data-content','Mínimo: 9');
          $('#h_forca_mmii').attr('data-content','Mínimo: 16');
          $('#h_flexibilidade').attr('data-content','Mínimo: 32');
          $('#h_forca_mmss').attr('data-content','Mínimo: 5');
          $('#h_frequencia_card_rep').attr('data-content','Mínimo: 60 - Máximo: 90');
          $('#h_pressao_sis').attr('data-content','Mínimo: 80 - Máximo: 140');
          $('#h_pressao_dis').attr('data-content','Mínimo: 45 - Máximo: 90');

          var g = $('#massa_magra').val();
          var minPeso = parseInt(g) / (1-13/100);
          var maxPeso = parseInt(g) / (1-26/100);
          $('#h_peso').attr('data-content','Mínimo: '+minPeso+' - Máximo: '+maxPeso);

        break;
    }
  }
}


//MOSTAR E OCULTAR CAMPOS
function showAndHiddenFields(idade, sexo){
    switch (sexo) {
      case '1':
          $('.peso_corporal_total').css('display','');
          $('.peso_a_perder').css('display','');
          $('.total_agua_corpo').css('display','');
          $('.perc_agua_massa_magra').css('display','');
          $('.dc_tricepts').css('display','none');
          $('.soma_dc_triceps_subescapular').css('display','none');
          $('.soma5_dc').css('display','');
        break;
      case '2':
          $('.peso_corporal_total').css('display','none');
          $('.peso_a_perder').css('display','none');
          $('.total_agua_corpo').css('display','none');
          $('.perc_agua_massa_magra').css('display','none');
          $('.soma5_dc').css('display','');
          $('.dc_tricepts').css('display','');

          if(idade >= 15 && idade <= 19){
              $('.dc_tricepts').css('display','none');
          }

          if(idade >= 20 && idade <= 29){
            $('.soma_dc_triceps_subescapular').css('display','');
          }

          if(idade >= 30 && idade <= 39){
              $('.perc_agua_massa_magra').css('display','');
          }

          if(idade >= 50 && idade <= 59){
              $('.soma5_dc').css('display','none');
              $('.dc_tricepts').css('display','none');
          }
        break;
    }
}

function popoverClassificacao(idade, sexo) {
    if(idade >= 15 && idade <= 19){
      switch (sexo) {
        case '1':

            $('.max-imc').text('26');
            $('.min-imc').text('18');
            $('.max-somda5_dc').text('58');
            $('.min-soma5_dc').text('32');
            $('.max-circunferencia').text('116');
            $('.min-circunferencia').text('90');
            $('.max-cintura').text('90');
            $('.min-cintura').text('');
            $('.max-quadril').text('104');
            $('.min-quadril').text('90');
            $('.max-gordura').text('20');
            $('.min-gordura').text('8');
            $('.max-forca_abdominal').text('-');
            $('.min-forca_abdominal').text('37');
            $('.max-forca_mmii').text('');
            $('.min-forca_mmii').text('38');
            $('.max-flexibilidade').text('');
            $('.min-flexibilidade').text('33');
            $('.max-forca_mmss').text('');
            $('.min-forca_mmss').text('23');
            $('.max-frequencia_card_rep').text('80');
            $('.min-frequencia_card_rep').text('60');
            $('.max-pressao_sis').text('140');
            $('.min-pressao_sis').text('');
            $('.max-pressao_dis').text('95');
            $('.min-pressao_dis').text('45');
            $('.max-potencia_aerobica').text('');
            $('.min-potencia_aerobica').text('44');



            $('#h_imc').attr('data-content','Mínimo: 18 - Máximo: 26');
            $('#h_soma5_dc').attr('data-content','Mínimo: 32 - Máximo: 58');
            $('#h_circunferencia').attr('data-content','Mínimo: 90 - Máximo: 116');
            $('#h_cintura').attr('data-content','< 90');
            $('#h_quadril').attr('data-content','Mínimo: 90 - Máximo: 104');
            $('#h_gordura').attr('data-content','Mínimo: 8 - Máximo: 20');
            $('#h_forca_abdominal').attr('data-content','> 37 rep.');
            $('#h_forca_mmii').attr('data-content','> 38 cm');
            $('#h_flexibilidade').attr('data-content','> 33 cm');
            $('#h_forca_mmss').attr('data-content','> 23 rep.');
            $('#h_frequencia_card_rep').attr('data-content','Mínimo: 60 - Máximo: 80');
            $('#h_pressao_sis').attr('data-content','< 140');
            $('#h_pressao_dis').attr('data-content','Mínimo: 45 - Máximo: 95');
            $('#h_potencia_aerobica').attr('data-content','> 44');

            var g = $('#massa_magra').val() == undefined ? $('.massa_magra').text() : $('#massa_magra').val();
            var minPeso = parseInt(g) / (1-8/100);
            var maxPeso = parseInt(g) / (1-20/100);
            $('#h_peso').attr('data-content','Mínimo: '+minPeso+' - Máximo: '+maxPeso);

            $('.max-peso').text(maxPeso);
            $('.min-peso').text(minPeso);

          break;
        case '2':

            $('.max-imc').text('25');
            $('.min-imc').text('18');
            $('.max-somda5_dc').text('72');
            $('.min-soma5_dc').text('46');
            $('.max-circunferencia').text('100');
            $('.min-circunferencia').text('74');
            $('.max-cintura').text('79');
            $('.min-cintura').text('56');
            $('.max-quadril').text('105');
            $('.min-quadril').text('80');
            $('.max-rel_cin_qua').text('0.77');
            $('.min-rel_cin_qua').text('0.75');
            $('.max-gordura').text('24');
            $('.min-gordura').text('13');
            $('.max-forca_abdominal').text('');
            $('.min-forca_abdominal').text('30');
            $('.max-forca_mmii').text('');
            $('.min-forca_mmii').text('22');
            $('.max-flexibilidade').text('');
            $('.min-flexibilidade').text('33');
            $('.max-forca_mmss').text('');
            $('.min-forca_mmss').text('18');
            $('.max-frequencia_card_rep').text('90');
            $('.min-frequencia_card_rep').text('60');
            $('.max-pressao_sis').text('140');
            $('.min-pressao_sis').text('80');
            $('.max-pressao_dis').text('90');
            $('.min-pressao_dis').text('45');
            $('.max-potencia_aerobica').text('');
            $('.min-potencia_aerobica').text('36');

            $('#h_imc').attr('data-content','Mínimo: 18 - Máximo: 25');
            $('#h_soma5_dc').attr('data-content','Mínimo: 46 - Máximo: 72');
            $('#h_circunferencia').attr('data-content','Mínimo: 74 - Máximo: 100');
            $('#h_cintura').attr('data-content','Mínimo: 56 - Máximo: 79');
            $('#h_quadril').attr('data-content','Mínimo: 80 - Máximo: 105');
            $('#h_rel_cin_qua').attr('data-content','Mínimo: < 0.75 - Máximo: 0.77');
            $('#h_gordura').attr('data-content','Mínimo: 13 - Máximo: 24');
            $('#h_forca_abdominal').attr('data-content','Mínimo: 30');
            $('#h_forca_mmii').attr('data-content','Mínimo: 22');
            $('#h_flexibilidade').attr('data-content','Mínimo: 33');
            $('#h_forca_mmss').attr('data-content','Mínimo: 18');
            $('#h_frequencia_card_rep').attr('data-content','Mínimo: 60 - Máximo: 90');
            $('#h_pressao_sis').attr('data-content','Mínimo: 80 - Máximo: 140');
            $('#h_pressao_dis').attr('data-content','Mínimo: 45 - Máximo: 90');
            $('#h_potencia_aerobica').attr('data-content','Mínimo: 36');

            var g = $('#massa_magra').val() == undefined ? $('.massa_magra').text() : $('#massa_magra').val();
            var minPeso = parseInt(g) / (1-13/100);
            var maxPeso = parseInt(g) / (1-24/100);
            $('#h_peso').attr('data-content','Mínimo: '+minPeso+' - Máximo: '+maxPeso);

            $('.max-peso').text(maxPeso);
            $('.min-peso').text(minPeso);

          break;
      }
    }

    if(idade >= 20 && idade <= 29){
      switch (sexo) {
        case '1':

            $('.max-imc').text('26');
            $('.min-imc').text('18');
            $('.max-somda5_dc').text('58');
            $('.min-soma5_dc').text('32');
            $('.max-circunferencia').text('120');
            $('.min-circunferencia').text('90');
            $('.max-cintura').text('90');
            $('.min-cintura').text('');
            $('.max-quadril').text('110');
            $('.min-quadril').text('90');
            $('.max-gordura').text('20');
            $('.min-gordura').text('8');
            $('.max-forca_abdominal').text('-');
            $('.min-forca_abdominal').text('33');
            $('.max-forca_mmii').text('');
            $('.min-forca_mmii').text('37');
            $('.max-flexibilidade').text('');
            $('.min-flexibilidade').text('32');
            $('.max-forca_mmss').text('');
            $('.min-forca_mmss').text('22');
            $('.max-frequencia_card_rep').text('80');
            $('.min-frequencia_card_rep').text('60');
            $('.max-pressao_sis').text('140');
            $('.min-pressao_sis').text('');
            $('.max-pressao_dis').text('95');
            $('.min-pressao_dis').text('45');
            $('.max-potencia_aerobica').text('');
            $('.min-potencia_aerobica').text('40');

            $('#h_imc').attr('data-content','Mínimo: 18 - Máximo: 26');
            $('#h_soma5_dc').attr('data-content','Mínimo: 32 - Máximo: 58');
            $('#h_circunferencia').attr('data-content','Mínimo: 90 - Máximo: 120');
            $('#h_cintura').attr('data-content','< 90');
            $('#h_quadril').attr('data-content','Mínimo: 90 - Máximo: 110');
            $('#h_gordura').attr('data-content','Mínimo: 8 - Máximo: 20');
            $('#h_frequencia_card_rep').attr('data-content','Mínimo: 60 - Máximo: 80');
            $('#h_pressao_sis').attr('data-content','< 140');
            $('#h_pressao_dis').attr('data-content','Mínimo: 45 - Máximo: 95');
            $('#h_potencia_aerobica').attr('data-content','> 40');
            $('#h_forca_abdominal').attr('data-content','> 33 rep.');
            $('#h_forca_mmii').attr('data-content','> 37 cm');
            $('#h_flexibilidade').attr('data-content','> 32 cm');
            $('#h_forca_mmss').attr('data-content','> 22 rep.');


            var g = $('#massa_magra').val() == undefined ? $('.massa_magra').text() : $('#massa_magra').val();
            var minPeso = parseInt(g) / (1-8/100);
            var maxPeso = parseInt(g) / (1-20/100);
            $('#h_peso').attr('data-content','Mínimo: '+minPeso+' - Máximo: '+maxPeso);

            $('.max-peso').text(parseFloat(maxPeso).toFixed(2));
            $('.min-peso').text(parseFloat(minPeso).toFixed(2));


          break;
        case '2':

            $('.max-imc').text('25.9');
            $('.min-imc').text('18');
            $('.max-dc_tricepts').text('24');
            $('.min-dc_tricepts').text('7');
            $('.max-soma_dc_triceps_subescapular').text('33');
            $('.min-soma_dc_triceps_subescapular').text('16');
            $('.max-somda5_dc').text('80.9');
            $('.min-soma5_dc').text('46');
            $('.max-cintura').text('80');
            $('.min-cintura').text('');
            $('.max-gordura').text('26');
            $('.min-gordura').text('13');
            $('.max-forca_abdominal').text('');
            $('.min-forca_abdominal').text('25');
            $('.max-forca_mmii').text('');
            $('.min-forca_mmii').text('21');
            $('.max-flexibilidade').text('');
            $('.min-flexibilidade').text('33');
            $('.max-forca_mmss').text('');
            $('.min-forca_mmss').text('15');
            $('.max-frequencia_card_rep').text('90');
            $('.min-frequencia_card_rep').text('60');
            $('.max-pressao_sis').text('140');
            $('.min-pressao_sis').text('80');
            $('.max-pressao_dis').text('90');
            $('.min-pressao_dis').text('45');
            $('.max-potencia_aerobica').text('');
            $('.min-potencia_aerobica').text('31');

            $('#h_imc').attr('data-content','Mínimo: 18 - Máximo: 25.9');
            $('#h_soma5_dc').attr('data-content','Mínimo: 46 - Máximo: 80.9');
            $('#h_circunferencia').attr('data-content','< 97 Excelente');
            $('#h_cintura').attr('data-content','< 80');
            $('#h_quadril').attr('data-content','< 100 Excelente');
            $('#h_rel_cin_qua').attr('data-content',' ');
            $('#h_gordura').attr('data-content','Mínimo: 13 - Máximo: 26');
            $('#h_forca_abdominal').attr('data-content','Mínimo: 25');
            $('#h_forca_mmii').attr('data-content','Mínimo: 21');
            $('#h_flexibilidade').attr('data-content','Mínimo: 33');
            $('#h_forca_mmss').attr('data-content','Mínimo: 15');
            $('#h_frequencia_card_rep').attr('data-content','Mínimo: 60 - Máximo: 90');
            $('#h_pressao_sis').attr('data-content','Mínimo: 80 - Máximo: 140');
            $('#h_pressao_dis').attr('data-content','Mínimo: 45 - Máximo: 90');
            $('#h_potencia_aerobica').attr('data-content','Mínimo: 36');

            var g = $('#massa_magra').val();
            var minPeso = parseInt(g) / (1-13/100);
            var maxPeso = parseInt(g) / (1-26/100);
            $('#h_peso').attr('data-content','Mínimo: '+minPeso+' - Máximo: '+maxPeso);

          break;
      }
    }

    if(idade >= 30 && idade <= 39){
      switch (sexo) {
        case '1':

            $('.max-imc').text('26');
            $('.min-imc').text('18');
            $('.max-somda5_dc').text('58');
            $('.min-soma5_dc').text('32');
            $('.max-circunferencia').text('43');
            $('.min-circunferencia').text('');
            $('.max-cintura').text('90');
            $('.min-cintura').text('');
            $('.max-gordura').text('20');
            $('.min-gordura').text('8');
            $('.max-forca_abdominal').text('-');
            $('.min-forca_abdominal').text('25');
            $('.max-forca_mmii').text('');
            $('.min-forca_mmii').text('32');
            $('.max-flexibilidade').text('');
            $('.min-flexibilidade').text('32');
            $('.max-forca_mmss').text('');
            $('.min-forca_mmss').text('13');
            $('.max-frequencia_card_rep').text('80');
            $('.min-frequencia_card_rep').text('60');
            $('.max-pressao_sis').text('150');
            $('.min-pressao_sis').text('');
            $('.max-pressao_dis').text('95');
            $('.min-pressao_dis').text('45');
            $('.max-potencia_aerobica').text('');
            $('.min-potencia_aerobica').text('36');

            $('#h_imc').attr('data-content','Mínimo: 18 - Máximo: 26');
            $('#h_soma5_dc').attr('data-content','Mínimo: 32 - Máximo: 58');
            $('#h_circunferencia').attr('data-content','< 43 Excelente');
            $('#h_cintura').attr('data-content','< 90');
            $('#h_quadril').attr('data-content',' ');
            $('#h_gordura').attr('data-content','Mínimo: 8 - Máximo: 20');
            $('#h_frequencia_card_rep').attr('data-content','Mínimo: 60 - Máximo: 80');
            $('#h_pressao_sis').attr('data-content','< 150');
            $('#h_pressao_dis').attr('data-content','Mínimo: 45 - Máximo: 95');
            $('#h_potencia_aerobica').attr('data-content','> 36');
            $('#h_forca_abdominal').attr('data-content','> 25 rep.');
            $('#h_forca_mmii').attr('data-content','> 32 cm');
            $('#h_flexibilidade').attr('data-content','> 32 cm');
            $('#h_forca_mmss').attr('data-content','> 13 rep.');


            var g = $('#massa_magra').val() == undefined ? $('.massa_magra').text() : $('#massa_magra').val();
            var minPeso = parseInt(g) / (1-8/100);
            var maxPeso = parseInt(g) / (1-20/100);
            $('#h_peso').attr('data-content','Mínimo: '+minPeso+' - Máximo: '+maxPeso);

            $('.max-peso').text(parseFloat(maxPeso).toFixed(2));
            $('.min-peso').text(parseFloat(minPeso).toFixed(2));


          break;
        case '2':
            $('.max-imc').text('24.9');
            $('.min-imc').text('18');
            $('.max-dc_tricepts').text('24');
            $('.min-dc_tricepts').text('7');
            $('.max-somda5_dc').text('72');
            $('.min-soma5_dc').text('46');
            $('.max-cintura').text('80');
            $('.min-cintura').text('');
            $('.max-gordura').text('25');
            $('.min-gordura').text('13');
            $('.max-forca_abdominal').text('');
            $('.min-forca_abdominal').text('20');
            $('.max-forca_mmii').text('');
            $('.min-forca_mmii').text('20');
            $('.max-flexibilidade').text('');
            $('.min-flexibilidade').text('32');
            $('.max-forca_mmss').text('');
            $('.min-forca_mmss').text('13');
            $('.max-frequencia_card_rep').text('90');
            $('.min-frequencia_card_rep').text('60');
            $('.max-pressao_sis').text('140');
            $('.min-pressao_sis').text('80');
            $('.max-pressao_dis').text('90');
            $('.min-pressao_dis').text('45');
            $('.max-potencia_aerobica').text('');
            $('.min-potencia_aerobica').text('35');

            $('#h_imc').attr('data-content','Mínimo: 18 - Máximo: 24.9');
            $('#h_soma5_dc').attr('data-content','Mínimo: 46 - Máximo: 72');
            $('#h_circunferencia').attr('data-content','< 97 Excelente');
            $('#h_cintura').attr('data-content','< 80');
            $('#h_quadril').attr('data-content',' ');
            $('#h_rel_cin_qua').attr('data-content',' ');
            $('#h_gordura').attr('data-content','Mínimo: 13 - Máximo: 25');
            $('#h_forca_abdominal').attr('data-content','Mínimo: 20');
            $('#h_forca_mmii').attr('data-content','Mínimo: 20');
            $('#h_flexibilidade').attr('data-content','Mínimo: 32');
            $('#h_forca_mmss').attr('data-content','Mínimo: 13');
            $('#h_frequencia_card_rep').attr('data-content','Mínimo: 60 - Máximo: 90');
            $('#h_pressao_sis').attr('data-content','Mínimo: 80 - Máximo: 140');
            $('#h_pressao_dis').attr('data-content','Mínimo: 45 - Máximo: 90');
            $('#h_potencia_aerobica').attr('data-content','Mínimo: 35');

            var g = $('#massa_magra').val() == undefined ? $('.massa_magra').text() : $('#massa_magra').val();
            var minPeso = parseInt(g) / (1-8/100);
            var maxPeso = parseInt(g) / (1-20/100);
            $('#h_peso').attr('data-content','Mínimo: '+minPeso+' - Máximo: '+maxPeso);

            $('.max-peso').text(parseFloat(maxPeso).toFixed(2));
            $('.min-peso').text(parseFloat(minPeso).toFixed(2));

          break;
      }
    }

    if(idade >= 40 && idade <= 49){
      switch (sexo) {
        case '1':

            $('.max-imc').text('26');
            $('.min-imc').text('18');
            $('.max-somda5_dc').text('74.9');
            $('.min-soma5_dc').text('32');
            $('.max-cintura').text('90');
            $('.min-cintura').text('');
            $('.max-gordura').text('22');
            $('.min-gordura').text('8');
            $('.max-forca_abdominal').text('');
            $('.min-forca_abdominal').text('17');
            $('.max-forca_mmii').text('');
            $('.min-forca_mmii').text('25');
            $('.max-flexibilidade').text('');
            $('.min-flexibilidade').text('32');
            $('.max-forca_mmss').text('');
            $('.min-forca_mmss').text('10');
            $('.max-frequencia_card_rep').text('80');
            $('.min-frequencia_card_rep').text('60');
            $('.max-pressao_sis').text('');
            $('.min-pressao_sis').text('');
            $('.max-pressao_dis').text('95');
            $('.min-pressao_dis').text('45');
            $('.max-potencia_aerobica').text('');
            $('.min-potencia_aerobica').text('33');

            $('#h_imc').attr('data-content','Mínimo: 18 - Máximo: 26');
            $('#h_soma5_dc').attr('data-content','Mínimo: 32 - Máximo: 74.9');
            $('#h_circunferencia').attr('data-content',' ');
            $('#h_cintura').attr('data-content','< 90');
            $('#h_quadril').attr('data-content',' ');
            $('#h_gordura').attr('data-content','Mínimo: 8 - Máximo: 22');
            $('#h_frequencia_card_rep').attr('data-content','Mínimo: 60 - Máximo: 80');
            $('#h_pressao_sis').attr('data-content',' ');
            $('#h_pressao_dis').attr('data-content','Mínimo: 45 - Máximo: 95');
            $('#h_potencia_aerobica').attr('data-content','> 33');
            $('#h_forca_abdominal').attr('data-content','> 17 rep.');
            $('#h_forca_mmii').attr('data-content','> 25 cm');
            $('#h_flexibilidade').attr('data-content','> 32 cm');
            $('#h_forca_mmss').attr('data-content','> 10 rep.');


            var g = $('#massa_magra').val() == undefined ? $('.massa_magra').text() : $('#massa_magra').val();
            var minPeso = parseInt(g) / (1-8/100);
            var maxPeso = parseInt(g) / (1-20/100);
            $('#h_peso').attr('data-content','Mínimo: '+minPeso+' - Máximo: '+maxPeso);

            $('.max-peso').text(parseFloat(maxPeso).toFixed(2));
            $('.min-peso').text(parseFloat(minPeso).toFixed(2));

          break;
        case '2':
            $('.max-imc').text('26');
            $('.min-imc').text('18');
            $('.max-dc_tricepts').text('24');
            $('.min-dc_tricepts').text('7');
            $('.max-somda5_dc').text('72');
            $('.min-soma5_dc').text('46');
            $('.max-circunferencia').text('100');
            $('.min-circunferencia').text('74');
            $('.max-cintura').text('80');
            $('.min-cintura').text('');
            $('.max-quadril').text('105');
            $('.min-quadril').text('80');
            $('.max-gordura').text('25');
            $('.min-gordura').text('13');
            $('.max-forca_abdominal').text('');
            $('.min-forca_abdominal').text('15');
            $('.max-forca_mmii').text('');
            $('.min-forca_mmii').text('19');
            $('.max-flexibilidade').text('');
            $('.min-flexibilidade').text('32');
            $('.max-forca_mmss').text('');
            $('.min-forca_mmss').text('11');
            $('.max-frequencia_card_rep').text('90');
            $('.min-frequencia_card_rep').text('60');
            $('.max-pressao_sis').text('140');
            $('.min-pressao_sis').text('80');
            $('.max-pressao_dis').text('90');
            $('.min-pressao_dis').text('45');
            $('.max-potencia_aerobica').text('');
            $('.min-potencia_aerobica').text('32');

            $('#h_imc').attr('data-content','Mínimo: 18 - Máximo: 26');
            $('#h_soma5_dc').attr('data-content','Mínimo: 46 - Máximo: 72');
            $('#h_circunferencia').attr('data-content','Mínimo: 74 - Máximo: 100');
            $('#h_cintura').attr('data-content','< 80');
            $('#h_quadril').attr('data-content','Mínimo: 80 - Máximo: 105');
            $('#h_rel_cin_qua').attr('data-content',' ');
            $('#h_gordura').attr('data-content','Mínimo: 13 - Máximo: 25');
            $('#h_forca_abdominal').attr('data-content','Mínimo: 15');
            $('#h_forca_mmii').attr('data-content','Mínimo: 19');
            $('#h_flexibilidade').attr('data-content','Mínimo: 32');
            $('#h_forca_mmss').attr('data-content','Mínimo: 11');
            $('#h_frequencia_card_rep').attr('data-content','Mínimo: 60 - Máximo: 90');
            $('#h_pressao_sis').attr('data-content','Mínimo: 80 - Máximo: 140');
            $('#h_pressao_dis').attr('data-content','Mínimo: 45 - Máximo: 90');
            $('#h_potencia_aerobica').attr('data-content','Mínimo: 35');

            var g = $('#massa_magra').val() == undefined ? $('.massa_magra').text() : $('#massa_magra').val();
            var minPeso = parseInt(g) / (1-8/100);
            var maxPeso = parseInt(g) / (1-20/100);
            $('#h_peso').attr('data-content','Mínimo: '+minPeso+' - Máximo: '+maxPeso);

            $('.max-peso').text(parseFloat(maxPeso).toFixed(2));
            $('.min-peso').text(parseFloat(minPeso).toFixed(2));

          break;
      }
    }

    if(idade >= 50 && idade <= 59){
      switch (sexo) {
        case '1':

            $('.max-imc').text('26');
            $('.min-imc').text('18');
            $('.max-somda5_dc').text('76.9');
            $('.min-soma5_dc').text('32');
            $('.max-cintura').text('90');
            $('.min-cintura').text('');
            $('.max-gordura').text('23');
            $('.min-gordura').text('8');
            $('.max-forca_abdominal').text('');
            $('.min-forca_abdominal').text('13');
            $('.max-forca_mmii').text('');
            $('.min-forca_mmii').text('23');
            $('.max-flexibilidade').text('');
            $('.min-flexibilidade').text('32');
            $('.max-forca_mmss').text('');
            $('.min-forca_mmss').text('7');
            $('.max-frequencia_card_rep').text('80');
            $('.min-frequencia_card_rep').text('60');
            $('.max-pressao_sis').text('140');
            $('.min-pressao_sis').text('');
            $('.max-pressao_dis').text('95');
            $('.min-pressao_dis').text('45');
            $('.max-potencia_aerobica').text('');
            $('.min-potencia_aerobica').text('30');

            $('#h_imc').attr('data-content','Mínimo: 18 - Máximo: 26');
            $('#h_soma5_dc').attr('data-content','Mínimo: 32 - Máximo: 76.9');
            $('#h_circunferencia').attr('data-content',' ');
            $('#h_cintura').attr('data-content','< 90');
            $('#h_quadril').attr('data-content',' ');
            $('#h_gordura').attr('data-content','Mínimo: 8 - Máximo: 23');
            $('#h_frequencia_card_rep').attr('data-content','Mínimo: 60 - Máximo: 80');
            $('#h_pressao_sis').attr('data-content','< 140');
            $('#h_pressao_dis').attr('data-content','Mínimo: 45 - Máximo: 95');
            $('#h_potencia_aerobica').attr('data-content','> 30');
            $('#h_forca_abdominal').attr('data-content','> 13 rep.');
            $('#h_forca_mmii').attr('data-content','> 23 cm');
            $('#h_flexibilidade').attr('data-content','> 32 cm');
            $('#h_forca_mmss').attr('data-content','> 7 rep.');


            var g = $('#massa_magra').val() == undefined ? $('.massa_magra').text() : $('#massa_magra').val();
            var minPeso = parseInt(g) / (1-8/100);
            var maxPeso = parseInt(g) / (1-20/100);
            $('#h_peso').attr('data-content','Mínimo: '+minPeso+' - Máximo: '+maxPeso);

            $('.max-peso').text(parseFloat(maxPeso).toFixed(2));
            $('.min-peso').text(parseFloat(minPeso).toFixed(2));

          break;
        case '2':
            $('.max-imc').text('26');
            $('.min-imc').text('18');
            $('.max-cintura').text('90');
            $('.min-cintura').text('');
            $('.max-quadril').text('105');
            $('.min-quadril').text('80');
            $('.max-gordura').text('25');
            $('.min-gordura').text('13');
            $('.max-forca_abdominal').text('');
            $('.min-forca_abdominal').text('11');
            $('.max-forca_mmii').text('');
            $('.min-forca_mmii').text('18');
            $('.max-flexibilidade').text('');
            $('.min-flexibilidade').text('32');
            $('.max-forca_mmss').text('');
            $('.min-forca_mmss').text('8');
            $('.max-frequencia_card_rep').text('90');
            $('.min-frequencia_card_rep').text('60');
            $('.max-pressao_sis').text('140');
            $('.min-pressao_sis').text('80');
            $('.max-pressao_dis').text('90');
            $('.min-pressao_dis').text('45');
            $('.max-potencia_aerobica').text('');
            $('.min-potencia_aerobica').text('28');

            $('#h_imc').attr('data-content','Mínimo: 18 - Máximo: 26');
            $('#h_circunferencia').attr('data-content','< 97 Excelente');
            $('#h_cintura').attr('data-content','< 80');
            $('#h_quadril').attr('data-content','Mínimo: 80 - Máximo: 105');
            $('#h_rel_cin_qua').attr('data-content',' ');
            $('#h_gordura').attr('data-content','Mínimo: 13 - Máximo: 25');
            $('#h_forca_abdominal').attr('data-content','Mínimo: 11');
            $('#h_forca_mmii').attr('data-content','Mínimo: 18');
            $('#h_flexibilidade').attr('data-content','Mínimo: 32');
            $('#h_forca_mmss').attr('data-content','Mínimo: 8');
            $('#h_frequencia_card_rep').attr('data-content','Mínimo: 60 - Máximo: 90');
            $('#h_pressao_sis').attr('data-content','Mínimo: 80 - Máximo: 140');
            $('#h_pressao_dis').attr('data-content','Mínimo: 45 - Máximo: 90');
            $('#h_potencia_aerobica').attr('data-content','Mínimo: 28');

            var g = $('#massa_magra').val() == undefined ? $('.massa_magra').text() : $('#massa_magra').val();
            var minPeso = parseInt(g) / (1-8/100);
            var maxPeso = parseInt(g) / (1-20/100);
            $('#h_peso').attr('data-content','Mínimo: '+minPeso+' - Máximo: '+maxPeso);

            $('.max-peso').text(parseFloat(maxPeso).toFixed(2));
            $('.min-peso').text(parseFloat(minPeso).toFixed(2));
          break;
      }
    }

    if(idade >= 60 && idade <= 69){
      switch (sexo) {
        case '1':
            $('.max-imc').text('26.5');
            $('.min-imc').text('18');
            $('.max-somda5_dc').text('80.9');
            $('.min-soma5_dc').text('32');
            $('.max-cintura').text('90');
            $('.min-cintura').text('');
            $('.max-gordura').text('25');
            $('.min-gordura').text('8');
            $('.max-forca_abdominal').text('');
            $('.min-forca_abdominal').text('9');
            $('.max-forca_mmii').text('');
            $('.min-forca_mmii').text('16');
            $('.max-flexibilidade').text('');
            $('.min-flexibilidade').text('32');
            $('.max-forca_mmss').text('');
            $('.min-forca_mmss').text('5');
            $('.max-frequencia_card_rep').text('90');
            $('.min-frequencia_card_rep').text('60');
            $('.max-pressao_sis').text('140');
            $('.min-pressao_sis').text('80');
            $('.max-pressao_dis').text('95');
            $('.min-pressao_dis').text('45');
            $('.max-potencia_aerobica').text('');
            $('.min-potencia_aerobica').text('22');

            $('#h_imc').attr('data-content','Mínimo: 18 - Máximo: 26.5');
            $('#h_soma5_dc').attr('data-content','Mínimo: 32 - Máximo: 80.9');
            $('#h_circunferencia').attr('data-content',' ');
            $('#h_cintura').attr('data-content','< 90');
            $('#h_quadril').attr('data-content',' ');
            $('#h_gordura').attr('data-content','Mínimo: 8 - Máximo: 25');
            $('#h_frequencia_card_rep').attr('data-content','Mínimo: 60 - Máximo: 80');
            $('#h_pressao_sis').attr('data-content','< 140');
            $('#h_pressao_dis').attr('data-content','Mínimo: 45 - Máximo: 95');
            $('#h_potencia_aerobica').attr('data-content','> 23');
            $('#h_forca_abdominal').attr('data-content','> 6 rep.');
            $('#h_forca_mmii').attr('data-content','> 21 cm');
            $('#h_flexibilidade').attr('data-content','> 32 cm');
            $('#h_forca_mmss').attr('data-content','> 4 rep.');


            var g = $('#massa_magra').val() == undefined ? $('.massa_magra').text() : $('#massa_magra').val();
            var minPeso = parseInt(g) / (1-8/100);
            var maxPeso = parseInt(g) / (1-20/100);
            $('#h_peso').attr('data-content','Mínimo: '+minPeso+' - Máximo: '+maxPeso);

            $('.max-peso').text(parseFloat(maxPeso).toFixed(2));
            $('.min-peso').text(parseFloat(minPeso).toFixed(2));

          break;
        case '2':
            $('.max-imc').text('26');
            $('.min-imc').text('18');
            $('.max-somda5_dc').text('80.9');
            $('.min-soma5_dc').text('46');
            $('.max-circunferencia').text('100');
            $('.min-circunferencia').text('74');
            $('.max-cintura').text('80');
            $('.min-cintura').text('');
            $('.max-quadril').text('105');
            $('.min-quadril').text('80');
            $('.max-gordura').text('26');
            $('.min-gordura').text('13');
            $('.max-forca_abdominal').text('');
            $('.min-forca_abdominal').text('30');
            $('.max-forca_mmii').text('');
            $('.min-forca_mmii').text('22');
            $('.max-flexibilidade').text('');
            $('.min-flexibilidade').text('33');
            $('.max-forca_mmss').text('');
            $('.min-forca_mmss').text('18');
            $('.max-frequencia_card_rep').text('90');
            $('.min-frequencia_card_rep').text('60');
            $('.max-pressao_sis').text('140');
            $('.min-pressao_sis').text('80');
            $('.max-pressao_dis').text('90');
            $('.min-pressao_dis').text('45');
            $('.max-potencia_aerobica').text('');
            $('.min-potencia_aerobica').text('36');

            $('#h_imc').attr('data-content','Mínimo: 18 - Máximo: 26');
            $('#h_soma5_dc').attr('data-content','Mínimo: 46 - Máximo: 80.9');
            $('#h_circunferencia').attr('data-content','Mínimo: 74 - Máximo: 100');
            $('#h_cintura').attr('data-content','< 80');
            $('#h_quadril').attr('data-content','Mínimo: 80 - Máximo: 105');
            $('#h_rel_cin_qua').attr('data-content',' ');
            $('#h_gordura').attr('data-content','Mínimo: 13 - Máximo: 26');
            $('#h_potencia_aerobica').attr('data-content','Mínimo: 22');
            $('#h_forca_abdominal').attr('data-content','Mínimo: 9');
            $('#h_forca_mmii').attr('data-content','Mínimo: 16');
            $('#h_flexibilidade').attr('data-content','Mínimo: 32');
            $('#h_forca_mmss').attr('data-content','Mínimo: 5');
            $('#h_frequencia_card_rep').attr('data-content','Mínimo: 60 - Máximo: 90');
            $('#h_pressao_sis').attr('data-content','Mínimo: 80 - Máximo: 140');
            $('#h_pressao_dis').attr('data-content','Mínimo: 45 - Máximo: 90');

            var g = $('#massa_magra').val() == undefined ? $('.massa_magra').text() : $('#massa_magra').val();
            var minPeso = parseInt(g) / (1-8/100);
            var maxPeso = parseInt(g) / (1-20/100);
            $('#h_peso').attr('data-content','Mínimo: '+minPeso+' - Máximo: '+maxPeso);

            $('.max-peso').text(parseFloat(maxPeso).toFixed(2));
            $('.min-peso').text(parseFloat(minPeso).toFixed(2));
          break;
      }
    }
}

//SAVE TEST
$('#add-test').on('click',function(){
    var type = "POST";
    var my_url_cli = "/clients";

    var client_id = $('#client_id').val();
    if (client_id === '') {
      saveClient('tests','create');
    }else{
      save_test(client_id,type);
    }

});

function save_test(client_id,type){
    var my_url = "/tests";
    if(type == 'PUT' || type == 'PATCH'){
       my_url = "/tests/"+$('#test_id').val();
    }

    var formDataTest = {
        client_id : client_id,
        estatura : $('#estatura').val(),
        peso : $('#peso').val(),
        dc_tricepts: ( $('#dc_tricepts').val() == '' ? 0 : $('#dc_tricepts').val() ),
        soma_dc_triceps_subescapular: ( $('#soma_dc_triceps_subescapular').val() == '' ? 0 : $('#soma_dc_triceps_subescapular').val() ),
        soma5_dc: ( $('#soma5_dc').val() == '' ? 0 : $('#soma5_dc').val() ),
        circunferencia: $('#circunferencia').val(),
        cintura: $('#cintura').val(),
        quadril: $('#quadril').val(),
        coxa: $('#coxa').val(),
        panturrilha: $('#panturrilha').val(),
        gordura: $('#gordura').val(),
        peso_corporal_total: ( $('#peso_corporal_total').val() == '' ? 0 : $('#peso_corporal_total').val() ),
        peso_a_perder: ( $('#peso_a_perder').val() == '' ? 0 : $('#peso_a_perder').val() ),
        total_agua_corpo: ( $('#total_agua_corpo').val() == '' ? 0 : $('#total_agua_corpo').val() ),
        perc_agua_massa_magra: ( $('#perc_agua_massa_magra').val() == '' ? 0 : $('#perc_agua_massa_magra').val() ),
        taxa_metabolica: $('#taxa_metabolica').val(),
        forca_abdominal: $('#forca_abdominal').val(),
        forca_mmii: $('#forca_mmii').val(),
        flexibilidade: $('#flexibilidade').val(),
        forca_mmss: $('#forca_mmss').val(),
        frequencia_card_rep: $('#frequencia_card_rep').val(),
        pressao_sis: $('#pressao_sis').val(),
        pressao_dis: $('#pressao_dis').val(),
        potencia_aerobica: $('#potencia_aerobica').val(),
        dt_test: $('#dt_test').val(),
    }

    $.ajax({
        type: type,
        url: my_url,
        data: formDataTest,
        dataType: 'json',
        success: function (data) {
          console.log(data);
          //var successHtml = 'Test saved with success';
          toastr.success(data.message,{timeOut: 5000} ).css("width","300px");
          $('#add-test').css('display','none');
          $('#edit-test').css('display','none');
        //  window.location = '/tests';
          return false;
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

$(function() {

  var g = $('.gordura').text();
  var p = $('.peso').text();
  var pg = get_peso_gordura(g,p);
  $('.peso_gordura').text(pg);

  var mm = get_massa_magra(p,pg);
  $('.massa_magra').text(mm);

  var c = $('.cintura').text();
  var q = $('.quadril').text();
  var cq = get_cintura_quatril(c,q);
  $('.rel_cin_qua').text(cq);

  var estatura = $('.estatura').text();
  var peso = $('.peso').text();
  var imc = get_imc(peso,estatura);
  $('.imc').text(parseFloat(imc).toFixed(2));

  var sex = $('.sex').text();
  var age = $('.age').text();
  //console.log('age: '+age+' - sex: '+sex);
  popoverClassificacao(age,sex);
});


/*$('#test-email').click(function(){

  createPDF('send');
  return false;
});

function sendMail(data) {
  $('.loader').css('display','block');
  var url = "/tests/pdf/sendMail";
  $('body').scrollTop(0);

  $.ajax({
    url: url,
    type: 'POST',
    dataType: 'json',
    data: data,
    success: function(data) {
      $('.loader').css('display','none');
      if(data.type === 'success'){
        toastr.success(data.message,{timeOut: 5000} ).css("width","300px");
      }

      if(data.type === 'error'){
        toastr.error(data.message,{timeOut: 5000} ).css("width","300px");
      }

    },
    cache: false,
    contentType: false,
    processData: false
  });
}*/

//Não preciso desse método por agora!
$(function () {
    var specialElementHandlers = {
        '#editor': function (element,renderer) {
            return true;
        }
    };
 /*$('#test-download').click(function () {
        var doc = new jsPDF('portrait');
        $('.no-print').css('display','none');
        doc.fromHTML($('#download-content').get(0), 15, 15, {
            'width': 170,'elementHandlers': specialElementHandlers
        });
        doc.save('sample-file.pdf');
    });*/
});

/*

$('#download-page').click(function(){
 var doc = new jsPDF();
  var html = document.documentElement.innerHTML;

  var specialElementHandlers = {
	'.report': function(element, renderer){
		return true;
	}
};

  // All units are in the set measurement for the document
  // This can be changed to "pt" (points), "mm" (Default), "cm", "in"
  /*doc.fromHTML($('.report').get(0), 15, 15, {
  	'width': 170,
  	'elementHandlers': specialElementHandlers
  });

  //doc.save('sample-file.pdf');
  *//*
$('#test-download').click(function () {
  var url = '/tests/pdf/downloadhtml';
//  var id = $('#id').text();
//  var html = document.documentElement.innerHTML;
    $('.no-print').css('display','none');
    html2canvas($(".invoice"), {
        onrendered: function(canvas) {
            theCanvas = canvas;
            canvas.toBlob(function(blob) {
                console.log(blob);
                saveAs(blob, "report.png");
                $('.no-print').css('display','block');
            });
        }
    });*/

//Gerator of PDF
/*var form = $('.invoice'),  cache_width = form.width(),  a4  =[ 595.28,  841.89];  // for a4 size paper width and height
$(document).on('click','#test-download',function(){
     $('.loader').css('display','block');
     $('body').scrollTop(0);
     createPDF('download');
     return false;
});


//create pdf
function createPDF(type){
  $('.no-print').css('display','none');
  $('.invoice').css('border','none');
  form.width((a4[0]*1.33333) -80).css('max-width','none');
  html2canvas($("#download-content"), {
     useCORS: true,
     allowTaint: true,
     imageTimeout : 2000,
     removeContainer : true,
      onrendered: function(canvas) {
            canvas.webkitImageSmoothingEnabled = false;
            canvas.mozImageSmoothingEnabled = false;
            canvas.imageSmoothingEnabled = false;
            var img = canvas.toDataURL("image/jpeg");
            //console.log(img);
            doc = new jsPDF('portrait','mm','a4');
            //doc.addImage(img, 'JPEG', 15, 40, 180, 160);
            doc.addImage(img, 'JPEG', 5, 10, 0, 0);
            if(type === 'download'){
              doc.save(''+$('.report').find('title').text()+'.pdf');
                $('.loader').css('display','none');
              toastr.success('PDF Generated and Downloaded with success!',{timeOut: 5000} ).css("width","300px");
            }
            if(type === 'send'){
              var id = $('#id').text();
              var data = new FormData();
              var pdf = btoa(doc.output());
              data.append("data" , pdf);
              data.append("id", id);
              sendMail(data);
              //return pdf;
            }

            $('.no-print').css('display','block');
            $('.invoice').css('border','1px solid #f4f4f4');
            form.width(cache_width);
           }
       });
 }

  /*  $('.invoice').css('border','none');
    //$('.invoice-info').css('display','none');
    var html = $('.report').html();
    $('.loader').css('display','block');
  $.ajax({
    url: url,
    type: 'POST',
    data: {html: html},
    success: function(data) {
      //$('.invoice-info').css('display','block');
      $('.no-print').css('display','block');
      $('.loader').css('display','none');
      $('.invoice').css('border','1px solid #f4f4f4');
    }
  });
  return false;

});*/

check();


//FUNCTION TO CHECK FIELDS CHANGES BEFORE UPDATE
function check() {
  var dt_test = new Date($('#dt_test').val());
  var dt_nasc = new Date($('#dt_nasc').val());
  var estatura = $('#estatura').val();
  var peso = $('#peso').val();
  var gordura = $('#gordura').val();
  var cintura = $('#cintura').val();
  var quadril = $('#quadril').val();

  if((dt_nasc != undefined && dt_nasc != 'Invalid Date') && (dt_test != undefined && dt_test != 'Invalid Date') ){
    console.log(dt_nasc);
    var idade = get_idade(dt_test,dt_nasc);
     $('#age').val(parseInt(idade));
     var sexo = $('#sexo').val();
     popoverClassificacao(idade,sexo);
  }

  if(estatura != undefined && peso != undefined){
    var imc = get_imc(peso,estatura);
    $('#imc').val(imc);
    changeIMC();
  }

  if(gordura != undefined && gordura != ''){
    var pg = get_peso_gordura(gordura,peso);
    $('#peso_gordura').val(pg);

    var mm = get_massa_magra(peso,pg);
    $('#massa_magra').val(mm);
  }

  if( (cintura != undefined && cintura != '') && (quadril != undefined && quadril != '') ){
    var cq = get_cintura_quatril(cintura,quadril);
    $('#rel_cin_qua').val(cq);
  }

}

//UPDATE TEST
$(document).on('click','#edit-test',function(e){
    e.preventDefault();
    var type = "PATCH";

    var client_id = $('#client_id').val();
    if (client_id != '') {
      saveClient('tests','update');
      save_test(client_id,type);
    }
});
