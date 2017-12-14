<?php
    require_once('../admin/scripts/connect.php');
    $con = mysqli_connect($host, $usr, $pass, $db);
    $img_location = $_SERVER['DOCUMENT_ROOT'].'/promnik/img/gallery';
    $pictures = mysqli_query($con, "SELECT * FROM gallery ORDER BY picture_id DESC");
    echo '<h3>Galeria zdjęć</h3><br><br><hr><br>
        <h4>Prześlij kolejne zdjęcie</h4><br>
        <form action="/promnik/admin/panel/model/gallery_add.php" method="post" enctype="multipart/form-data">
        <input type="file" name="photo">
        <input type="submit" value="Prześlij">
        </form><br><hr><br>';
    while($photo = mysqli_fetch_assoc($pictures)) {
        echo '<div class="one-img">
            <img src="/promnik/img/gallery/'.$photo['name'].'">
            <a href="/promnik/admin/panel/model/gallery_del.php?id='.$photo['picture_id'].'">
            <button>X</button>
        </div>';
    }
    mysqli_close($con);

?>