<?php
$Rx = $page['formValues']['doctor_rx'];

//echo 'fv: ';print_r( $Rx );
if( isset( $_POST['save'] ) && $Rx['result']['id'] )
	$Rx['id'] = $Rx['result']['id'];

$args = array( 'LIMIT' => 'no','processItems' => array( 'repeater-list' ) );
if( $Rx['id'] ){
	$diagnoses = autoFillForm( 'doctor_diagnosis',array( 'rx_id' => $Rx['id'],'active' => 1 ),$args );
	
	$page['titleContent'] = 'Edit Prescription';
}
	
//echo 'ds: ';print_r( $diagnoses['result'] );
// compare prev replist with submitted
$repList['IDsDiff'] = cancelOutSame( $diagnoses['result'],$_POST['repeater-list'] );
//echo 'p-rl: ';print_r( $_POST['repeater-list'] );
//echo 'rl: ';print_r( $repList );
							 
if( is_array( $repList['IDsDiff'] ) )
	foreach( $repList['IDsDiff'] as $key => $deactive )
		updateOrInsert( 'doctor_diagnosis',array( 'id' => $deactive ,'rx_id' => $Rx['id'],'active' => 0 ) );
							 
if( $diagnoses['repeater-list'] )
	$formreps = $diagnoses['repeater-list'];
elseif( $diagnoses[0] )
 	$formreps = $diagnoses;
else
	$formreps[] = array();

//$page['formValues']['doctor_rx']['repeater-list'] = $formreps;
$Rx['repeater-list'] = $formreps;