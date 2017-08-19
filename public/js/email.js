function sendMail(data) {
  $('.loader').css('display','block');
  var url = "/pdf/sendMail";
  // $('body').scrollTop(0);

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
}
