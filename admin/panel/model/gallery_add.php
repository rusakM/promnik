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
                $photo = crc32($_FILES['photo']['tmp_name']).'.jpg';
                break;
            case 'image/png':
                $photo = crc32($_FILES['photo']['tmp_name']).'.png';
                break;
        }
        if(isset($photo)) {
            move_uploaded_file($_FILES['photo']['tmp_name'], "$img_location/$photo");
            mysqli_query($con, "INSERT INTO gallery(picture_id, name, date) VALUES(NULL, '$photo', '$date')");
        }
    }
    mysqli_close($con);
    header('Location: /promnik/admin/panel.php?strona=galeria');
?>