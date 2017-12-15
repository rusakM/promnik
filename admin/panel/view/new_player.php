<?php
    echo '<br><h3>Dodaj nowego zawodnika:</h3><br><hr>
        <form action="/promnik/admin/panel/model/new_player.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="team" value="'.$_GET['druzyna'].'">
        <label>Numer:</label><input type="number" name="number" required class="form-control col-md-5"><br>
        <label>Imię:</label><input type="text" name="name" required class="form-control col-md-5"><br>
        <label>Nazwisko:</label><input type="text" name="surname" required class="form-control col-md-5"><br>
        <label>Data urodzenia:</label><input type="date" name="date" required class="form-control col-md-5"><br>
        <label>Zdjęcie:</label><input type="file" name="picture"><br><br>
        <input type="submit" value="Dodaj" class="btn col-md-2"></form>';
?>