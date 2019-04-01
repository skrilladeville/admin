<?php
/*$sqlDB['table'] = 'patient_profiles';
$sql = queryAndTell( "SELECT * FROM ".$sqlDB['table']." WHERE archive = '0'" );

$fields = array( 
	'firstname',
	'lastname',
	'email',
	'health_card',
	'id'
);*/
$sqlDB['archive'] = '0';

include 'patients-query.php';