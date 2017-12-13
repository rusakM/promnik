<?php
    session_start();
    require_once("../connect.php");
    $con = mysqli_connect($host, $usr, $pass, $db);
    $team = $_GET['team'];
    $hosts = $_POST['hosts'];
    $queue = $_POST['queue'];
    $guests = $_POST['guests'];
    $date = $_POST['date'];
    $hour = $_POST['hour'];
    mysqli_query($con, "INSERT INTO schedules(schedule_id, queue_id, hosts, guests, date, hour, score_hosts, score_guests) VALUES(NULL, '$queue', '$hosts', '$guests', '$date', '$hour', '-', '-')");
    mysqli_close($con);
    header('Location: /promnik/admin/panel.php?strona=terminarz&druzyna='.$team);
?>