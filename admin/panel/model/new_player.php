<?php
    session_start();
    require_once('../connect.php');
    $con = mysqli_connect($host, $usr, $pass, $db);
    $img_location = $_SERVER['DOCUMENT_ROOT'].'/promnik/img/players';
    
    if(isset($_FILES['picture'])) {
        $photo = NULL;
        if($_FILES['picture']['error'] === 0 && $_FILES['picture']['type'] === 'image/jpeg') {
            $photo = crc32($_FILES['picture']['tmp_name']).'.jpg';
            $image = imagecreatefromjpeg($_FILES['picture']['tmp_name']);
            if(imagesx($image) > 480){
                $image = imagescale($image, 480);    
            }
            imagejpeg($image, "$img_location/$photo", 85);
            imagedestroy($image);
        }
    }
    else {
        $photo = NULL;
    }
    $number = $_POST['number'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $date = $_POST['date'];
    $team = $_POST['team'];

    mysqli_query($con, "INSERT INTO players(player_id, team_id, number, name, surname, birth_date, photo) VALUES (NULL, '$team','$number','$name','$surname','$date', '$photo')");
    mysqli_close($con);

    header("Location: /promnik/admin/panel.php?strona=zawodnicy&druzyna=$team");
?>