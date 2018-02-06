@extends('layouts.app')

@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <h4 class="text-center text-uppercase mt-3">Восстановление пароля</h4>
    <form class="form-control rounded-0 col-md-6 mx-auto mt-5" method="POST" action="{{ route('password.email') }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="col-md-12 control-label">Введите свой e-mail</label>

            <div class="col-md-12">
                <input id="email" type="email" class="form-control rounded-0" name="email" value="{{ old('email') }}" required>

                @if ($errors->has('email'))
                    <span class="help-block">
                         <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-12 text-center">
                <button type="submit" class="btn rounded-0 btn-primary">
                    Отправить ссылку на восстановление
                </button>
            </div>
        </div>
    </form>
@endsection
