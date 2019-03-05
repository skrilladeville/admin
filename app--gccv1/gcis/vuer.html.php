<?php
/*
 * Laravel to GCCv1 content loader
*/
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

//include $page['configFile'];

$page['contentFile'] = $user['role'].'/content/'.$pagename.'.php';

include_once('config-loader.php');
include( 'content.html.php' );
//include_once( 'footer.html.php' );

?>

<script>
$(document).ready(function(){
	alert("jQuery is loaded!");
});
</script>