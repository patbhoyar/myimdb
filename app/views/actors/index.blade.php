@extends('master')
<?php $title = 'List of Actors'; $page='actors'; ?>
@section('content')

<div class="container">


    @foreach($actors as $actor)
        <div class="actorContainer">
            {{ HTML::link('actor/'.$actor['id'], $actor['name']); }}
        </div>
    @endforeach
</div>

@endsection