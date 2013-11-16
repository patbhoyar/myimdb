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
                    <a class="navbar-brand" href="{{$website}}">IMDB</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        @if($page == 'movies')
                        <li class="active dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Movies <b class="caret"></b></a>
                        @else
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Movies <b class="caret"></b></a>
                        @endif
                            <ul class="dropdown-menu">
                                <li><a href="{{$website}}movies">All Movies</a></li>
                                <li><a href="{{$website}}movies/add">Add a Movie</a></li>
                                <li><a href="#">Search Movies</a></li>
                            </ul>
                        </li>

                        @if($page == 'actors')
                        <li class="active"><a href="{{$website}}actors">Actors</a></li>
                        @else
                        <li><a href="{{$website}}actors">Actors</a></li>
                        @endif

                        @if($page == 'genres')
                        <li class="active"><a href="{{$website}}genres">Genres</a></li>
                        @else
                        <li><a href="{{$website}}genres">Genres</a></li>
                        @endif

                        @if($page == 'watchlist')
                        <li class="active"><a href="{{$website}}watchlist">Watchlist</a></li>
                        @else
                        <li><a href="{{$website}}watchlist">Watchlist</a></li>
                        @endif
                    </ul>
                </div>
            </nav>
        </div>

        @yield('content')


        @if(isset($css))
        @foreach($css as $link)
        <link href="{{$website}}css/{{$link}}.css" rel="stylesheet"/>
        @endforeach
        @endif

        <script src="{{$webroot}}components/jquery/jquery.min.js"></script>
        <script src="{{$webroot}}components/bootstrap/js/bootstrap.min.js"></script>

        @if(isset($scripts))
        @foreach($scripts as $script)
        <script src="{{$website}}js/{{$script}}.js"></script>
        @endforeach
        @endif
    </body>
</html>
