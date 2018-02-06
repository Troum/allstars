@extends('layout')
@section('content')
    @include('parts.sliders.events-slider')
    @include('parts.contents.main')
@endsection
@section('scripts')
    <script type="text/javascript" src="{{asset ('js/jquery-3.2.1.min.js')}}"></script>
    <script type="text/javascript" src="{{asset ('js/get-size.js')}}"></script>
    <script type="text/javascript" src="{{asset ('js/masonry.pkgd.min.js')}}"></script>
    <script type="text/javascript" src="{{asset ('js/outlayer.js')}}"></script>
    <script type="text/javascript" src="{{asset ('js/item.js')}}"></script>
    <script type="text/javascript" src="{{asset ('js/swiper.min.js')}}"></script>
    <script type="text/javascript" src="{{asset ('js/jquery.magnific-popup.min.js')}}"></script>
    <script type="text/javascript" src="{{asset ('js/general.js')}}"></script>
    <script type="text/javascript" src="{{asset ('js/main.js')}}"></script>
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
@endsection