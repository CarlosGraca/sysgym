/**
 * Created by MS-INSYS on 14/10/2016.
 */
$(function () {


// DEFAULT SAVE USER FUNCTION save(_form,_form_data,form_type,callback)
//BOTÃO ADICIONAR CLIENTE
    $('#add-consult_type').click(function () {
        save($('#consult_type-form'), $('#consult_type-form')[0], 'create');
    });

//BOTÃO EDITAR CLIENTE
    $('#edit-consult_type').click(function () {
        save($('#consult_type-form'), $('#consult_type-form')[0], 'update');
    });

//var dataTable_consult_type = $('#table-consult_type').DataTable({});

    $('#add-consult_type-modal').click(function (e) {
        e.preventDefault();
        $('#myModalLabel').text('New Consult Type');
        $('#modal').modal('show')
            .find('.modal-body')
            .load($(this).data('url'));
    });

    $('#edit-consult_type-modal').click(function (e) {
        e.preventDefault();
        $('#myModalLabel').text('Update Consult Type');
        $('#modal').modal('show')
            .find('.modal-body')
            .load($(this).data('url'));
    });

});

function setTableValue(data,form_type) {
    var table = $('#table-consult_type');
    console.log(data);
    console.log(form_type);
    if(form_type == 'create'){
        table.find('.consult_type_table').append(
            '<tr data-key="'+data.id+'" role="row">' +
            '<td>'+data.id+'</td>' +
            '<td class="name">'+data.name+'</td>' +
            '<td class="price">'+data.price+'</td>' +
            '<td>' +
                '<a href="#!" id="remove"><i class="fa fa-trash"></i></a> ' +
                '<a href="#!" id="edit"><i class="fa fa-edit"></i></a>' +
            '</td>' +
            '</tr>'
        );
    }

   // dataTable_consult_type.ajax.reload();

}