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
Route::get('movies/all', 'MovieController@allMovies');
Route::get('movies/show/{id}', 'MovieController@showMovie');
Route::resource('movies', 'MovieController');
Route::resource('genres', 'GenreController');
Route::resource('actors', 'ActorController');

Route::get('/', function(){ return View::make('index'); });
Route::get('/add', function(){ return View::make('movies.add'); });