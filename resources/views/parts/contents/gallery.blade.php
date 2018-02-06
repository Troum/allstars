<div class="cards" id="load">
    @if(app()->isLocale('ru'))
    @foreach($hiddens as $hidden)
            <a class="card wow fadeInUp" href="{{$hidden->slug}}/{{$hidden->dirname}}" style="padding-bottom:0px !important">
                <div class="card-img" style="background-image: url({{asset('images/gallery/'.$hidden->dirname.'/'.$hidden->slug.'/'.$hidden->cover)}}"></div>
                <div class="card-header">
                    <h2>{{$hidden->title}}</h2>
                    <p style="margin:0px">{{$hidden->city}} /{{$hidden->date->format('j')}} {{$month[$hidden->date->format('F')]}} {{$hidden->date->format('Y')}} года</p>
                </div>
            </a>
    @endforeach
    @else
        @foreach($hiddens as $hidden)
                <a class="card wow fadeInUp" href="/en/{{$hidden->slug}}/{{$hidden->dirname}}" style="padding-bottom:0px !important">
                    <div class="card-img" style="background-image: url({{asset('images/gallery/'.$hidden->dirname.'/'.$hidden->slug.'/'.$hidden->cover)}}"></div>
                    <div class="card-header">
                        <h2>{{$hidden->en_title}}</h2>
                        <p style="margin:0px">{{$hidden->en_city}} /{{$hidden->date->format('F')}} {{$hidden->date->format('j')}} {{$hidden->date->format('Y')}}</p>
                    </div>
                </a>
        @endforeach
    @endif
</div>
<section class="pagination-container">
    {{$hiddens->links('vendor.pagination.default')}}
</section>

