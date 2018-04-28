<?php
    session_start();
    require_once('../connect.php');
    $con = mysqli_connect($host, $usr, $pass, $db);
    $img_location = $_SERVER['DOCUMENT_ROOT'].'/promnik/img/sponsors';
    $name = $_POST['name'];
    $date = date("Y-m-d");
    $author = $_SESSION['user_id'];
    if($_FILES['photo']['error'] === 0) {
        switch($_FILES['photo']['type']){
            case 'image/jpeg':
                $image = imagecreatefromjpeg($_FILES['photo']['tmp_name']);
                break;
            case 'image/png':
                $image = imagecreatefrompng($_FILES['photo']['tmp_name']);
                break;
            case 'image/gif':
                $image = imagecreatefromgif($_FILES['photo']['tmp_name']);
                break;
        }
        $photo = crc32($_FILES['photo']['tmp_name']).'.jpg';
        if(isset($image)) {
            if(imagesx($image) > 576){
                $image = imagescale($image, 576);    
            }
            imagejpeg($image, "$img_location/$photo", 90);
            mysqli_query($con, "INSERT INTO sponsors(id_sponsor, name, photo, author, date) VALUES(NULL, '$name', '$photo', '$author', '$date')");
            imagedestroy($image);
        }
        else {
            mysqli_query($con, "INSERT INTO sponsors(id_sponsor, name, photo, author, date) VALUES(NULL, '$name', NULL, '$author', '$date')");
        }
    }
    mysqli_close($con);
    header('Location: /promnik/admin/panel.php?strona=sponsorzy');
?>