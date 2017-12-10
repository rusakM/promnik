<?php
    echo '<h3>Dodaj nowego zawodnika</h3><br><br>
        <form action="/promnik/admin/panel/model/new_player.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="team" value="'.$_GET['druzyna'].'">
        <label>Numer:</label><input type="number" name="number"><br>
        <label>Imię:</label><input type="text" name="name"><br>
        <label>Nazwisko:</label><input type="text" name="surname"><br>
        <label>Data urodzenia:</label><input type="date" name="date"><br>
        <label>Zdjęcie:</label><input type="file" name="picture"><br>
        <input type="submit" value="Dodaj"></form>';
?>