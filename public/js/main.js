$(document).ready(function () {
    var swiper = undefined;
    function startSwiper() {
        if ($(window).width() <= 870 && swiper == undefined ) {
            swiper = new Swiper('.swiper-container', {
                spaceBetween: 0,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev'
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true
                }
            });
        }
    }

    startSwiper();

    $(window).on('resize', function () {
       startSwiper();
    });

    $(function() {
        $('body').on('click', '.pagination a', function(e) {
            e.preventDefault();
            $('#load a').css('color', '#dfecf6');
            var url = $(this).attr('href');
            getArticles(url);
            if($('html').attr('lang') == 'en'){
                window.history.pushState({}, document.title, "/en")
            }
            else {
                window.history.pushState({}, document.title, "/");
            }

        });

        function getArticles(url) {
            $.ajax({
                url : url
            }).done(function (data) {
                $('#foto_content').html(data);
            }).fail(function () {
                alert('Невозможно отобразить');
            });
        }

        $(document).ready(function(){
            var uri = window.location.toString();
            if (uri.indexOf("?") > 0) {
                var clean_uri = uri.substring(0, uri.indexOf("?"));
                window.history.replaceState({}, document.title, clean_uri);
            }
        })
    });


});

