@extends('layouts.app')

@section('content')

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="col-md-10 mx-auto mt-0 mr-0 ml-0 mb-3  p-0">
        <br>
        <h5 class="text-center">Данная инструкция предназначена для того, чтобы объяснить принципы работы с сайтом</h5>
        <hr class="col-md-6 mx-auto">
        <br>
        <div class="row m-0 p-0">
            <div class="col-md-5 mx-auto text-center">
                <img src="{{asset('images/instructions/menu.png')}}" alt="Меню" class="img-fluid">
            </div>
            <div class="col-md-6 mx-auto">
                <section>
                    <p>Ниже представлен список кнопок меню в соответствии с их действием</p>
                    <ul>
                        <li>переход на главную страницу кабинета Администратора&nbsp;&nbsp;<i class="fas fa-chevron-circle-left"></i></li>
                        <li>переход к работе с рассылкой&nbsp;&nbsp;<i class="fas fa-envelope"></i></li>
                        <li>добавление событий&nbsp;&nbsp;<i class="fas fa-plus-circle"></i></li>
                        <li>редактирование событий&nbsp;&nbsp;<i class="fas fa-pen-square"></i></li>
                        <li>выход&nbsp;&nbsp;<i class="fas fa-sign-out-alt"></i></li>
                    </ul>
                </section>
            </div>
        </div>
        <br>
        <h4 class="text-center text-uppercase">Добавление события</h4>
        <hr class="col-md-6 mx-auto">
        <br>
        <div class="row m-0 p-0">
            <div class="col-md-6 mx-auto">
                <section>
                    <p>Для того, чтобы добавить событие, нажмите на соответствующую иконку меню.</p>
                    <p>После этого необходимо заполнить все поля в представленной форме и нажать кнопку <strong>"Сохранить"</strong></p>
                </section>
            </div>
            <div class="col-md-5 text-center">
                <img src="{{asset('images/instructions/create.png')}}" alt="Создание" class="img-fluid">
            </div>
        </div>
        <br>
        <h4 class="text-center text-uppercase">Редактирование события</h4>
        <hr class="col-md-6 mx-auto">
        <br>
        <div class="row m-0 p-0">
            <div class="col-md-5 text-center">
                <img src="{{asset('images/instructions/edit.png')}}" alt="Редактирование" class="img-fluid">
            </div>
            <div class="col-md-6 mx-auto">
                <section>
                    <p>После сохранения события вы будете перенаправлены на страницу с редактированием информации о событии.</p>
                    <p>На данной странице будет отображен список созданных событий. События, которые уже были проведены, будут отображаться под записью
                        <strong>"Прошедшие события"</strong>.
                    </p>
                </section>
            </div>
        </div>
        <br>
        <h4 class="text-center text-uppercase">Редактирование события. Добавление информации</h4>
        <hr class="col-md-6 mx-auto">
        <br>
        <div class="row m-0 p-0">
            <div class="col-md-4 mx-auto">
                <section>
                    <p>Для того, чтобы отредактировать событие, кликните по нему.</p>
                        <p>После этого появится изображение обложки созданного ранее события, а также кнопки
                        <strong class="text-uppercase">редактировать событие</strong> и <strong class="text-uppercase">удалить событие</strong></p>
                </section>
            </div>
            <div class="col-md-7 text-center">
                <img src="{{asset('images/instructions/edit-info.png')}}" alt="Редактирование. Информация" class="img-fluid">
            </div>
        </div>
        <br>
        <hr class="col-md-6 mx-auto">
        <br>
        <div class="row m-0 p-0">
            <div class="col-md-7 text-center">
                <img src="{{asset('images/instructions/event-edit.png')}}" alt="Редактирование. Информация" class="img-fluid">
            </div>
            <div class="col-md-4 mx-auto">
                <section>
                    <p>После клика по кнопке <strong class="text-uppercase">редактировать событие</strong>, вы будете перенаправлены на персональную страницу редактирования.</p>
                    <p>На персональной странице редактирования доступны следующие вкладки:</p>
                    <ul>
                        <li>Дата и место события</li>
                        <li>Ссылки на видео</li>
                        <li>Фото слайдера</li>
                        <li>Доп. инфо о билетах</li>
                        <li>Фотогалерея</li>
                        <li>Редактировать данные</li>
                    </ul>
                </section>
            </div>
        </div>
        <br>
        <br>
        <h4 class="text-center text-uppercase">Описание вкладок</h4>
        <hr class="col-md-6 mx-auto">
        <br>
        <div class="row m-0 p-0">
            <div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel">
                <!--Indicators-->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-2" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-2" data-slide-to="1"></li>
                    <li data-target="#carousel-example-2" data-slide-to="2"></li>
                    <li data-target="#carousel-example-2" data-slide-to="3"></li>
                    <li data-target="#carousel-example-2" data-slide-to="4"></li>
                    <li data-target="#carousel-example-2" data-slide-to="5"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <div class="view hm-black-strong">
                            <img class="d-block w-100" src="{{asset('images/instructions/date.png')}}" alt="Дата">
                            <div class="mask"></div>
                        </div>
                        <div class="carousel-caption">
                            <h3 class="h3-responsive">Дата и место события</h3>
                            <p>В данной вкладке происходит редактирование даты, времени, места и города добавленного события. Если событие имеет несколько дат проведения - данные даты добавляются именно в этой вкладке. Важно: в появляющемся поле информации о билетах необходимо добавить только стоимость билетов</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="view hm-black-strong">
                            <img class="d-block w-100" src="{{asset('images/instructions/links.png')}}" alt="Ссылки">
                            <div class="mask"></div>
                        </div>
                        <div class="carousel-caption">
                            <h3 class="h3-responsive">Ссылки на видео</h3>
                            <p>В данной вкладке производится добавление ссылок на видеозаписи, связанные с данным событием и размещенные на видеохостинге YouTube</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="view hm-black-strong">
                            <img class="d-block w-100" src="{{asset('images/instructions/slider.png')}}" alt="Слайдер">
                            <div class="mask"></div>
                        </div>
                        <div class="carousel-caption">
                            <h3 class="h3-responsive">Фото слайдера</h3>
                            <p>На данной вкладке добавляются фотографии, коотрые используются для отображения на подробной странице события в области слайдера</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="view hm-black-strong">
                            <img class="d-block w-100" src="{{asset('images/instructions/ticket.png')}}" alt="Информация">
                            <div class="mask"></div>
                        </div>
                        <div class="carousel-caption">
                            <h3 class="h3-responsive">Доп. инфо о билетах</h3>
                            <p>На данной укладке необходимо добавить инфорамцию касательно возрастных ограничений, а также - уникальный идентификатор события для покупки билетов через портал kvitki.by</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="view hm-black-strong">
                            <img class="d-block w-100" src="{{asset('images/instructions/gallery.png')}}" alt="Галерея">
                            <div class="mask"></div>
                        </div>
                        <div class="carousel-caption">
                            <h3 class="h3-responsive">Фотогалерея</h3>
                            <p>В данной вкладке реализован функционал добавления фотоотчетов прошедших или прошедшего мероприятия. Необходимо указать дату проведения мероприятия, добавить фотографии мероприятия, а также имя фотографа. Кроме того, существует возможность отредактировать фотогалерею.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="view hm-black-strong">
                            <img class="d-block w-100" src="{{asset('images/instructions/editing.png')}}" alt="Редактировать описание">
                            <div class="mask"></div>
                        </div>
                        <div class="carousel-caption">
                            <h3 class="h3-responsive">Редактировать данные</h3>
                            <p>В данной вкладке реализована возможность редактировать описание события.</p>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <br>
        <h4 class="text-center text-uppercase">Результат</h4>
        <hr class="col-md-6 mx-auto">
        <br>
        <div class="row m-0 p-0">
            <div class="col-md-9 text-center">
                <img src="{{asset('images/instructions/result.png')}}" alt="Результат" class="img-fluid">
            </div>
            <div class="col-md-3 mx-auto">
                <section>
                    <p>Добавив всю необходимую информацию по событию, вы получите результат, как на изображении</p>
                    <p>В случае необходимости есть возможность отредактировать информацию. Для этого нужно кликнуть по дате, которая отображается справа от фотографии события</p>
                </section>
            </div>
        </div>
        <br>
        <br>
        <h4 class="text-center text-uppercase">Видеопример добавления</h4>
        <hr class="col-md-6 mx-auto">
        <br>
        <div class="row m-0 p-0">
            <div class="col-md-8 m-0 p-0 mx-auto">
                <video style="width: 100%; height: 100%" controls preload="auto">
                    <source src="{{asset('images/instructions/video/instructions.mp4')}}" type="video/mp4">
                </video>
            </div>
        </div>
        <br>
        <h4 class="text-center text-uppercase">Видеопример добавления прошедшего события</h4>
        <hr class="col-md-6 mx-auto">
        <br>
        <div class="row m-0 p-0">
            <div class="col-md-4 m-0 p-0">
                <p>При добавлении уже прошедшего события (так как сайт новый, а прошедшие события должны отображаться), необходимо создать событие, <strong>ОБЯЗАТЕЛЬНО</strong> выставить дату события, место и время события, затем нажать на кнопку <strong>СОХРАНИТЬ</strong>.</p>
                <p>После этого можно добавлять фотографии во вкладке <strong>ФОТОГАЛЕРЕЯ</strong></p>
                <p>При добавлении фотографий нужно <strong>ОБЯЗАТЕЛЬНО</strong> выставить дату и имя фотографа, иначе фотографии не загрузятся на сервер.</p>
                <p>Внимательно посмотрите видеоинструкцию.</p>
            </div>
            <div class="col-md-7 ml-auto m-0 p-0">
                <video style="width: 100%; height: 100%" controls preload="auto">
                    <source src="{{asset('images/instructions/video/instructions_2.mp4')}}" type="video/mp4">
                </video>
            </div>
        </div>

    </div>

@endsection
