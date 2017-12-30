<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/promnik/admin/panel/connect.php');
        $con = mysqli_connect($host, $usr, $pass, $db);
        $query = mysqli_query($con, "SELECT * FROM posts");
        $rows = mysqli_fetch_assoc($query);
        $content = '';
        $content += $rows['content'];
    echo $content;
?>