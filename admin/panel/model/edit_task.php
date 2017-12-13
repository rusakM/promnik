<?php
    session_start();
    require_once('../connect.php');
    $con = mysqli_connect($host, $usr, $pass, $db);
    $id = $_GET['id'];
    $team = $_GET['team'];
    $hosts = $_POST['hosts'];
    $guests = $_POST['guests'];
    $score_h = $_POST['score_h'];
    $score_g = $_POST['score_g'];
    $date = $_POST['date'];
    $hour = $_POST['hour'];
    mysqli_query($con, "UPDATE schedules SET hosts='$hosts', guests='$guests', date='$date', hour='$hour', score_hosts='$score_h', score_guests='$score_g' WHERE schedule_id='$id'");
    mysqli_close($con);
    header('Location: /promnik/admin/panel.php?strona=terminarz&druzyna='.$team);
?>