<?php
$conn = mysqli_connect("localhost", "root", "", "testdb");
if (!$conn) {
    die("Database Connection failed");
}
function registerUser(){
    global $conn;
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    static $register_count = 0;
    $row = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    if (mysqli_num_rows($row)>0):
        echo "Email already exists. Please <a href='index.html'> login </a>";
    else:
        $register_count++;
        $insert = mysqli_query($conn, "INSERT INTO users (name, email, password,no_of_registers) VALUES ('$name', '$email', '$password','$register_count')");
        if ($insert) {
            header("Location: index.html");
            exit();
        } else {
            print "Error creating account.";
        }
    endif;
}
registerUser();
mysqli_close($conn);
?>