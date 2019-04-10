<?php
// NOTE: has to be here, not upstream
global $ezSQL,$user;

$user['role'] = $role;
$user['id'] = 27;
$dbcon = array(
    'errors' => ''
);

function userIsLoggedIn(){
	return true;
}

include(__DIR__. '/../config.php');
include('includes/functions-html.php');
include('includes/functions.php');
include('includes/init.php');

// default page values
$page = array(
	'content' => '',
	'scriptSubmit' => '',
	'formDataStoreIn' => ''
);

$page['contentFile'] = $user['role'].'/content/'.$pagename.'.php';

include_once('config-loader.php');
// include( 'content.html.php' );
?>

<div class="helpbox">
<?php echo errorsAndHelpHTML(); ?>
</div>

<?php 
if($page['contentFile'])
	@include($page['contentFile']);
		
if( $page['scriptSubmit'] || $page['modalOn'] ){
	modalize( $page['titleContent'] );
}
?>

<script>
$(document).ready(function(){
	//alert("jQuery is loaded!");
});
</script>