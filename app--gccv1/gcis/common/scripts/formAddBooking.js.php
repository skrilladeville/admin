<script src="<?php echo ROOT_PATH; ?>app-assets/js/scripts/forms/wizard/jquery.wizard.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){

	// Step show event
	$("#smartwizard").on("showStep", function(e, anchorObject, stepNumber, stepDirection, stepPosition) {
		 //alert("You are on step "+stepNumber+" now");
		 if(stepPosition === 'first'){
				 $("#prev-btn").addClass('disabled');
		 }else if(stepPosition === 'final'){
				 $("#next-btn").addClass('disabled');
		 }else{
				 $("#prev-btn").removeClass('disabled');
				 $("#next-btn").removeClass('disabled');
		 }
	});

	// Toolbar extra buttons
	var btnFinish = $('<button></button>').text('Finish')
																	 .addClass('btn btn-info')
																	 .on('click', function(){ alert('Finish Clicked'); });
	var btnCancel = $('<button></button>').text('Cancel')
																	 .addClass('btn btn-danger')
																	 .on('click', function(){ $('#smartwizard').smartWizard("reset"); });

	// Please note enabling option "showStepURLhash" will make navigation conflict for multiple wizard in a page.
	// so that option is disabling => showStepURLhash: false

	// Smart Wizard 1
	$('#smartwizard').smartWizard({
		selected: 0,
		theme: 'arrows',
		transitionEffect:'fade',
		showStepURLhash: false,
		toolbarSettings: {toolbarPosition: 'both',
			toolbarExtraButtons: [btnFinish, btnCancel]
		}
	});

	// Smart Wizard 2
	$('#smartwizard2').smartWizard({
		selected: 0,
		theme: 'default',
		transitionEffect:'fade',
		showStepURLhash: false
	});

});
</script>