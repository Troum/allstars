@extends('layouts.app')

@section('content')

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="col-md-11 mx-auto mt-0 mr-0 ml-0 mb-3 p-1">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs nav-justified bg-dark" role="tablist">
            <li class="nav-item m-0 p-0 border-0">
                <a class="nav-link indigo-text rounded-0 border-0 active" data-toggle="tab" href="#panel1" role="tab"><i class="fas fa-calendar"></i>&nbsp;&nbsp;<small>Дата и место</small></a>
            </li>
            <li class="nav-item m-0 p-0 border-0">
                <a class="nav-link indigo-text rounded-0 border-0" data-toggle="tab" href="#panel2" role="tab"><i class="fas fa-video"></i>&nbsp;&nbsp;<small>Ссылки на видео</small></a>
            </li>
            <li class="nav-item m-0 p-0 border-0">
                <a class="nav-link indigo-text rounded-0 border-0" data-toggle="tab" href="#panel3" role="tab"><i class="fas fa-images"></i>&nbsp;&nbsp;<small>Фото слайдера</small></a>
            </li>
            <li class="nav-item m-0 p-0 border-0">
                <a class="nav-link indigo-text rounded-0 border-0" data-toggle="tab" href="#panel4" role="tab"><i class="fas fa-info-circle"></i>&nbsp;&nbsp;<small>Доп. инфо о билетах</small></a>
            </li>
            <li class="nav-item m-0 p-0 border-0">
                <a class="nav-link indigo-text rounded-0 border-0" data-toggle="tab" href="#panel6" role="tab"><i class="fas fa-file-image"></i>&nbsp;&nbsp;<small>Редактировать данные</small></a>
            </li>
        </ul>
        <div class="tab-content border-0 rounded-0 z-depth-1-half">
            <div class="tab-pane fade bg-light in show active" id="panel1" role="tabpanel">
                <div class="row m-0 p-0">
                    <div class="col-md-4 ml-5 m-0 p-2">
                        <form class="md-form m-0 form-control bg-light rounded-0 border-0 m-0 p-0" action="/home/edit/{{$event->id}}/add" method="POST">
                            {{csrf_field()}}
                            <div class="col-md-12">
                                <div class="md-form m-0">
                                    <input id="date" type="date" class="form-control bg-light" name="date" placeholder="Введите дату" required autofocus>
                                </div>
                                <label for="date"><i class="fas fa-calendar-alt"></i></label>
                            </div>
                            <div class="col-md-12">
                                <div class="md-form m-0">
                                    <input id="time" type="time" class="form-control bg-light" name="time" placeholder="Введите время" required autofocus>
                                </div>
                                <label for="time"><i class="fas fa-clock"></i></label>
                            </div>
                            <div class="col-md-12">
                                <div class="md-form m-0">
                                    <input id="place" type="text" class="form-control bg-light" name="place" placeholder="Введите место" required autofocus>
                                </div>
                                <label for="place"><i class="fas fa-building"></i></label>
                            </div>
                            <div class="col-md-12">
                                <div class="md-form m-0">
                                    <input id="city" type="text" class="form-control bg-light" name="city" placeholder="Введите город" required autofocus>
                                </div>
                                <label for="city"><i class="fas fa-address-book"></i></label>
                            </div>
                            <div class="col-md-12">
                                <div class="md-form m-0">
                                    <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                                        <div class="card bg-light  border-0">
                                            <div class="card-header" role="tab" id="headingOne">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse" aria-expanded="true" aria-controls="collapse">
                                                    <h5 class="mb-0 text-center text-dark text-uppercase">
                                                        Информация о билетах <i class="fas fa-angle-down"></i>
                                                    </h5>
                                                </a>
                                            </div>
                                            <div id="collapse" class="collapse hide" role="tabpanel" aria-labelledby="headingOne">
                                                <div class="col-md-12">
                                                    <div class="md-form m-0">
                                                        <textarea id="price" name="price" required autofocus>Введите информацию о стоимости</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="md-form m-0">
                                                        <input id="ticket-id" type="text" class="form-control bg-light" name="ticket_id" placeholder="Введите уникальный идентификатор события" autofocus>
                                                    </div>
                                                    <label for="ticket-id"><i class="fas fa-id-badge"></i></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 m-0 p-0">
                                <div class="md-form m-0 text-center m-0 p-0">
                                    <button class="btn btn-primary text-uppercase rounded-0 mb-1" type="submit">Добавить</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-7 ml-auto m-0 p-0">
                        <div class="view overlay"><img src="{{asset('images/'.$event->cover)}}" alt="{{$event->title}}" class="img-fluid rounded-0"></div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade bg-light" id="panel2" role="tabpanel">
                <div class="row m-0 p-0">
                    <div class="col-md-7 mr-auto m-0 p-0">
                        <div class="view overlay"><img src="{{asset('images/'.$event->cover)}}" alt="{{$event->title}}" class="img-fluid rounded-0"></div>
                    </div>
                    <div class="col-md-4 ml-auto mr-5 m-0 p-2">
                        <form class="md-form m-0 form-control bg-light rounded-0 border-0 m-0 p-0" action="/home/edit/{{$event->id}}/links" method="POST">
                            {{csrf_field()}}
                            <div class="col-md-12">
                                <ul class="list-group mx-auto" id="videos">
                                    <li class="list-group-item border-0 bg-transparent" id="item">
                                        <div class="row m-0 p-0">
                                            <div class="col-md-8 m-0 p-0">
                                                <input type="text" name="video[]" placeholder="Добавить ссылку на видео">
                                            </div>
                                            <div class="col-md-4">
                                                <button type="button" class="btn btn-secondary btn-floating fas fa-plus-circle"></button>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-12">
                                <div class="md-form m-0">
                                    <input id="eventlink" type="text" class="form-control bg-light" name="eventlink" placeholder="Введите ссылку на событие в ВК" required autofocus>
                                </div>
                                <label for="eventlink"><i class="fas fa-link"></i></label>
                            </div>
                            <div class="col-md-12 m-0 p-0">
                                <div class="md-form m-0 text-center m-0 p-0">
                                    <button class="btn btn-primary text-uppercase rounded-0 mb-1" type="submit">сохранить</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade bg-light" id="panel3" role="tabpanel">
                <div class="col-md-12 m-0 p-0">
                    <div class="row m-0 p-0" >
                        @if(count($event->photos) == 0)
                            <div class="col-md-12 m-0 p-5">
                                <h4 class="align-middle text-center text-secondary text-uppercase">Здесь отобразятся загруженные фотографии</h4>
                            </div>
                        @else
                            @foreach($event->photos as $photo)
                                <div class="col-md-2 m-0 p-0">
                                    <div class="card">
                                        <img src="{{asset('images/uploads/'.$event->slug.'/'.$photo->photos)}}" alt="{{$photo->photos}}" class="img-fluid rounded-0" id="{{$photo->id}}">
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-md-12 mt-4 ml-0 mr-0 mb-0 pb-3">
                    <hr>
                    <form class="md-form mx-auto col-md-6 m-0 form-control bg-light rounded-0 border-0 m-0 p-0" action="/home/edit/{{$event->id}}/photo" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="col-md-12">
                            <div class="file-field">
                                <div class="btn btn-secondary btn-sm rounded-0">
                                    <span>Выберите фотографии</span>
                                    <input type="file" name="photos[]" id="photos" multiple required>
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text" placeholder="Загрузите фотографии">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 m-0 p-0">
                            <div class="md-form m-0 p-0">
                                <button class="btn btn-primary text-uppercase rounded-0 mb-1" type="submit">Добавить</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="tab-pane fade bg-light m-0 p-0" id="panel4" role="tabpanel">
                <div class="col-md-8 mx-auto m-0 p-0">
                    <form class="md-form m-0 form-control bg-light rounded-0 border-0 m-0 p-0" action="@if(count($event->info)!=0) /home/edit/{{$event->id}}/update-info @else /home/edit/{{$event->id}}/info @endif" method="POST">
                        {{csrf_field()}}
                        <div class="col-md-12 m-0 p-0">
                            <div class="md-form m-0 p-0">
                                <textarea name="info" id="info" cols="30" rows="10" class="md-textarea z-depth-0">
                                    @foreach($event->info as $info)
                                        {!! $info->info !!}
                                    @endforeach
                                </textarea>
                            </div>
                        </div>
                        <div class="col-md-12 m-0 p-0">
                            <div class="md-form text-center m-0 p-0">
                                <button class="btn btn-primary text-uppercase rounded-0 mb-1" type="submit">сохранить</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="tab-pane fade bg-light m-0 p-0" id="panel6" role="tabpanel">
                <div class="col-md-10 mx-auto m-0 p-0">
                    <form class="md-form m-0 form-control bg-light rounded-0 border-0 m-0 p-0" action="/home/edit/{{$event->id}}/update" method="POST">
                        {{csrf_field()}}
                        <div class="col-md-12">
                            <div class="md-form m-0">
                                <input id="new_title" type="text" class="form-control bg-light" name="new_title" value="{{$event->title}}">
                            </div>
                            <label for="new_title"><i class="fas fa-edit"></i></label>
                        </div>
                        <div class="col-md-12">
                            <div class="md-form m-0">
                                <input id="new_en_title" type="text" class="form-control bg-light" name="new_en_title" value="{{$event->en_title}}">
                            </div>
                            <label for="new_en_title"><i class="fas fa-edit"></i></label>
                        </div>
                        <div class="col-md-12 m-0 p-0">
                            <div class="md-form m-0 p-0">
                                <textarea name="updated" id="updated" cols="30" rows="15" class="md-textarea z-depth-0">
                                    {!! $event->description !!}
                                </textarea>
                            </div>
                        </div>
                        <br><br>
                        <div class="col-md-12 m-0 p-0">
                            <div class="md-form m-0 p-0">
                                <textarea name="en_updated" id="en_updated" cols="30" rows="15" class="md-textarea z-depth-0">
                                    {!! $event->en_description !!}
                                </textarea>
                            </div>
                        </div>
                        <div class="col-md-12 m-0 p-0">
                            <div class="md-form text-center m-0 pt-0 pl-0 pr-0 pb-2">
                                <button class="btn btn-primary text-uppercase rounded-0 mb-1" type="submit">сохранить</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
