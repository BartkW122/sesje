<?php
 $filepath='value.txt';
 $file=fopen($filepath,'w');
 if($file){
    fwrite($file,$_COOKIE['$name']);
    fclose($file);
 }
 header('Location: index.php');
 exit();
?>