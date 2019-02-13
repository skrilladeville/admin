<?php 
$newPage = array( 
	'titleContent' => 'Refill Rx Request',
	// DataTables Editor
	'dataTablesEdit' => 1,
	'modalOn' => 1,
	'scriptEnd' => $pagename
);

$data = array(
	'table-rx-refill-requests' => 'rx-refill-requests'
);


$data['option']['table-rx-refill-requests'] = array(
	//'buttonsHide' => array( 'edit','remove' ),.rand(1,10)
	//'editTitle' => 'Edit / Approve / Deny request',
	//'editLabel' => '+',
	//'editLabelAppend' => '+',
	//'editModal' => 1
);