<?php
//echo 'P: ';print_r( $_POST );

$newPage = array( 
	'content' => $pagename,
	'formDataStoreIn' => array( 
		'patient_information' => array( 'id' => $_POST['id'] )
	)
);