<?php $fv = $_POST; ?>
<form action="" method="post" novalidate>
	<div class="form-body">
		<div class="row skin skin-flat">
			<div class="col-md-12">
				<div class="form-group">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<fieldset class="form-group">
									<label>*First Name</label>
									<input type="text" class="form-control" name="firstname" id="first_name" value="<?= $fv['firstname'] ?>" placeholder="*First Name" required data-validation-required-message="Please enter your First Name.">
								</fieldset>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<fieldset class="form-group">
									<label>*Last Name</label>
									<input type="text" class="form-control" name="lastname" id="last_name" value="<?= $fv['lastname'] ?>" placeholder="*Last Name" required data-validation-required-message="Please enter your Last Name.">
								</fieldset>
							</div>
						</div>
					</div>
			
					<fieldset class="form-group">
						<label>*User Name</label>
						<input type="text" class="form-control" name="username" id="display_name" value="<?= $fv['username'] ?>" placeholder="*User Name" required data-validation-required-message="Please enter a User Name.">
					</fieldset>
					<fieldset class="form-group">
						<label>*Email Address</label>
						<input class="form-control" type="email" name="email" id="email" value="<?= $fv['email'] ?>" placeholder="*Email Address" required data-validation-required-message="Please enter your Email Address.">
					</fieldset>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<fieldset class="form-group">
									<label>*Password</label>
									<input class="form-control" type="password" name="password" id="password" value="<?= $fv['password'] ?>" placeholder="*Password" required data-validation-required-message="Please enter your Password.">
								</fieldset>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<fieldset class="form-group">
									<label>*Confirm Password</label>
									<input class="form-control" type="password" name="password_confirmation" id="password_confirmation" value="" placeholder="*Confirm Password" required data-validation-required-message="Password & Confirm Password must be the same.">
								</fieldset>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<fieldset class="form-group">
									<p>By clicking Register, you agree to the <a href="#" data-toggle="modal" data-target="#t_and_c_m">Terms and Conditions</a> set out by this site, including our Cookie Use.</p>
								</fieldset>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<fieldset class="form-group">
									<input type="checkbox" id="i_agree" name="i_agree" value="agree">
									<label id="rememberMe" for="input-1">I Agree</label>
								</fieldset>
							</div>
						</div>
					</div>
						
					</div>
				</div>
		</div>
	</div>
	<div class="form-actions">
		<div class="text-center">
			<button type="submit" class="btn btn-primary save" name="save" id="submit" data-toggle="modal" data-target="#modal"><i class="ft-user"></i>Register</button>
			<a href="./" class="btn btn-warning"><i class="ft-x"></i>Cancel</a>
		</div>
	</div>
</form>