<?php
session_start();
$id = $_GET['id'];
$team = $_GET['team'];
require_once("../connect.php");
$con = mysqli_connect($host, $usr, $pass, $db);
$img_location = $_SERVER['DOCUMENT_ROOT'].'/promnik/img/players';

$arr = mysqli_fetch_array(mysqli_query($con, "SELECT photo FROM players WHERE player_id='$id'"));
$photo = $arr[0];
unlink("$img_location/$photo");
mysqli_query($con, "DELETE FROM players WHERE players.player_id='$id'");
mysqli_close($con);
header("Location: /promnik/admin/panel.php?strona=zawodnicy&druzyna=$team");

?>