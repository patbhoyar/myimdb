@extends('master')

@section('content')

<div class="container">
    <div class="table-responsive">
        <table class="table table-striped table-condensed table-hover">
            <thead>
                <tr><td><h1>{{$title}}</h1></td></tr>
            </thead>
            <tbody>
            @foreach($movies as $movie)
                <tr>
                    <td>
                        <a href="{{$website}}movies/show/{{ $movie[0]->id }}" class='genreItem'>{{$movie[0]->name." (".$movie[0]->year.") - ".$movie[0]->rating }}</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

