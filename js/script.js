let menu = 0;
$(document).ready(function(){
    $("#menu").on('click', function() {
         if(menu === 0) {
             $("#list").slideDown("slow");
             $("#menu").css({"color":"white"});
             menu = 1;
             if(window.innerWidth > 639) {
                 $("#slogan").animate({"left": "+=120px"}, "slow");
             }
         }
        else {
            $("#list").slideUp("slow");
            $("#menu").css({"color":"black"});
            menu = 0;
            if(window.innerWidth > 639) {
                $("#slogan").animate({"left": "-=120px"}, "slow");
            }
            
        }
    });
    $("#arrow").on('click', function() {
        $('body').scrollTo(window.innerHeight);
    });
});