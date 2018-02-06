@extends('layouts.app')

@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif



    <div class="col-3">
        <div class="list-group" id="list-tab" role="tablist">
            <section id="current">
                @foreach($events as $event)
                    @if($event->hidden_status == 1)
                        <a class="rounded-0 list-group-item list-group-item-action bg-dark text-white" id="list-{{$event->id}}-list" data-toggle="list" href="#list-{{$event->id}}" role="tab" aria-controls="{{$event->slug}}">{{$event->title}}</a>
                    @endif
                @endforeach
            </section>
            @if(count($past) >=1)
                <h4 class="text-uppercase p-3">Прошедшие события</h4>
            @endif
            <section id="past">
                @foreach($events as $event)
                    @if($event->hidden_status <> 1)
                        <a class="rounded-0 list-group-item list-group-item-action bg-dark text-white" id="list-{{$event->id}}-list" data-toggle="list" href="#list-{{$event->id}}" role="tab" aria-controls="{{$event->slug}}">{{$event->title}}</a>
                    @endif
                @endforeach
            </section>
        </div>
    </div>
    <div class="col-9">
        <div class="tab-content" id="nav-tabContent">
            @foreach($events as $event)
                <div class="tab-pane fade" id="list-{{$event->id}}" role="tabpanel" aria-labelledby="list-{{$event->id}}-list">
                    <div class="row m-0 p-0">
                        <div class="col-md-6 p-0">
                            <div class="card">
                                <img class="img-fluid rounded-0" src="{{asset('images/'.$event->cover)}}" alt="{{$event->title}}">
                            </div>
                            <div class="card-body text-center bg-light">
                                <a class="text-uppercase text-dark" href="/home/edit/{{$event->slug}}">
                                    &nbsp;&nbsp;
                                    <i class="fas fa-edit text-dark"></i>
                                    &nbsp;&nbsp;
                                    редактировать событие
                                </a>
                                <a class="text-uppercase text-dark" data-toggle="modal" data-target="#{{$event->id}}">
                                    &nbsp;&nbsp;
                                    <i class="fas fa-times text-dark"></i>
                                    &nbsp;&nbsp
                                    удалить событие
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 p-0">
                            <ul class="list-group">
                                @foreach($event->additional as $item)
                                    <li class="list-group-item z-depth-1 border-0 rounded-0 text-uppercase text-center">
                                        <p class="text-center"><small class="text-uppercase">Редактировать</small></p>
                                        <a class="btn-link" href="/home/edit/date/{{$item->slug}}"><strong>{{$item->date->format('j')}} {{$month[$item->date->format('F')]}} / {{$item->place}} / {{$item->city}}</strong></a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="{{$event->id}}" tabindex="-1" role="dialog" aria-labelledby="{{$event->id}}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="{{$event->id}}">Удаление события {{$event->title}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Вы уверены, что хотите удалить событие "{{$event->title}}"?
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary rounded-0 border-0" data-dismiss="modal">Отменить</button>
                                <a href="/home/edit/{{$event->slug}}/delete" type="button" class="btn btn-danger rounded-0 border-0">Удалить событие</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function(){
            $('div.tab-pane').addClass('show');
            $('a.list-group-item').addClass('show');

            $('a.list-group-item').each(function (i) {
                $(this).attr('data-tab','tab'+i);
            });
            $('div.tab-pane').each(function(i) {
                $(this).attr('data-tab', 'tab'+i);
            });
            $('div.tab-pane').not(':first-of-type').hide();
            $('a.list-group-item').on('click', function () {
                var active = $('#list-tab section').find('a.active');
                var dataTab = $(this).data('tab');
                active.removeClass('active');
                $(this).addClass('active');
                $('div.tab-pane').hide();
                $('div.tab-pane').filter('[data-tab='+dataTab+']').show();

            });
        });
    </script>
@endsection
