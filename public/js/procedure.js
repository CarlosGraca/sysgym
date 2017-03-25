/**
 * Created by MS-INSYS on 14/10/2016.
 */
$(function () {


    // DEFAULT SAVE USER FUNCTION save(_form,_form_data,form_type,callback)
    //CREATE PROCEDURE GROUP
        $(document).on('click','#add-procedure',function () {
            save($('#procedure-form'), $('#procedure-form')[0], 'create');
        });

    //EDIT PROCEDURE GROUP
        $(document).on('click','#edit-procedure',function () {
            save($('#procedure-form'), $('#procedure-form')[0], 'update');
        });

    //CLICK EDIT BUTTON
    $(document).on('click','#edit-procedure-button',function () {
        $(this).css('display', 'none');
        field_status_change('enable', $('#procedure-form'));
        $('#edit-procedure').removeAttr('style');
    });


    $(document).on('click','#add-procedure-modal',function (e) {
        e.preventDefault();
        $('#myModalLabel').text($(this).attr('data-title'));
        $('#modal').modal('show')
            .find('.modal-body')
            .load($(this).data('url'));
    });

    $(document).on('click','#edit-procedure-modal',function (e) {
        e.preventDefault();
        $('#myModalLabel').text($(this).attr('data-title'));
        $('#modal').modal('show')
            .find('.modal-body')
            .load($(this).data('url'));
    });

    //DISABLE PROCEDURE CONSULT
    $(document).on('click','#disable-procedure',function () {
        change_status($(this).attr('data-key'), 'disable', $(this).attr('data-name'), $(this), 'procedure/disable', 'bg-success', 'procedure')
    });

    //ENABLE PATIENT
    $(document).on('click','#enable-procedure',function () {
        change_status($(this).attr('data-key'), 'enable', $(this).attr('data-name'), $(this), 'procedure/enable', 'bg-danger', 'procedure');
    });

});

function setTableValue(data,form_type) {
    var table = $('#table-procedure');
    console.log(data);
    console.log(form_type);
    if(form_type == 'create'){
        table.find('.procedure_table').append(
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

   // dataTable_procedure.ajax.reload();

}