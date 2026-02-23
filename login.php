<?php
require 'mongodb.php';   // include connection file
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

if(empty($email) || empty($password)){
    die("All fields are required");
}

// Find user by email
$user = $collection->findOne(['email' => $email]);

if($user){

    if(password_verify($password, $user['password'])){
        $_SESSION['user'] = $user['name'];
        header("Location: gmail.html");
        exit();
    } else {
        echo "Invalid email or password. Please <a href='index.html'> try again </a>";
    }

} else {
    echo "Invalid email or password. Please <a href='index.html'> try again </a>";
}
?>