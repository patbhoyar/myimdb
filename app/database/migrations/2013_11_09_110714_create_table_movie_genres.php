<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMovieGenres extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('movie_genres', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('movieId')->unsigned()->index();
            $table->integer('genreId')->unsigned()->index();
            $table->foreign('movieId')->references('id')->on('movies')->onDelete('cascade');
            $table->foreign('genreId')->references('id')->on('genres')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('movie_genres');
    }

}
