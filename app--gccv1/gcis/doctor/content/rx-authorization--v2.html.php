<?php 
  /*date_default_timezone_set('Asia/Manila');
  $date_now = date("Y-m-d");*/
?>

<p>I (the Health Care Practitioner) choose to submit the Medical Document electronically directly to CanniMed. I acknowledge that this digital Medical Document is now the original, and the completed form must be kept as a copy in my records. By initialing, I attest that this Medical Document will not be provided to another Licensed Producer or to the patient.</p>
<div class="row">
	<div class="col-md-5 ml-auto">
		<div class="form-group">
			<fieldset class="form-group">
				<label>Health care practitioner initial here if submitting electronically</label>
				<input type="text" class="form-control" Placeholder="*Practitioner Initial" name="doctor_initial" id="prac_initial" value="<?= $fv['doctor_initial'] ?>">
			</fieldset>
		</div>
	</div>
</div>
<div class="form-group file-repeater">
<div data-repeater-list="repeater-list">
<?php
//$formreps = $fv['repeater-list'];
	
if( is_array( $fv['repeater-list'] ) )
	foreach( $fv['repeater-list'] as $newfv ){ ?>
	<div data-repeater-item>
		<?php
		$newfv['widgetType'] = 'form-repeater';
		//$newfv['groupName'] = 'diagnosis';
		widgetize('Medical diagnosis','rx-medical-diagnosis.html',$newfv);
		?>
	</div>
	<?php } ?>
</div>
<p class="badge-default badge-info block-tag text-left"><small class="block-area white">Note: Applicant can possess a maximum of 150g or 30 times their daily amount, whichever is less. Under the Access to Cannabis for Medical Purposes Regulations, maximum authorization is a period of 12 months and begins the day the Medical Document is signed by the HCP.</small></p>
<button type="button" data-repeater-create class="btn btn-primary">
	<i class="ft-plus"></i>Add new diagnosis
</button>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group">
			<fieldset class="form-group">
				<p>I, (the Health Care Practitioner) attest that the information in this document is correct and complete.</p>
			</fieldset>
		</div>
	</div>
	<div class="col-md-2">
		<div class="form-group">
			<fieldset class="form-group">
				<label>Number of Fills</label>
				<input type="number" class="form-control" Placeholder="" name="fill_qty" id="prac_signature" value="<?= $fv['fill_qty'] ? $fv['fill_qty'] : '1' ?>">
			</fieldset>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-8">
		<div class="form-group">
			<fieldset class="form-group">
				<label>Health Care Practitioner's signature</label>
				<input type="text" class="form-control" Placeholder="*Practitioner's Initials" name="doctor_signature" id="prac_signature" value="<?= $fv['doctor_signature'] ?>">
			</fieldset>
		</div>
	</div>

	<div class="col-md-4">
		<div class="form-group">
			<fieldset class="form-group">
				<label>Date</label>
				<p><?= $fv['date_modified'] ? $fv['date_modified'] : SERVER_TIME ?></p>
			</fieldset>
		</div>
	</div>
</div>

