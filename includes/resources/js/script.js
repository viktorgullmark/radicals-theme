jQuery(document).ready(function ($) {
        $('.flexslider').flexslider();
    
        $('header .mobile-menu-button').click(function(){
            $('.main-nav ul').slideToggle();
        });
});
