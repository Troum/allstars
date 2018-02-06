@extends('layouts.app')

@section('content')
    <div class="col-md-6 mx-auto">
        <h4 class="text-center text-uppercase mt-3">Вход</h4>
        <form class="md-form form-control rounded-0 mx-auto mt-3 p-5 z-depth-1-half" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}

            <div class="col-md-12 mb-5">
                <div class="md-form form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <i class="fas fa-envelope prefix"></i>
                    <input type="email" id="email" class="form-control validate" name="email" value="{{ old('email') }}" required autofocus>
                    @if ($errors->has('email'))
                        <span class="help-block">
                       <strong class="text-danger">{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                    <label for="email" data-error="Упс!" data-success="Вы есть">Адрес e-mail</label>
                </div>
            </div>
            <div class="col-md-12 mt-5">
                <div class="md-form form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <i class="fa fa-lock prefix"></i>
                    <input id="password" type="password" class="form-control rounded-0" name="password" required>
                    @if ($errors->has('password'))
                        <span class="help-block">
                        <strong class="text-danger">{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                    <label for="password" data-error="Неверно!" data-success="Верно">Пароль</label>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn rounded-0 btn-primary">
                        Войти
                    </button>
                </div>
            </div>
        </form>
        <div class="col-md-10 mx-auto">
            <div class="form-group">
                <div class="col-md-12 text-center">
                    <a class="btn rounded-0 text-primary btn-link" href="{{ route('password.request') }}">
                        Забыли свой пароль?
                    </a>
                    {{--<a class="btn rounded-0 text-primary btn-link" href="{{ route('register') }}">--}}
                        {{--Регистрация--}}
                    {{--</a>--}}
                </div>
            </div>
        </div>
    </div>
@endsection
