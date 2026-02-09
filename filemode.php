<?php
$filer = fopen('text2.txt', 'r');
echo "File content: ".fread($filer, filesize('text2.txt'))."<br>";
fclose($filer);
$filew = fopen('text2.txt', 'w');
fwrite($filew, "This is a new line in the file.");
fclose($filew);
echo "File content after writing: ".file_get_contents('text2.txt')."<br>";
$filea = fopen('text2.txt', 'a');
fwrite($filea, "\nThis line is appended to the file.");
fclose($filea);
echo "File content after appending: ".file_get_contents('text2.txt')."<br>";
if($filex = fopen('text3.txt', 'x')){
    echo "File created successfully.<br>";
    fclose($filex);
}
else{
    echo "Failed to create file. File already exists.<br>";
}
$filewa = fopen('text3.txt', 'w+');
fwrite($filewa, "This is a new file created using fopen with 'w+' mode.");
fclose($filewa);
$filera = fopen('text3.txt', 'r+');
echo "File content: ".fread($filera, filesize('text3.txt'))."<br>";
fwrite($filera, "\nThis line is added using 'r+' mode.");
fclose($filera);
echo "File content after modification: ".file_get_contents('text3.txt')."<br>";
$fileaa = fopen('text3.txt', 'a+');
fwrite($fileaa, "\nThis line is added using 'a+' mode.");
fclose($fileaa);
echo "File content after appending: ".file_get_contents('text3.txt')."<br>";
$filexa = fopen("text4.txt","x+");
if($filexa){
    echo "File created successfully with 'x+' mode.<br>";
    fwrite($filexa, "This is a new file created using fopen with 'x+' mode.");
    rewind($filexa);
    echo "File content: ".fread($filexa, filesize('text4.txt'))."<br>";
    fclose($filexa);
} else {
    echo "Failed to create file with 'x+' mode. File already exists.<br>";
}
unlink('text3.txt');
unlink('text4.txt');
?>