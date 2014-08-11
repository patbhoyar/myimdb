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
        $movie->poster = (string)$data['poster'];
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
        $url = "http://www.omdbapi.com/?s=".$q;

        try {
            $data = Util::getCurlData($url);
            $movies = json_decode($data, true);
            
            $op = array();
            foreach ($movies['Search'] as $movie) {
                $temp = array(
                    'name'  => $movie['Title'],
                    'imdbId'    => $movie['imdbID'],
                    'year'  => $movie['Year']
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
        require_once 'Util.php';
        $q = urlencode(trim($id));
        $url = "http://www.omdbapi.com/?i=".$q;

        try {
            $data = Util::getCurlData($url);
            $movies = json_decode($data, true);
            
            if (!isset($movies['code'])) {
                $movie = array(
                    'name'  => $movies['Title'],
                    'imdbId'    => $movies['imdbID'],
                    'rating'=> number_format($movies['imdbRating'], 1, '.', ''),
                    'year'  => $movies['Year'],
                    'genres'  => explode(", ", $movies['Genre']),
                    'imdb_url'  => 'http://www.imdb.com/title/'.$movies['imdbID'],
                    'actors'  => explode(", ", $movies['Actors']),
                    'poster'=> (isset($movies['Poster']))?$movies['Poster']:null,
                );
                return json_encode($movie);
            }
        } catch (Exception $exc) {
            var_dump($exc);
        }
        return false;
    }
    
}

?>
