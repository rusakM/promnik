<?php
    session_start();
    require_once('../connect.php');
    $con = mysqli_connect($host, $usr, $pass, $db);
    $img_location = $_SERVER['DOCUMENT_ROOT'].'/promnik/img/coaches';
    $id = $_GET['id'];
    switch($_GET['edit']) {
        case "name":
            if(isset($_POST['name'])) {
                $name = $_POST['name'];
                mysqli_query($con, "UPDATE coaches SET name='$name' WHERE coach_id='$id'");
            }
            break;
        case "surname":
            if(isset($_POST['surname'])) {
                $surname = $_POST['surname'];
                mysqli_query($con, "UPDATE coaches SET surname='$surname' WHERE coach_id='$id'");
            }
            break;
        case "photo":
            if(isset($_FILES['photo'])) {
                $photo_name = mysqli_fetch_array(mysqli_query($con, "SELECT photo FROM coaches WHERE coach_id='$id'"));
                $photo_name = $photo_name[0];
                if($_FILES['photo']['type'] === "image/jpeg" && $_FILES['photo']['error'] === 0) {
                    unlink("$img_location/$photo_name");
                    $photo_new_name = crc32($_FILES['photo']['tmp_name']).'.jpg';
                    $image = imagecreatefromjpeg($_FILES['photo']['tmp_name']);
                    if(imagesx($image) > 480){
                        $image = imagescale($image, 480);    
                    }
                    imagejpeg($image, "$img_location/$photo_new_name", 90);
                    mysqli_query($con, "UPDATE coaches SET photo='$photo_new_name' WHERE coach_id='$id'");
                    imagedestroy($image);
                }
            }
            break;
    }
    mysqli_close($con);
    header('Location: /promnik/admin/panel.php?strona=edytujtrenera&id='.$id);
?>