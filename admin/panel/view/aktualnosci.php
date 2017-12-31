<?php
    function aktualnosci() {
        require_once('../admin/scripts/connect.php');
        $con = mysqli_connect($host, $usr, $pass, $db);
        echo '<br><h3>Aktualności</h3><br>
            <a href="../admin/panel.php?strona=nowypost"><button class="btn">Dodaj nowy post</button></a><br><hr><br>';
                $news = mysqli_query($con, "SELECT id_post, title, date FROM posts ORDER BY id_post DESC");
                while($aktualnosci = mysqli_fetch_assoc($news)) {
                    echo '<b>'.$aktualnosci['title']."</b> ".$aktualnosci['date'].'<a href="../admin/panel/model/delete_post.php?id='.$aktualnosci['id_post'].'">Usuń</a> <a href="../admin/panel.php?strona=edytujpost&id='.$aktualnosci['id_post'].'">Edytuj</a><br>';
                }
         mysqli_close($con);
    }
   
?>