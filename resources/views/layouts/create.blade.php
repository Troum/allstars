@extends('layouts.app')

@section('content')

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="col-md-6 mx-auto m-0 p-0">
    <form action="{{route('store')}}" method="POST" class="form-control rounded-0 p-5 z-depth-1" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="col-md-12">
            <div class="md-form">
                <label for="title">Название исполнителя/группы</label>
                <input class="md-textarea mt-1" type="text" id="title" name="title">
            </div>
        </div>
        <div class="col-md-12">
            <label for="description">Описание</label>
            <div class="md-form">
                <textarea type="text" id="description" class="md-textarea" name="description"></textarea>
            </div>
        </div>

        <div class="col-md-12">
            <div class="file-field">
                <div class="btn btn-primary btn-sm rounded-0">
                    <span>Выберите файл обложки</span>
                    <input type="file" name="file" id="file">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" placeholder="Загрузите обложку">
                </div>
            </div>
        </div>
        <div class="col-md-12 text-center mt-3">
            <button class="btn btn-primary rounded-0 text-uppercase" type="submit">сохранить</button>
        </div>
    </form>
    </div>
@endsection
