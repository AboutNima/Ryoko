$(document).ready(function()
{
    // Start nav setting
    $('header nav .information .menu > li').hover(function(){
        $(this).find('ul').addClass('active')
        $(this).find('ul').stop().fadeIn(150)
    },function(){
        $(this).find('ul').removeClass('active')
        $(this).find('ul').stop().fadeOut(150)
    })
    $('header .slider .slick-slider').slick({
        rtl: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true,
        arrows: false,
        appendDots: $('.slider div[slick-dots]'),
        focusOnSelect: false,
        autoplay: true,
        autoplaySpeed: 3000,
    })

    // Start trust
    $('.trust .slick-slider').slick({
        rtl: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        dots: false,
        arrows: false,
        focusOnSelect: false,
        autoplay: true,
        autoplaySpeed: 3000,
    })

})