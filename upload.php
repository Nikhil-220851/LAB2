<?php
if(isset($_POST['upload'])){
    $filename = $_FILES['myfile']['name'];
    $tempfilename = $_FILES['myfile']['tmp_name'];
    $folder = "uploads/".$filename;
    if(move_uploaded_file($tempfilename, $folder)){
        echo "File uploaded successfully.";

        echo "<a href='download.php?file=$filename'>Download $filename</a>";
    } else {
        echo "Failed to upload file.";
    }
}
?>