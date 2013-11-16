@extends('master')

<?php $css = array('movies'); ?>

@section('content')

<div class="container">
    <div class="movieTitle"><h1>{{ $movie->name }} ({{$movie->year}})</h1></div>
    <div id="moviePoster">
        <img src="{{$movie->poster}}" alt="{{$movie->name}}"/>
    </div>
    <div id="movieData">
        <div id="movieRating"></div>
        <div id="movieActors">{{ $actors }}</div>
        <div id="movieGenres">
            @foreach($genres as $genre)
                <a href="{{$website}}genres/show/{{$genre[0]->id}}" class="genreItem">{{$genre[0]->name}}</a>, 
            @endforeach
        </div>
        <div id="movieLanguages"></div>
        <a href="{{$movie->url}}" target="_blank">
            <button type="button" class="btn btn-warning btn-lg seen"><span class="glyphicon glyphicon-film">View on IMDB</span></button>
        </a>

        @if($movie->seen == 0)
        <button type="button" class="btn btn-default btn-lg seen"><span class="glyphicon glyphicon-star">Mark as Seen</span></button>
        @else
        <button type="button" class="btn btn-success btn-lg seen"><span class="glyphicon glyphicon-star">Seen</span></button>
        @endif

        @if($movie->seen == 0)
        <button type="button" class="btn btn-danger btn-lg watchlist"><span class="glyphicon glyphicon-plus-sign"></span>Watchlist</button>
        @else
        <button type="button" class="btn btn-default btn-lg watchlist"><span class="glyphicon glyphicon-plus-sign"></span>Watchlist</button>
        @endif
    </div>
</div>

@endsection

