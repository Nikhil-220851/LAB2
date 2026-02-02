<?php 
$conn = mysqli_connect("localhost","root","","testdb");
if(!$conn){
    die("Database Connection failed: " . mysqli_connect_error());
}
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$row = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND password='$password'");
if(mysqli_num_rows($row)==1){
    header("Location: index.html");
    exit();
} else {
    echo "Invalid email or password. Please <a href='index.html'> try again </a>";
}
?>