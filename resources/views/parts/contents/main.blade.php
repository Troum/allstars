<div id="content">
    @if(count($events) > 1)
        <h1 class="wow fadeInDown">@lang('content.events')</h1>
    @endif
    <div class="content-wrapper">
        @include('parts.contents.cards')
    </div>
</div>
<div id="archive">
    @if(count($past) >= 1 && count($hiddens)>0)
        <h1>
            @lang('content.gallery')
        </h1>
        <div class="content-wrapper" style="padding-bottom:0px !important" id="foto_content">
            @include('parts.contents.gallery')
        </div>
    @endif
</div>
@include('parts.contents.popup')