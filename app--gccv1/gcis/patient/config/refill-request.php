<?php 
$newPage = array( 
	'titleContent' => 'Rx Refill Request',
	// DataTables Editor
	'dataTablesEdit' => 1,
	'modalOn' => 1,
	'scriptEnd' => $pagename
);

$data = array(
	'table-rx-active' => 'rx-active'
);

$data['option']['table-rx-active'] = array(
	'buttonsHide' => array( 'edit','remove' ),
	//'editTitle' => 'Request for refill',
	//'editLabel' => '+',
	//'editModal' => 1
);