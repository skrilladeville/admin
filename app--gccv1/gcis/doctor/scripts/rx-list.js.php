function ajaxRx( RxID ){
	$('#modal .card-body').html( 'loading ...' );
	
	var dataObj = {};
	dataObj[ 'id' ] = RxID;
	dataObj[ 'tablename' ] = '<?= $tablename ?>';
	$.ajax({
		url : '<?php echo $page['apiPath']; //gcis/submit.html.php?pagename= ?>rx-editModal.htm',
		method : 'POST',
		data : dataObj,
		success : function( html ){
			$( "#modal .card-body" ).html( html );
		},
		error : function(){
			$( "#modal .card-body" ).html( '<p><span class="help-block">ERROR: </span>Something went wrong!</p>' );
		}
	});
}

$(document).ready(function(){
 	// onShow event
	$('#modal').on('show.bs.modal',function(event) {
		//alert('onShow event fired.');
		
		var button = $(event.relatedTarget) // Button that triggered the modal
		var RxID = button.data('id')
		ajaxRx( RxID );
	});
} );