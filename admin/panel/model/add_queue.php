<?php
    session_start();
    $team = $_GET['team'];
    require_once("../connect.php");
    $con = mysqli_connect($host, $usr, $pass, $db);
    $q = mysqli_num_rows(mysqli_query($con, "SELECT * FROM queues WHERE team_id='$team'"));
    $q++;
    mysqli_query($con, "INSERT INTO queues(queue_id, team_id, number) VALUES (NULL, '$team', '$q')");
    mysqli_close($con);
    header('Location: /promnik/admin/panel.php?strona=terminarz&druzyna='.$team);

?>