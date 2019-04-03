<?php
$sqlDB['table'] = 'doctor_diagnosis';
//$sqlDB['active'] = 'TRUE';
//$sqlDB['showInColumn'] = array( 'rx_id' );

$fields = array( 
	'date_added',
	'rx_id',
	'lastname',
	'medical_diagnosis',
	'fill_qty',
	'id',
	'refill_qty'
);

foreach( $fields as $colname )
	if( !in_array( $colname,array( 'lastname','refill_qty' ) ) )
		$joinTableColNames[] = $sqlDB['table'].".".$colname;

// doctor_rx.user_id='".$user['id']."' AND 
$query = "SELECT patient_profiles.lastname,patient_feedback.refill_qty,doctor_diagnosis.fill_balance,". implode(',',$joinTableColNames) ." FROM ".$sqlDB['table']." 
LEFT JOIN doctor_rx ON doctor_diagnosis.rx_id=doctor_rx.id 
LEFT JOIN patient_profiles ON doctor_rx.patient_id=patient_profiles.id 
LEFT JOIN patient_feedback ON doctor_diagnosis.id=patient_feedback.diagnosis_id
WHERE doctor_diagnosis.active IS ". $sqlDB['active'] ."";

//echo ': '.$query;
if( !$dataFile )
	$sql = queryAndTell( $query );

// transform db data for display
if( is_array( $sql ) ){
	foreach( $sql as $num => $rowdata ){
		//echo '$rowdata: ';print_r( $rowdata );
		$fillBalance = ( $rowdata['fill_balance'] ? $rowdata['fill_balance'] : $rowdata['fill_qty'] );
		$requestMax = $rowdata['fill_qty'] - $fillBalance;
		$sql[ $num ]['fill_qty'] = $fillBalance .' of '. $rowdata['fill_qty'];
		$sql[ $num ]['refill_qty'] = '<a id="rx-active-btn-'. $rowdata['id'] .'" class="btn edit" title="Request for refill" data-toggle="modal" data-target="#modal" data-id="'. $rowdata['id'] . '" href="?id='. $rowdata['id'] . '">+'. $rowdata['refill_qty'] . '</a>';
	}
	//echo '$sql: ';print_r( $sql );
}

$sqlSET['remove'] = "active=". ( $sqlDB['active'] == 'TRUE' ? 'FALSE' : 'TRUE' );