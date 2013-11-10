<!doctype html>
<html>
    <head>
        <title></title>
        <link href="../components/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
    </head>
    <body>

        <div class="container">
            <nav class="navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">IMDB</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="movies">Movies</a></li>
                        <li><a href="#">Actors</a></li>
                        <li><a href="#">Genres</a></li>
                    </ul>
                </div>
            </nav>
        </div>

        <div class="container">
            This is a list of Movies
        </div>
        
        <?php 
//            Util::getMovieInfo('biwi no 1');
//            Util::getMovieInfo('godfather');
//            Util::getMovieInfo('terminator');
//            Util::getMovieInfo('andaz apna apna');
            echo constant('MY_PATH');
        ?>
        

        <script src="../components/jquery/jquery.min.js"></script>

    </body>
</html>
