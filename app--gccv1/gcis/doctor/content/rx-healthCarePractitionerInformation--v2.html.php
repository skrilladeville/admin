<?php 
// abbreviate the values var
$fv = $values;
?>

<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			<label>First name</label>
			<fieldset class="form-group">
        <input type="text" id="doc_fname" class="form-control" placeholder="First name" name="fname" tabindex="1" required data-validation-required-message="Please enter your first name." value="<?= $fv['fname']; ?>">
			</fieldset>
		</div>
	</div>

	<div class="col-md-6">
		<div class="form-group">
			<label>Last name</label>
			<fieldset class="form-group">
        <input type="text" id="doc_lname" class="form-control" placeholder="Last name" name="lname" tabindex="1" required data-validation-required-message="Please enter your last name." value="<?= $fv['lname']; ?>">
			</fieldset>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			<label>Profession</label>
			<fieldset class="form-group">
        <input type="text" id="doc_profession" class="form-control" placeholder="Profession" name="profession" tabindex="1" required data-validation-required-message="Please enter your profession." value="<?= $fv['profession']; ?>">
			</fieldset>
		</div>
	</div>

	<div class="col-md-6">
		<div class="form-group">
			<fieldset class="form-group">
				<label>Medical licence number</label>
        <input type="text" id="doc_licensenumber" class="form-control" placeholder="Medical licence number" name="license_num" tabindex="1" required data-validation-required-message="Please enter your license number." value="<?= $fv['license_num']; ?>">
				<p class="badge-default badge-info block-tag text-left"><small class="block-area white">Identify licensing province if different than that of your clinic</small></p>
			</fieldset>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="form-group">
			<fieldset class="form-group">
				<label>Clinic/Business name</label>
        <input type="text" id="doc_clinicname" class="form-control" placeholder="Clinic/Business name" name="clinic_name" tabindex="1" required data-validation-required-message="Please enter your clinic or business name."
                   value="<?= $fv['clinic_name']; ?>">
			</fieldset>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="form-group">
			<fieldset class="form-group">
				<label>Street address</label>
        <input type="text" id="doc_street_add" class="form-control" placeholder="Street address" name="street_address" tabindex="1" required data-validation-required-message="Please enter clinic street address."
                   value="<?= $fv['street_address']; ?>">
			</fieldset>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-5">
		<div class="form-group">
			<fieldset class="form-group">
				<label>City</label>
        <input type="text" id="doc_city" class="form-control" placeholder="City" name="city" tabindex="1" required data-validation-required-message="Please enter city." value="<?= $fv['city']; ?>">
			</fieldset>
		</div>
	</div>
	<div class="col-md-5">
		<div class="form-group">
			<fieldset class="form-group">
				<label>Province</label>
        <input type="text" id="doc_province" class="form-control" placeholder="Province" name="province" tabindex="1" required data-validation-required-message="Please enter province." value="<?= $fv['province']; ?>">
			</fieldset>
		</div>
	</div>	
	<div class="col-md-2">
		<div class="form-group">
			<fieldset class="form-group">
				<label>Postal code</label>
        <input type="text" id="doc_postal_code" class="form-control" placeholder="Postal Code" name="postal_code" tabindex="1" required data-validation-required-message="Please enter postal code." value="<?= $fv['postal_code']; ?>">
			</fieldset>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-3">
		<div class="form-group">
			<fieldset class="form-group">
				<label>Telephone</label>
        <input type="text" id="doc_telephone" class="form-control" placeholder="###-####" name="telephone" tabindex="1" required data-validation-required-message="Please enter telephone number." value="<?= $fv['telephone']; ?>">
			</fieldset>
		</div>
	</div>
	<div class="col-md-2">
		<div class="form-group">
			<fieldset class="form-group">
				<label>Ext.</label>
        <input type="text" id="doc_extension" class="form-control" placeholder="123" name="extension" tabindex="1"
                   value="<?= $fv['extension']; ?>">
			</fieldset>
		</div>
	</div>	
	<div class="col-md-3">
		<div class="form-group">
			<fieldset class="form-group">
				<label>Fax</label>
        <input type="text" id="doc_fax" class="form-control" placeholder="Fax" name="doc_fax" tabindex="1" value="<?= $doc_fax; ?>" >
			</fieldset>
		</div>
	</div>	
	<div class="col-md-4">
		<div class="form-group">
			<fieldset class="form-group">
				<label>Email</label>
        <input type="text" id="doc_email" class="form-control" placeholder="myemail@email.com" name="email" tabindex="1" required data-validation-required-message="Please enter email address." value="<?= $fv['email']; ?>">
			</fieldset>
		</div>
	</div>
</div>