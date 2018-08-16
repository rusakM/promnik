$(document).ready(function() {
    if (document.cookie.split(';').filter((item) => item.includes('cookie=close')).length) {
        closePop();
    }
});

function closePop() {
    $('#cookie-container').css({'display': 'none'});
    document.cookie = "cookie=close";
}

$('#cookie-accept').on('click', closePop);

function showHideMenu() {
    if(document.getElementById('nav-menu').style.display === 'flex') {
        document.getElementById('nav-menu').style.display = 'none';
    }
    else {
        document.getElementById('nav-menu').style.display = 'flex';
    }
}

document.getElementById('h-menu').addEventListener('click', showHideMenu);