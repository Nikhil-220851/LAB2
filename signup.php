<?php
require 'mongodb.php';

function registerUser() {
    global $collection;

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(empty($name) || empty($email) || empty($password)){
        die("All fields are required.");
    }

    // Check if email already exists
    $existingUser = $collection->findOne(['email' => $email]);

    if($existingUser){
        echo "Email already exists. Please <a href='index.html'> login </a>";
    } 
    else {

        // Hash password (VERY IMPORTANT)
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $insert = $collection->insertOne([
            'name' => $name,
            'email' => $email,
            'password' => $hashedPassword,
            'no_of_registers' => 1
        ]);

        if($insert->getInsertedCount() == 1){
            header("Location: index.html");
            exit();
        } 
        else {
            echo "Error creating account.";
        }
    }
}

registerUser();
?>