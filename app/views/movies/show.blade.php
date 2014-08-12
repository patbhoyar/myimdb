@extends('master')

<?php
    $scripts = array('viewMovie');
    $css = array('movie');
?>

@section('content')

<div class="container">
    <div class="showMovieTitle"><h1>{{ $movie->name }} ({{$movie->year}})</h1></div>
    <div id="showMoviePoster">
        <img src="{{$movie->poster}}" alt="{{$movie->name}}"/>
    </div>
    <div id="{{$movie->id}}" class="showMovieInfoContainer">
        <div id="showMovieRating"> Rating: {{ $movie->rating }} </div>
        <div id="showMovieActors"><b>Actors: </b> {{ $actors }}</div>
        <div id="showMovieGenres">
            <b>Genres: </b>
            @foreach($genres as $genre)
                <a href="{{$website}}genres/show/{{$genre[0]->id}}" class="showGenreItem">{{$genre[0]->name}}</a>,
            @endforeach
        </div>
        <a href="{{$movie->url}}" target="_blank">
            <button type="button" class="btn btn-warning btn-lg seen">View on IMDB  <span class="glyphicon glyphicon-film"></span></button>
        </a>

        @if($movie->seen == 0)
        <button type="button" class="btn btn-default btn-lg seen"><span class="glyphicon glyphicon-eye-close"></span></button>
        @else
        <button type="button" class="btn btn-success btn-lg seen"><span class="glyphicon glyphicon-eye-open"></span></button>
        @endif

        <button type="button" class="btn btn-default btn-lg watchlist"><span class="glyphicon glyphicon-plus-sign"></span>Watchlist</button>

    </div>
</div>

@endsection

