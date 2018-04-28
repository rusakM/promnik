<?php
    session_start();
    require_once('../connect.php');
    $con = mysqli_connect($host, $usr, $pass, $db);
    $id = $_GET['id'];
    $img_location = $_SERVER['DOCUMENT_ROOT'].'/promnik/img/posts';
    print_r($_GET);
    switch($_GET['edit']) {
        case 'title':
            $title = $_POST['title'];
            mysqli_query($con, "UPDATE posts SET title='$title' WHERE id_post='$id'");
            break;
        case 'content':
            $content = $_POST['content'];
            mysqli_query($con, "UPDATE posts SET content='$content' WHERE id_post='$id'");
            break;
        case 'delete_img':
            $pic = $_GET['pic'];
            $arr = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM posts_pictures WHERE id_picture='$pic'"));
            $name = $arr['name'];
            unlink("$img_location/$name");
            mysqli_query($con, "DELETE FROM posts_pictures WHERE id_picture='$pic'");
            break;
        case 'new_picture':
            if($_FILES['new_pic']['error'] === 0 && $_FILES['new_pic']['type'] === 'image/jpeg') {
                $name = crc32($_FILES['new_pic']['tmp_name']).'.jpg';
                $image = imagecreatefromjpeg($_FILES['new_pic']['tmp_name']);
                if(imagesx($image) > 1024){
                    $image = imagescale($image, 1024);    
                }
                imagejpeg($image, "$img_location/$name", 90);
                mysqli_query($con, "INSERT INTO posts_pictures (id_picture, id_post, name) VALUES (NULL, '$id', '$name')");
                imagedestroy($image);
            }
            break;
    }
    $link = "/promnik/admin/panel.php?strona=edytujpost&id=$id";
    mysqli_close($con);
    header("Location: $link");
?>