<?php
    session_start();
    $team = $_GET['team'];
    $id = $_GET['id'];
    if($_FILES['pic'.$a]['error'] === 0 && $_FILES['pic'.$a]['type'] === 'image/jpeg') {
        require_once('../connect.php');
        $con = mysqli_connect($host, $usr, $pass, $db);
        $img_location = $_SERVER['DOCUMENT_ROOT'].'/promnik/img/players';
        $photo = crc32($_FILES['picture']['tmp_name']).'.jpg';
        move_uploaded_file($_FILES['picture']['tmp_name'], "$img_location/$photo");
        $player_photo = mysqli_fetch_assoc(mysqli_query($con, "SELECT photo FROM players WHERE player_id='$id'"));
        if($player_photo['photo'] !== "") {
            $pp = $player_photo['photo'];
            unlink("$img_location/$pp");
        }
        mysqli_query($con, "UPDATE players SET photo='$photo' WHERE players.player_id='$id'");
        mysqli_close($con);
    }
    header("Location: /promnik/admin/panel.php?strona=zawodnicy&druzyna=$team");
?>