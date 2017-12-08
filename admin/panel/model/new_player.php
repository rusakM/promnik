<?php
    session_start();
    require_once('../connect.php');
    $con = mysqli_connect($host, $usr, $pass, $db);
    $img_location = $_SERVER['DOCUMENT_ROOT'].'/promnik/img/players';
    
    if(isset($_FILES['picture'])) {
        $photo = NULL;
        if($_FILES['picture']['error'] === 0 && $_FILES['picture']['type'] === 'image/jpeg') {
            $photo = crc32($_FILES['picture']['tmp_name']).'.jpg';
            move_uploaded_file($_FILES['picture']['tmp_name'], "$img_location/$photo");
        }
    }
    else {
        $name = NULL;
    }
    $number = $_POST['number'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $date = $_POST['date'];
    $team = $_POST['team'];

    mysqli_query($con, "INSERT INTO players(player_id, team_id, number, name, surname, birth_date, photo) VALUES (NULL, '$team','$number','$name','$surname','$date', '$photo')");
    mysqli_close($con);
    
?>