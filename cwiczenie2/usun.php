<?php
session_start();
    setcookie('$name',$_COOKIE['$name'],time()-500);
    header('Location: index.php');
    exit();
?>