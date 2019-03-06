<?php
/*
 * Laravel to GCCv1 content loader
*/
//global $ezSQL,$user;
function userIsLoggedIn(){
	return true;
}

$thisURL = url()->current();
$page['imgPath'] = '../../images/gccv1/';

if( $page['ext'] == 'js' )
  include( 'vuer.js.php' );
elseif( $page['ext'] == 'json' )
  include( 'jsonize--v2.json.php' );
elseif( $page['ext'] == 'htm' )
  include( 'submit.html.php' );
else
  include( 'vuer.html.php' );
