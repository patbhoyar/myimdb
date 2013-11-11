<?php

class MovieController extends \BaseController {

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
                    'title'         => 'Movies'
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

        return View::make('movies.show')->with(
                array(
                    'movie'     => $movie, 
                    'actors'    => $actors,
                    'title'     => $movie->name
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

}