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
                $photo = crc32($_FILES['photo']['tmp_name']).'.jpg';
                break;
            case 'image/png':
                $photo = crc32($_FILES['photo']['tmp_name']).'.png';
                break;
        }
        if(isset($photo)) {
            move_uploaded_file($_FILES['photo']['tmp_name'], "$img_location/$photo");
            mysqli_query($con, "INSERT INTO sponsors(id_sponsor, name, photo, author, date) VALUES(NULL, '$name', '$photo', '$author', '$date')");
        }
        else {
            mysqli_query($con, "INSERT INTO sponsors(id_sponsor, name, photo, author, date) VALUES(NULL, '$name', NULL, '$author', '$date')");
        }
    }
    mysqli_close($con);
    header('Location: /promnik/admin/panel.php?strona=sponsorzy');
?>