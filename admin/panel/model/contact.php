<?php
    session_start();
    require_once("../connect.php");
    $con = mysqli_connect($host, $usr, $pass, $db);
    $author = $_SESSION['usr_name'];
    $date = date("Y-m-d");
    $content = nl2br($_POST['content']);
    $link = $_POST['link'];
    mysqli_query($con, "UPDATE contact SET content='$content', fb_link='$link', author='$author', date='$date' WHERE id_contact=1");
    mysqli_close($con);
    header('Location: /promnik/admin/panel.php?strona=kontakt');

?>