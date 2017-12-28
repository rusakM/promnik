<?php
    if(isset($_POST['team'])) {
        require_once("../connect.php");
        $connect = mysqli_connect($host, $usr, $pass, $db);
        $name = $_POST['team'];
        mysqli_query($connect, "INSERT INTO teams (team_id, name) VALUES (NULL, '$name')");
        mysqli_close($connect);
    }
    header('Location: /promnik/admin/panel.php?strona=teams');
?>