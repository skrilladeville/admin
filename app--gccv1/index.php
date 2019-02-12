<?php
include_once('config.php');
require_once('gcis/includes/init.php');

// log out current user
if( isset($_REQUEST['logout']) ){
	if(isset($_SESSION['user_name']) AND isset($_SESSION['permission'])){
		unset($_SESSION['user_name']);
		unset($_SESSION['permission']);
		unset($_SESSION['hash']);
	}
	session_destroy();

	if(isset($_COOKIE['user_name']) AND isset($_COOKIE['permission'])){
		setcookie("user_name", "", time() - (86400 * 30), "/");
		setcookie("permission", "", time() - (86400 * 30), "/");
		setcookie("hash", "", time() - (86400 * 30), "/");
	}
	
	header("Location: ".ROOT_PATH."?logged-out", true, 302);
} elseif( userIsLoggedIn() )
	redirectTo();

include('gcis/includes/functions.php');
include('gcis/includes/functions-html.php');
include('gcis/container-login.html.php');