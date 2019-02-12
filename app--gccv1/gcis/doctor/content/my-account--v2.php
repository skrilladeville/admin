<form action="" method="post">
	<div class="form-body">
<?php
widgetize( 'Personal Information','rx-healthCarePractitionerInformation--v2.html.php',$page['formValues']['doctor_accounts'] );
?>
	</div>
	<div class="form-actions">
		<div class="text-center">
			<button type="submit" name="save" id="save" class="btn btn-primary save" data-toggle="modal" data-target="#modal">
				<i class="fa fa-check-square-o"></i>Save
			</button>
		</div>
	</div>
</form>