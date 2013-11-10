<!doctype html>
<html>
    <head>
        <title></title>
        <link href="http://localhost:8888/projects/movies/components/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="http://localhost:8888/projects/movies/public/css/style.css" rel="stylesheet"/>
    </head>
    <body>

        <div class="container">
            <nav class="navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">IMDB</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="{{ 'http://localhost:8888/projects/movies/public/movies' }}">Movies</a></li>
                        <li><a href="#">Actors</a></li>
                        <li><a href="#">Genres</a></li>
                    </ul>
                </div>
            </nav>
        </div>

        <div class="container">
            <div class="movieTitle"><h1>{{ $movie->name }} ({{$movie->year}})</h1></div>
            <div id="moviePoster">
                <img src="{{$movie->poster}}" alt="{{$movie->name}}"/>
            </div>
            <div id="movieData">
                <div id="movieRating"></div>
                <div id="movieActors">{{ $actors }}</div>
                <div id="movieLanguages"></div>
                <a href="{{$movie->url}}" target="_blank">
                    <button type="button" class="btn btn-default btn-lg seen"><span class="glyphicon glyphicon-film">View on IMDB</span></button>
                </a>
                
                @if($movie->seen == 0)
                <button type="button" class="btn btn-default btn-lg seen"><span class="glyphicon glyphicon-star">Mark as Seen</span></button>
                @else
                <button type="button" class="btn btn-success btn-lg seen"><span class="glyphicon glyphicon-star">Seen</span></button>
                @endif

                @if($movie->seen == 0)
                <button type="button" class="btn btn-danger btn-lg watchlist"><span class="glyphicon glyphicon-plus-sign"></span>Watchlist</button>
                @else
                <button type="button" class="btn btn-default btn-lg watchlist"><span class="glyphicon glyphicon-plus-sign"></span>Watchlist</button>
                @endif
            </div>
        </div>
        

        <script src="http://localhost:8888/projects/movies/components/jquery/jquery.min.js"></script>

    </body>
</html>
