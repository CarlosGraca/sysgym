//Javascript
$(function()
{
	$("#client").autocomplete({
	    source: "/search/client/autocomplete",
	    minLength: 1,
	    autoFocus: true,
	    select: function(event, ui) {
		  	$('#client').val(ui.item.value);
		  	$('#client_id').val(ui.item.id);
		  	// console.log(ui.item.id);
		  	$.getJSON('/clients/'+ui.item.id, function(data){
		  		$('#email').val(data.email);
				$('#phone').val(data.phone);
				$('#mobile').val(data.mobile);
				$('.avatar-client').attr('src','/'+data.avatar);
				
				$('#add-matriculation_modality').removeClass('disabled');
				$('#matriculation_modality_id').removeAttr('disabled');
				$('#modality').removeAttr('disabled');

				var form = $('Form').attr('id');

				if(form == 'payment-form'){
					// console.log('Payment');
					full_modality_table();
				}
			});

		}
	});

	$("#employee").autocomplete({
		source: "/search/employee/autocomplete",
		minLength: 1,
		autoFocus: true,
		select: function(event, ui) {
			$('#employee').val(ui.item.value);
			$('#employee_id').val(ui.item.id);
		}
	});

	$("#modality").autocomplete({
		source: "/search/modality/autocomplete",
		minLength: 1,
		autoFocus: true,
		select: function(event, ui) {
			$('#modality').val(ui.item.value);
			$('#modality_id').val(ui.item.id);
		}
	});

    //EMPLOYEE CATEGORY
    $("#category").autocomplete({
        source: "/search/employee-category/autocomplete",
        minLength: 1,
        autoFocus: true,
        select: function(event, ui) {
            $('#category').val(ui.item.value);
            $('#employee_category_id').val(ui.item.id);
            $.get('/category/salary_base/' + ui.item.id, function (data) {
                $('#salary').val(data);
            });
        }
    });

});
