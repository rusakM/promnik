<?php
    $id = $_GET['druzyna'];
    require_once('../admin/scripts/connect.php');
    $con = mysqli_connect($host, $usr, $pass, $db);
    $players = mysqli_query($con, "SELECT * FROM players WHERE team_id='$id'");
    $team_name = mysqli_fetch_array(mysqli_query($con, "SELECT name FROM teams WHERE team_id='$id'"));
    
    echo '<h3>'.$team_name[0].'</h3><br><br><a href="../admin/panel.php?strona=dodajzawodnika&druzyna='.$id.'"><button>Dodaj zawodnika</button></a><hr>';
    while($p = mysqli_fetch_assoc($players)) {
        echo '<div class="row"><form action="../admin/panel/model/player_edit.php?id='.$p['player_id'].'" method="post">
        <label>Numer:</label><input type="number" value="'.$p['number'].'" name="number">
        <label>Imie:</label><input type="text" name="name" value="'.$p['name'].'">
        <label>Nazwisko</label><input type="text" name="surname" value="'.$p['surname'].'">
        <label>Data urodzenia:</label><input type="date" name="birth_date" value="'.$p['birth_date'].'">
        <input type="submit" value="Zapisz zmiany"></form><br>
        <label>Zdjęcie:</label><br>
        <form enctype="multipart/form-data" method="post" action="../admin/panel.model/player_img.php?id='.$p['player_id'].'">';
        if($p['photo'] === "") {
            echo '<input type="file" name="photo"><br>
            <input type="submit" value="Zapisz zdjęcie">';
        }
        else {
            echo '<img src="/promnik/img/players/'.$p['photo'].'" alt="'.$p['name'].' '.$p['surname'].'" class="photo" width="80"><br>
            <input type="file" name="photo"><br>
            <input type="submit" value="Zmień zdjęcie">';
        }
        echo '</form><a href="/promnik/admin/panel/model/player_del.php?id='.$p['player_id'].'&team='.$id.'">
            <button>Usuń zawodnika</button></a></div>';
    }
    mysqli_close($con);
?>