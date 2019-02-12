<?php
$newPage = array( 
	'titleContent' => 'Create Prescription',
	'formRepeater' => 1,
	'formCheckBoxesRadios' => 1,
	'formDataStoreIn' => array( 
		'doctor_accounts' => array( 'user_id' => $user['id'] )
	),
	'formDataOptional' => array( 'extension' ),
	'autoComplete' => 1,
	'scriptEnd' => $pagename
);

if( $_REQUEST['id'] )
	$Rx['id'] = $_REQUEST['id'];
elseif( $_POST['RxID'] )
	$Rx['id'] = $_POST['RxID'];

if( $Rx['id']/*isset( $_REQUEST['id'] )*/ || isset( $_POST['save'] ) )
	$newPage['formDataStoreIn']['doctor_rx'] = array( 'id' => $Rx['id'],'user_id' => $user['id'] );