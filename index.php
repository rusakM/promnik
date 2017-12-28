<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>UKS - Promnik Gończyce</title>
    <link href="https://fonts.googleapis.com/css?family=Questrial" rel="stylesheet">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/45b87b5955.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/script.js"></script>
</head>

<body>
    <div id="container-fluid">
        <header>
            <nav>
                <!--<i id="menu" class="fa fa-bars" aria-hidden="true"></i>-->
                <ul id="list" class="row">
                       <div class="col-md-2">
                           <img src="img/page/logo.png" alt="" id="logo">
                       </div>
                        <div class="row col-lg-10 col-md-11 col-12">
                            <li>Strona główna</li>
                            <li>Seniorzy</li>
                            <li>Juniorzy
                            <?php
                                require_once($_SERVER['DOCUMENT_ROOT'].'/promnik/admin/scripts/connect.php');
                                $con = mysqli_connect($host, $usr, $pass, $db);
                                $q = mysqli_query($con, "SELECT team_id, name FROM teams WHERE team_id > 1");
                                if(mysqli_num_rows($q) > 0) {
                                    echo '<ul>';
                                    while($row = mysqli_fetch_array($q)) {
                                        echo '<li>'.$row[1].'
                                            <ul>
                                                <li><a href="index.php?strona=kadra&id='.$row[0].'">Kadra</a></li>
                                                <li><a href="index.php?strona=terminarz&id='.$row[0].'">Terminarz</a></li>
                                                <li>Tabela</li>
                                            </ul></li>';
                                    }
                                    echo '</ul>';
                                }
                                
                            ?>
                            </li>
                            <li>O klubie</li>
                            <li>Galeria</li>
                            <li>Sponsorzy</li>
                            <li>Kontakt</li>
                        </div>
                </ul>
            </nav>
            <div id="banner">
                <h1 id="slogan"><span>PROMNIK</span> GOŃCZYCE</h1>
            </div>
        </header>
        <section id="news" class="col-12 row">
            <div class="col-lg-2 col-md-1"></div>
            <div class="col-lg-8 col-md-10 col-12 row" id="articles">
                <h2 class="col-12">Aktualności:</h2>
            
            </div>
            <div class="col-lg-2 col-md-1"></div>
        </section>
        </div>
</body>

</html>
