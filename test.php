<?php
   /* $c = mysqli_connect("127.0.0.1", "root", "", "promnik");
    $q = mysqli_query($c, "SELECT * FROM players");
    $f = [];
    while($arr = mysqli_fetch_field($q)) {
        array_push($f, $arr->name);
    }

   print_r($f);
 */
$img_location = $_SERVER['DOCUMENT_ROOT'].'/promnik/img/players';
unlink("$img_location/1.jpg");
?>