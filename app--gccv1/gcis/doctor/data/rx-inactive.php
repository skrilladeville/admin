<?php
/*$sqlDB['table'] = 'doctor_rx';
$sqlDB['showInColumn'] = array( 'id' );
if( !$dataFile )
	$sql = queryAndTell( "SELECT * FROM ".$sqlDB['table']." WHERE user_id='".$user['id']."' AND active IS FALSE" );

$fields = array( 
	'patient_fname',
	'patient_lname',
	'patient_bday',
	'id'
);*/

$sqlDB['active'] = 'FALSE';
//$sqlSET['remove'] = "active=TRUE";

include 'rx-query.php';