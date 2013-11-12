@extends('master')

<?php $scripts = array('addMovie'); ?>

@section('content')

    <div class="container">
       
        <h1>Add a Movie</h1>
        
        <form>
            <input type="text" class="form-control" placeholder="Search for a Movie..." id="searchMovie"/> <br>
            <button type="submit" class="btn btn-default" id="submitSearch">Search</button>
        </form>
        
        <div id="moviesList"></div>
        
    </div>

@endsection