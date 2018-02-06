<div class="animated slideInDown swiper-container" id="slider">
    <div class="slider-wrapper swiper-wrapper">
        @foreach($events as $event )
            @if($event->hidden_status == 1)
            <div class="slide swiper-slide" style="background-image: url({{asset('images/'.$event->cover)}});">
                <div class="slide-info-wrapper">
                    @if(app()->isLocale('ru'))
                    <a href="events/{{$event->slug}}">
                        <h2>{{$event->title}}</h2>
                    </a>
                    @else
                        <a href="en/events/{{$event->slug}}">
                            <h2>{{$event->en_title}}</h2>
                        </a>
                    @endif
                    <div class="slide-info">

                        @foreach($event->additional as $item)
                            @if(app()->isLocale('ru'))
                            <a class="inner-info" href="events/{{$event->slug}}">
                                <strong>{{$item->date->format('j')}} {{$month[$item->date->format('F')]}} / {{$item->city}} / {{$item->place}} / {{$item->time->format('H:i')}}</strong><br>
                            </a>
                            @else
                                <a class="inner-info" href="en/events/{{$event->slug}}">
                                    <strong>{{$item->date->format('F')}} {{$item->date->format('j')}} / {{$item->en_city}} / {{$item->en_place}} / {{$item->time->format('H:i')}}</strong><br>
                                </a>
                            @endif
                        @endforeach
                    </div>
                    @if(count($event->additional)>1)
                        <button id="open_buy_popup" data-id="{{$event->id}}">@lang('content.buy_tickets')</button>
                    @else
                    @foreach($event->additional as $info)
                        <button data-id="{{$event->id}}" data-bileti="{{$info->ticket_id}}" class="bbtn" group-id="0">@lang('content.buy_tickets')</button>
                    @endforeach
                    @endif
                </div>
            </div>
            @endif
        @endforeach
    </div>
</div>