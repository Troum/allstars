<div class="card wow fadeInUp">
    <a href="en/events/{{$event->slug}}">
        <div class="card-img" style="background-image: url({{asset('images/'.$event->cover)}});"></div>
    </a>
    <div class="card-header">
        <a href="events/{{$event->slug}}">
            <h2 style="color:rgba(255,255,255,1.00) !important">{{$event->en_title}}</h2>
        </a>
    </div>
    <div class="card-list">
        <a class="inner-info" href="en/events/{{$event->slug}}">
            @foreach($event->additional as $item)
                <p>
                    <span class="date"><strong>{{$item->date->format('F')}} {{$item->date->format('j')}}</strong></span>
                    <span class="time">{{$item->time->format('H:i')}}</span>
                </p>
                <p>
                    <span class="city">{{$item->en_city}}</span>
                    <span class="stage">{{$item->en_place}}</span>
                </p>
            @endforeach
        </a>
    </div>
    @foreach($event->additional as $info)
        @if(count($event->additional)>1)
            <button id="open_buy_popup" data-id="{{$event->id}}">@lang('content.buy_tickets')</button>
        @else
            <button data-id="{{$event->id}}" data-bileti="{{$info->ticket_id}}" class="bbtn" group-id="0">@lang('content.buy_tickets')</button>
        @endif
    @endforeach
</div>