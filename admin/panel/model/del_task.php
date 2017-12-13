<?php
    session_start();
    require_once("../connect.php");
    $con = mysqli_connect($host, $usr, $pass, $db);
    $id = $_GET['id'];
    $team = $_GET['team'];
    mysqli_query($con, "DELETE FROM schedules WHERE schedule_id='$id'");
    mysqli_close($con);
    header('Location: /promnik/admin/panel.php?strona=terminarz&druzyna='.$team);
?>