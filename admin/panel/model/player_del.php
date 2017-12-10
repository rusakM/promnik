<?php
session_start();
$id = $_GET['id'];
$team = $_GET['team'];
require_once("../connect.php");
$con = mysqli_connect($host, $usr, $pass, $db);
$img_location = $_SERVER['DOCUMENT_ROOT'].'/promnik/img/players';

$arr = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM players WHERE id='$id'"));
$pic = $arr['photo'];
unlink("$img_location/$pic");
mysqli_query($con, "DELETE FROM players WHERE id='$id'");
mysqli_close($con);
header("Location: /promnik/admin/panel.php?strona=zawodnicy&druzyna=$team");

?>