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
    
    public static function addMovie($data){
        
        $data = json_decode($data, 1);
       
        $chk = DB::table('movies')->where('name', '=', $data[0]['title'])->first();
        if (!is_null($chk)){
            return "Movie Already Exists";
        }
        
        //Add the movie to the DB
        $movie = new Movie;
        $movie->name = $data[0]['title'];
        $movie->rating = $data[0]['rating'];
        $movie->year = $data[0]['year'];
        $movie->url = $data[0]['imdb_url'];
        $movie->poster = (string)$data[0]['poster']['imdb'];
        if ($movie->save()) {
            $movieId = $movie->id;
        }else{
            dd('Could not save movie');
        }
        
        //Add the actors for the respective movie to the actors and movie_actors tables
        $actors = $data[0]['actors'];
        foreach ($actors as $actor) {
            self::addActors($movieId, $actor);
        }
        
        //Add the genres for the respective movie to the genres and movie_genres tables
        $genres = $data[0]['genres'];
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
                    'id'    => $movie['imdb_id'],
                    'rating'=> number_format($movie['rating'], 1, '.', ''),
                    'year'  => $movie['year'],
                    'poster'=> $movie['poster']['imdb'],
                );
                array_push($op, json_encode($temp));
            }
            return json_encode($op);
        } catch (Exception $exc) {
            echo $exc->message;
        }
        return false;
    }
    
}

?>
