<?php
    session_start();
    require_once('../connect.php');
    $con = mysqli_connect($host, $usr, $pass, $db);
    $img_location = $_SERVER['DOCUMENT_ROOT'].'/promnik/img/players';
    $id = $_GET['id'];
    $team = $_GET['team'];
    $photo = crc32($_FILES['picture']['tmp_name']).'.jpg';
    move_uploaded_file($_FILES['picture']['tmp_name'], "$img_location/$photo");
    $player_photo = mysqli_fetch_assoc(mysqli_query($con, "SELECT photo FROM players WHERE player_id='$id'"));
    if($player_photo['photo'] !== "") {
        $pp = $player_photo['photo'];
        unlink("$img_location/$pp");
    }
    mysqli_query($con, "UPDATE players SET photo='$photo' WHERE players.player_id='$id'");
    mysqli_close($con);
    header("Location: /promnik/admin/panel.php?strona=zawodnicy&druzyna=$team");
?>