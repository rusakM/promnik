<?php
    function aktualnosci() {
        require_once('../admin/scripts/connect.php');
        $con = mysqli_connect($host, $usr, $pass, $db);
        echo '<br><h3>Aktualności</h3><br>
            <a href="../admin/panel.php?strona=nowypost"><button>Dodaj nowy post</button></a><br><hr><br>';
                $news = mysqli_query($con, "SELECT id_post, title, date FROM posts");
                while($aktualnosci = mysqli_fetch_assoc($news)) {
                    echo $aktualnosci['title']." ".$aktualnosci['date'].'<a href="../admin/panel/model/delete.php?id='.$aktualnosci['id_post'].'">Usuń</a> <a href="../admin/panel.php?strona=edytujpost&id='.$aktualnosci['id_post'].'">Edytuj</a><br>';
                }
         mysqli_close($con);
    }
   
?>