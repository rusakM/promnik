<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/promnik/admin/panel/connect.php');
        $con = mysqli_connect($host, $usr, $pass, $db);
        $query = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM contact"));
        echo $query['content'];
?>
