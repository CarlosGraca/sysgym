$(function () {

    $("#product_key").inputmask("99aa-a99a-999a-aa99-99aa");

    $(document).on('click','#add-license',function(){
        save($('#license-form'),$('#license-form')[0],'create');
    });

    //BOTÃO EDITAR CLIENTE
    $(document).on('click','#edit-license',function(){
        save($('#license-form'),$('#license-form')[0],'update');
    });

    $(document).on('click','#generate-license',function () {
        save($('#license-generator-form'),$('#license-generator-form')[0],'create');
    });
});