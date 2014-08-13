<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMovies extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('movies', function(Blueprint $table) {
            $table->increments('id');
            $table->string('imdbId');
            $table->string('name');
            $table->string('url');
            $table->float('rating');
            $table->integer('seen')->default(0);
            $table->integer('year')->default(0);
            $table->string('poster');
            $table->integer('watchlist')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('movies');
    }

}
