<?php
 session_name('auth');
 session_start();
 require('db.php');
 
 if(!empty($_POST['email']) || !empty($_POST['pass'])){
    echo 'email:'.$_POST['email'].'<br>';
    echo 'pass:'.$_POST['pass'].'<br>';
    $password_log=md5($_POST['pass'] . PASS_SALT);
    echo 'pass_log:'.$password_log.'<br>';
    $zap="SELECT * FROM users WHERE user_email='{$_POST['email']}' AND user_password='$password_log'";
    $result=$db->query($zap);
    if($result->num_rows > 0){
      while($row=$result->fetch_assoc()){
         //echo 'name:'.$row['user_name'];
         $date=date('Y-m-d H:m:s');
         $_SESSION['user']['id']=$row['id'];
         $_SESSION['user']['name']=$row['user_name'];
         $_SESSION['user']['last_login']=$row['user_last_login'];
         $upd="UPDATE users SET user_session_id='{$_COOKIE['auth']}',user_last_login='$date' WHERE id='{$row['id']}'";
         session_regenerate_id(true);
         if($db->query($upd)){
            echo 'edytowano!!';
         }else{
            //nie ma uzytkownika!!
         }
      }
      echo "jest uzytkownik";
      $_SESSION['alert']['confirm']='witamy ponownie '.$_SESSION['user']['name'].' ostatnio logowales sie '.$_SESSION['user']['last_login'];
      header('Location: index.php');
      exit();
    }else{
       echo 'nie ma takiego uzytkownika!!!';
       $_SESSION['alert']['error']='nie mat takiego uzytkownika!';
       header('Location: index.php');
      exit();
    }
 }else{
    echo 'wypelnij wszystkie pola!!!';
 }