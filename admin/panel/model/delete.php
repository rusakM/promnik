<?php
session_start();
$id = $_GET['id'];
require_once("../connect.php");
$con = mysqli_connect($host, $usr, $pass, $db);
$img_location = $_SERVER['DOCUMENT_ROOT'].'/promnik/img/posts';
$q = mysqli_query($con, "SELECT * FROM posts_pictures WHERE id_post='$id'");
for($a = 0; $a < mysqli_num_rows(mysqli_query($con, "SELECT * FROM posts_pictures WHERE id_post='$id'")); $a++) {
    $s = mysqli_fetch_assoc($q);
    $name = $s['name'];
    unlink("$img_location/$name");
}
mysqli_query($con, "DELETE FROM posts WHERE id_post='$id'");
mysqli_close($con);
header('Location: /promnik/admin/panel.php?strona=aktualnosci');
?>