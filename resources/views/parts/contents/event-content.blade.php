<div id="content">
    @if(app()->isLocale('ru'))
        @include('parts.contents.lang.ru-content')
    @else
        @include('parts.contents.lang.en-content')
    @endif
</div>
