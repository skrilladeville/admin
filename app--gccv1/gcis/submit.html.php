<?php
// PAGE
$pagename = isset($_REQUEST['pagename']) ? $_REQUEST['pagename'] : 'dashboard';

include('../config.php');
include('includes/init.php');
include('includes/functions-html.php');
include('includes/functions.php');

if( !userIsLoggedIn() ){
	//$page['errors'][] = 'Connected but not logged in.';
}

// default page values
$page = array(
	'content' => '',
);

if( in_array( $pagename,array( 'register--v2' ) ) )
	$page['configFile'] = 'common/config/'.$pagename.'.php';
else
	$page['configFile'] = $user['role'].'/config/'.$pagename.'.php';

include_once('config-loader.php');

if( empty( $_POST ) )
	$page['errors'][] = 'Connected but no data was received.';
/*elseif( empty( $page['errors'] ) && empty( $page['help'] ) )
	$page['help'][] = 'Some data received.';*/
?>
<div class="helpbox">
</div>
<?php

if($page['content']){
	$page['contentFile'] = $user['role'].'/content/'.$page['content'].'.html.php';
	@include($page['contentFile']);
}
//$page['errors'][] = 'ha';

if( $page['errors'] || $page['help'] ){
?>
<script language="javascript">
	$( ".helpbox" ).html( "<?= errorsAndHelpHTML( 'js' ); ?>" );
</script>
<?php
																			 
} // if errors/help

$_SESSION['page'] = $page['cache'];
echo '$_SESSION: ';echo '<pre>';print_r( $_SESSION );echo '</pre>';
