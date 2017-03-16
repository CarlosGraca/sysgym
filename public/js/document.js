var form = $('.invoice'), cache_width = form.width(), a4 = [793.92, 1122.24];  // for a4 size paper width and height

$(function () {

    $(document).on('click', '#btn-download', function () {
        $('.loader').css('display', 'block');
        $('body').scrollTop(0);

        //VERIFICAR SE O TIPO DE RELATORIO É Sheet ou Test
        var type_report = $(this).attr('type');

        if (type_report == 'sheets') {
            pdfExport('download');
        }

        if (type_report == 'tests') {
            createPDF('download');
        }
        return false;
    });

});

//PDF EXPORT TO TESTS
function createPDF(type){

  console.log(type);
  $('.no-print').css('display','none');
  $('.invoice').css('border','none');
  form.width(a4[0] - 80);
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
          //  var img = canvas.toDataURL("image/jpeg");
          //  $('.invoice').append('<img src=\''+img+'\' />');
            //console.log(img);
            doc = new jsPDF('portrait','mm','a4');
            //doc.addImage(img, 'JPEG', 15, 40, 180, 160);
            //doc.addImage(img, 'JPEG', 5, 10, 0, 0);
            doc.addImage(img, 'JPEG', 5, 10, 0, 0);

            if(type === 'download'){
              doc.save(''+$('.report').find('title').text()+'.pdf');
                $('.loader').css('display','none');
              toastr.success('PDF Generated and Downloaded with success!',{timeOut: 5000} ).css("width","300px");
            }
            if(type === 'send'){
              var email = $('#email').text();
              var name = $('#name').text();
              var documents = $('#document').text();
              var data = new FormData();
              var pdf = btoa(doc.output());
              data.append("data" , pdf);
             // data.append("id", id);
              data.append("email" , email);
              data.append("name", name);
              data.append("document", documents);
              sendMail(data);

            }

            $('.no-print').css('display','block');
            $('.invoice').css('border','1px solid #f4f4f4');
            form.width(cache_width);
           }
       });
 }

//PDF EXPORT TO SHEETS
function pdfExport(type) {

  $('.no-print').css('display','none');
  $('.invoice').css('border','none');
  var pdf = new jsPDF('p','pt','a4'),
      source = $('#download-content')[0];
/* pdf.addHTML (element, x, y, options, callback ); */
var options = {
            pagesplit: true
        };

  pdf.addHTML(
        source,
        options,
        function(){

        //  pdf.output('datauri');
          if(type == 'download'){
            pdf.save(''+$('.report').find('title').text()+'.pdf');
            $('.loader').css('display','none');
            toastr.success('PDF Generated and Downloaded with success!',{timeOut: 5000} ).css("width","300px");
          }

          if(type == 'send'){
              var email = $('#email').text();
              var name = $('#name').text();
              var documents = $('#document').text();
              var data = new FormData();
              var pdfA = btoa(pdf.output());
              data.append("data" , pdfA);
             // data.append("id", id);
              data.append("email" , email);
              data.append("name", name);
              data.append("document", documents);
              sendMail(data);
          }
          $('.no-print').css('display','block');
        }
    );
}


//Documents Uploaded

