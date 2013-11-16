<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*
 * MovieController
 */
Route::get('movies/all', 'MovieController@allMovies');
Route::get('movies/add', 'MovieController@addMovie');
Route::get('movies/show/{id}', 'MovieController@showMovie');
Route::resource('movies', 'MovieController');

/*
 * GenreController
 */
Route::get('genres/show/{id}', 'GenreController@showGenre');
Route::resource('genres', 'GenreController');

/*
 * ActorController
 */
Route::resource('actors', 'ActorController');

/*
 * WatchlistController
 */
Route::resource('watchlist', 'WatchlistController');


/*
 * HomeController
 */
Route::get('/', 'HomeController@home');
Route::get('/add', 'HomeController@addMovie');

App::missing(function($exception)
{
    return Response::view('errors.missing', array(), 404);
});