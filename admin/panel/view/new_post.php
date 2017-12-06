<?php
    function new_post() {
        echo '<h3>Dodaj nowy post</h3><br><br><hr><br>
        <form action="/promnik/admin/panel/model/add_post.php" method="post" id="form" enctype="multipart/form-data">
            <label>Tytuł: </label>
            <input type="text" name="title"><br>
            <label>Treść: </label>
            <textarea name="tresc"></textarea><br>
            <label>Zdjęcia:</label><br>
            <div id="pictures">
                <input type="file" name="pic0"><br>
            </div>
            <input type="hidden" name="number" value="1" id="number">
            <input type="button" id="add_new_picture" value="Dodaj kolejny obrazek"><br>
            <input type="submit" value="Wyślij">
        </form>
        <script src="/promnik/admin/panel/js/add_picture.js"></script>';
    }

?>