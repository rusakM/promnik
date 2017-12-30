<?php
    session_start();
    require_once('../connect.php');
    $con = mysqli_connect($host, $usr, $pass, $db);
    $id = $_GET['id'];
    $name = $_POST['name'];
    $desc = $_POST['description'];
    $link = $_POST['link'];
    mysqli_query($con, "UPDATE teams SET name='$name', description='$desc', link='$link' WHERE team_id='$id'");
    mysqli_close($con);
    header('Location: /promnik/admin/panel.php?strona=teams');
?>