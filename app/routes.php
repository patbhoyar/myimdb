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

Route::resource('genres', 'GenreController');
Route::resource('languages', 'LanguageController');
Route::resource('movies', 'MovieController');
Route::resource('actors', 'ActorController');

Route::get('/', function()
{
	return View::make('index');
});