@extends('layouts.app')

@section('content')

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
        <div class="col-md-10 m-0 p-0 mx-auto bg-light">
            <div class="col-md-12 m-0 p-0">
                <div class="row m-0 p-0" id="gallery-container">
                    @if(count($event->gallery) == 0)
                        <div class="col-md-12 m-0 p-5">
                            <h4 class="align-middle text-center text-secondary text-uppercase">Здесь отобразятся загруженные фотографии</h4>
                        </div>
                    @else
                        @foreach($event->gallery as $photo)
                            <div class="col-md-2 m-0 p-0">
                                <div class="card m-0 p-0" >
                                    <span class="fas fa-times text-danger" style="position: absolute; top: 5%; right: 5%;" id="delete-photo"></span>
                                    <img src="{{asset('images/gallery/'.$event->dirname.'/'.$additional->slug.'/'.$photo->image)}}" alt="{{$photo->image}}" class="img-fluid rounded-0" id="{{$event->id}}">
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="col-md-12 mt-4 ml-0 mr-0 mb-0 pb-3">
                <hr>
                <form class="md-form mx-auto col-md-6 m-0 form-control bg-light rounded-0 border-0 m-0 p-0" action="/home/edit/date/{{$additional->id}}/gallery" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="col-md-12">
                        <div class="file-field">
                            <div class="btn btn-secondary btn-sm rounded-0">
                                <span>Выберите фотографии</span>
                                <input type="file" name="gallery[]" id="gallery" multiple required>
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="Загрузите фотографии">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 my-auto mx-auto">
                        <div class="md-form m-0 p-0">
                            <input type="text" name="photographer" id="photographer" placeholder="Фотограф" required>
                        </div>
                    </div>

                    <div class="col-md-12 m-0 p-0 text-center">
                        <div class="md-form m-0 p-0">
                            <button class="btn btn-primary text-uppercase rounded-0 mb-1" type="submit">Загрузить</button>
                        </div>
                    </div>
                </form>
                <hr>
                <div class="col-md-12 mr-auto">
                    <div class="md-form">
                        <div class="accordion" id="accordionOne" role="tablist" aria-multiselectable="true">
                            <div class="card col-md-6 mx-auto bg-light  border-0">
                                <div class="card-header" role="tab" id="headingTwo">
                                    <a data-toggle="collapse" data-parent="#accordionOne" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <h5 class="mb-0 text-center text-dark text-uppercase bg-light">
                                            Редактировать<i class="fas fa-angle-down ml-auto"></i>
                                        </h5>
                                    </a>
                                </div>
                                <div id="collapseOne" class="collapse hide" role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="col-md-12">
                                        <form class="md-form mx-auto col-md-12 m-0 form-control bg-light rounded-0 border-0 m-0 p-0" action="/home/edit/date/{{$additional->id}}/gallery-update" method="POST">
                                            {{csrf_field()}}
                                            <div class="col-md-12">
                                                <div class="md-form m-0">
                                                    <input id="newphotographer" type="text" class="form-control bg-light" name="newphotographer" placeholder="Изменить фотографа">
                                                </div>
                                                <label for="seller-id"><i class="fas fa-camera"></i></label>
                                            </div>
                                            <div class="col-md-12 m-0 p-0 text-center">
                                                <div class="md-form m-0 p-0">
                                                    <button class="btn btn-primary text-uppercase rounded-0 mb-1" type="submit">Загрузить</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection