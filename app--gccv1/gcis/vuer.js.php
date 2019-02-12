<?php
//$pagename = isset( $_REQUEST['pagename'] ) ? $_REQUEST['pagename'] : '';

function userIsLoggedIn(){
	return true;
}

include(__DIR__. '/../config.php');
include('includes/functions-html.php');
include('includes/functions.php');
include('includes/init.php');

$page['autoFillForm'] = 0;
include_once('config-loader.php');

$page['jsFiles'] = array( 
  /* 'dataTablesEdit' => array(
    'assets\datatables-editor\js\jquery.dataTables.min.js',
    'assets\datatables-editor\js\dataTables.buttons.min.js',
    'assets\datatables-editor\js\dataTables.select.min.js',
    'assets\datatables-editor\js\buttons.html5.min.js',
    'assets\datatables-editor\js\buttons.print.min.js',
    'assets\datatables-editor\js\dataTables.editor.min.js'
  ), */
  'robustAdmin' => array(
    'assets\js\robust-admin-init.js'
  )
);

header("Content-type: application/javascript; charset=utf-8");
foreach( $page['jsFiles'] as $opt => $jsFiles ){
  if( $page[$opt] ){
    foreach( $jsFiles as $jsFile ){
      $jsContent .= file_get_contents( base_path() .'\\app--gccv1\\'. $jsFile );
    }
  }
}

echo $jsContent;

$user['id'] = 27;
$page['contentType'] = 'javascript';
// NOTE: env('APP_URL', false) is false when used in controller function
$page['apiPath'] = env('APP_URL', false) .$page['apiPath'];

if( $page['dataTablesEdit'] )
  include ( 'common/scripts/dataTablesEdit.js.php' ); 

/* if( $page['scriptEnd'] )
	include ( $page['scriptEndFile'] ); */