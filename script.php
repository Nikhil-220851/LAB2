<?php
$conn = mysqli_connect("localhost", "root", "", "testdb");

if (!$conn) {
    die("Database Connection failed");
}

echo "Database Connection successful";
?>