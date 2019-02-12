<?php
$sqlDB['table'] = 'patient_information';

//global $ezSQL;
//print_r($ezSQL);exit();
if( in_array( $page['contentType'],array('html','json') ) )
	$sql = queryAndTell( "SELECT * FROM ".$sqlDB['table']." WHERE archive = '". $sqlDB['archive'] ."'" );

//echo 'sql is '. $sql;
//exit();

$fields = array( 
	'firstname',
	'lastname',
	'email',
	'health_card',
	'id'
);

$sqlSET['remove'] = 'archive='. ( $sqlDB['archive'] == '1' ? '0' : '1' );