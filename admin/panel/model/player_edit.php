<?php
    session_start();
    require_once('../connect.php');
    $con = mysqli_connect($host, $usr, $pass, $db);
    $id = $_GET['id'];
    $test = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM players WHERE player_id='$id'"));
    $cols = mysqli_query($con, "SELECT * FROM players");
    $columns = [];
    while($col = mysqli_fetch_field($cols)) {
        array_push($columns, $col->name);
    }
    $data = [];
    foreach($_POST as $row) {
        array_push($data, $row);
    }
    $b = 0;
    $c = 2;
    for($a = 2; $a < count($test) - 1; $a++) {
        if($test[$a] !== $data[$b]) {
            mysqli_query($con, "UPDATE players SET ".$columns[$c]."=".$data[$b]."WHERE player_id='$id'");
        }
        $b++;
        $c++;
    }

    
?>