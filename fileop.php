<?php
$filepath = 'text.txt';
$fileop = fopen($filepath, 'r+');
echo fread($fileop, filesize($filepath))."<br>";
fwrite($fileop, ">> MY NAME IS BOBBADHI NEERAJ <<");
echo fread($fileop, filesize($filepath))."<br>";
echo file_get_contents($filepath);
file_put_contents($filepath, ">> MY NAME IS BOBBADHI NIKHIL <<");
echo "<br>".file_get_contents($filepath);
fclose($fileop);
echo "<br>File exists: ".file_exists($filepath)."<br>";
echo "File size: ".filesize($filepath)."<br>";
echo "File type: ".filetype($filepath)."<br>";
echo "File access time: ".fileatime($filepath)."<br>";
echo "File modified time: ".filemtime($filepath)."<br>";
echo "File creation time: ".filectime($filepath)."<br>";
echo "File permissions: ".fileperms($filepath)."<br>";
echo "File owner: ".fileowner($filepath)."<br>";
echo "File group: ".filegroup($filepath)."<br>";
echo "File inode: ".fileinode($filepath)."<br>";
if(copy($filepath, 'text1.txt')){
    echo "File copied successfully.<br>";
} else {
    echo "Failed to copy file.<br>";
}
$name = fopen('name.php', 'w');
fclose($name);
if(rename('name.php', 'name1.php')){
    echo "File renamed successfully.<br>";
} else {
    echo "Failed to rename file.<br>";
}
if(unlink('name1.php')){
    echo "File deleted successfully.<br>";
} else {
    echo "Failed to delete file.<br>";
}
if(mkdir('myfolder')){
    echo "Directory created successfully.<br>";
} else {
    echo "Failed to create directory.<br>";
}
if(rmdir('myfolder')){
    echo "Directory removed successfully.<br>";
} else {
    echo "Failed to remove directory.<br>";
}
if(is_file($filepath)){
    echo "$filepath is a file.<br>";
} else {
    echo "$filepath is not a file.<br>";
}
if(is_dir('myfolder')){
    echo "myfolder is a directory.<br>";
} else {
    echo "myfolder is not a directory.<br>";
}
print_r(scandir('.'));
$dir = opendir('uploads');
while(($file = readdir($dir)) !== false){
    echo $file."<br>";
}
chdir('uploads');
echo "Current working directory: ".getcwd()."<br>";
chdir('..');
echo "Current working directory: ".getcwd()."<br>";
closedir($dir);
$files = fopen('text1.txt', 'a');
if(flock($files, LOCK_EX)){
    fwrite($files, ">> LOCKED FILE <<");
    flock($files, LOCK_UN);
} else {
    echo "Could not lock file.<br>";
}
fclose($files);
?>