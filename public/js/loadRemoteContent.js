$(document).on('ajax:success', '.btn[data-remote]', function(e, data, status, xhr) {

  var target = $('#modal');
  target.find('.modal-body').html(xhr.responseText);
  target.modal('show');

  target.on('ajax:success', 'form[data-remote]', function(e, data, status, xhr) {
    $('#content').html(xhr.responseText);
    target.modal('hide');
    location.reload();
  });

  target.on('ajax:error', 'form[data-remote]', function(e, data, status, xhr) {
    target.find('#alert-box')
      .show()
      .find('ul')
      .html(toList(data.responseJSON));
  });
  
});

function toList(messages) {
  var converted = '';
  $.each(messages, function(key, value)
  {
    converted += '<li>' + value + '</li>';
  });
  return converted;
}

$('document').ready(function(){

    //triggered when modal is about to be shown
  $('#confirmDelete').on('show.bs.modal', function(e) {

      var url = $(e.relatedTarget).data('url');
      var title = $(e.relatedTarget).data('title');
      console.log(title);

      var id = $(e.relatedTarget).data('id');
      var name = $(e.relatedTarget).data('name');

      $("#confirmDelete #pName").val( name );

      var modal = $(this);
      modal.find('.modal-body #pName').text(name);
      modal.find('.modal-title #pTitle').text(title);

      $("#delForm").attr('action', url + id );
  });
});

$('#destroy-btn').bind('ajax:success', function(e, data, status, xhr){
    $(e.target).closest('tr').remove();
    console.log("Deleted resource #"+data);
});