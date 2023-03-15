
$(document).ready(function(){
	$('.btn-import').on('click', function(){
		if (!$("#import_form").is(':visible')){
			$("#import_form").show();
		}
		else
			$("#import_form").hide();
		return false;
	});
	
	$('.btn-export').on('click', function(){
		if (!$("#export_form").is(':visible')){
			$("#export_form").show();
		}
		else
			$("#export_form").hide();
		return false;
	});
	
	$('.btn-export1').on('click', function(){
		if (!$("#export_form1").is(':visible')){
			$("#export_form1").show();
		}
		else
			$("#export_form1").hide();
		return false;
	});
	
	$('#domain_all').on('click', function(){
		if ($("#domain_all").prop("checked")==true){
			$('input[name="domain[]"]').prop("checked", true);
		}
		else
		{
			$('input[name="domain[]"]').prop("checked", false);
		}
	});
	
	$('#page_all').on('click', function(){
		if ($("#page_all").prop("checked")==true){
			$('input[name="page[]"]').prop("checked", true);
		}
		else
		{
			$('input[name="page[]"]').prop("checked", false);
		}
	});
	
});