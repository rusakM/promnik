<?php
    require_once('../admin/scripts/connect.php');
    $con = mysqli_connect($host, $usr, $pass, $db);
    echo '<br><h3>Sponsorzy:</h3><br>
        <form action="/promnik/admin/panel/model/sponsors.php" method="post" enctype="multipart/form-data">
            <label>Dodaj sponsora: </label>
            <input type="text" name="name" class="form-control col-5" placeholder="Nazwa:">
            <input type="file" name="photo">
            <input type="submit" value="Dodaj" class="btn btn-primary">
        </form>
        <br>
        <hr>
        <br>';
    $sponsors = mysqli_query($con, "SELECT * FROM sponsors");
    while ($sponsor = mysqli_fetch_array($sponsors)) {
        echo '<div>';
        if($sponsor[2] != '') {
            echo '<img src="/promnik/img/sponsors/'.$sponsor[2].'"><br>';
        }
        echo '<span style="margin-left: 40px; padding-right: 50px;">'.$sponsor[1].'</span>
        <a href="/promnik/admin/panel/model/sponsor_del.php?id='.$sponsor[0].'">Usuń</a></div><hr>';
    }
?>