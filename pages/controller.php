<?php
    require_once('model.php');
    if(!isset($_GET['strona']) && !isset($_GET['wyniki'])) {
        main_page(10);
    }
    else if (!isset($_GET['strona']) && isset($_GET['wyniki'])) {
        main_page($_GET['wyniki']);
    }
        
    else {
        switch($_GET['strona']) {
            case 'post':
                show_post($_GET['id']);
                break;
            case 'terminarz':
                scheduler($_GET['id']);
                break;
            case 'kadra':
                players($_GET['id']);
                break;
            case 'o_klubie':
                about();
                break;
            case 'galeria':
                gallery();
                break;
            case 'sponsorzy':
                contributors();
                break;
            case 'kontakt':
                contact();
                break;   
        }
    }
?>