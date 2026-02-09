<?php
if(isset($_GET['file'])){
    $filename = $_GET['file'];
    $filepath = "uploads/".$filename;
    if(file_exists($filepath)){
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header("Content-Disposition: attachment; filename=".basename($filepath));
        header("Content-Length: " . filesize($filepath));
        readfile($filepath);
        header("Location: gmail.html");
        exit();
    } else {
        echo "File not found.";
    }
}
?>