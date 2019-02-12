<?php
$doc = $fv['doctor_diagnosis'];
$pat = $fv['patient_feedback'];

$fillBalance = ( $doc['fill_balance'] ? $doc['fill_balance'] : $doc['fill_qty'] );
$requestMax = $doc['fill_qty'] - $fillBalance;
?>
<h5><?= $doc['medical_diagnosis'] ?></h5>
<label>Prescription <a>[change dosage?]</a>:</label>
<p>You have prescribed a total of <strong><?= $doc['med_amt'] ?></strong> grams of medical marijuana per day for <strong><?= $doc['med_months'] ?></strong> months to this patient.</p>



<div class="row">
	<div class="col-md-12">
		<div class="form-group">
			<fieldset class="form-group">
<?php
//echo '$user: ';echo '<pre>';print_r( $user );echo '</pre>';

if( is_array( $pat ) )
	foreach( $pat as $key => $td ){
		//echo 'td: ';echo '<pre>';print_r( $td );echo '</pre>';
		if( ($td['user_id'] == $user['id']) )
			$editableFb = $td;
		else
			$readFb = $td;
	}
	
if( $readFb ){
?>
				<label for="message-text" class="col-form-label">Patient's Feedback:</label>
				<div><?= $readFb['feedback'] ?></div><?php } ?>
				<label for="message-text" class="col-form-label">Your Advice:</label>
				<textarea class="form-control" id="message-text" rows="4" name="feedback"><?= $editableFb['feedback'] ?></textarea>
			</fieldset>
		</div>
	</div>
</div>

<label>Fills Left <a>[change maximum allowed?]</a></label>
<div class="col">
	<div class="row board first">
		<div class="col">
			<h2><?= $fillBalance ?> of <?= $doc['fill_qty'] ?></h2>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md">
		<div class="form-group">
			<fieldset class="form-group">
				<label>Number of refills requested (Maximum of <?= $requestMax ?>):</label>
				<div class="col-lg-3"><input type="number" class="form-control" Placeholder="" name="refill_qty" id="refill_qty" <?= $requestMax === 0 ? 'disabled ' : '' ?>min="<?= $requestMax === 0 ? 0 : '1' ?>" max="<?= $requestMax ?>" value="<?= $_POST['refill_qty'] ? $_POST['refill_qty'] : $requestMax ?>"></div>
			</fieldset>
		</div>
	</div>
</div>