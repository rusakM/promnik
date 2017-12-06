<?php
    session_start();
    require_once("../connect.php");
    $connect = mysqli_connect($host, $usr, $pass, $db);
    $title = $_POST['title'];
    $tresc = $_POST['tresc'];
    $author = $_SESSION['usr_name'];
    $date = date("Y-m-d");
    mysqli_query($connect, "INSERT INTO posts(id_post, title, content, author, date) VALUES (NULL, '$title', '$tresc', '$author', '$date')");
    $id_post_query = mysqli_fetch_array(mysqli_query($connect, "SELECT id_post FROM posts ORDER BY id_post DESC LIMIT 1"));
    $id_post = $id_post_query[0];
    $img_location = $_SERVER['DOCUMENT_ROOT'].'/promnik/img/posts/';
    
    for($a = 0; $a < count($_FILES); $a++) {
        if($_FILES['pic'.$a]['error'] === 0 && $_FILES['pic'.$a]['type'] === 'image/jpeg') {
            $name = crc32($_FILES['pic'.$a]['tmp_name']).'.jpg';
            move_uploaded_file($_FILES['pic'.$a]['tmp_name'], "$img_location/$name");
            mysqli_query($connect, "INSERT INTO posts_pictures (id_picture, id_post, name) VALUES (NULL, '$id_post', '$name')");
        }
    } 
    mysqli_close($connect);
    header('Location: /promnik/admin/panel.php?strona=aktualnosci');
    
?>