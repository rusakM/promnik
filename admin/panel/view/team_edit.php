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
        <input type="submit" value="Zapisz" class="btn"></form>';
    mysqli_close($con);
?>
    