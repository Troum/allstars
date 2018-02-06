<h1 class="wow fadeInDown">
    {{$event->title}}
</h1>
<div class="content-wrapper inner-wrapper">
    <div class="left-wrapper">
        <div class="column-left">
            <div class="column-inner-wrapper">
                <div class="picture">
                    <img src="{{asset('images/'.$event->cover)}}" alt="{{$event->title}}">
                </div>
                @foreach($event->additional as $item)
                    <div class="schedule">
                        <a class="inner-info" href="">
                            <p class="date"><strong>{{$item->date->format('j')}} {{$month[$item->date->format('F')]}}</strong></p>
                            <p class="time">{{$item->time->format('H:i')}}</p>
                        </a>
                        <a class="inner-info" href="">
                            <p class="city">{{$item->city}}</p>
                            <p class="stage">&nbsp;/&nbsp;</p>
                            <p class="stage">{{$item->place}}</p>
                        </a>
                    </div>
                    <div class="tickets">
                        @foreach($event->info as $info)
                            {!! $info->info !!}
                        @endforeach
                        <p><strong>@lang('content.tickets_price'):</strong></p>
                        {!!$item->price!!}
                        <div>&nbsp;</div>
                        <div>@lang('content.information'):&nbsp;</div>
                        <div>+375 29 650 11 33</div>
                        <div>+375 29 763 11 11</div>
                        <div>&nbsp;</div>
                        <div>@lang('content.without_tax') allstars.by.</div>
                    </div>
                @endforeach
                <div class="social-share">
                    <p>
                        <strong>@lang('content.share'):</strong>
                    </p>
                    <div class="social-wrapper">
                        <a class="animated fadeInRight " href="javascript: void(0)" style="animation-delay: 0.5s;" onClick="PopupCenter('https://www.facebook.com/sharer?u={{\Illuminate\Support\Facades\URL::current()}}','{{$event->title}}','548','325')" >
                            <img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAyMS4xLjAsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjxzdmcgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB4PSIwcHgiIHk9IjBweCINCgkgdmlld0JveD0iMCAwIDgwNy45IDQ1NS43IiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA4MDcuOSA0NTUuNzsiIHhtbDpzcGFjZT0icHJlc2VydmUiPg0KPHN0eWxlIHR5cGU9InRleHQvY3NzIj4NCgkuc3Qwe2ZpbGw6I0Q4QTMyRDt9DQoJLnN0MXtmaWxsOiNGRkZGRkY7fQ0KPC9zdHlsZT4NCjxwYXRoIGNsYXNzPSJzdDAiIGQ9Ik05Mi4xLDBsMC4xLDQ1NS43aDYzMS43VjBIOTIuMXoiLz4NCjxwYXRoIGNsYXNzPSJzdDEiIGQ9Ik01MTIuNiwyNzkuN2w5LjUtNzEuOWgtNjguNXYtNTBjMC0xNCwxMS40LTI1LjMsMjUuMy0yNS4zaDQ0LjRWNjcuOWgtNjJjLTQzLjksMC03OS41LDM1LjYtNzkuNSw3OS41djYwLjQNCgloLTU5LjN2NzEuOWg1OS4zdjE3Nmg3MS43di0xNzZMNTEyLjYsMjc5LjdMNTEyLjYsMjc5Ljd6Ii8+DQo8L3N2Zz4NCg==" alt=""/>
                        </a>
                        @foreach($event->link as $link)
                            <script>
                                document.write(VK.Share.button({url: '{{$link->link}}' ,title: '{{$event->title}}', image: '{{asset('images/'.$event->cover)}}'}, {type: 'custom', text: '<img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAyMS4xLjAsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjxzdmcgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB4PSIwcHgiIHk9IjBweCINCgkgdmlld0JveD0iMCAwIDgwNy45IDQ1NS43IiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA4MDcuOSA0NTUuNzsiIHhtbDpzcGFjZT0icHJlc2VydmUiPg0KPHN0eWxlIHR5cGU9InRleHQvY3NzIj4NCgkuc3Qwe2ZpbGw6I0Q4QTMyRDt9DQoJLnN0MXtmaWxsOiNGRkZGRkY7fQ0KPC9zdHlsZT4NCjxnPg0KCTxwb2x5Z29uIGNsYXNzPSJzdDAiIHBvaW50cz0iODguMSwwIDcxOS45LDAgNzE5LjksNDU1LjcgODguMSw0NTUuNyAJIi8+DQoJPHBhdGggY2xhc3M9InN0MSIgZD0iTTI5NC4xLDEzOC43YzEwLjksMjcsMjQuOCw1Mi40LDQzLDc1LjJjMi40LDMsNS41LDUuNyw4LjcsNy45YzQuNywzLjIsOS4xLDIuMSwxMS0zLjNjMi01LjYsMy45LTE3LDQtMjMNCgkJYzAuMy0xNS40LDAtMjUuNi0wLjktNDFjLTAuNS05LjktNC4xLTE4LjYtMTguNi0yMS4yYy00LjUtMC44LTQuOS00LjUtMi04LjJjNi03LjcsMTQuNC04LjksMjMuNC05LjRjMTQuNy0wLjgsMjkuNS0wLjEsNDQuMiwwDQoJCWM2LDAuMSwxMiwwLjUsMTcuOSwxLjhjNy43LDEuNywxMS44LDcuMSwxMy4xLDE0LjZjMC43LDMuOSwxLDcuOSwwLjksMTEuOGMtMC40LDE2LjktMS4yLDMzLjctMS40LDUwLjYNCgkJYy0wLjEsNi42LDAuNCwxMy40LDEuOCwxOS44YzIsOSw4LjEsMTEuMiwxNC4zLDQuN2M3LjktOC4yLDE0LjktMTcuNSwyMS41LTI2LjljMTEuOS0xNy4xLDIwLjgtMzUuOSwyOC41LTU1LjMNCgkJYzQtMTAsNy0xMi4yLDE3LjgtMTIuMmMyMC4yLDAsNDAuNC0wLjEsNjAuNywwYzMuNiwwLDcuMywwLjQsMTAuNywxLjRjNS41LDEuOCw3LjcsNi4yLDYuNCwxMS45Yy0zLDEzLjMtMTAuMiwyNC42LTE3LjksMzUuNQ0KCQljLTEyLjQsMTcuNS0yNS4zLDM0LjUtMzgsNTEuOGMtMS42LDIuMi0zLDQuNS00LjQsNi45Yy00LjcsOC42LTQuNCwxMy40LDIuNSwyMC41YzExLDExLjMsMjIuOCwyMiwzMy40LDMzLjYNCgkJYzcuNyw4LjUsMTQuOSwxNy43LDIxLDI3LjRjNy44LDEyLjIsMywyMy44LTExLjUsMjUuOGMtOS4xLDEuMy01My42LDAtNTUuOSwwYy0xMi0wLjEtMjIuNS00LjItMzAuOS0xMi4zDQoJCWMtOS40LTkuMS0xNy45LTE5LTI3LTI4LjRjLTIuNy0yLjgtNS42LTUuNi04LjgtOGMtNy40LTUuNi0xNC42LTQuNC0xOC4xLDQuM2MtMi45LDcuNC01LjUsMjctNS42LDI4LjdjLTAuNiw4LjctNi4yLDE0LjMtMTYsMTQuOA0KCQljLTI4LjIsMS41LTU1LjYtMS42LTgxLjEtMTUuM2MtMjEuNi0xMS42LTM4LjktMjcuOS01My44LTQ3Yy0yMy43LTMwLjMtNDIuNS02My42LTU5LjYtOTcuOWMtMC45LTEuOC0xOC4yLTM4LjctMTguNy00MC40DQoJCWMtMS41LTUuOC0wLjEtMTEuNCw0LjgtMTMuM2MzLjEtMS4yLDYwLjIsMCw2MS4yLDBDMjg0LjEsMTI1LjQsMjkwLjMsMTI5LjIsMjk0LjEsMTM4Ljd6Ii8+DQo8L2c+DQo8L3N2Zz4NCg==\n' +
                                '" />'}));
                            </script>
                    </div>
                    @endforeach
                </div>
                @if(count($event->additional)>1)
                    <button id="open_buy_popup" data-id="{{$event->id}}">Купить билет</button>
                @else
                    @foreach($event->additional as $info)
                        <button data-id="{{$event->id}}" data-bileti="{{$info->ticket_id}}" class="bbtn" group-id="0">Купить билет</button>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="column-center cropped">
            {!! $event->description!!}
        </div>
    </div>
    <div class="column-right">
        <div class="video">
            @foreach($event->videos as $video)
                <div class="video-item">
                    <iframe width="100%" height="200px" src="https://www.youtube.com/embed/{{$video->videos}}" frameborder="0" allowfullscreen></iframe>
                </div>
            @endforeach
        </div>
        <div class="button-wrapper">
            <a href="https://www.youtube.com/results?search_query={{$event->title}}" class="red-button more-video">
                @lang('content.more_videos')
            </a>
        </div>
    </div>
</div>
<div class="content-wrapper">
    <div class="coming-events-wrapper">
        @if(count($events) > 1)
            <h1>@lang('content.upcoming')</h1>
        @endif
        <div id="coming-events">
            <div class="cards">
                @foreach($events as $value)
                    @if($value->id != $event->id && $value->hidden_status == 1)
                        <a class="card wow fadeInUp" href="/events/{{$value->slug}}">
                            <div class="card-img" style="background-image: url({{asset('images/'.$value->cover)}});"></div>
                            <div class="card-header">
                                <h3>{{$value->title}}</h3>
                            </div>
                        </a>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
@include('parts.contents.popup')