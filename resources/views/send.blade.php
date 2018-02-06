@extends('layouts.app')

@section('content')

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="col-md-6 mx-auto m-0 p-0">
        @if(count($list) == 0)
        @else
        <div class="row m-0 p-1" id="files-field">
            {{csrf_field()}}
            @foreach($list as $item)
                <div class="col-md-2 m-2 mx-auto text-center p-1" id="file-container">
                    <i class="fas fa-times" id="delete"></i>
                    <i class="fas fa-file-code fa-4x" id="file-template"></i>
                    <small><strong>{{$item}}</strong></small>
                </div>
            @endforeach
        </div>
        @endif
        <div class="accordion rounded-0" id="accordionOne" role="tablist" aria-multiselectable="true">
            <div class="card col-md-12 border-0 rounded-0">
                <div class="card-header" role="tab" id="headingTwo">
                    <a data-toggle="collapse" data-parent="#accordionOne" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <h5 class="mb-0 text-center text-dark text-uppercase">
                            Добавить шаблон<i class="fas fa-angle-down ml-auto"></i>
                        </h5>
                    </a>
                </div>
                <div id="collapseOne" class="collapse hide" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="col-md-12">
                        <form class="md-form mx-auto col-md-12 m-0 form-control bg-light rounded-0 border-0 m-0 p-5" action="/home/send/add" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="col-md-12">
                                <div class="file-field">
                                    <div class="btn btn-secondary btn-sm rounded-0">
                                        <span>Выберите шаблон письма</span>
                                        <input type="file" name="template" id="template" required>
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text" placeholder="Загрузите шаблон">
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
            </div>
        </div>
    </div>

@endsection