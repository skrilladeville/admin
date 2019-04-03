<?php
$fv = $page['formValues']['patient_profiles'];
//print_r( $fv );

//$page['imgPath'] = '../../images/gccv1/';
if( !$page['imgPath'] )
	$page['imgPath'] = ROOT_PATH. 'assets/images/';
?>

<div class="container">
	<div class="row">
		<div class="card-profile-image col-md-auto">
			<div class="">
				<img src="<?php echo $page['imgPath']; ?>profile-silhouette-male.png" class="rounded-circle img-border box-shadow-1" alt="Card image">
			</div>
		</div>
		<div class="col">
			<div class="row headboard first">
				<div class="col">
					Last Name
					<h2><?= $fv['lastname'] ?></h5>
				</div>
				<div class="col">
					First Name
					<h2><?= $fv['firstname'] ?></h5>
				</div>
				<div class="col-md-auto last">
					Card Nunber
					<h5><?= $fv['health_card'] ?></h5>
				</div>
			</div>
			<div class="row headboard">
				<div class="col-md-auto">
					Age
					<h5><?= $fv['birthday'] ?></h5>
				</div>
				<div class="col">
					Home Phone
					<h5><?= $fv['home_phone'] ?></h5>
				</div>
				<div class="col">
					Email
					<h5><?= $fv['email'] ?></h5>
				</div>
			</div>
		</div>
	</div>
</div>