@extends('master')

@section('content')

<div class="container">
    <div class="table-responsive">
        <table class="table table-striped table-condensed table-hover">
            <thead>
                <tr><td><h1>{{$title}}</h1></td></tr>
            </thead>
            <tbody>
            @foreach($genres as $genre)
                <tr><td><a href="genres/{{$genre->id}}" class="genreItem">{{$genre->name}}</a> <span class="glyphicon glyphicon-chevron-right"></span></td></tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

