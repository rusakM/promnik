<?php
    require_once('../admin/scripts/connect.php');
    $con = mysqli_connect($host, $usr, $pass, $db);
    $contact = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM contact WHERE id_contact=1"));
    mysqli_close($con);
    echo '<br><h3>Kontakt:</h3><br><hr>
            <form action="/promnik/admin/panel/model/contact.php" method="post">
                <label>Strona kontakt:</label><br>
                <textarea name="content" class="col-md-6" id="contact_content">'.$contact[1].'</textarea><br>
                <label>Link do Facebooka:</label><br>
                <input type="text" value="'.$contact[2].'" name="link" class="col-md-6"><br><br>
                <input type="submit" value="Zmień" class="btn">
            </form>';
?>