/**
 * Created by MS-INSYS on 21/03/2017.
 */

$(function () {
   $(document).on('click','.submit',function () {
       login();
   }); 
});


function login() {
    var _form= $('#form-login');
    var _form_data = $('#form-login')[0];
    var _type = _form.attr('method');
    var _url = _form.attr('action');
    var formData = new FormData(_form_data);

    console.log(_type);

    $.ajax({
        // xhr: function()
        // {
        //     // var xhr = new window.XMLHttpRequest();
        //     //
        //     // //Upload progress
        //     // $('.progress').css('display','block');
        //     //
        //     // var p = $('.progress').find('.progress-bar');
        //     //
        //     // p.addClass('active');
        //     // p.addClass('progress-bar-striped');
        //     // p.removeClass('progress-bar-success');
        //     // p.removeClass('progress-bar-danger');
        //     // $('#files-form').css('display','none');
        //     //
        //     // xhr.upload.addEventListener("progress", function(evt){
        //     //     if (evt.lengthComputable) {
        //     //         var percentComplete = evt.loaded / evt.total;
        //     //         p.css('display','block');
        //     //         //Do something with upload progress
        //     //         if(p.attr('aria-valuenow') != evt.total){
        //     //             p.attr('aria-valuenow',percentComplete) ;
        //     //             p.css('width', (percentComplete * 100)+'%');
        //     //             p.text( (percentComplete * 100).toFixed(0)+'%' );
        //     //         }
        //     //
        //     //     }
        //     // }, false);
        //     //
        //     // //Download progress
        //     // xhr.addEventListener("progress", function(evt){
        //     //     if (evt.lengthComputable) {
        //     //         var percentComplete = evt.loaded / evt.total;
        //     //         //Do something with download progress
        //     //
        //     //         if(p.attr('aria-valuenow')){
        //     //             // console.log(percentComplete*100);
        //     //             p.removeClass('active');
        //     //             p.removeClass('progress-bar-striped');
        //     //             p.addClass('progress-bar-success');
        //     //
        //     //             if( $('#files-form')[0] != undefined ){
        //     //                 setTimeout(function(){
        //     //                     $('.progress').css('display','none');
        //     //                     $('#files-form')[0].reset();
        //     //                     $('#files-form').css('display','block');
        //     //                     p.attr('aria-valuenow',0) ;
        //     //                     p.css('width', (0)+'%');
        //     //                     p.text( (0).toFixed(0)+'%' );
        //     //                 }, 2000);
        //     //             }
        //     //
        //     //         }
        //     //
        //     //     }
        //     // }, false);
        //     // return xhr;
        // },
        type: _type,
        url: _url,
        data: formData,
        dataType: 'json',
        success: function (data) {
            console.log('Success:', data);

            // if (data.type == 'error')
            //     toastr.error(data.message,{timeOut: 5000} ).css("width","300px");
            // else
            //     toastr.success(data.message,{timeOut: 5000} ).css("width","300px");
            //
        },
        error: function (data) {
            console.log('Error:', data);
            // if( data.status === 422) {
            //     $errors = data.responseJSON;
            //     var errorsHtml= _required_field_text;
            //     var aux = 0;
            //     $.each( $errors, function( key, value ) {
            //         //errorsHtml += '<li>' + value[0] + '</li>'; //showing only the first error.
            //         console.log(key);
            //         if(aux == 0){
            //             $('#'+key).addClass('field-error').focus();
            //         }else{
            //             $('#'+key).addClass('field-error');
            //         }
            //         aux++;
            //         //$('.'+key).find('.has-error').text(value[0]).css('display','block');
            //     });
            //
            //     toastr.error(errorsHtml,{timeOut: 5000} ).css("width","500px");
            // }else if(data.status === 200){
            //     toastr.error(data.responseText,{timeOut: 5000} ).css("width","500px");
            // }
        },
        cache: false,
        contentType: false,
        processData: false
    });
    
}