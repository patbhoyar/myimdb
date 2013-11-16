$(function() {
    
    $(document).on('click', '#submitSearch', function(e){
        e.preventDefault();
        var movie = $('#searchMovie').val();
        
        $.ajax({
            type: 'POST',
            url: '../../app/lib/ajaxServer.php',
            data: {request:'searchMovie', q: movie},
            success: function(data){
                
                $('#moviesList').html("");
                
                var movies = $.parseJSON(data);
                console.log(movies);
                
                for (var i = 0; i < movies.length; i++) {
                    var movie = $.parseJSON(movies[i]);
                    var x = "<div class='movie' id='"+movie['id']+"'><img src='"+movie['poster']+"' alt='"+movie['name']+"' width='43' height='64' class='poster'/>";
                    x += "<div class='movieInfo'>";
                    x += movie['name']+" ("+movie['year']+")<div class='rating'>"+movie['rating']+"</div></div><div class='btn btn-primary selectMovie'>Select</div></div>";
                    $('#moviesList').append(x);
                }
            }
        });
        
    });
    
    $(document).on('click', '.selectMovie', function(e){
        e.preventDefault();
        var movieId = $(this).parent().attr('id');
        
        $.ajax({
            type: 'POST',
            url: '../../app/lib/ajaxServer.php',
            data: {request:'addMovie', q: movieId},
            success: function(data){
                console.log(data);
            }
        });
        
    });
    
});