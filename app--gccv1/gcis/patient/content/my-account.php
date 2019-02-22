<form action="" method="post">
	<div class="form-body">
<?php
widgetize('Personal Information','intake-patientPersonalInfo.html');
widgetize('Contact Information','intake-patientContactInfo.html');
?>
	</div>
	<div class="form-actions">
		<div class="text-center">
			<button type="submit" class="btn btn-primary">
				<i class="fa fa-check-square-o"></i>Save
			</button>
		</div>
	</div>
</form>