<?php
    session_start();
    require_once('../connect.php');
    $con = mysqli_connect($host, $usr, $pass, $db);
    $id = $_GET['id'];
    $team = $_GET['team'];
    $num = $_POST['number'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $date = $_POST['birth_date'];
    mysqli_query($con, "UPDATE players SET number='$num', name='$name', surname='$surname', birth_date='$date' WHERE player_id='$id'");
    mysqli_close($con);
    header("Location: /promnik/admin/panel.php?strona=zawodnicy&druzyna=$team");   
?>