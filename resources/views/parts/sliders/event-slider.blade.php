<div id="inner-slider" class="swiper-container wow fadeInDown">
    <div class="swiper-wrapper">
        @foreach($event->photos as $photo)
            <div class="swiper-slide" style="background-image: url({{asset('images/uploads/'.$event->slug.'/'.$photo->photos)}});"></div>
        @endforeach
    </div>
    @if(count($event->photos) === 3)
    @else
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
    @endif
</div>