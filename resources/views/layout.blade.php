<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('meta')
    <title>AllStars</title>
    <!-- Google Tag Manager -->

    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':

            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],

            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=

            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);

        })(window,document,'script','dataLayer','GTM-WZHJPN8');
    </script>

    <!-- End Google Tag Manager -->
    <link rel="stylesheet" href="{{asset('css/reset.css')}}">
    <link rel="stylesheet" href="{{asset('css/preloader.css')}}">
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('css/swiper.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/fonts.css')}}">
    <link rel="stylesheet" href="{{asset('css/main-styles.css')}}">
    <link rel="stylesheet" href="{{asset('css/media-styles.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
    @yield('asset')
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon">
    <script type="text/javascript" src="//vk.com/js/api/openapi.js?150"></script>

</head>
<body class="">
<!-- Google Tag Manager (noscript) -->

<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WZHJPN8"

                  height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>

<!-- End Google Tag Manager (noscript) -->
@include('parts.preloader')
@include('parts.header')
@yield('content')
@include('parts.footer')
@yield('scripts')
</body>
</html>
