<?php
session_start();
echo $_SESSION['name'];
$ilosc=0;
if (isset($_COOKIE['$name'])) {
    $ilosc = $_COOKIE['$name'];
} else {
    
    $ilosc = 0;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ilosc++;
    setcookie('$name',$ilosc,time()+500);
    echo $_COOKIE['$name'];
}

    header('Location: index.php');
    exit();
?>