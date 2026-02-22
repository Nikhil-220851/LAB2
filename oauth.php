<?php
require 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$client_id = $_ENV['GOOGLE_CLIENT_ID'];
$client_secret = $_ENV['GOOGLE_CLIENT_SECRET'];
$redirect_uri = $_ENV['REDIRECT_URI'];

if (!isset($_GET['code'])) {

    $auth_url = "https://accounts.google.com/o/oauth2/v2/auth?"
        . "client_id=" . $client_id
        . "&redirect_uri=" . urlencode($redirect_uri)
        . "&response_type=code"
        . "&scope=" . urlencode("email profile");

    header("Location: " . $auth_url);
    exit();

} else {

    $code = $_GET['code'];

    $token_url = "https://oauth2.googleapis.com/token";

    $data = [
        "code" => $code,
        "client_id" => $client_id,
        "client_secret" => $client_secret,
        "redirect_uri" => $redirect_uri,
        "grant_type" => "authorization_code"
    ];

    $options = [
        "http" => [
            "header"  => "Content-type: application/x-www-form-urlencoded",
            "method"  => "POST",
            "content" => http_build_query($data)
        ]
    ];

    $context  = stream_context_create($options);
    $response = file_get_contents($token_url, false, $context);

    $token = json_decode($response, true);

    if (!isset($token['access_token'])) {
        echo "Error fetching access token";
        exit();
    }

    $access_token = $token['access_token'];

    $user_info = file_get_contents(
        "https://www.googleapis.com/oauth2/v2/userinfo?access_token=" . $access_token
    );

    // $user = json_decode($user_info, true);

    // session_start();
    // $_SESSION['user'] = $user;

    // echo "Welcome " . $user['name'];
    header("Location: gmail.html");
    exit();
}
?>
