<?php
    $id = $_GET['druzyna'];
    require_once('../admin/scripts/connect.php');
    $con = mysqli_connect($host, $usr, $pass, $db);
    $players = mysqli_query($con, "SELECT * FROM players WHERE team_id='$id'");
    $team_name = mysqli_fetch_array(mysqli_query($con, "SELECT name FROM teams WHERE team_id='$id'"));
    
    echo '<br><h3>'.$team_name[0].'</h3><br><hr><a href="../admin/panel.php?strona=dodajzawodnika&druzyna='.$id.'">
    <button class="btn">Dodaj zawodnika</button></a><br><hr></br><div class="row">';
    while($p = mysqli_fetch_assoc($players)) {
        echo '<div class="col-12">
            <table class="text-center">
                <tr><th>Numer:</th><th>Imię:</th><th>Nazwisko:</th><th>Data urodzenia:</th><tr>
                <tr><form action="../admin/panel/model/player_edit.php?id='.$p['player_id'].'&team='.$id.'" method="post" class="col-md-12 row text-center">
                <td><input type="number" value="'.$p['number'].'" name="number"></td>
                <td><input type="text" name="name" value="'.$p['name'].'"></td>
                <td><input type="text" name="surname" value="'.$p['surname'].'"></td>
                <td><input type="date" name="birth_date" value="'.$p['birth_date'].'"></td>
                <td><input type="submit" class="btn btn-primary" value="Zapisz"></td></form>
                <td><a href="/promnik/admin/panel/model/player_del.php?id='.$p['player_id'].'&team='.$id.'">
                    <button class="btn">Usuń zawodnika</button></a></td><tr>
                </table>
        <label class="col-12">Zdjęcie:</label><br>
        <form enctype="multipart/form-data" method="post" action="/promnik/admin/panel/model/player_img.php?id='.$p['player_id'].'&team='.$id.'" class="form-control col-md-6">';
        if($p['photo'] === "") {
            echo '<input type="file" name="picture" ><br>
            <input type="submit" class="btn" value="Zapisz zdjęcie">';
        }
        else {
            echo '<img src="/promnik/img/players/'.$p['photo'].'" alt="'.$p['name'].' '.$p['surname'].'" class="photo" width="100"><br>
            <input type="file" name="picture"><br>
            <input type="submit" class="btn" value="Zmień zdjęcie"><br>';
        }
        echo '</form><br><hr><br></div>';
    }
    echo '</div>';
    mysqli_close($con);
?>