<?php 
// PAGE
$pagename = isset($_REQUEST['pagename']) ? $_REQUEST['pagename'] : 'login--v2';

$page = array( 
	'title' => 'Green Card Information System',
	'formCheckBoxesRadios' => 0,
	'formLoginRegister' => 1,
	'width' => 4 // 1 to 12
);

/* $page['configFile'] = 'gcis/common/config/'.$pagename.'.php';
$page['contentFile'] = 'gcis/common/content/'.$pagename.'.php';
$page['scriptEndFile'] = 'gcis/common/scripts/'.$pagename.'.js.php'; */

// reformat page values
//reconfigurePage( $page );
require_once( 'config-loader.php' );

if( $page['titleContent'] )
	$page['title'] = $page['titleContent'] . ' | GCIS';
if( isset($_REQUEST['logged-out']) )
	$page['help'][] = 'You have been logged out.';

include_once( 'head.html.php' );
?>
<body class="door vertical-layout vertical-menu 1-column   menu-expanded blank-page blank-page"
data-open="click" data-menu="vertical-menu" data-col="1-column">
<div class="app-content content">
	<div class="content-wrapper">

		<div class="content-header row">
		</div>
		<div class="content-body">

			<section class="flexbox-container">
				<div class="col-12 d-flex align-items-center justify-content-center">
					<div class="col-md-<?php echo $page['width']; ?> col-10 box-shadow-2 p-0">
						<div class="card border-grey border-lighten-3 m-0">
							<div class="card-header border-0">
								<div class="card-title text-center">
									<div id="logoArea" class="p-1">
										<img src="assets/images/logo--Green-Card.svg" class="rounded-circle" alt="branding logo">
										<img src="assets/images/logo--GCIS.svg" alt="GCIS">
									</div>
								</div>
								<?php 
								if($page['help']){
								?>
								<div class="helpbox">
								<?php
									foreach( $page['help'] as $errorMessage ){	?>
									<p><span class="help-block"><?php echo $errorMessage; ?></span></p>
								<?php } ?>
								</div>
								<?php
								} else { ?>
								<h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
									<span><?php echo $page['titleSub']; ?></span>
								</h6>
								<?php } ?>
							</div>
							<div class="card-content">
								<div class="card-body">
									<div class="helpbox">

									<?php	
								if($page['errors'])
									foreach( $page['errors'] as $errorMessage ){	?>
									<p><span class="help-block">ERROR: </span><?php echo $errorMessage; ?></p>
									<?php } ?>

									</div>
									
								<?php if(file_exists($page['contentFile']))
									@include($page['contentFile']);
								else{	?>
									<p><span class="help-block">ERROR: </span><strong><?php echo $page['contentFile']; ?></strong> does not exist.</p>
								<?php }
								?>		
								
								</div>
								<?php if( $pagename == 'login' ){ ?>
								<div class="card-footer ft-align-center">
									<p class="float-sm-right m-0">Need help? <a href="recover-password.html" class="card-link text-danger">Forgot Password</a></p>
								</div>
								<?php } ?>
								
							</div>
						</div>
					</div>
				</div>
			</section>
			
		</div>
	</div>
</div>
<?php
include_once( 'footer.html.php' );
/*if( $page['scriptEnd'])
	@include ( $page['scriptEnd'] );*/
?>
</body>
