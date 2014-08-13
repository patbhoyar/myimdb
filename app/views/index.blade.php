@extends('master')

@section('content')

<div class="container">
            This is a list of Movies
        </div>
        
        <?php 
           
            var_dump(json_decode(Movies::getMovies('hera pheri')),1);
        ?>

@endsection