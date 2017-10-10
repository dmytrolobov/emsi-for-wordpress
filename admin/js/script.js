jQuery(document).ready(function($) {	
	$('#ems_integration input:checkbox:checked').each(function(){
		var str = $(this).attr("id");
		var check = str.replace("wow_", "");
		$( "input[name='ems_integration["+check+"]']" ).val(1);	
		});
	
	$('#ems_integration input[type="checkbox"]').change(function () {
		var str = $(this).attr("id");
		var check = str.replace("wow_", "");
		if($(this).prop('checked')){			
			$( "input[name='ems_integration["+check+"]']" ).val(1);			
		}
		else {
			$( "input[name='ems_integration["+check+"]']" ).val(0);
		}
	});	
	
	mailchimp();
	getresponse();
	activecampaign();
	aweber();
	sendinblue();
})

function mailchimp(){
	if (jQuery('#wow_mailchimp').is(':checked')){
		jQuery('#mailchimp').css('display', '');
	}
	else {
		jQuery('#mailchimp').css('display', 'none');
	}	
}

function getresponse(){
	if (jQuery('#wow_getresponse').is(':checked')){
		jQuery('#getresponse').css('display', '');
	}
	else {
		jQuery('#getresponse').css('display', 'none');
	}	
}

function activecampaign(){
	if (jQuery('#wow_activecampaign').is(':checked')){
		jQuery('#activecampaign').css('display', '');
	}
	else {
		jQuery('#activecampaign').css('display', 'none');
	}	
}

function aweber(){
	if (jQuery('#wow_aweber').is(':checked')){
		jQuery('#aweber').css('display', '');
	}
	else {
		jQuery('#aweber').css('display', 'none');
	}	
}

function sendinblue(){
	if (jQuery('#wow_sendinblue').is(':checked')){
		jQuery('#sendinblue').css('display', '');
	}
	else {
		jQuery('#sendinblue').css('display', 'none');
	}	
}