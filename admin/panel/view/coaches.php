<?php
    require_once('../admin/scripts/connect.php');
    $con = mysqli_connect($host, $usr, $pass, $db);
    echo '<br><h3>Trenerzy:</h3><br><hr><br>
            <form class="form-control row" action="/promnik/admin/panel/model/add_coach.php" method="post" enctype="multipart/form-data">
                <input type="text" name="name" class=" col-3" placeholder="Imię">
                <input type="text" name="surname" class=" col-3" placeholder="Nazwisko">
                <input type="file" name="photo" class="col-3">
                <input type="submit" value="Dodaj trenera" class="col-2 btn">
            </form><br><hr><br>';
    $num = 1;
    $coaches = mysqli_query($con, "SELECT * FROM coaches ORDER BY surname ASC");
    while ($coach = mysqli_fetch_assoc($coaches)) {
        echo '<div class="row" style="margin-left: 3em">
                <p><a href="/promnik/admin/panel.php?strona=edytujtrenera&id='.$coach['coach_id'].'">'.$num.' '.$coach['name'].' '.$coach['surname'].'</a>';
            if($coach['photo'] !== '') {
                echo '<img src="/promnik/img/coaches/'.$coach['photo'].'" height="52" style="margin-left: 30px; margin right: 30px">';
            }
        echo '<a href="/promnik/admin/panel/model/coach_del.php?id='.$coach['coach_id'].'">Usuń</a>
            </p></div>';
        $num++;
    }
     mysqli_close($con);

?>