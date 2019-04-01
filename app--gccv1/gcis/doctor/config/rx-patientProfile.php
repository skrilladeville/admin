<?php
//echo 'P: '.$_POST['id'];//print_r( $_POST );
//$_POST['id'] = 40;

$newPage = array( 
	'content' => $pagename,
	'formDataStoreIn' => array( 
		'patient_profiles' => array( 'id' => $_POST['id'] )
	)
);