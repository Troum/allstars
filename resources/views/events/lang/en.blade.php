<div class="col-md-4 mx-auto p-4">
    <h1 class="text-uppercase text-center animated fadeInUp">about us</h1>
</div>
<div class="row p-2">
    <div class="col-md-7 mx-auto">
        <img src="{{asset('images/background/allstars.png')}}" alt="" class="img-fluid">
    </div>
    <div class="col-md-4 mx-auto p-4">
        <strong><a class="text-dark" href="/">ALLSTARS</a></strong> - large Belarusian concert Agency, established
        in 2009.
        <strong><a class="text-dark" href="/">ALLSTARS</a></strong> working in the field of organizing events of the
        highest level. We, the organizers of the concerts of such world stars as Sting, Shakira, Scorpions, Hugh
        Laurie, Patricia Kaas, Vanessa-Mae, Korn, Robbie Williams. We work with the best artists from Russia,
        Ukraine and Belarus: Philip Kirkorov, Sergey Penkin, Dmitry Khvorostovsky, Yuri Antonov, Valery, Tree,
        "BI-2", "Okean Elzy", "spleen", "Boombox", "BRUTTO", "lapis-98" and many others. On account of the
        organization of such festivals as "LIDBEER" and "GLOBAL TOP DJS".
    </div>
</div>
<br>
<hr class="col-md-8 d-block">
<br>
<div class="row p-2">
    <div class="col-md-4 mx-auto p-4">
        <p><strong><a class="text-dark" href="/">ALLSTARS</a></strong>&nbsp; is professional and creative approach
            to the organization of each event:</p>
        <ul>
            <li>is a unique marketing research that give a detailed view about the market and target audience;</li>
            <li>carries out an effective advertising campaign;</li>
            <li>establishes a mutually beneficial business relationship with the venues.</li>
        </ul>
        <p><strong>We know how to make any event interesting and most effective!</strong></p>
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
        <p><strong>Schedule:</strong></p>
        <p>Monday – Friday:&nbsp;&nbsp;<strong>10:00 – 18:00</strong></p>
        <p><strong>Contact information:</strong></p>
        <p>Purchase, refund and other information:</p>
        <ul>
            <li><a class="text-dark" href="tel:+375-29-650-11-33">+375 (29) 650 11 33</a></li>
            <li><a class="text-dark" href="tel:+375-29-763-11-11">+375 (29) 763 11 11</a></li>
        </ul>
        <p><strong>Fax:</strong>&nbsp;&nbsp;+375 (17) 327 68 23</p>
        <p><strong>E-mail:</strong>&nbsp;&nbsp;<a class="text-dark"
                                                  href="mailto:info@allstars.by">info@allstars.by</a></p>
    </div>
</div>
<br>
<div id="subscribe">
    <h1 class="wow fadeInUp">subscribe via</h1>
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
                <h5 class="modal-title" id="exampleModalLabel">subscribe</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            {{csrf_field()}}
            <div class="modal-body">
                <label for="name">Enter your name</label>
                <br>
                <input class="form-control rounded-0" type="text" id="name" name="name">
                <br>
                <label for="email">Enter your e-mail address</label>
                <br>
                <input class="form-control rounded-0" type="email" id="email" name="email">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-rounded secondary-0" data-dismiss="modal">Close</button>
                <button id="subscribe_btn" class="btn btn-danger rounded-0">Subscribe</button>
            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Message about how to subscribe</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <h4 id="success_message" class="text-uppercase text-center"></h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-rounded secondary-0" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div id="vk_subscribe" hidden="hidden"></div>