<?php

class ActorController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$actors = Actor::all();

        $allActors = array();
        foreach($actors as $actor){
            $act = ['id' => $actor->id, 'name' => $actor->name];
            array_push($allActors, $act);
        }
        return View::make('actors.index', array('actors' => $allActors));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function showMovies($id)
	{
		$actor = Actor::find($id);
        $movies = Movie_Actors::where('actorId', '=', $id)->get();

        $moviesInfo = array();
        foreach($movies as $movie){
            $temp = Movie::where('id', '=', $movie['movieId'])->get();
            $movieInfo = [
                'id'        =>  $movie['movieId'],
                'name'      =>  $temp[0]->name,
                'imdbId'    =>  $temp[0]->imdbId,
                'rating'    =>  $temp[0]->rating,
                'year'      =>  $temp[0]->year,
                'imdbURL'   =>  $temp[0]->url,
                'poster'    =>  $temp[0]->poster,
                'seen'      =>  $temp[0]->seen
            ];
            array_push($moviesInfo, $movieInfo);
        }

        return View::make('actors.movies', array('actorName' => $actor->name, 'moviesInfo' => $moviesInfo));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}