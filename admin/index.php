<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Logowanie do promnik promnikgonczyce.pl</title>
    <link rel="stylesheet" href="/css/admin.css">
</head>
<body>
    <div id="container">
        <h3>Zaloguj się:</h3>
        <form action="../admin/scripts/login.php" method="post">
           <label>Login lub email:</label><br>
            <input type="text" name="login"><br>
            <label>Hasło:</label><br>
            <input type="password" name="password"><br>
            <input type="submit" value="Zaloguj">
            <span>lub:</span>
            <a href="../admin/zarejestruj.html">zarejestruj się.</a>
        </form>
        <?php
        session_start();
        if(isset($_SESSION['reg_stat'])) {
            echo '<div id="reg_stat">'.$_SESSION['reg_stat'].'</div>';
        }
        ?>
        
    </div>
</body>
</html>