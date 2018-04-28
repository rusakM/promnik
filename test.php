<?php
    
    $image = imagecreatefromjpeg('../promnik/img/page/background.jpg');
    $imageScaled = imagescale($image, 96);
    imagejpeg($imageScaled, 'simpletext.jpg', 90);
?>
