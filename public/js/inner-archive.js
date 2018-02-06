$(document).ready(function () {

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
            // when window width is <= 670px
            670: {
                slidesPerView: 1
            }
        }
    });

    $('.photos').magnificPopup({
        delegate: 'a',
        type: 'image',
        tLoading: 'Loading image #%curr%...',
        mainClass: 'mfp-img-mobile',
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0,1] // Will preload 0 - before current, and 1 after the current image
        },
        image: {
            tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
            titleSrc: function(item) {
                return item.el.attr('title');
            }
        },
        callbacks: {
            beforeOpen: function() {
                $('html').addClass('mfp-helper');
            },
            close: function() {
                $('html').removeClass('mfp-helper');
            }
        }
    });



    //button show more in the center column
    $('.show-more').on('click', function (e) {
        e.preventDefault();

        $('.item').toggle('slow');

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



