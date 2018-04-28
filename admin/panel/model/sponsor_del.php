<?php
session_start();
$id = $_GET['id'];
require_once("../connect.php");
$con = mysqli_connect($host, $usr, $pass, $db);
$img_location = $_SERVER['DOCUMENT_ROOT'].'/promnik/img/sponsors';
$q = mysqli_query($con, "SELECT * FROM sponsors WHERE id_sponsor='$id'");
$p = mysqli_fetch_array($con, "SELECT photo FROM sponsors WHERE id_sponsor='$id'");
unlink("$img_location/$p[0]");
mysqli_query($con, "DELETE FROM sponsors WHERE id_sponsor='$id'");
mysqli_close($con);
header('Location: /promnik/admin/panel.php?strona=sponsorzy');
?>