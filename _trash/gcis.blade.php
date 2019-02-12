<?php
use Illuminate\Support\Facades\Auth;

if (Auth::check()) {
    echo 'user is logged in';
} else{
    echo 'not logged in';}
//Auth::logout();

// Get the currently authenticated user...
$user = Auth::user();

// Get the currently authenticated user's ID...
$id = Auth::id();
$accessToken = $_COOKIE['XSRF-TOKEN'];
$client = new GuzzleHttp\Client();
$response = $client->request('GET', 'http://gcis.pxs/jwt/user', [
    'headers' => [
        'Accept' => 'application/json',
        'X-CSRF-TOKEN' => $accessToken,
        'Authorization' => 'Bearer '.$accessToken,
    ],
]);
//print_r($response);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>GCIS v1</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <h1>Boot Laravel <?php echo 'token is '.$accessToken; ?></h1>
    @auth
    <p>Is logged in</p>
    @endauth
</body>
</html>