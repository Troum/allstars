$(document).ready(function () {
    $('.current-year'). on('click', function () {

        $(this).parent().find('li').not('.current-year').toggle('slow');
		

    });



    $('.current-year'). one('click', function () {

        var self = $(this); 



        $(this).parent().find('li').not('.current-year').on('click', function () {
var y=$(this).text();
$('#foto_content').load('foto_content.php?y='+y);
            self.text($(this).text());

            $(this).parent().find('li').not('.current-year').toggle('slow');
			

        });

    });

});

