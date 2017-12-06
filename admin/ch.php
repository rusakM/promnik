<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <form action="" method="post" ENCTYPE="multipart/form-data">
        <input type="file" name="gg">
        <input type="submit" value="ok">
    </form>
</body>
</html>
<?php
    if(isset($_FILES['gg'])) {
        print_r($_FILES['gg']);
        if($_FILES['gg']['type'] === 'image/jpeg') {
            echo 'type';
        }
        echo count($_FILES);
        echo crc32($_FILES['gg']['tmp_name']);
        move_uploaded_file($_FILES['gg']['tmp_name'], '../plik.jpg');
    }
?>