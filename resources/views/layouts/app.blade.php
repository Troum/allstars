<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>AllStars</title>
    <link rel="stylesheet" href="{{asset('css/mdbootstrap/css/mdb.css')}}">
    <link rel="stylesheet" href="{{asset('css/mdbootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('fonts/fontawesome/web-fonts-with-css/css/fontawesome-all.css')}}">
</head>
<body style="background-image: url({{asset('images/background/pattern.svg')}}); background-size: cover">
<div class="container-fluid m-0 p-0">
        @guest
        @else
            <nav class="navbar navbar-expand-md bg-dark mb-4 z-depth-1">
                <div class="text-white">
                    <h5 class="m-0 p-0">AllStars</h5>
                    <p><small>(пользователь: {{Auth::user()->name}})</small></p>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a href="{{route('home')}}" class="btn btn-link" title="Вернуться">
                                <i class="fas fa-chevron-circle-left"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('send')}}" class="btn btn-link" title="Сделать рассылку">
                                <i class="fas fa-envelope"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('create')}}" class="btn btn-link" title="Добавить событие">
                                <i class="fas fa-plus-circle"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('edit') }}" class="btn btn-link" title="Редактировать событие">
                                <i class="fas fa-pen-square"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-link" title="Выйти" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>
        @endguest
    <div class="row m-0 p-0">
            @yield('content')
    </div>
</div>
<script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('css/mdbootstrap/js/popper.min.js')}}"></script>
<script src="{{asset('css/mdbootstrap/js/mdb.min.js')}}"></script>
<script src="{{asset('css/mdbootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>
<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>
@yield('scripts')
</body>
</html>
