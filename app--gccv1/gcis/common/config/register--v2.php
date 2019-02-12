<?php
$newPage = array( 
	'titleContent' => 'Register',
	'titleSub' => 'Please sign up',
	'width' => 6, // 1 to 12
	'formCheckBoxesRadios' => 1,
	'jQuery' => 1,
	'scriptEnd' => 'register--v2',
	'formDataStoreIn' => array( 'gcis_users' => array( 'email' => $_POST['email'] ) ),
	'formDataOptional' => array(),
	'formDataRequired' => array( 'i_agree' )
);

// required for db table columns that doesn't have a default value
$_POST['reg_date'] = SERVER_TIME;