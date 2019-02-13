<?php
include('../config.php');
include('includes/functions.php');
include('includes/init.php');

if( !userIsLoggedIn() )
	header("Location: ".ROOT_PATH."?url=".$thisURL, true, 302);

include('includes/functions-html.php');
include('container-main.html.php');