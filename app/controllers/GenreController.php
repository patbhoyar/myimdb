<?php

class GenreController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $genres = DB::table('genres')->select('id', 'name')->get();
        return View::make('genres.index')->with(
                        array(
                            'genres' => $genres,
                            'title' => 'Genres',
                            'page' => 'genres'
        ));
    }

    /**
     * Get all movies
     *
     * @return Response
     */
    public function allGenres() {
        return Genre::all();
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
    public function showGenre($id) {
        $genre = Genre::find($id)->name;
        $movies_temp = DB::table('movie_genres')->where('genreId', '=', $id)->get();

        $movies = array();
        foreach ($movies_temp as $movie) {
            $temp = DB::table('movies')->where('id', '=', $movie->movieId)->select('id', 'name', 'year', 'rating')->get();
            array_push($movies, $temp);
        }

        return View::make('genres.movies')->with(array(
                    'title' => $genre . ' Movies',
                    'movies' => $movies,
                    'page' => 'genres'
        ));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        $genre = Genre::find($id)->name;
        $movies_temp = DB::table('movie_genres')->where('genreId', '=', $id)->get();

        $movies = array();
        foreach ($movies_temp as $movie) {
            $temp = DB::table('movies')->where('id', '=', $movie->movieId)->select('id', 'name', 'year', 'rating')->get();
            array_push($movies, $temp);
        }

        return View::make('genres.movies')->with(array(
            'title' => $genre . ' Movies',
            'movies' => $movies,
            'page' => 'genres'
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