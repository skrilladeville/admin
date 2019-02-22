<script type="text/javascript">
$(document).ready(function(){ 
	$('#submit').prop( 'disabled', true );

	var i_agree = document.getElementById("i_agree");
	i_agree.onchange = function(){
		if(this.checked)
			$('#submit').removeAttr('disabled'); //enable input
		else
			$('#submit').attr('disabled', true); //disable input
	}		
});
</script>