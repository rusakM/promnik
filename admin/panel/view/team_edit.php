<?php
    require_once('../admin/scripts/connect.php');
    $con = mysqli_connect($host, $usr, $pass, $db);
    $id = $_GET['id'];
    $team_arr = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM teams WHERE team_id='$id'"));
    echo '<h3>'.$team_arr[1].':</h3><br><br><hr><br>
        <form action="/promnik/admin/panel/model/team_edit.php?id='.$id.'" method="post">
        <label>Nazwa: </label>
        <input type="text" name="name" value="'.$team_arr[1].'"><br>
        <label>Opis: </label>
        <textarea name="description">'.$team_arr[2].'</textarea><br>
        <input type="submit" value="Zapisz"></form>';
    mysqli_close($con);
?>
    