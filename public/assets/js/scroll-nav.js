$(function() {
    "use strict";

    // navbar fixed change background color from transparent to dark

    $(window).scroll(function() {
        if ($(window).scrollTop() > 50) {
            $('.navbar').removeClass('bg-transparent').addClass('bg-dark');
        } else {
            $('.navbar').addClass('bg-transparent').removeClass('bg-dark');
        }
    });
});
