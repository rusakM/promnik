<?php
    session_start();
    require_once('../connect.php');
    $con = mysqli_connect($host, $usr, $pass, $db);
    $img_location = $_SERVER['DOCUMENT_ROOT'].'/promnik/img/coaches';
    $id = $_GET['id'];
    $photo = mysqli_fetch_array(mysqli_query($con, "SELECT photo FROM coaches WHERE coach_id='$id'"));
    mysqli_query($con, "DELETE FROM coaches WHERE coach_id='$id'");
    if($photo[0] !== "") {
        unlink("$img_location/$photo[0]");
    }
    mysqli_close($con);
    header('Location: /promnik/admin/panel.php?strona=trenerzy');
?>