<?php
    require_once('../admin/scripts/connect.php');
    $con = mysqli_connect($host, $usr, $pass, $db);
    $img_location = $_SERVER['DOCUMENT_ROOT'].'/promnik/img/gallery';
    $pictures = mysqli_query($con, "SELECT * FROM gallery ORDER BY picture_id DESC");
    echo '<br><h3>Galeria zdjęć</h3><br><hr><br>
        <h4>Prześlij kolejne zdjęcie:</h4><br>
        <form action="/promnik/admin/panel/model/gallery_add.php" method="post" enctype="multipart/form-data">
        <input type="file" name="photo">
        <input type="submit" value="Prześlij" class="btn">
        </form><br><hr><br>
        <div class="col-md-1"></div>
        <div class="row col-md-11">';
    while($photo = mysqli_fetch_assoc($pictures)) {
        echo '<div class="row col-md-4">
            <img src="/promnik/img/gallery/'.$photo['name'].'" class="col-12">
            <a class="col-12" href="/promnik/admin/panel/model/gallery_del.php?id='.$photo['picture_id'].'">
            <button class="btn col-12">Usuń</button>
        </div>';
    }
    echo "</div>";
    mysqli_close($con);

?>