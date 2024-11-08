<?php
    session_name('auth');
    session_start();
    require('db.php');
    if(isset($_SESSION['user'])){
        include('wybor.php');
        echo '<h1>'.$_SESSION['alert']['confirm'].'</h1>';
    }else{
        include('wybor.php');
        echo '<h1>'.$_SESSION['alert']['error'].'</h1>';
    }
?>
