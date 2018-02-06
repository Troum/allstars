@extends('layouts.app')

@section('content')

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="col-md-6 mx-auto">
        <h5 class="text-uppercase text-center">Измените дату, город, время и место выбранного события</h5>
        <form action="/home/edit/date/{{$additional->id}}/update" class="md-form bg-light form-control rounded-0" method="POST">
            {{csrf_field()}}
            <div class="col-md-12">
                <div class="md-form m-0 p-1">
                    <input id="newdate" type="date" class="form-control bg-light" name="newdate" placeholder="Измените дату" autofocus>
                </div>
                <label for="newdate"><i class="fas fa-calendar-alt"></i></label>
            </div>
            <div class="col-md-12">
                <div class="md-form m-0 p-1">
                    <input id="newtime" type="time" class="form-control bg-light" name="newtime" placeholder="Измените время" autofocus>
                </div>
                <label for="newtime"><i class="fas fa-clock"></i></label>
            </div>
            <div class="col-md-12">
                <div class="md-form m-0 p-1">
                    <input id="newplace" type="text" class="form-control bg-light" name="newplace" placeholder="Измените место" autofocus>
                </div>
                <label for="newplace"><i class="fas fa-building"></i></label>
            </div>

            <div class="col-md-12">
                <div class="md-form m-0 p-1">
                    <input id="en_newplace" type="text" class="form-control bg-light" name="en_newplace" placeholder="Измените место на английском" autofocus>
                </div>
                <label for="en_newplace"><i class="fas fa-building"></i></label>
            </div>

            <div class="col-md-12">
                <div class="md-form m-0 p-1">
                    <input id="newcity" type="text" class="form-control bg-light" name="newcity" placeholder="Измените город" autofocus>
                </div>
                <label for="newcity"><i class="fas fa-address-book"></i></label>
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
                                        <textarea id="newprice" name="newprice" required autofocus>Введите информацию о стоимости</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="md-form m-0 p-1 text-center">
                    <button class="btn btn-primary rounded-0 text-uppercase" type="submit">сохранить</button>
                </div>
            </div>
        </form>
    </div>
@endsection