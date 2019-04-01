<?php
global $thisURLpart;

// 90% of team members had error problems without this
ini_set('display_errors', '1');
//ini_set('error_reporting', 'E_ALL & ~E_NOTICE');
error_reporting(E_ALL & ~E_NOTICE);

// Where am I?
// Hassle-free config switching according to server location.
$homeDirPath = dirname(__FILE__) . '/';
$homeDirPath = str_replace('\\', '/', $homeDirPath);

define('HOMEDIR_PATH',$homeDirPath);
if( function_exists( 'env' ) ){
	define('DB_NAME', env('DB_DATABASE') );
	define('DB_USER', env('DB_USERNAME') );
	define('DB_PASSWORD', env('DB_PASSWORD') );
	define('DB_HOST', env('DB_HOST') );
}
if( 1 === strpos($_SERVER['DOCUMENT_ROOT'], ':/') ){
	$siteRootSubdirDepth = 2;
	define('AT_LOCALHOST',true);

	@include( 'config-custom.php' );
} else{
	define('AT_CANSPACE_SERVER',true);
	
	// 1 if the site index is in a folder, 0 if it is the domain index
	$siteRootSubdirDepth = 0;
}

if( !defined( 'DB_NAME' ) ){
	// ** Default MySQL settings ** //
	// need grant all user? 'localhost','greencar_arn','p@$$123456', 'greencar_regpatient'
	define('DB_NAME', 'greencar_gcis');
	define('DB_USER', 'greencar_pxs');
	define('DB_PASSWORD', 'QTlC{3Wbj*rt');
	define('DB_HOST', 'localhost');
}
	
date_default_timezone_set('Asia/Manila');
define( 'TIMESTAMP',time() );
define( 'SERVER_TIME',date( 'Y-m-d H:i:s',TIMESTAMP ) );

require_once ( 'gcis/includes/url.php' );

if( !$thisURL )
	$thisURL = ( isSSL() ? 'https' : 'http' ) . '://' . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
$thisURLpart = parseURLparts( $thisURL );

//Number of subdirs to site index
if ( !isset ( $siteRootSubdirDepth ) )
	$siteRootSubdirDepth = 0;

if( !$root_path )
	$root_path = goToDirLevel( 0 );
define( 'ROOT_PATH',$root_path );