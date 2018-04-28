<?php
    session_start();
    require_once('../connect.php');
    $con = mysqli_connect($host, $usr, $pass, $db);
    $img_location = $_SERVER['DOCUMENT_ROOT'].'/promnik/img/coaches';
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    mysqli_query($con, "INSERT INTO coaches(coach_id, name, surname, photo) VALUES (NULL, '$name', '$surname', '')");
    $id = mysqli_fetch_array(mysqli_query($con, "SELECT coach_id FROM coaches ORDER BY coach_id DESC"));
    $id = $id[0];
    if($_FILES['photo']['type'] === 'image/jpeg') {
        $photo = crc32($_FILES['photo']['tmp_name']).'.jpg';
        $image = imagecreatefromjpeg($_FILES['photo']['tmp_name']);
        if(imagesx($image) > 480){
                $image = imagescale($image, 480);    
            }
        imagejpeg($image, "$img_location/$photo", 90);
        mysqli_query($con, "UPDATE coaches SET photo='$photo' WHERE coach_id='$id'");
        imagedestroy($image);
    }
    mysqli_close($con);
    header('Location: /promnik/admin/panel.php?strona=trenerzy');
?>