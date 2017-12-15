<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Logowanie do promnik promnikgonczyce.pl</title>
    <link rel="stylesheet" href="/promnik/css/admin.css">
    <link rel="stylesheet" href="/promnik/css/bootstrap.css">
</head>
<body>
   <div class="row">
   <div class="col-md-4"></div>
    <div id="container" class="col-md-4 jumbotron">
        <h2 class="text-primary">Zaloguj się:</h2><br>
        <form action="../admin/scripts/login.php" method="post">
           <label>Login lub email:</label><br>
            <input type="text" name="login"><br>
            <label>Hasło:</label><br>
            <input type="password" name="password"><br><br>
            <input type="submit" class="btn-primary btn" value="Zaloguj">
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
    <div class="col-md-4"></div>
    </div>
</body>
</html>