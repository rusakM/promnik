<?php
    require_once('../admin/scripts/connect.php');
    $con = mysqli_connect($host, $usr, $pass, $db);
    $id = $_GET['id'];
    
    $coach = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM coaches WHERE coach_id='$id'"));
    echo '<br><h3>'.$coach['name'].' '.$coach['surname'].'</h3><br><hr><br>
            <form action="/promnik/admin/panel/model/coach_edit.php?edit=name&id='.$id.'" method="post" class="row">
                <label style="width: 90px; margin-left: 3em;">Imię: </label><br>
                <input type="text" name="name" value="'.$coach['name'].'" class="form-control col-6"><br>
                <input type="submit" value="Zmień" class="btn">
            </form>
            <br>
            <form action="/promnik/admin/panel/model/coach_edit.php?edit=surname&id='.$id.'" method="post" class="row">
                <label style="width: 90px; margin-left: 3em;">Nazwisko: </label>
                <input type="text" name="surname" value="'.$coach['surname'].'" class="form-control col-6"><br>
                <input type="submit" value="Zmień" class="btn">
            </form>
            <br>
            <figure width="300" style="margin-left: 10em">
                <img src="/promnik/img/coaches/'.$coach['photo'].'">
                <br>
                <form action="/promnik/admin/panel/model/coach_edit.php?edit=photo&id='.$id.'" method="post" enctype="multipart/form-data">
                    <br>
                    <input type="file" name="photo">
                    <input type="submit" value="Zmień" class="btn">
                </form>
            </figure>';
mysqli_close($con);
            
?>