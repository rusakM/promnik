<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/promnik/admin/panel/connect.php');
    $con = mysqli_connect($host, $usr, $pass, $db);
    require_once('model.php');
    if(!isset($_GET['strona']) && !isset($_GET['wyniki'])) {
        main_page($con, 10);
    }
    else if (!isset($_GET['strona']) && isset($_GET['wyniki'])) {
        main_page($con, $_GET['wyniki']);
    }
        
    else {
        switch($_GET['strona']) {
            case 'post':
                show_post($con, $_GET['id']);
                break;
            case 'terminarz':
                scheduler($con, $_GET['id']);
                break;
            case 'kadra':
                players($con, $_GET['id']);
                break;
            case 'o_klubie':
                about();
                break;
            case 'galeria':
                gallery($con);
                break;
            case 'sponsorzy':
                contributors();
                break;
            case 'kontakt':
                contact();
                break;   
        }
    }
    mysqli_close($con);
?>