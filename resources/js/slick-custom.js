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
    });
});
