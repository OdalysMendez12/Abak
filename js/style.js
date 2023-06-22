$(document).ready(function(){
    $(window).scroll(function(){
        if ($(this).scrollTop() > 0){
        $('header-vistas').addClass('header2');
    } else{
        $('header-vistas').removeClass('header2');
    }
});
});