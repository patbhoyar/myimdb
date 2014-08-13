@extends('master')

<?php
    $title = 'List of Actors';
    $page='actors';
    $css = array('actors');
?>
@section('content')

<div class="container">


    @foreach($actors as $actor)
        <div class="actorContainer">
            {{ HTML::link('actors/'.$actor['id'].'/movies', $actor['name']); }}
        </div>
    @endforeach
</div>

@endsection