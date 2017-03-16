/**
 * Created by MS-INSYS on 14/10/2016.
 */
// DEFAULT SAVE USER FUNCTION save(_form,_form_data,form_type,callback)
//BUTTON EVENT TO SAVE NEW EMPLOYEE
$('#add-secure_comparticipation').click(function(){
    save($('#secure_comparticipation-form'),$('#secure_comparticipation-form')[0],'create');
});

//BOTÃO EDITAR CLIENTE
$('#edit-secure_comparticipation').click(function(){
    save($('#secure_comparticipation-form'),$('#secure_comparticipation-form')[0],'update');
});

//$('#table-secure_comparticipation').dataTable();
