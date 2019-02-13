<?php
widgetize('Privacy Policy','intake-privacyPolicy.html');
widgetize('Informed Consent','intake-informedConsent.html');
?>
<form class="sign form" action="<?php echo $pagename.'../../common/content/--p'.($page['number']+1).'.html'; ?>" method="post">
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
					<input type="date" id="issueinput4" class="form-control" name="datefixed" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Date Fixed" data-original-title="" title="" disabled>
				</div>
			</div>
		</div>
	</div>

	<div class="form-actions center">
		<button type="submit" class="btn btn-primary">
			<i class="fa fa-check-square-o"></i>I Agree
		</button>
	</div>
</form>