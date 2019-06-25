$(document).ready(function () {
    $('.heightScreen').height($(window).height())
    $('.height3').height($('.height1').height()+$('.height2').height())
    $('.catalogProduct').css('top',$('.height1').height()-100)

/*
    $('.height3').css('clip-path','polygon(0%' +$('.height1').height()+', 17% '+$('.height1').height()+', 17% 0%, 100% 0, 100% 100%, 0 100%)')
*/
    $('.my-Index').height($(window).height())
    $('.menuBarBtn').click(function () {
        if ($('.menuBarBtn').hasClass('active')) {
            $('.menuBarBtn').removeClass('active')
            $('.my-Index').css('left', '-100%');
            $('.menuBar').css('right', '0');
        } else {
            $('.menuBarBtn').addClass('active')
            $('.my-Index').css('left', '0');
            $('.menuBar').css('right', '-100%');
        }

    });
    $('.openCarousel').click(function () {
        $('.carouselPlace').css('display', 'block');
    });
    $('.closeCarousel').click(function () {
        $('.carouselPlace').css('display', 'none');
    });

    $(".slick1").slick({
        dots: true,
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }]
    });
    $(".slick3").slick({
        dots: true,
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }]
    });
    $(".slick2").slick({
        dots: true,
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }]
    });
});

