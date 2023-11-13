$( document ).ready(function() {
    $('.user_logout').click(function (){
        $('.user_logout form').toggleClass('db');
        $('.user_logout div i:not(.no_hover)').toggleClass('dn');
    })
});
