<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMovieActors extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('movie_actors', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('movieId')->unsigned()->index();
            $table->integer('actorId')->unsigned()->index();
            $table->foreign('movieId')->references('id')->on('movies')->onDelete('cascade');
            $table->foreign('actorId')->references('id')->on('actors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('movie_actors');
    }

}
