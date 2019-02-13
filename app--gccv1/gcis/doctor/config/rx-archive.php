<?php 
$newPage = array( 
	'titleContent' => 'Prescription Archive',
	// DataTables Editor
	'dataTablesEdit' => 1
);

$data = array(
	'table-rx-inactive' => 'rx-inactive'
);

$data['option']['table-rx-inactive'] = array(
	'buttonsHide' => array( 'edit' )
);