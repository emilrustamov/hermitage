import $ from 'jquery';

$(function(){
    $(".regular").slick({
        dots: false,
        arrows:false,
        infinite: true,
        slidesToShow: 2,
        slidesToScroll: 2,
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
    });
});


$(function(){
    $(".regular2").slick({
        dots: false,
        arrows:false,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
    });
});
