$(function() {
    
    $(document).on('click', '#submitSearch', function(e){
        e.preventDefault();
        var movie = $('#searchMovie').val();
        
        $.ajax({
            type: 'POST',
            url: '../../public/movies/imdbSearch',
            data: {q: movie},
            success: function(data){
                
                $('#moviesList').html("");
                
                var movies = $.parseJSON(data);
                console.log(movies);
                
                for (var i = 0; i < movies.length; i++) {
                    var movie = $.parseJSON(movies[i]);
                    var x = "<div class='searchMovieContainer' id='"+movie['imdbId']+"'><div class='movieTitle'>";
                    x += movie['name']+" ("+movie['year']+")</div><div class='btn btn-primary selectMovie'>Select</div></div>";
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
            url: '../../public/movies/imdbGetMovieById',
            data: {q: movieId},
            success: function(data){
                console.log(data);
            }
        });
        
    });
    
});