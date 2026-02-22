<?php
require 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$app_id = $_ENV['FACEBOOK_APP_ID'];
$app_secret = $_ENV['FACEBOOK_APP_SECRET'];
$redirect_uri = $_ENV['FACEBOOK_REDIRECT_URI'];

if (!isset($_GET['code'])) {

    // STEP 1: Redirect to Facebook login
    $auth_url = "https://www.facebook.com/v18.0/dialog/oauth?"
        . "client_id=" . $app_id
        . "&redirect_uri=" . urlencode($redirect_uri)
        . "&scope=email";

    header("Location: " . $auth_url);
    exit();

} else {

    // STEP 2: Exchange code for access token
    $code = $_GET['code'];

    $token_url = "https://graph.facebook.com/v18.0/oauth/access_token?"
        . "client_id=" . $app_id
        . "&redirect_uri=" . urlencode($redirect_uri)
        . "&client_secret=" . $app_secret
        . "&code=" . $code;

    $response = file_get_contents($token_url);
    $token = json_decode($response, true);

    if (!isset($token['access_token'])) {
        echo "Error fetching access token";
        exit();
    }

    $access_token = $token['access_token'];

    // STEP 3: Get user info
    $user_info = file_get_contents(
        "https://graph.facebook.com/me?fields=id,name,email&access_token=" . $access_token
    );

    $user = json_decode($user_info, true);

    // session_start();
    // $_SESSION['user'] = $user;

    // echo "Welcome " . $user['name'];

    header("Location: gmail.html");
    exit();
}
?>
