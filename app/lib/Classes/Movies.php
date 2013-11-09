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
    
    private static function addLanguages($movieId, $language){
        
        $chk = DB::table('languages')->where('name', '=', $language)->first();
        $languageId = $chk->id;
        
        $movie_lang = new Movie_Languages;
        $movie_lang->movieId = $movieId;
        $movie_lang->languageId = $languageId;
        if ($movie_lang->save()) {
            return $movie_lang->id;
        }else{
            return 'Could not save Movie_Lang';
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
        
        //Add the languages for the respective movie to the languages and movie_languages tables
        $languages = $data[0]['language'];
        foreach ($languages as $language) {
            self::addLanguages($movieId, $language);
        }
        
        //Add the genres for the respective movie to the genres and movie_genres tables
        $genres = $data[0]['genres'];
        foreach ($genres as $genre) {
            self::addGenres($movieId, $genre);
        }
        
        return "Movie Added Successfully";
    }
    
}

?>
