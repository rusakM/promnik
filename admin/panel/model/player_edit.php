<?php
    session_start();
    require_once('../admin/scripts/connect.php');
    $con = mysqli_connect($host, $usr, $pass, $db);
    $id = $_GET['id'];
    $test = mysqli_fetch_array(mysqli_query($con, "SELECT  FROM players WHERE id='$id'"));
    $data = [];
    foreach($_POST as $row) {
        array_push($data, $row);
    }

    
?>