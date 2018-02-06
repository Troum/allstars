$(document).ready(function () {
    $('div.tab-pane').addClass('show');
    var path = $('.file-path');
    $('input[type=file]').on('change',function () {
        path.addClass('valid');
        path.val(this.files[0].name);
    });

    $('#videos').find('button').each(function (index) {
        $(this).on('click', function () {
            $('#videos').append('<li class="list-group-item border-0 bg-transparent" id="item'+(index+1)+'">\n' +
                '                                        <div class="row m-0 p-0">\n' +
                '                                            <div class="col-md-8 m-0 p-0">\n' +
                '                                                <input type="text" name="video[]" placeholder="Добавить ссылку на видео">\n' +
                '                                            </div>\n' +
                '                                            <div class="col-md-4">\n' +
                '                                                <button type="button" class="btn danger-color btn-floating fas fa-times" id="'+(index+1)+'"></button>\n' +
                '                                            </div>\n' +
                '                                        </div>\n' +
                '                                    </li>');
        });
    });

    $(document).on('click', '.danger-color', function(){
        var id = $(this).attr("id");
        $('#item'+id+'').remove();
    });

    $('#files-field').find('i#delete').each(function () {
        $(this).on('click', function () {
            $.ajax({
                url: '/delete-template',
                type: 'POST',
                data: {_token: $('input[type="hidden"]').val(), name: $(this).siblings('small').text()},
                dataType: 'JSON',
                success: function () {
                }
            });
            $("#file-container").remove();
        });
    });
    $('#files-field').find('i#file-template').each(function () {
        $(this).on('click', function () {
            $.ajax({
                url: '/send-mail',
                type: 'POST',
                data: {_token: $('input[type="hidden"]').val(), name: $(this).siblings('small').text()},
                dataType: 'JSON',
                success: function (data) {
                    console.log(data);
                }
            });
        });
    })

    $('#tab-container section a').each(function (i) {
        $(this).attr('data-tab','tab'+i);
    });


    $('#tab-content>div.tab-pane').each(function(i) {
        $(this).attr('data-tab', 'tab'+i);
    });

    $('#tab-content>div.tab-pane').not(':first-of-type').hide();

    $('#tab-container section a').on('click', function () {
        var active = $('#tab-container section').find('a.active');
        var dataTab = $(this).data('tab');
        active.removeClass('active');
        $('#tab-content>div.tab-pane').hide();
        $('#tab-content>div.tab-pane').filter('[data-tab='+dataTab+']').show();

    });
    $('#gallery-container').find('span#delete-photo').each(function () {
        $(this).on('click', function () {
            var url = window.location.pathname,
                slug = url.substr(url.lastIndexOf('/') + 1);
            $.ajax({
                url: url+'/delete-photo',
                type: 'POST',
                data: {_token: $('input[type="hidden"]').val(), name: $(this).siblings('img').attr('alt'), slug: slug, id: $(this).siblings('img').attr('id')},
                dataType: 'JSON',
                success: function () {
                }
            });
            $(this).siblings('img').remove();
            $(this).remove();
        });
    });


});