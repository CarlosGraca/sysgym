//Javascript
$(function()
{
	$( "#patient" ).autocomplete({
	    source: "/search/autocomplete",
	    minLength: 3,
	    autoFocus: true,
	    select: function(event, ui) {
		  	$('#patient').val(ui.item.value);
		  	$('#patient_id').val(ui.item.id);
		  	console.log(ui.item.id);
		  	$.getJSON('/patients/'+ui.item.id, function(data){
		  		$('#email').val(data.email);
				$('#phone').val(data.phone);
				$('#mobile').val(data.mobile);
				$('#has_secure').val(data.has_secure);
				$('.avatar-patient').attr('src','/'+data.avatar);
				//$('.tbhead').css('display','none');
				if(data.has_secure == 1){
					var secure_card_id = data.secure_card_id;
					$.getJSON('/secure_card/'+secure_card_id, function(data){
                        $('#budget_without_secure').css('display','none');
                        $('#secure_agency_id').val(data.secure_agency_id);
						$('#secure_agency').removeAttr('style');
                        $('#budget_with_secure').removeAttr('style');
					});
				}else{
                    $('#budget_with_secure').css('display','none');
                    $('#secure_agency').css('display','none');
					$('#budget_without_secure').removeAttr('style');
				}

				$('#add-budget_consult').removeClass('disabled');
				$('#budget_procedure_id').removeAttr('disabled');
				$('#budget_teeth_id').removeAttr('disabled');
			});

		}
	});
});
