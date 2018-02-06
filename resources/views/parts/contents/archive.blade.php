@extends('layout')
@section('asset')
    <link rel="stylesheet" href="{{asset('css/inner-styles.css')}}">
    <link rel="stylesheet" href="{{asset('css/inner-archive-media-style.css')}}">
    <link rel="stylesheet" href="{{asset('css/inner-archive-styles.css')}}">
@endsection
@section('content')
    @if(count($images) == 0)
        <div id="content">
            <div style="display: flex; justify-content: space-around; padding-bottom: 14%; padding-top: 13.5%; background-image: url(https://www.freepik.com/free-vector/realistic-spotlights_780623.htm)">
                <a href="/">
                    <h1>@lang('content.empty_gallery')</h1>
                </a>
            </div>
        </div>
    @else
        @if(app()->isLocale('ru'))
        <div id="inner-slider" class="swiper-container">
            <div class="swiper-wrapper">
                @foreach($images as $image)
                    <div class="swiper-slide" style="background-image: url({{asset('images/gallery/'.$event->dirname.'/'.$additional->slug.'/'.$image->image)}})">
                    </div>
                @endforeach
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
            <div class="page-info">
                <h1 class="fadeInDown">
                    {{$event->title}}
                </h1>
                <h2 class="wow fadeInDown">{{$image->date->format('j')}} {{$month[$image->date->format('F')]}}, {{$additional->place}}</h2>
                <h3 class="wow fadeInDown">{{$image->photographer}}</h3>
            </div>
        </div>
        <div id="content">
            <div class="content-wrapper inner-wrapper">
                <div class="photos">
                    @foreach($images as $image)
                        <a href="{{asset('images/gallery/'.$event->dirname.'/'.$additional->slug.'/'.$image->image)}}" class="photo-wrapper wow fadeInUp" title="{{$event->title}}">
                            <div class="photo" style="background-image: url({{asset('images/gallery/'.$event->dirname.'/'.$additional->slug.'/'.$image->image)}});"></div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
        @else
            <div id="inner-slider" class="swiper-container">
                <div class="swiper-wrapper">
                    @foreach($images as $image)
                        <div class="swiper-slide" style="background-image: url({{asset('images/gallery/'.$event->dirname.'/'.$additional->slug.'/'.$image->image)}})">
                        </div>
                    @endforeach
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
                <div class="page-info">
                    <h1 class="fadeInDown">
                        {{$event->en_title}}
                    </h1>
                    <h2 class="wow fadeInDown">{{$image->date->format('F')}} {{$image->date->format('j')}}, {{$additional->en_place}}</h2>
                    <h3 class="wow fadeInDown">{{$image->en_photographer}}</h3>
                </div>
            </div>
            <div id="content">
                <div class="content-wrapper inner-wrapper">
                    <div class="photos">
                        @foreach($images as $image)
                            <a href="{{asset('images/gallery/'.$event->dirname.'/'.$additional->slug.'/'.$image->image)}}" class="photo-wrapper wow fadeInUp" title="{{$event->en_title}}">
                                <div class="photo" style="background-image: url({{asset('images/gallery/'.$event->dirname.'/'.$additional->slug.'/'.$image->image)}});"></div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    @endif
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
    <script type="text/javascript" src="{{asset('js/inner-archive.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/index_bundle.bundle.js?c891a3b6a0a67102bc6a')}}"></script>
    <script>
        $(document).ready(function () {
            $("#preloader").fadeOut(1000, function () {
                $('body').removeClass('loading');
            });
        });
    </script>
    <script>
        //$('#general-popup-buy-ticket').toggleClass('popup-hidden');
        $('.bbtn').on('click', function () {
            var id = $(this).attr('data-id');
            var group = $(this).attr('group-id');
            var bileti = $(this).attr('data-bileti');
            if (group != 0) {
                $.magnificPopup.open({
                    items: {
                        src: '#general-popup-buy-ticket'
                    },
                    callbacks: {
                        beforeOpen: function () {
                            $('#general-popup-buy-ticket').load('tickets.php?id=' + id + '&group=' + group);
                            $('html').addClass('mfp-helper');
                        },
                        open: function () {
                            var button = $('<button>').addClass('mfp-close').attr('title', 'Close (Esc)').attr('type', 'button').text('×');
                            $(button).appendTo('.mfp-content');
                        },
                        close: function () {
                            $('html').removeClass('mfp-helper');
                        }
                    }
                });
            } else {
                show_popup_frame(bileti, 'allstars');
            }
        });
    </script>
    <script type="text/javascript" src="https://i.kvitki.by/popup_frame/popup_frame.js"></script>
@endsection


