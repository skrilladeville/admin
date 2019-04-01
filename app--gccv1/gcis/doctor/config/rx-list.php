<?php 
$newPage = array( 
	'titleContent' => 'View Prescription List',
	// DataTables Editor
	'dataTablesEdit' => 1,
	'modalOn' => 1,
	'scriptEnd' => $pagename
);

$data = array(
	'table-rx-active' => 'rx-active'
);


$data['option']['table-rx-active'] = array(
	'editPage' => 'rx-create--v2.html'
);