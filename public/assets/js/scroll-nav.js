$(function() {
    "use strict";
    $(window).scroll(function() {
        if ($(window).scrollTop() > 50) {
            // add class bg-dark and text-white to navbar
            $('.navbar').removeClass('bg-transparent').addClass('bg-dark');
            $('.navbar-nav .nav-link').addClass('text-white');
        } else {
            $('.navbar').addClass('bg-transparent').removeClass('bg-dark');
            $('.navbar-nav .nav-link').removeClass('text-white');
        }
    });
});
