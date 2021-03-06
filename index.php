<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>UKS - Promnik Gończyce</title>
    <link href="https://fonts.googleapis.com/css?family=Questrial" rel="stylesheet">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="author" content="Mateusz Rusak">
    <meta name="description" content="Strona klubu Promnik Gończyce. Aktualności, wyniki meczów, zawodnicy i tabele.">
    <meta name="keywords" content="gończyce, promnik, promnikgończyce, UKS promnik gończyce">
    <link rel="stylesheet" href="https://use.fontawesome.com/45b87b5955.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/menu.css">
    
    <script src="js/jquery-3.2.1.min.js"></script>
    
    <link href="https://fonts.googleapis.com/css?family=Bungee" rel="stylesheet">
</head>
<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/promnik/admin/scripts/connect.php');
    $con = mysqli_connect($host, $usr, $pass, $db);
?>

    <body>
        <div id="container-fluid">
            <header>
                <nav>
                    <ul id="list" class="row">
                        <div class="col-md-2">
                            <a href="index.php"><img src="img/page/logo.png" alt="" id="logo"></a>
                        </div>
                        <div class="row col-lg-10 col-md-11 col-12" id="nav-menu">
                            <li><a href="index.php">Strona główna</a></li>
                            <li>Seniorzy
                                <ul>
                                    <li><a href="index.php?strona=druzyna&id=1">Drużyna</a></li>
                                    <li><a href="index.php?strona=terminarz&id=1">Terminarz</a></li>
                                    <?php
                                    $senior_link = mysqli_fetch_array(mysqli_query($con, "SELECT link FROM teams WHERE team_id=1"));
                                    echo '<li><a href="'.$senior_link[0].'" target="_blank">Tabela</a></li>';
                                ?>
                                </ul>
                            </li>
                            <li><a href="#">Juniorzy</a>
                                <?php
                                $q = mysqli_query($con, "SELECT team_id, name, link FROM teams WHERE team_id > 1");
                                if(mysqli_num_rows($q) > 0) {
                                    echo '<ul>';
                                    while($row = mysqli_fetch_array($q)) {
                                        echo '<li>'.$row[1].'
                                            <ul>
                                                <li><a href="index.php?strona=druzyna&id='.$row[0].'">Druzyna</a></li>
                                                <li><a href="index.php?strona=terminarz&id='.$row[0].'">Terminarz</a></li>
                                                <li><a href="'.$row[2].'">Tabela</a></li>
                                            </ul>
                                            </li>'; 
                                    } echo '</ul>'; 
                                } 
                                ?>
                            </li>
                            <li><a href="index.php?strona=o_klubie">O klubie</a></li>
                            <li><a href="index.php?strona=galeria">Galeria</a></li>
                            <li><a href="index.php?strona=sponsorzy">Sponsorzy</a></li>
                            <li><a href="index.php?strona=kontakt">Kontakt</a></li>
                        </div>
                    </ul>
                    <button id="h-menu"><i class="fa fa-bars" aria-hidden="true"></i></button>
                </nav>
                <div id="banner">
                    <h1 id="slogan"><span>PROMNIK</span> GOŃCZYCE</h1>
                </div>
            </header>
            <section id="news" class="row col-12">
                <div class="col-lg-2 col-md-1"></div>
                <div class="col-lg-8 col-md-10 col-12 row" id="articles">
                    <?php
                    require_once($_SERVER['DOCUMENT_ROOT'].'/promnik/pages/controller.php');
                ?>

                </div>
                <div id="cookie-container">
                    <p class="cookie"><small>Ta strona wykorzystuje pliki cookie aby świadczyć usługi na najwyższym poziomie. Dalsze korzystanie ze strony oznacza, że zgadzasz się na ich użycie.</small></p>
            <button class="btn" id="cookie-accept">Zgoda</button>
        </div>
                <footer class="col-12 text-center" id="stopka">
                    <p style="padding-top: 1em; positon: absolute;"><span style="padding-right: 2em">Projekt i wykonanie: Mateusz Rusak </span>
                        <a href="https://facebook.com/mateusz.rusak.31" target="_blank"><i class="fa fa-facebook-square white-text" aria-hidden="true"></i> </a>
                        <a href="https://codepen.io/rusakkk"><i class="fa fa-codepen" aria-hidden="true"></i></a></p> 
                </footer>
            </section>
        </div>
        
    </body>
</html>
<script src="js/script.js"></script>  
