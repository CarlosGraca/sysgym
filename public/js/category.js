/**
 * Created by MS-INSYS on 14/10/2016.
 */
$(function () {


// DEFAULT SAVE USER FUNCTION saveUser(_form,_form_data,form_type,callback)
//BOTÃO ADICIONAR CLIENTE
    $('#add-category').click(function () {
        save($('#category-form'), $('#category-form')[0], 'create');
    });

//BOTÃO EDITAR CLIENTE
    $('#edit-category').click(function () {
        save($('#category-form'), $('#category-form')[0], 'update');
    });

//GET SALARY BY CATEGORY
    $('#category').on('change', function () {
        var category = $(this).val();
        if (category != 0) {
            $.get('/category/salary_base/' + category, function (data) {
                $('#salary').val(data);
            });
        }
    });


    $('#table-category').dataTable({
        /*"processing": true,
        "serverSide": true,
       // "ajax": "/category_all",
        "columns": [
            {"data": "id"},
            {"data": "name"},
            {"data": "salary_base"},
            {"data": "id"}
        ],*/
    });

});
//$('#table-category').dataTable();
