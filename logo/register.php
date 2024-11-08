<?php
session_name('auth');
session_start();
require('db.php');
if(!empty($_POST['name']) || !empty($_POST['email']) || !empty($_POST['pass'])){
    echo "name:".$_POST['name'].'<br>';
    echo "email:".$_POST['email'].'<br>';
    $password=md5($_POST['pass'].PASS_SALT);
    echo "password:".$password.'<br>';
    $dod="INSERT INTO users SET user_name='{$_POST['name']}',user_email='{$_POST['email']}',user_password='{$password}'";
    if($db->query($dod)){
        echo 'dodano uzytkownika!!';
    }else{
        //nie dodano
    }
}else{
    echo 'wypelnij wszystkie pola!!!';
}