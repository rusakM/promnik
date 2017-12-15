<?php
    require_once('../admin/scripts/connect.php');
    $con = mysqli_connect($host, $usr, $pass, $db);
    $id = $_GET['id'];
    $player = mysqli_fetch_assoc(mysqli_query($con, "SELECT login, name, email FROM users WHERE id_user='$id'"));
    echo '<br><h3>Mój profil:</h3><br><hr><br>
            <h5><p>Imię i nazwisko: '.$player['name'].'</p>
                <p>Login: '.$player['login'].'</p>
                <p>Email: '.$player['email'].'</p>
            </h5>
            <a href="/promnik/admin/panel.php?strona=edytujprofil&id='.$id.'">
                <button class="btn-primary btn">Edytuj profil</button>
            </a>';
    mysqli_close($con);
?>