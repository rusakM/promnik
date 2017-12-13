<?php
    session_start();
    $id = $_GET['id'];
    $team = $_GET['team'];
    require_once("../connect.php");
    $con = mysqli_connect($host, $usr, $pass, $db);
    mysqli_query($con, "DELETE FROM queues WHERE queues.queue_id='$id'");
    mysqli_close($con);
    header('Location: /promnik/admin/panel.php?strona=terminarz&druzyna='.$team);

?>