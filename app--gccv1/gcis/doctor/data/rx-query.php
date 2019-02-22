<?php
$sqlDB['table'] = 'doctor_rx';
$sqlDB['showInColumn'] = array( 'id' );

$fields = array( 
	'firstname', //patient_fname
	'lastname', //patient_lname
	'birth_date', //patient_bday
	'id'
);

foreach( $fields as $colname )
	if( $colname != 'id' )
		$joinTableColNames[] = 'patient_information.'.$colname;

$query = "SELECT doctor_rx.id,". implode(',',$joinTableColNames) ." FROM ".$sqlDB['table']." LEFT JOIN patient_information ON doctor_rx.patient_id=patient_information.id WHERE doctor_rx.user_id='".$user['id']."' AND doctor_rx.active IS ". $sqlDB['active'] ."";

//echo ': '.$query;
if( !$dataFile )
	$sql = queryAndTell( $query );

$sqlSET['remove'] = "active=". ( $sqlDB['active'] == 'TRUE' ? 'FALSE' : 'TRUE' );