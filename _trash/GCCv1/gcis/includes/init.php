<?php
// ezSQL
include_once "class-ezSQLmysqli.php";

// DB connection check because it is needed to check if user still exists
/* ezSQL */
$ezSQL = new ezSQLmysqli( DB_USER,DB_PASSWORD,DB_NAME,DB_HOST );
$ezSQL->hide_errors();

/* redundant native mySQLi to be removed when ezSQL is fully implemented */
//$db = mysqli_connect('localhost','room','Algorithm007!','gcis');
$db = mysqli_connect( DB_HOST, DB_USER, DB_PASSWORD, DB_NAME );
if( mysqli_connect_errno() ){
	$dbcon['errors'][] = 'Database connection failed with following errors: ' . mysqli_connect_error();
}

session_start();

if( is_array( $_SESSION['page'] ) && isset( $_POST['save'] ) ){
	$_POST = array_merge( $_POST,$_SESSION['page'] );
	//unset( $_SESSION['page'] );
	echo '$_POST: ';echo '<pre>';print_r( $_POST );echo '</pre>';
}

$validRoles = array('patient','doctor','admin','member');

// TEMPORARY: allow current user to take on a user role
if( isset($_REQUEST['role']) ){
	if(in_array($_REQUEST['role'],$validRoles))
		$_SESSION['role'] = $_REQUEST['role'];
}

function userIsLoggedIn(){
	global $user,$validRoles;
	
	$user = array_merge( $_COOKIE,$_SESSION );
	
	if( !in_array( $user['role'],$validRoles ) )
		$user['role'] = 'patient';

	//echo '$user: ';echo '<pre>';print_r( $user );echo '</pre>';
	
	if( $_COOKIE['permission'] === "0" || $_SESSION['permission'] === "0" )
		return true;
}

function redirect( $url = ROOT_PATH.'gcis/' ){
	if( isset($_REQUEST['url']) )
		header("Location: ".$_REQUEST['url'], true, 302);
	else
		header("Location: ".$url, true, 302);
}

// Used commonly in forms and datatable column titles
$label = array(
	'firstname' 	=> 'First Name',
	'lastname' 		=> 'Last Name',
	'date_birth' 	=> 'Date of Birth',
	'health_card'	=> 'Health Card No',
	'rx_id' 			=> 'Prescription Control No',
	'doctor_rx'		=> "Doctor's Prescription",
	'doctor_accounts'		=> "Doctor Account"
);

/*
 * Formalize $name example 'first_name' into the title 'First Name'
*/
function formalize( $name = 'untitled' ){
	$words = explode( '_',$name );
	$phrase = implode( ' ',$words );
	
	return ucwords( $phrase ) ;
}

/*
 * Displays the formal title equivalent of a name
*/
function labelize( $name = 'untitled' ){
	global $label;
	
	$title = $label[$name] ? $label[$name] : formalize( $name );
	return $title;
}