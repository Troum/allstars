<div class="cards">
@foreach($events as $event)
    @if($event->hidden_status == 1)
        @if(app()->isLocale('ru'))
            @include('parts.contents.lang.ru-card')
        @else
            @include('parts.contents.lang.en-card')
        @endif
    @endif
@endforeach
</div>