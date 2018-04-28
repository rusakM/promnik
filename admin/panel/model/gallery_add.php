<?php
    session_start();
    require_once('../connect.php');
    $con = mysqli_connect($host, $usr, $pass, $db);
    $img_location = $_SERVER['DOCUMENT_ROOT'].'/promnik/img/gallery';
    $d = getdate();
    $date = $d['mday'].'-'.$d['mon'].'-'.$d['year'];
    if($_FILES['photo']['error'] === 0) {
        switch($_FILES['photo']['type']){
            case 'image/jpeg':
                $image = imagecreatefromjpeg($_FILES['photo']['tmp_name']);
                break;
            case 'image/png':
                $image = imagecreatefrompng($_FILES['photo']['tmp_name']);
                break;
        }
        $photo = crc32($_FILES['photo']['tmp_name']).'.jpg';
        if(isset($image)) {
            if(imagesx($image) > 1024){
                $image = imagescale($image, 1024);
            }
            $image_thumb = imagescale($image, 160);
            imagejpeg($image_thumb, "$img_location/thumbnails/$photo", 80);
            imagejpeg($image, "$img_location/$photo", 90);
            mysqli_query($con, "INSERT INTO gallery(picture_id, name, date) VALUES(NULL, '$photo', '$date')");
            imagedestroy($image);
            imagedestroy($image_thumb);
        }
    }
    mysqli_close($con);
    header('Location: /promnik/admin/panel.php?strona=galeria');
?>