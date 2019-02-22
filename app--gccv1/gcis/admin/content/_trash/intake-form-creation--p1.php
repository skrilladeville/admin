<form class="form" action="<?php echo $page['../../common/content/baseName'].'--p'.($page['number']+1).'.html'; ?>"  method="post">
	<div class="form-body">
<?php
widgetize('Personal Information','intake-patientPersonalInfo.html');
widgetize('Contact Information','intake-patientContactInfo.html');
widgetize('Emergency Contact Information','intake-patientEmergencyContactInfo.html');
?>
		<div class="form-actions center">
			<button formaction="<?php echo $pagename.'.html'; ?>" type="submit" class="btn btn-primary mr-1">
				<i class="ft-x"></i>Prev
			</button>
			<button type="submit" class="btn btn-primary">
				<i class="fa fa-check-square-o"></i>Next
			</button>
		</div>
	</div>
</form>