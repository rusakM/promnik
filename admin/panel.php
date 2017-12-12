<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>pomnikgonczyce.pl - panel admina</title>
    <link rel="stylesheet" href="../css/panel.css">
</head>
<body>

<?php
session_start();
    
if(isset($_SESSION['log_status']) && $_SESSION['log_status'] === 1) {
    echo '<div id="container">
         <div id="baner">
            <p>Jesteś zalogowany jako: '.$_SESSION['usr_name'].'</p>
            <a href="../admin/scripts/logout.php"><button>Wyloguj</button></a>
          </div>
          <div id="left">
            <h3>Wybierz kategorię:</h3>
            <ul>
                <li><a href="../admin/panel.php?strona=aktualnosci">Aktualności</a></li>
                <li><a href="../admin/panel.php?strona=teams">Drużyny</a></li>
                <li><a href="../admin/panel.php?strona=galeria">Galeria</a></li>
            </ul>
          </div>
          <div id="right">';  
    switch($_GET['strona']) {
        case "glowna" :
            require_once('../admin/panel/view/main.php');
            glowna();
            break;
        case "aktualnosci":
            require_once('../admin/panel/view/aktualnosci.php');
            aktualnosci();
            break;
        case "nowypost":
            require_once('../admin/panel/view/new_post.php');
            new_post();
            break;
        case "edytujpost":
            require_once('../admin/panel/view/edit_post.php');
            break;
        case "teams":
            require_once('../admin/panel/view/team_list.php');
            team_list();
            break;
        case "zawodnicy":
            require_once('../admin/panel/view/players.php');
            break;
        case "dodajzawodnika":
            require_once('../admin/panel/view/new_player.php');
            break;
        case "terminarz":
            require_once('../admin/panel/view/scheluder.php');
            break;
    }
}
else {
    echo 'Błąd logowania<br><a href="../admin/index.php">Powrót do strony logowania</a>';
}
?>
</body>
</html>