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