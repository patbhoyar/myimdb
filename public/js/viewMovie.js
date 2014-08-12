$(document).ready(function(){

    var root = "http://localhost:8888/projects/movies/public/";
    var myBtn = "";

    $(document).on('click', '.seen', function(){

        myBtn = $(this);
        $.ajax({
            type: 'POST',
            url: root+'movies/seen',
            data: {movieId: $(this).parent().attr('id')},
            success: function(data){
                console.log(data);
                if(data == "success"){
                    if(myBtn.hasClass('btn-default')){
                        myBtn.removeClass('btn-default').addClass('btn-success');
                        myBtn.children().removeClass('glyphicon-eye-close').addClass('glyphicon-eye-open');
                    }else{
                        myBtn.removeClass('btn-success').addClass('btn-default');
                        myBtn.children().removeClass('glyphicon-eye-open').addClass('glyphicon-eye-close');
                    }
                }else{
                    alert('There was a problem updating the DB. Please try again later!');
                }
            }
        });
    });

});