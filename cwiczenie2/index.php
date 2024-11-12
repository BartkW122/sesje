
<?php
session_start();
    if(!isset($_COOKIE['$name'])){
       include('form.html.php');
       if(empty($_POST['name'])){
            echo 'puste';
            setcookie('ciasteczko',0,time()+3600);
        }else{   
            $name=$_POST['name'];
            setcookie('$name',0,time()+500);
            var_dump($name);
            echo 'cookie:'.$_COOKIE['$name'];
        }
    }else{
        echo '<h1> COOKIE_VALUE('.$_COOKIE['$name'].','.$_SESSION['name'].')</h1>';
        include('przyciski.html.php');
    }
?>