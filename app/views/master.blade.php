<!doctype html>
<html>
    <head>
        <title>{{$title}}</title>
        <link href="{{$webroot}}components/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="{{$website}}css/style.css" rel="stylesheet"/>
    </head>
    <body>

        <div class="container">
            <nav class="navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">IMDB</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="{{$website}}movies">Movies</a></li>
                        <li><a href="{{$website}}actors">Actors</a></li>
                        <li><a href="{{$website}}genres">Genres</a></li>
                        <li><a href="{{$website}}watchlist">Watchlist</a></li>
                    </ul>
                </div>
            </nav>
        </div>
        
        @yield('content')

        <script src="{{$webroot}}components/jquery/jquery.min.js"></script>

    </body>
</html>
