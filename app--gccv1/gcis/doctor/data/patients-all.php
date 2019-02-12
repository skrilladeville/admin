<?php
$sql = $db->query("SELECT * FROM patient_information WHERE archive = '0'");

//print_r( mysqli_fetch_assoc($sql) );
while($user = mysqli_fetch_assoc($sql)) : 
	$tableData[] = array( 
		$user['firstname'],
		$user['lastname'],
		$user['email'],
		$user['health_card']
	);
endwhile;