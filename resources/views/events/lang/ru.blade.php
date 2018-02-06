<div class="col-md-4 mx-auto p-4">
    <h1 class="text-uppercase text-center animated fadeInUp">о нас</h1>
</div>
<div class="row p-2">
    <div class="col-md-7 mx-auto">
        <img src="{{asset('images/background/allstars.png')}}" alt="" class="img-fluid">
    </div>
    <div class="col-md-4 mx-auto p-4">
        <strong><a class="text-dark" href="/">ALLSTARS</a></strong> - крупное белорусское концертное агентство,
        созданное в 2009 году.
        <strong><a class="text-dark" href="/">ALLSTARS</a></strong> работает в сфере организации мероприятий самого
        высокого уровня. Мы организаторы концертов таких мировых звезд, как Sting, Shakira, Scorpions, Hugh Laurie,
        Patricia Kaas, Vanessa-Mae, Korn, Robbie Williams. С нами работают лучшие артисты из России, Украины и
        Беларуси: Филипп Киркоров, Сергей Пенкин, Дмитрий Хворостовский, Юрий Антонов, Валерия, Ёлка, «БИ-2», «Океан
        Ельзы», «Сплин», «Бумбокс», «BRUTTO», «Ляпис-98» и многие другие. На нашем счету организация таких
        фестивалей как «LIDBEER» и «GLOBAL TOP DJS».
    </div>
</div>
<br>
<hr class="col-md-8 d-block">
<br>
<div class="row p-2">
    <div class="col-md-4 mx-auto p-4">
        <p><strong><a class="text-dark" href="/">ALLSTARS</a></strong>&nbsp;профессионально и творчески подходит к
            организации каждого мероприятия:</p>
        <ul>
            <li>проводит уникальные маркетинговые исследования, которые дают детальное представление о состоянии
                рынка и целевой аудитории;
            </li>
            <li>осуществляет эффективную рекламную кампанию;</li>
            <li>устанавливает взаимовыгодные деловые отношения с площадками.</li>
        </ul>
        <p><strong>Мы знаем, как сделать любое мероприятие интересным и максимально эффективным!</strong></p>
    </div>
    <div class="col-md-7 mx-auto">
        <img src="{{asset('images/background/allstarsmore.png')}}" alt="" class="img-fluid">
    </div>
</div>
<br>
<hr class="col-md-8 d-block">
<br>
<div class="row p-2">
    <div class="col-md-6 ml-auto" id="map"></div>
    <div class="col-md-4 mx-auto p-4">
        <p><strong>График работы:</strong></p>
        <p>Понедельник – пятница:&nbsp;&nbsp;<strong>10:00 – 18:00</strong></p>
        <p><strong>Контактная информация:</strong></p>
        <p>Приобретение, возврат и другая информация:</p>
        <ul>
            <li><a class="text-dark" href="tel:+375-29-650-11-33">+375 (29) 650 11 33</a></li>
            <li><a class="text-dark" href="tel:+375-29-763-11-11">+375 (29) 763 11 11</a></li>
        </ul>
        <p><strong>Факс:</strong>&nbsp;&nbsp;+375 (17) 327 68 23</p>
        <p><strong>E-mail:</strong>&nbsp;&nbsp;<a class="text-dark"
                                                  href="mailto:info@allstars.by">info@allstars.by</a></p>
    </div>
</div>
<br>
<div id="subscribe">
    <h1 class="wow fadeInUp">Оформите подписку через</h1>
    <div class="subscribe-wrapper">
        <div class="subscribe-email">
            <a class="wow fadeInLeft" data-toggle="modal" data-target="#exampleModal">e-mail</a>
        </div>
        <div class="subscribe-vk">
            <a id="vk" class="wow fadeInRight">vk</a>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Оформить подписку</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{csrf_field()}}
            <div class="modal-body">
                <label for="name">Введите свое имя</label>
                <br>
                <input class="form-control rounded-0" type="text" id="name" name="name">
                <br>
                <label for="email">Введите свой e-mail адрес</label>
                <br>
                <input class="form-control rounded-0" type="email" id="email" name="email">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary rounded-0" data-dismiss="modal">Закрыть</button>
                <button id="subscribe_btn" class="btn btn-danger rounded-0">Подписаться</button>
            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Сообщение о подписке</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h4 id="success_message" class="text-uppercase text-center"></h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary rounded-0" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>
<div id="vk_subscribe" hidden="hidden"></div>