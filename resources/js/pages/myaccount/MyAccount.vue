<template>
 <el-row :gutter="20" class="row">
    <el-col :span="24" :key="index">
	<el-card class="box-card">
		<div slot="header" class="clearfix">
    		<span>Personal Information</span>
  		</div>
		<form action="" method="post">
			<div class="form-body" v-if="userRole=='patient'">
				<section> <!--Personal Info-->
					<div class="row">
						<div class="form-group col-md-5 mb-2">
							<label for="projectinput1">First Name</label>
							<input type="text" id="projectinput1" class="form-control" placeholder="First Name" name="fname" required data-validation-required-message="Please enter your first name.">
						</div>
						<div class="form-group col-md-2 mb-2">
							<label for="eventInput3">Middle Initial</label>
							<input type="text" id="eventInput3" class="form-control" placeholder="MI" name="middle-initial">
						</div>
						<div class="form-group col-md-5 mb-2">
							<label for="projectinput2">Last Name</label>
							<input type="text" id="projectinput2" class="form-control" placeholder="Last Name" name="lname" required data-validation-required-message="Please enter your last name.">
						</div>
					</div>

					<div class="row">
						<div class="col-md-5">
							<div class="form-group">
								<label for="issueinput3">Date of Birth</label>
								<input type="date" id="issueinput3" class="form-control" name="dateopened" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Date of Birth" data-original-title="" title="" required data-validation-required-message="Please enter your birth date.">
							</div>
						</div>
						<div class="form-group col-md-2 mb-2">
							<label for="eventInput3">Weight</label>
							<input type="text" id="eventInput3" class="form-control" placeholder="Weight" name="middle-initial">
						</div>
						<div class="form-group col-md-2 mb-2">
							<label for="issueinput6">lbs/kg</label>
							<select id="issueinput6" name="status" class="form-control" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Unit" data-original-title="" title="">
								<option value="not started" selected>lbs</option>
								<option value="started">kg</option>
							</select>
						</div>
					</div>

					<div class="row">
						<div class="form-group col-md-5 mb-2">
							<label for="projectinput1">Health Card</label>
							<input type="text" id="projectinput1" class="form-control" placeholder="Health Card" name="fname" required data-validation-required-message="Please enter your Health Card.">
						</div>
					</div>

					<div class="row">
						<div class="form-group col-md-5 mb-2">
							<label for="projectinput1">Passport No.</label>
							<input type="text" id="projectinput1" class="form-control" placeholder="Passport No." name="fname">
						</div>
					</div>

					<div class="row">
						<div class="form-group col-md-5 mb-2">
							<label for="projectinput1">Driver's License</label>
							<input type="text" id="projectinput1" class="form-control" placeholder="Driver's License" name="fname">
						</div>
					</div>
				</section>
				<section><!--Contact Info-->
					<div class="row">
						<div class="form-group col-md-5 mb-2">
							<label for="projectinput1">Best Contact #</label>
							<input type="text" id="projectinput1" class="form-control" placeholder="Mobile Phone No." name="fname">
						</div>
						<div class="form-group col-md-5 mb-2">
							<label for="projectinput2">Alternate Phone</label>
							<input type="text" id="projectinput2" class="form-control" placeholder="Home Phone No." name="lname">
						</div>
					</div>

					<div class="row">
						<div class="form-group col-md-5 mb-2">
								<label for="projectinput2">Fax Phone No.</label>
								<input type="text" id="projectinput2" class="form-control" placeholder="Fax Phone No." name="lname">
						</div>
						<div class="form-group col-md">
							<label for="donationinput2">Email</label>
							<input type="email" id="donationinput2" class="form-control square" placeholder="email" name="email">
						</div>
					</div>
					
					<div class="row">
						<div class="form-group col-md">
							<label>Address 1</label>
							<input class="form-control border-primary" id="userinput7" type="" placeholder="Address 1" required data-validation-required-message="Please enter your address.">
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md">
							<label>Address 2</label>
							<input class="form-control border-primary" id="userinput7" type="" placeholder="Address 1">
						</div>
					</div>
				</section>
			</div>
			<div class="form-body" v-else> <!--Doctor's-->
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>First name</label>
							<fieldset class="form-group">
						<input type="text" id="doc_fname" class="form-control" placeholder="First name" name="fname" tabindex="1" required data-validation-required-message="Please enter your first name." value="">
							</fieldset>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label>Last name</label>
							<fieldset class="form-group">
						<input type="text" id="doc_lname" class="form-control" placeholder="Last name" name="lname" tabindex="1" required data-validation-required-message="Please enter your last name." value="">
							</fieldset>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Profession</label>
							<fieldset class="form-group">
						<input type="text" id="doc_profession" class="form-control" placeholder="Profession" name="profession" tabindex="1" required data-validation-required-message="Please enter your profession." value="">
							</fieldset>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<fieldset class="form-group">
								<label>Medical licence number</label>
						<input type="text" id="doc_licensenumber" class="form-control" placeholder="Medical licence number" name="license_num" tabindex="1" required data-validation-required-message="Please enter your license number." value="">
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
								value="">
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
								value="">
							</fieldset>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-5">
						<div class="form-group">
							<fieldset class="form-group">
								<label>City</label>
						<input type="text" id="doc_city" class="form-control" placeholder="City" name="city" tabindex="1" required data-validation-required-message="Please enter city." value="">
							</fieldset>
						</div>
					</div>
					<div class="col-md-5">
						<div class="form-group">
							<fieldset class="form-group">
								<label>Province</label>
						<input type="text" id="doc_province" class="form-control" placeholder="Province" name="province" tabindex="1" required data-validation-required-message="Please enter province." value="">
							</fieldset>
						</div>
					</div>	
					<div class="col-md-2">
						<div class="form-group">
							<fieldset class="form-group">
								<label>Postal code</label>
						<input type="text" id="doc_postal_code" class="form-control" placeholder="Postal Code" name="postal_code" tabindex="1" required data-validation-required-message="Please enter postal code." value="">
							</fieldset>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<fieldset class="form-group">
								<label>Telephone</label>
						<input type="text" id="doc_telephone" class="form-control" placeholder="###-####" name="telephone" tabindex="1" required data-validation-required-message="Please enter telephone number." value="">
							</fieldset>
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
							<fieldset class="form-group">
								<label>Ext.</label>
						<input type="text" id="doc_extension" class="form-control" placeholder="123" name="extension" tabindex="1"
								value="">
							</fieldset>
						</div>
					</div>	
					<div class="col-md-3">
						<div class="form-group">
							<fieldset class="form-group">
								<label>Fax</label>
						<input type="text" id="doc_fax" class="form-control" placeholder="Fax" name="doc_fax" tabindex="1" value="" >
							</fieldset>
						</div>
					</div>	
					<div class="col-md-4">
						<div class="form-group">
							<fieldset class="form-group">
								<label>Email</label>
						<input type="text" id="doc_email" class="form-control" placeholder="myemail@email.com" name="email" tabindex="1" required data-validation-required-message="Please enter email address." value="">
							</fieldset>
						</div>
					</div>
				</div>
			</div>
			<div class="form-actions">
				<div class="text-center">
					<button type="submit" class="btn btn-primary">
						<i class="fa fa-check-square-o"></i>Save
					</button>
				</div>
			</div>
		</form>
	</el-card>
    </el-col>
 </el-row>
</template>

<script>

	export default {
		data() {
			return {
			 userRole: this.$store.getters.role
			}
		},
		methods: {
        },
	}
</script>

<style rel="stylesheet/scss" lang="scss">
</style>
