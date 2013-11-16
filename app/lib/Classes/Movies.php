<?php
/**
 * Description of Movie
 *
 * @author admin
 */
class Movies {
    
    private static function addActors($movieId, $actorName){
        
        $chk = DB::table('actors')->where('name', '=', $actorName)->first();
        //Actor doesnt exist, add to Actors Table
        if (!$chk) {
            $actor = new Actor;
            $actor->name = $actorName;
            $actor->save();
            $actorId = $actor->id;
        }else{
            $actorId = $chk->id;
        }
        
        $movie_actor = new Movie_Actors;
        $movie_actor->movieId = $movieId;
        $movie_actor->actorId = $actorId;
        if ($movie_actor->save()) {
            return $movie_actor->id;
        }else{
            return 'Could not save Movie_Actor';
        }
    }
    
    private static function addGenres($movieId, $genre){
        
        $chk = DB::table('genres')->where('name', '=', $genre)->first();
        $genreId = $chk->id;
        
        $movie_genre = new Movie_Genres;
        $movie_genre->movieId = $movieId;
        $movie_genre->genreId = $genreId;
        if ($movie_genre->save()) {
            return $movie_genre->id;
        }else{
            return 'Could not save Movie_Genre';
        }
    }
    
    public static function addMovie($id){
        $data = self::getMovieById($id);
        $data = json_decode($data, 1);
        
        dd($data);
        
        $chk = DB::table('movies')->where('imdbId', '=', $data['imdbId'])->first();
        if (!is_null($chk)){
            return "Movie Already Exists";
        }
        
        //Add the movie to the DB
        $movie = new Movie;
        $movie->imdbId = $data['imdbId'];
        $movie->name = $data['name'];
        $movie->rating = $data['rating'];
        $movie->year = $data['year'];
        $movie->url = $data['imdb_url'];
        $movie->poster = (string)$data['poster']['imdb'];
        if ($movie->save()) {
            $movieId = $movie->id;
        }else{
            dd('Could not save movie');
        }
        
        //Add the actors for the respective movie to the actors and movie_actors tables
        $actors = $data['actors'];
        foreach ($actors as $actor) {
            self::addActors($movieId, $actor);
        }
        
        //Add the genres for the respective movie to the genres and movie_genres tables
        $genres = $data['genres'];
        foreach ($genres as $genre) {
            self::addGenres($movieId, $genre);
        }
        
        return "Movie Added Successfully";
    }
    
    public static function getMovies($searchTerm){
        require_once 'Util.php';
        $q = urlencode(trim($searchTerm));
        $url = "http://mymovieapi.com/?title=".$q."&type=json&plot=simple&episode=1&limit=10&yg=0&mt=none&lang=en-US&offset=&aka=simple&release=simple&business=0&tech=0";

        try {
            $data = Util::getCurlData($url);
            $movies = json_decode($data, true);
            
            $op = array();
            foreach ($movies as $movie) {
                $temp = array(
                    'name'  => $movie['title'],
                    'imdbId'    => $movie['imdbId'],
                    'rating'=> number_format($movie['rating'], 1, '.', ''),
                    'year'  => $movie['year'],
                    'poster'=> (isset($movie['poster']))?$movie['poster']['imdb']:null,
                );
                array_push($op, json_encode($temp));
            }
            return json_encode($op);
        } catch (Exception $exc) {
            echo $exc->message;
        }
        return false;
    }
    
    public static function getMovieById($id){
        $q = urlencode(trim($id));
        $url = "http://mymovieapi.com/?id=".$q."&type=json&plot=simple&episode=1&lang=en-US&aka=simple&release=simple&business=0&tech=0";

        try {
            $data = Util::getCurlData($url);
            $movies = json_decode($data, true);
            
            if (!isset($movies['code'])) {
                $movie = array(
                    'name'  => $movies['title'],
                    'imdbId'    => $movies['imdb_id'],
                    'rating'=> number_format($movies['rating'], 1, '.', ''),
                    'year'  => $movies['year'],
                    'poster'=> (isset($movies['poster']))?$movies['poster']['imdb']:null,
                );
            }
            return json_encode($movie);
        } catch (Exception $exc) {
            var_dump($exc);
        }
        return false;
    }
    
}

?>
