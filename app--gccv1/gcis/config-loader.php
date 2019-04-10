<?php
/*
 * Tweak page configuration using available configuration settings
 */
list( $page['baseName'],$page['number'] ) = explode( '--p',$pagename );
if( $page['baseName'] == 'intake-form-creation' && $page['number'] ){
	$page['qty'] = 8;
	$page['titleSub'] = 'Step '. $page['number'] .' of '.$page['qty'];
}

// default page values
$pageDefault = array( 
	'contentType' => 'html',
	'classBody' => 'vertical-layout vertical-menu content-detached-left-sidebar fixed-navbar  menu-expanded pace-done',
	'title' => 'Green Card Information System',
	'titleContent' => '',
	'titleSub' => '',
	// Robust Admin
	'formCheckBoxesRadios' => 0,
	'formSwitch' => 0,
	'formRepeater' => 0,
	'formNoUIslider' => 0,
	// JQuery
	'jQuery' => 0,
	'jQueryUI' => 0,
	'autoComplete' => 0,
	// Booking by Lesster
    'formViewBooking' => 0,
    'formAddBooking' => 0,
    'formSetupCalendar' => 0,
    'formBookingArchive' => 0,
	// DataTables Editor
	'dataTablesEdit' => 0,
	// Forms	
	/* array of db table names to store form data in
	   with query pairs as values
	   e.g. array( 'gcis_users' => array( 'email' => $_POST['email'] ) )
		 NOTE: Input names should match table column names in order to be validated and saved. */
	'formDataStoreIn' => array(),
	/* by default, all input field names that match table columns are required
	   toDo: this can be automatic on table columns with "not null" disabled
	   declare the optional input names here */
	'formDataOptional' => array(),
	/* declare input field names that do not have matching table columns but are required
	   e.g. 'i_agree' */
	'formDataRequired' => array(),
	/* Javascript file to be included at footer
	   can be $pagename or a js file shared with other pages */
	'scriptEnd' => ''
);
if( is_array( $page ) )
	$page = array_merge( $page, $pageDefault );

if( is_array( $dbcon['errors'] ) )
	if( is_array( $page['errors'] ) )
		$page['errors'] = array_push( $page['errors'],$dbcon['errors'] );
	else
		$page['errors'] = $dbcon['errors'];

		$page['navFile'] = $user['role'].'/nav.html.php';
		$page['dataFile'] = $user['role'].'/data/'.$pagename.'.php';
		
// customize default page values with config/* files
if( in_array( $pagename,array( 'login--v2','register--v2' ) ) ){
	$page['configFile'] = __DIR__. '/common/config/'.$pagename.'.php';
	$page['contentFile'] = __DIR__. '/common/content/'.$pagename.'.php';
	$page['scriptEndFile'] = __DIR__. '/common/scripts/'.$pagename.'.js.php';
} else {
	$page['configFile'] = __DIR__. '/'. $user['role'].'/config/'.$pagename.'.php';
	$page['contentFile'] = __DIR__. '/'. $user['role'].'/content/'.$pagename.'.php';
	$page['scriptEndFile'] = __DIR__. '/'. $user['role'].'/scripts/'.$pagename.'.js.php';
}
//echo 'cf: '.$page['configFile'];

// NOTE: file_exists works using full path only
if( file_exists( $page['configFile'] ) ){
	include( $page['configFile'] );
	
	if( is_array( $newPage ) )
		$page = array_merge( $page, $newPage );
} else
	$page['errors'][] = 'Page configuration file <strong>'.$page['configFile'].'</strong> does not exist.';

if( $page['scriptSubmit'] )
	include_once('includes/functions-js.php');

//echo '$page: ';echo '<pre>';print_r( $page );echo '</pre>';

/*
 * Enables a corresponding $page dependency option if specified is enabled
 */
function enableIfListed( $enableItem = '',$list = array() ){
	global $page;
	
	if( !$page[ $enableItem ] )
		foreach( $list as $item )
			if( $page[ $item ] )
				$page[ $enableItem ] = 1;
}

function scriptEnder( $tagMeNot = false ){
	global $page;

	if( !$tagMeNot ){ ?>
	<script language="javascript">
	<?php }
	include ( $page['scriptEndFile'] );
	if( !$tagMeNot ){ ?>
	</script>
	<?php }
}

// auto-load dependencies
// jQuery scripts
enableIfListed( 'jQuery',array( /*'dataTablesEdit',*/'formViewBooking','formAddBooking' ) );
enableIfListed( 'jQueryUI',array( 'autoComplete' ) );

//print_r( $page );
// store values in forms if db tables are specified
if( is_array( $page['formDataStoreIn'] ) ){
	foreach( $page['formDataStoreIn'] as $dbTable => $wherePairs ){
		/*$opts = array( 
			'dataInput' => $page['dataInput'][$dbTable]
		);*/		
		
		$opts = soIfso( $page[$dbTable] );
	
		$page['formValues'][$dbTable] = autoFillForm( $dbTable,$wherePairs,$opts );
		//unset( $opts );
	}
	//echo 'fv: ';echo '<pre>';print_r( $page['formValues'] );echo '</pre>';
	
	// additional data e.g. for repeater forms
	@include( $page['dataFile'] );
}


// just to save us the trouble
if( $page['formSwitch'] )
	// of finding out that formCheckBoxesRadios is needed by formSwitch
	$page['formCheckBoxesRadios'] = 1;
if( $page['errors'] ){
	$pgErrPrepend = 'Error: ';
	$page['titleContent'] = $pgErrPrepend . $pagename;
}
if( $page['number'] ){
	$page['titleSub'] = 'Step ' . $page['number'] . ' of 8';
	$pgNumAppend = ': ' . $page['number'];
}
if( $page['titleContent'] )
	$page['title'] = $page['titleContent'] . $pgNumAppend . ' | GCIS';