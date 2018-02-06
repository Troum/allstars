<script type="text/javascript" src="{{asset ('js/jquery-3.2.1.min.js')}}"></script>
<script type="text/javascript" src="{{asset ('js/get-size.js')}}"></script>
<script type="text/javascript" src="{{asset ('js/masonry.pkgd.min.js')}}"></script>
<script type="text/javascript" src="{{asset ('js/outlayer.js')}}"></script>
<script type="text/javascript" src="{{asset ('js/item.js')}}"></script>
<script async="" src="https://static.addtoany.com/menu/page.js"></script>
<script type="text/javascript" src="{{asset ('js/jquery.magnific-popup.min.js')}}"></script>
<script type="text/javascript" src="{{asset ('js/swiper.min.js')}}"></script>
<script type="text/javascript" src="{{asset ('js/jquery.nicescroll.js')}}"></script>
<script type="text/javascript" src="{{asset ('js/general.js')}}"></script>
<script type="text/javascript" src="{{asset ('js/inner.js')}}"></script>
<script type="text/javascript" src="{{asset ('css/mdbootstrap/js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{asset ('css/mdbootstrap/js/bootstrap.js')}}"></script>
<script type="text/javascript" src="{{asset ('js/index_bundle.bundle.js?c891a3b6a0a67102bc6a')}}"></script>
<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript">
</script>
<script type="text/javascript">
    ymaps.ready(init);

    function init() {
        var myMap = new ymaps.Map("map", {
            center: [53.901182982941314, 27.55328697630544],
            zoom: 18,
            controls: ['smallMapDefaultSet']
        }, {
            searchControlProvider: 'yandex#search'
        });
        myMap.behaviors
            .disable(['scrollZoom']);
        var myPlacemark = new ymaps.Placemark([53.901182982941314, 27.55328697630544], {
            balloonContentBody: [
                '<address>',
                '<strong>AllStars</strong>',
                '</address>'
            ].join('')
        }, {
            preset: 'islands#redDotIcon'
        });

        myMap.geoObjects.add(myPlacemark);
    }

</script>
<script>
    $(document).ready(function () {
        $("#preloader").fadeOut(1000, function () {
            $('body').removeClass('loading');
        });
        $("#subscribe_btn").click(function () {
            $.ajax({
                url: '/subscribe',
                type: 'POST',
                data: {_token: $('input[type=hidden]').val(), name: $("#name").val(), email: $("#email").val()},
                dataType: 'JSON',
                success: function (data) {
                    $("#exampleModal").modal('hide');
                    $("#name").val('');
                    $("#email").val('');
                    $("#success_message").text(data.msg);
                    $("#successModal").modal('show');
                }
            });
        });
    });
</script>
<script type="text/javascript">
    VK.Widgets.Subscribe("vk_subscribe", {mode: 2, soft: 1}, 2158488);
</script>