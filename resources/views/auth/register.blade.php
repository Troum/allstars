@extends('layouts.app')

@section('content')
    <div class="col-md-6 mx-auto">
        <h4 class="d-block mx-auto text-center text-uppercase mt-3">регистрация</h4>
        <form class="md-form form-control p-4 rounded-0 z-depth-1-half mt-3" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}
            <div class="col-md-12">
                <div class="md-form{{ $errors->has('name') ? ' has-error' : '' }}">
                    <i class="fa fa-user prefix grey-text"></i>
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                    <label for="name">Введите ваши ФИО</label>
                    @if ($errors->has('name'))
                        <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="col-md-12">
                <div class="md-form{{ $errors->has('email') ? ' has-error' : '' }}">
                    <i class="fa fa-envelope prefix grey-text"></i>
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                    <label for="email">Введите свой e-mail</label>
                    @if ($errors->has('email'))
                        <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="col-md-12">
                <div class="md-form{{ $errors->has('password') ? ' has-error' : '' }}">
                    <i class="fa fa-lock prefix grey-text"></i>
                    <input id="password" type="password" class="form-control" name="password" required>
                    <label for="password">Введите сюда свой пароль</label>
                    @if ($errors->has('password'))
                        <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                    @endif
                </div>
            </div>
            <div class="col-md-12">
                <div class="md-form">
                    <i class="fa fa-lock prefix grey-text"></i>
                    <label for="password-confirm">Повторите введенный Вами пароль</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn rounded-0 btn-primary">
                    Зарегистрироваться
                </button>
            </div>
        </form>
    </div>
@endsection
