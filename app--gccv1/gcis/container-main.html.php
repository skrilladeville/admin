<?php
// PAGE
$pagename = isset($_REQUEST['pagename']) ? $_REQUEST['pagename'] : 'dashboard';

list( $page['baseName'],$page['number'] ) = explode( '--p',$pagename );

$page['configFile'] = $user['role'].'/config/'.$pagename.'.php';
$page['contentFile'] = $user['role'].'/content/'.$pagename.'.php';
$page['dataFile'] = $user['role'].'/data/'.$pagename.'.php';
$page['navFile'] = $user['role'].'/nav.html.php';
$page['scriptEndFile'] = $user['role'].'/scripts/'.$pagename.'.js.php';

// customize default page values with config/* files
if( !file_exists($page['configFile']) )
	$page['configFile'] = 'common/config/coming-soon.php';

// transform page values
require_once( 'config-loader.php' );

// temporary default page for missing content
if( !file_exists( $page['contentFile' ] ) )
	$page['contentFile'] = 'common/content/coming-soon.html.php';

if( !file_exists( $page['contentFile' ] ) )
	$page['errors'][] = 'Page content file <strong>'.$page['contentFile'].'</strong> does not exist.<br />If the world must know, fill this page with the content file.';


// just to save us the trouble
if( $page['formSwitch'] )
	// of finding out that formCheckBoxesRadios is needed by formSwitch
	$page['formCheckBoxesRadios'] = 1;
if( $page['errors'] ){
	$pgErrPrepend = 'Error: ';
	$page['titleContent'] = $pgErrPrepend . $pagename;
}
if( $page['number'] ){
	$page['titleSub'] = 'Step ' . $page['number'] . ' of 8';
	$pgNumAppend = ': ' . $page['number'];
}
if( $page['titleContent'] )
	$page['title'] = $page['titleContent'] . $pgNumAppend . ' | GCIS';

include_once( 'head.html.php' );
?>
<body class="<?php echo $page['classBody']; ?>">
	
	<nav class="header-navbar navbar-expand-md navbar navbar-with-menu fixed-top navbar-shadow">
		<div class="navbar-wrapper">
			<div class="navbar-header">
				<ul class="nav navbar-nav flex-row">
					<li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs is-active" href="#"><i class="ft-menu font-large-1"></i></a></li>
					<li class="nav-item"><a class="navbar-brand" href="<?php echo ROOT_PATH; ?>">
						<img class="brand-logo" alt="robust admin logo" src="<?php echo ROOT_PATH; ?>assets/images/logo--GCIS-h.svg"></li>
					<li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="fa fa-ellipsis-v"></i></a></li>
				</ul>
			</div>

			<div class="navbar-container content">
				<div class="collapse navbar-collapse" id="navbar-mobile">
					<ul class="nav navbar-nav mr-auto float-left">
					</ul>
					<ul class="nav navbar-nav float-right">         
						<li class="dropdown dropdown-language nav-item"><a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title=""><i class=""></i><span>Hi, <?php echo ucfirst($user['role']) . ' ' . $user['user_name'] ; ?></span><span class="selected-language"></span></a>
							<div class="dropdown-menu" aria-labelledby="dropdown-flag">
								<a class="dropdown-item" href="./?role=patient"><i class="fas fa-child"></i>Patient</a>
								<a class="dropdown-item" href="./?role=doctor"><i class="fas fa-user-md"></i>Doctor</a>
								<a class="dropdown-item" href="./?role=admin"><i class="fas fa-crown"></i>Admin</a>
								<a class="dropdown-item" href="<?php echo ROOT_PATH; ?>?logout"><i class="fas fa-lock"></i>Logout</a>
								<!--<a class="dropdown-item" href="./?role=member"><i class="flag-icon flag-icon-de"></i> Member</a>-->
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</nav>
	
	<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow " data-scroll-to-active="true">
		<div class="main-menu-content">
		<?php include($page['navFile']); ?>
		</div>
	</div>
	
	<div class="app-content content">
		<div class="content-wrapper">
			<?php include( 'content.html.php' ); ?>
		</div>
	</div>

	<?php
	//if(!$page['dataTablesEdit'])
	include_once( 'footer.html.php' );
	?>
</body>
</html>