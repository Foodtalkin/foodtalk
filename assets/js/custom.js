/* ============================================================
 * Plugin Core Init
 * For DEMO purposes only. Extract what you need.
 * ============================================================ */
$(document).ready(function() {
    'use strict';

    //Intialize Slider
        var slider = new Swiper('#hero', {
            paginationClickable: true,
            nextButton: '.swiper-button-next',
            prevButton: '.swiper-button-prev',
            parallax: true,
            speed:1000
        });

        //Intialize Testamonials
        var testimonials_slider = new Swiper('#testimonials_slider', {
            pagination: '.swiper-pagination',
            paginationClickable: true,
            speed:1000,
            autoplay:2000
        });
        var contentSlider = new Swiper('#inner-conent-slider', {
            paginationClickable: true,
            speed:1000,
            effect: 'fade',
            fade: {
              crossFade: true
            },
            autoplay:2000
        });
        
});