$(document).ready(function () {

    $('body').on('click', '.bbtn', function () {
        var id = $(this).attr('data-id');
        var group = $(this).attr('group-id');
        var bileti = $(this).attr('data-bileti');
        if (group != 0) {
            $.magnificPopup.open({
                items: {
                    src: '#general-popup-buy-ticket'
                },
                callbacks: {
                    beforeOpen: function () {
                        $('#general-popup-buy-ticket').load('tickets.php?id=' + id + '&group=' + group);
                        $('html').addClass('mfp-helper');
                    },
                    open: function () {
                        var button = $('<button>').addClass('mfp-close').attr('title', 'Close (Esc)').attr('type', 'button').text('×');
                        $(button).appendTo('.mfp-content');
                    },
                    close: function () {
                        $('html').removeClass('mfp-helper');
                    }
                }
            });
        } else {
            show_popup_frame(bileti, 'allstars');
        }
    });

    $('body').on('click', '#open_buy_popup', function() {
        var id = $(this).data('id');
        $('html').css('overflow','hidden');
        $.ajax({
            url: '/get-cards',
            type: 'GET',
            data: {_token: $('input[type="hidden"]').val(), id: $(this).data('id')},
            dataType: 'JSON',
            success: function (data) {
                $.ajax({
                    url: '/get-cards',
                    type: 'GET',
                    data: {_token: $('input[type="hidden"]').val(), id: id},
                    dataType: 'JSON',
                    success: function (data) {
                        $.ajax({
                            url: '/get-cover',
                            type: 'GET',
                            data: {_token: $('input[type="hidden"]').val(), id: id},
                            dataType: 'JSON',
                            success: function (response) {
                                var url = window.location.protocol + "//" + window.location.host +"/images/"+response.cover;
                                for($i = 0; $i <= data.length; $i++){
                                    if($('html').attr('lang') === 'en')
                                        $('.buy_popup .cards').append('<div class="card">\n' +
                                            '<div class="card-img" style="background-image: url('+url+');"></div>'+
                                            '                <section class="place-city-time">\n' +
                                            '                    <p>\n' +
                                            '                        <span class="date"><strong>'+new Date(data[$i].date).toLocaleDateString('en-US',{month:'long', day: 'numeric'})+'</strong></span>\n' +
                                            '                        <span class="time">'+new Date(data[$i].time).toLocaleTimeString('en-US',{hour: 'numeric', minute:'numeric'})+'</span>\n' +
                                            '                    </p>\n' +
                                            '                    <p>\n' +
                                            '                        <span class="city">'+data[$i].en_city+'</span> | <span class="stage">'+data[$i].en_place+'</span>\n' +
                                            '                    </p>\n' +
                                            '                </section>\n' +
                                            '                <button data-id="'+data[$i].event_id+'" data-bileti="'+data[$i].ticket_id+'" class="bbtn" group-id="0">Buy tickets</button>\n' +
                                            '            </div>');
                                    else {
                                        $('.buy_popup .cards').append('<div class="card">\n' +
                                            '<div class="card-img" style="background-image: url('+url+');"></div>'+
                                            '                <section class="place-city-time">\n' +
                                            '                    <p>\n' +
                                            '                        <span class="date"><strong>'+new Date(data[$i].date).toLocaleDateString('ru',{day: 'numeric', month:'long'})+'</strong></span>\n' +
                                            '                        <span class="time">'+new Date(data[$i].time).toLocaleTimeString('ru',{hour: 'numeric', minute:'numeric'})+'</span>\n' +
                                            '                    </p>\n' +
                                            '                    <p>\n' +
                                            '                        <span class="city">'+data[$i].city+'</span> | <span class="stage">'+data[$i].place+'</span>\n' +
                                            '                    </p>\n' +
                                            '                </section>\n' +
                                            '                <button data-id="'+data[$i].event_id+'" data-bileti="'+data[$i].ticket_id+'" class="bbtn" group-id="0">Купить билеты</button>\n' +
                                            '            </div>');
                                    }
                                }
                            }
                        })
                    }
                });

            }
        });
        $('#buy_popup').css('display','block');
    });
    $('body').on('click', '#close_buy_popup', function() {
        $('.buy_popup .cards .card').remove();
        $('html').css('overflow','auto');
        $('#buy_popup').css('display','none');
    });

});
