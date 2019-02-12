<?php
$newPage = array( 
	'titleContent' => 'Login',
	'titleSub' => 'Please login with your credentials',
	'formCheckBoxesRadios' => 1,
);

if($_POST){
	$user_name = ((isset($_POST['username'])) ? $_POST['username'] : '');
	$user_password = ((isset($_POST['password'])) ? $_POST['password'] : '');
	$remember_me = ((isset($_POST['remember_me'])) ? $_POST['remember_me'] : '');

	require_once('gcis/includes/init.php');
	
	$query = $db->query("SELECT * FROM gcis_users WHERE username = '$user_name' || email = '$user_name'");
	$count_uname = mysqli_num_rows($query);

	if($count_uname > 0){
		$query = $db->query("SELECT password FROM gcis_users 
												 WHERE (username = '$user_name' || email = '$user_name') AND password = '$user_password'");
		$count_pass = mysqli_num_rows($query);

		if($count_pass > 0){
			// was SELECT permission
			$query = $db->query("SELECT * FROM gcis_users 
													 WHERE (username = '$user_name' || email = '$user_name') AND password = '$user_password' LIMIT 1");
			while( $user = mysqli_fetch_assoc($query) ){
				if( $remember_me == "rem" ){
					define( 'LOGIN_EXPIRY', time() + (86400 * 3) ); // 86400 = 1 day
					
					setcookie("user_name", $user_name, LOGIN_EXPIRY, "/");
					setcookie("permission", $user['permission'], LOGIN_EXPIRY, "/");
					setcookie("id", $user['id'], LOGIN_EXPIRY, "/");
				}else{
					$_SESSION["user_name"] = $user_name;
					$_SESSION["permission"] = $user['permission'];
					$_SESSION["id"] = $user['id'];
				}

				if($permission['permission'] == 0){
					redirectTo();
				}
				break;
			}
		}else
			$newPage['help'][] = 'Incorrect login!'; //password
	}else
		$newPage['help'][] = 'Incorrect login!'; //Username or Email Address
}