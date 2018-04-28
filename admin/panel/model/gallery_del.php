<?php
    session_start();
    require_once('../connect.php');
    $con = mysqli_connect($host, $usr, $pass, $db);
    $img_location = $_SERVER['DOCUMENT_ROOT'].'/promnik/img/gallery';
    $id = $_GET['id'];
    $photo = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM gallery WHERE picture_id='$id'"));
    $name = $photo['name'];
    unlink("$img_location/$name");
    unlink("$img_location/thumbnails/$name");
    mysqli_query($con, "DELETE FROM gallery WHERE picture_id='$id'");
    mysqli_close($con);
    header('Location: /promnik/admin/panel.php?strona=galeria');
?>