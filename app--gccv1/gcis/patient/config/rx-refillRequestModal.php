<?php 
$diagnosisID = $_REQUEST['id'] ? $_REQUEST['id'] : $_POST['id'];
$query = "SELECT * FROM doctor_diagnosis WHERE id=". $diagnosisID;

$newPage = array( 
	'formDataStoreIn' => array( 
		//'doctor_diagnosis' => array( 'id' => $_POST['id'] ),
		'patient_feedback' => array( 'diagnosis_id' => $_POST['id'] )
	),
	'patient_feedback' => array( 'LIMIT' => 2 ),
	'formValues' => array( 
		'doctor_diagnosis' => queryAndTell( $query )[0]
	),
	'content' => $pagename,
	'scriptSubmit' => 1
);

//echo 'pg: ';print_r( $newPage );

$doc = $newPage['formValues']['doctor_diagnosis'];
$fillBalance = ( $doc['fill_balance'] ? $doc['fill_balance'] : $doc['fill_qty'] );
$requestMax = $doc['fill_qty'] - $fillBalance;

// during save
if( isset( $_POST['save'] ) ){
	$newPage['patient_feedback'] = array( 'LIMIT' => 1 );

	// validate $_POST refill values before autofill()
	if( $requestMax ){
		if( $_POST['refill_qty'] > $requestMax ){
			$_POST['refill_qty'] = $requestMax;
			$page['help'][] = 'Your refill request exceeds the maximum allowed and was set to '. $_POST['refill_qty']. ' instead.';
		} elseif( $_POST['refill_qty'] < 1 ){
			$_POST['refill_qty'] = 1;
			$page['help'][] = 'Your refill request was too low and set to '. $_POST['refill_qty']. ' instead.';
		}
	}
	
	$newPage['patient_feedback']['dataInput'] = array( 'id' => false,'diagnosis_id' => $diagnosisID );
	if( ( $_POST['refill_qty'] > 0 ) || !empty( $_POST['feedback'] ) )
		$newPage['formDataStoreIn']['patient_feedback'] = array( 'id' => $_POST['feedback_id'] );
	else{
		unset( $newPage['formDataStoreIn']['patient_feedback'] );
		$page['errors'][] = 'Nothing to submit!';
	}
}