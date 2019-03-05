// Multiple Remote
function split_r(val) {
		return val.split(/,\s*/);
}

function extractLast_r(term) {
		return split_r(term).pop();
}


function showPatientProfile( userID ){
	//console.log( userID );
	
	$( '#patientInfo' ).removeAttr( "class" );
	$( '#patientID' ).val( userID );
	
	var dataObj = {};
	dataObj[ 'id' ] = userID;
	$.ajax({
		url : '<?php echo $page['apiPath']; //submit.html.php?pagename=rx-patientProfile ?>rx-patientProfile.htm',
		method : 'POST',
		data : dataObj,
		success : function( html ){
			$( "#patientInfo .card-body" ).html( html );
		},
		error : function(){
			$( "#patientInfo .card-body" ).html( '<p><span class="help-block">ERROR: </span>Something went wrong!</p>' );
		}
	});
}
	
$(document).ready(function(){
	// minimize doctor information
	$('#docInfo .card-content').prop( 'class','card-content collapse' );
	$('#docInfo .ft-minus').prop( 'class','ft-plus' );
	
<?php
if( $Rx['patient_id'] ){
?>
	showPatientProfile( <?= $Rx['patient_id'] ?> );
<?php
}
?>

	$(".ac-multiple-remote")
	// don't navigate away from the field on tab when selecting an item
	.on("keydown", function(event) {
		if (event.keyCode === $.ui.keyCode.TAB &&
			$(this).autocomplete("instance").menu.active) {
			event.preventDefault();
		}
	})
	.autocomplete({
		source: function(request, response) {
			var name = request.term;
			var pars = name.split(", ");
			var tlname = '';
			var tfname = '';
			$.each( pars, function( index,value ) {
				if( index === 0 )
					tlname = value;
				if( index === 1 )
					tfname = value;
			});
			$.getJSON("<?php echo $page['apiPath']; ?>patients-searchNames.json", {
					//term: extractLast_r(request.term)
					term: tlname,
					fname: tfname
			}, response);
		},
		search: function() {
			// custom minLength
			var term = extractLast_r(this.value);
			if (term.length < 2) {
					return false;
			}
		},
		focus: function() {
				// prevent value inserted on focus
				return false;
		},
		select: function(event, ui) {
			var terms = split_r(this.value);
				//comma = '';
			// remove the current input
			terms.pop();
			// add the selected item
			terms.push(ui.item.value);
			// add placeholder to get the comma-and-space at the end
			if( terms.length === 1 ){
				terms.push("");
			} else
				showPatientProfile( ui.item.id );
			this.value = terms.join(", ");
			return false;
		}
	});

});