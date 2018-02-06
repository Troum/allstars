

$(document).ready(function () {

    //upper inner slider
    var swiper = new Swiper('.swiper-container', {
        slidesPerView: 3,
        spaceBetween: 0,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev'
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true
        },
        breakpoints: {
            // when window width is <= 530px
            530: {
                slidesPerView: 1
            },
            // when window width is <= 767px
            767: {
                slidesPerView: 2
            }
        }
    });

    //set height for the center column and add scroll to it
    var nicescroll = undefined;

    function scrollInit() {
        if($(window).width() > 870 && nicescroll == undefined) {
            var leftColHeight = $('.column-inner-wrapper').height();

            $('.column-center').css('height', leftColHeight + 'px');

            nicescroll = $('.column-center').niceScroll({
                cursorcolor:"#C00A20",
                cursorwidth: "10px",
                cursorborderradius: "0px",
                autohidemode: false
            });

        } else if($(window).width() <= 870 && nicescroll != undefined) {
            $('.column-center').removeClass('cropped');
            nicescroll.remove();
            nicescroll = undefined;
            $('.column-center').css('height', 'auto').css('overflow', 'auto');

        }
    }

    scrollInit();

    $(window).on('resize', function () {
        scrollInit();
    });


    //button show more in the center column
    $('.show-more').on('click', function (e) {
        e.preventDefault();

        $('.item').slideToggle('slow', function () {

        });

        if($(this).text() == "Показать еще") {
            $(this).text('Свернуть');
        } else if ($(this).text() == "Свернуть") {
            $(this).text('Показать еще');

            /*var self = $(this);
            $('html, body').stop().animate({
                scrollTop: $('.show-more').offset().top
            }, 850);
            return false;*/
        }
    });



});


