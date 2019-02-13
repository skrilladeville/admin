<?php
$newPage = array( 
	'titleContent' => 'My Account',
	'formDataStoreIn' => array( 'doctor_accounts' => array( 'user_id' => $user['id'] )  ),
	'formDataOptional' => array( 'extension' ),
	'scriptSubmit' => 1
);