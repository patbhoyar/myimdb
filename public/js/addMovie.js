$(function() {
    
    $('#submitSearch').on('click', function(e){
        e.preventDefault();
        var movie = $('#searchMovie').val();
        
        $.ajax({
            type: 'POST',
            url: '../../app/lib/ajaxServer.php',
            data: {request:'addMovie', q: movie},
            success: function(data){
                //console.log(data);
                var movies = $.parseJSON(data);
                //console.log(movies);
                
                for (var i = 0; i < movies.length; i++) {
                    var movie = $.parseJSON(movies[i]);
                    var x = "<div class='movie'><img src='"+movie['poster']+"' alt='"+movie['name']+"' width='43' height='64' class='poster'/><div class='movieInfo'>";
                    x += movie['name']+" ("+movie['year']+")<div class='rating'>"+movie['rating']+"</div></div></div>";
                    $('#moviesList').append(x);
                }
                
                
                
            }
        });
        
    });
    
});