<?php
    function new_post() {
        echo '<br><h3>Dodaj nowy post</h3><br><hr><br>
        <form action="/promnik/admin/panel/model/add_post.php" method="post" id="form" enctype="multipart/form-data">
            <label>Tytuł: </label>
            <input type="text" name="title" class="form-control col-md-5" required><br>
            <label>Treść: </label>
            <textarea name="tresc" class="col-md-5 form-control" required></textarea><br>
            <label>Zdjęcia:</label><br>
            <div id="pictures">
                <input type="file" name="pic0" class="btn"><br>
            </div>
            <input type="hidden" name="number" value="1" id="number">
            <input type="button" id="add_new_picture" value="Dodaj kolejny obrazek"><br><br>
            <input type="submit" value="Wyślij" class="btn">
        </form>
        <script src="/promnik/admin/panel/js/add_picture.js"></script>';
    }

?>