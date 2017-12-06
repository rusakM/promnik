<?php 
session_start();
require_once("connect.php");

$con = mysqli_connect($host, $usr, $pass, $db);
$login = $_POST['login'];
$pass = md5($_POST['password']);
$query = mysqli_query($con, "SELECT * FROM users WHERE login = '$login' AND password = '$pass'");
if(mysqli_num_rows($query) === 1) {
    $name = mysqli_fetch_assoc($query);
    $_SESSION['usr_name'] = $name['name'];
    $_SESSION['log_status'] = 1;
    mysqli_close($con);
    header('Location: ../panel.php?strona=glowna');
}
else {
    $_SESSION['log_status'] = "Nie udało się zalogować";
    mysqli_close($con);
    header('Location: ../index.php');
}
?>