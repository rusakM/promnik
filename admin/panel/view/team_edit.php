<?php
    require_once('../admin/scripts/connect.php');
    $con = mysqli_connect($host, $usr, $pass, $db);
    $id = $_GET['id'];
    $team_arr = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM teams WHERE team_id='$id'"));
    echo '<br><h3>'.$team_arr[1].':</h3><br><hr><br>
        <form action="/promnik/admin/panel/model/team_edit.php?id='.$id.'" method="post">
        <label>Nazwa: </label>
        <input type="text" name="name" value="'.$team_arr[1].'" class="form-control col-md-7"><br>
        <label>Opis: </label>
        <textarea name="description" class="form-control col-md-7">'.$team_arr[2].'</textarea><br>
        <label>Link do www.laczynaspilka.pl:</label>
        <input type="text" name="link" value="'.$team_arr[3].'" class="form-control col-md-7"><br>
        <input type="submit" value="Zapisz" class="btn"></form>
        <br>';
    if($team_arr[5] != "") {
        echo '<img src="/promnik/img/teams/'.$team_arr[5].'" class="col-md-5" style="width: 100%"><br>';
    }
        echo '<form action="/promnik/admin/panel/model/team_photo.php?id='.$id.'" method="post" enctype="multipart/form-data">
                <input type="file" name="photo">';
    if($team_arr[5] != "") {
        echo '<input type="submit" value="Zmień" class="btn">';
    }
    else {
        echo '<input type="submit" value="Zapisz" class="btn">';
    }
    echo '</form>';
    mysqli_close($con);
?>
    