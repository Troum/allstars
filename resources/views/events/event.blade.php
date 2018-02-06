@extends('layout')
@section('meta')
    <meta property="og:title" content="{{$event->title}}"/>
    <meta property="og:type" content="website"/>
    <meta property="og:image" content="{{asset('images/'.$event->cover)}}"/>
    <meta property="og:image:width" content="400" />
    <meta property="og:image:height" content="300" />
    <meta property="og:site_name" content="allstars.by"/>
    <meta property="og:url" content="{{\Illuminate\Support\Facades\URL::current()}}">
    <meta property="og:description" content="{{$event->title}}"/>
    <meta property="fb:app_id" content="273801426456453"/>
@endsection
@section('asset')
    <link rel="stylesheet" href="{{asset('css/inner-styles.css')}}">
    <link rel="stylesheet" href="{{asset('css/inner-media-styles.css')}}">
    <script type="text/javascript" src="https://vk.com/js/api/share.js?93"></script>
@endsection
@section('content')
    @include('parts.sliders.event-slider')
    @include('parts.contents.event-content')
@endsection
@section('scripts')
    <script type="text/javascript" src="{{asset ('js/jquery-3.2.1.min.js')}}"></script>
    <script type="text/javascript" src="{{asset ('js/get-size.js')}}"></script>
    <script type="text/javascript" src="{{asset ('js/masonry.pkgd.min.js')}}"></script>
    <script type="text/javascript" src="{{asset ('js/outlayer.js')}}"></script>
    <script type="text/javascript" src="{{asset ('js/item.js')}}"></script>
    <script async src="https://static.addtoany.com/menu/page.js"></script>
    <script type="text/javascript" src="{{asset ('js/jquery.magnific-popup.min.js')}}"></script>
    <script type="text/javascript" src="{{asset ('js/swiper.min.js')}}"></script>
    <script type="text/javascript" src="{{asset ('js/jquery.nicescroll.js')}}"></script>
    <script type="text/javascript" src="{{asset ('js/general.js')}}"></script>
    <script type="text/javascript" src="{{asset ('js/inner.js')}}"></script>
    <script type="text/javascript" src="{{asset ('js/buttons.js')}}"></script>
    <script type="text/javascript" src="{{asset ('js/index_bundle.bundle.js?c891a3b6a0a67102bc6a')}}"></script>
    <script>
        $(document).ready(function () {
            $("#preloader").fadeOut(1000, function () {
                $('body').removeClass('loading');
            });
        });
    </script>

    <script type="text/javascript" src="https://i.kvitki.by/popup_frame/popup_frame.js"></script>
    <script>
        function PopupCenter(url, title, w, h) {
            // Fixes dual-screen position                         Most browsers      Firefox
            var dualScreenLeft = window.screenLeft != undefined ? window.screenLeft : screen.left;
            var dualScreenTop = window.screenTop != undefined ? window.screenTop : screen.top;

            var width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
            var height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

            var left = ((width / 2) - (w / 2)) + dualScreenLeft;
            var top = ((height / 2) - (h / 2)) + dualScreenTop;
            var newWindow = window.open(url, title, 'scrollbars=yes, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);

            // Puts focus on the newWindow
            if (window.focus) {
                newWindow.focus();
            }
        }
    </script>
@endsection