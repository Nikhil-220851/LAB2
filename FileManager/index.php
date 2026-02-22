<!DOCTYPE html>
<html>
<head>
    <title>Advanced File Manager</title>

    <style>
        body{
            font-family: Arial;
            background:#f4f6f9;
        }

        .container{
            width:80%;
            margin:auto;
            margin-top:40px;
        }

        .card{
            background:white;
            padding:20px;
            margin-bottom:25px;
            border-radius:8px;
            box-shadow:0 0 10px rgba(0,0,0,0.1);
        }

        table{
            width:100%;
            border-collapse: collapse;
        }

        th, td{
            padding:10px;
            border-bottom:1px solid #ddd;
            text-align:left;
        }

        th{
            background:#007bff;
            color:white;
        }

        .btn{
            padding:6px 12px;
            text-decoration:none;
            border-radius:4px;
            color:white;
            margin-right:5px;
        }

        .download{ background:green; }
        .delete{ background:red; }
        .upload-btn{
            background:#007bff;
            color:white;
            padding:8px 15px;
            border:none;
            border-radius:4px;
            margin-top:10px;
        }
    </style>
</head>

<body>

<div class="container">

<div class="card">
<h2>Upload File</h2>

<form method="post" enctype="multipart/form-data">
<input type="file" name="fileToUpload" required>
<br>
<input type="submit" name="submit" value="Upload" class="upload-btn">
</form>

<?php
$target_dir = "uploads/";

if(isset($_POST['submit'])){
    $file = basename($_FILES["fileToUpload"]["name"]);
    $target_file = $target_dir . $file;

    if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)){
        echo "<p style='color:green;'>Uploaded successfully</p>";
    } else {
        echo "<p style='color:red;'>Upload failed</p>";
    }
}

/* DELETE FUNCTION */
if(isset($_GET['delete'])){
    $delete_file = $target_dir . $_GET['delete'];
    if(file_exists($delete_file)){
        unlink($delete_file);
        echo "<p style='color:red;'>File deleted</p>";
    }
}
?>

</div>

<div class="card">
<h2>Uploaded Files</h2>

<table>
<tr>
<th>File Name</th>
<th>Size (KB)</th>
<th>Last Modified</th>
<th style="text-align:right;">Actions</th>
</tr>

<?php
if(is_dir($target_dir)){
    $files = scandir($target_dir);

    foreach($files as $file){
        if($file != "." && $file != ".."){

            $path = $target_dir . $file;
            $size = round(filesize($path)/1024,2);
            $time = date("d-m-Y H:i:s", filemtime($path));

            echo "<tr>";
            echo "<td>$file</td>";
            echo "<td>$size KB</td>";
            echo "<td>$time</td>";
            echo "<td style='text-align:right;'>
                    <a class='btn download' href='$path' download>Download</a>
                    <a class='btn delete' href='?delete=$file'>Delete</a>
                  </td>";
            echo "</tr>";
        }
    }
}
?>

</table>

</div>

</div>

</body>
</html>
