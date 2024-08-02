import $ from 'jquery';

$(function(){
    $(".regular").slick({
        dots: false,
        arrows:false,
        autoplay: true,
        infinite: true,
        slidesToShow: 2,
        slidesToScroll: 1,
    });
});
$(function(){
    $(".fav-slider").slick({
        dots: false,
        arrows:false,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        centerMode: true,
        responsive: [
            {
                breakpoint: 991,
                settings: {
                    centerMode: false,
                    // variableWidth:true,
                }
            },]
    });
});


$(function(){
    $(".regular2").slick({
        dots: false,
        arrows:false,
        infinite: true,
        autoplay: true,
        slidesToShow: 1,
        slidesToScroll: 1,
    });
});
$(function(){
    $(".cert-slider").slick({
        dots: false,
        // arrows:false,
        variableWidth: true,
        prevArrow: "<i class='fa fa-chevron-left'></i>",
        nextArrow: "<i class='fa fa-chevron-right'></i>",
        infinite: true,
        slidesToShow: 2,
        slidesToScroll: 1,
        autoplay:true,
    });
});
$(function(){
    $(".logo-slider").slick({
        dots: false,
        arrows:false,
        speed: 1000,
        swipe: false,
        // autoplaySpeed: 4000,
        // variableWidth: true,
        pauseOnHover: false,
        pauseOnFocus: false,
        // draggable: false,
        // easing: ''
        autoplay: true,
        infinite: true,
        slidesToShow: 7,
        slidesToScroll: 7,
        centerMode: true
    });
});
