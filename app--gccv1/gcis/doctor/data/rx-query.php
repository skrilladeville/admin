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
	if( !in_array( $colname,array( 'id','buttons' ) ) )
		$joinTableColNames[] = 'patient_information.'.$colname;

$query = "SELECT doctor_rx.id,". implode(',',$joinTableColNames) ." FROM ".$sqlDB['table']." LEFT JOIN patient_information ON doctor_rx.patient_id=patient_information.id WHERE doctor_rx.user_id='".$user['id']."' AND doctor_rx.active IS ". $sqlDB['active'] ."";

if( $sqlDB['active'] == 'TRUE' )
	$fields[] = 'buttons';

//echo ': '.$query;
if( !$dataFile )
	$sql = queryAndTell( $query );
	
// transform db data for display
if( is_array( $sql ) && $sqlDB['active'] == 'TRUE' ){
	foreach( $sql as $num => $rowdata ){
		$sql[ $num ]['buttons'] = '<a id="rx-active-btn-'. $rowdata['id'] .'" class="btn edit" title="Edit this prescription" data-toggle="modal" data-target="#modal" data-id="'. $rowdata['id'] . '" href="?id='. $rowdata['id'] . '">Edit</a>';
	}
	//echo '$sql: ';print_r( $sql );
}

//print_r($sql);
$sqlSET['remove'] = "active=". ( $sqlDB['active'] == 'TRUE' ? 'FALSE' : 'TRUE' );