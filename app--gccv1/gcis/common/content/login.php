<?php
if( isset($_REQUEST['url']) )
	$urlAppend = '?url='.$_REQUEST['url'];
?>

<form action="./<?php echo ROOT_PATH . $urlAppend; ?>" method="post">
	<div class="form-body">
		<div class="row skin skin-flat">
			<div class="col-md-12">
				<div class="compact form-group">
					<fieldset class="form-group">
						<label>Username / Email</label>
						<input type="text" class="form-control" name="user_name" id="user_name" value="" placeholder="Username or Email Address"  required data-validation-required-message="Please enter your login username or email">
					</fieldset>
					<fieldset class="form-group">
						<label>Password</label>
						<input type="password" class="form-control" name="user_password" id="user_password" value="" placeholder="Password" required>
					</fieldset>
					<fieldset>
						<input type="checkbox" id="remember_me" name="remember_me" value="rem">
						<label id="rememberMe" for="input-1">Remember me on this browser</label>
					</fieldset>
				</div>
			</div>
		</div>
	</div>
	<div class="form-actions">
		<div class="text-center">
			<button type="submit" class="btn btn-primary"><i class="ft-unlock"></i>Login</button>
			<button type="submit" formaction="register--v2.html" class="btn btn-warning mr-1"><i class="ft-user"></i>Register
			</button>
		</div>
	</div>
</form>