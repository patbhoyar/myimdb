<?php

class MovieController extends \BaseController {
    
    private static $page = 'movies';
    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $movies = DB::table('movies')->select('id', 'name', 'rating', 'poster', 'year', 'seen')->get();
        return View::make('movies.index')->with(
                array(
                    'moviesInfo'    => $movies,
                    'title'         => 'Movies',
                    'page'          => self::$page
                ));
    }

    /**
     * Get all movies
     *
     * @return Response
     */
    public function allMovies() {
        return Movie::all();
    }
    
    public function addMovie(){
        return View::make('movies.add')->with(array(
            'title'     =>  'Add a Movie',
            'page'      =>  self::$page
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        return Movie::find($id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function showMovie($id) {
        $movie = DB::table('movies')->where('id', '=', $id)->select('id', 'name', 'rating', 'poster', 'year', 'seen', 'url')->first();

        $actors_temp = DB::table('movie_actors')->where('movieId', '=', $id)->select('actorId')->get();
        $actors = "";
        foreach ($actors_temp as $value) {
            $name = DB::table('actors')->where('id', '=', $value->actorId)->select('name')->first();
            $actors .= $name->name . ", ";
        }
        $actors = substr($actors, 0, strlen($actors) - 2);

        $genres_temp = DB::table('movie_genres')->where('movieId', '=', $id)->select('genreId')->get();
        $genres = array();
        foreach ($genres_temp as $genre) {
            $genreInfo = DB::table('genres')->where('id', '=', $genre->genreId)->select('id', 'name')->get();
            array_push($genres, $genreInfo);
        }
        
        return View::make('movies.show')->with(
                array(
                    'movie'     => $movie, 
                    'genres'    => $genres,
                    'actors'    => $actors,
                    'title'     => $movie->name,
                    'page'      => self::$page
                ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        //
    }
    
    public function ajaxSearchMovie(){
        $result = Movies::getMovies(trim(Input::get('q')));
        echo ($result !== false)?$result:'error';
    }
    
    public function imdbGetMovieById(){
        $result = Movies::addMovie(Input::get('q'));
        echo ($result !== false)?$result:'error';
    }

    public function movieSeen(){
        $movie = Movie::find(Input::get('movieId'));
        return self::movieSeenOrWatchlist($movie, 'seen');
    }

    public function addToWatchlist(){
        $movie = Movie::find(Input::get('movieId'));
        return self::movieSeenOrWatchlist($movie, 'watchlist');
    }

    private static function movieSeenOrWatchlist($movie, $param){

        if($movie->$param == 1)
            $movie->$param = 0;
        else
            $movie->$param = 1;
        $movie->save();
        return "success";
    }
}