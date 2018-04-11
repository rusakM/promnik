<?php
    session_start();
    require_once('../connect.php');
    $con = mysqli_connect($host, $usr, $pass, $db);
    $id = $_GET['id'];
    $img_location = $_SERVER['DOCUMENT_ROOT'].'/promnik/img/teams';
    $photochk = mysqli_fetch_array(mysqli_query($con, "SELECT team_photo FROM teams WHERE team_id='$id'"));
    if($photochk[0] != '') {
        unlink("$img_location/$photochk[0]");
    }
    if($_FILES['photo']['error'] === 0 && $_FILES['photo']['type'] === 'image/jpeg') {
        $photo = crc32($_FILES['photo']['tmp_name']).'.jpg';
        move_uploaded_file($_FILES['photo']['tmp_name'], "$img_location/$photo");
        mysqli_query($con, "UPDATE teams SET team_photo='$photo' WHERE team_id='$id'");
    }
    mysqli_close($con);
    header('Location: /promnik/admin/panel.php?strona=edytujdruzyne&id='.$id);
?>