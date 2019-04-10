<?php
widgetize('Privacy Policy','intake-privacyPolicy.html');
widgetize('Informed Consent','intake-informedConsent.html');
    $currentDateTime = date('Y-m-d');
?>

<form class="sign form" action="<?php echo $pagename.'--p'.($page['number']+1); ?>" method="get">
	<div class="form-body">
		<h5>By filling and submitting this form I have read, understood and consent to the above information to comply, be true and correct.</h5>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="projectinput1">Patient's Signature</label>
					<input type="text" id="projectinput1" class="form-control" placeholder="Initials" name="fname" tabindex="1" required data-validation-required-message="Please enter your initials.">
					<div class="help-block"></div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="issueinput4">Date</label>
					<input type="text" class="form-control" id="issueinput4" name="date_2" placeholder="YYYY-MM-DD" value="<?= $currentDateTime; ?>" readonly>
				</div>
			</div>
		</div>
	</div>

	<?php if( !defined( 'AT_LARAVUE' ) ){ ?>
	<div class="form-actions center">
		<button type="submit" class="btn btn-primary">
			<i class="fa fa-check-square-o"></i>I Agree
		</button>
	</div>
	<?php } ?>
</form>
