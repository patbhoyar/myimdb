<?php

class HomeController extends BaseController {

    public function home() {
        return View::make('index')->with(
                        array(
                            'title' => 'IMDB',
                            'page' => ''
        ));
    }

    public function addMovie() {
        return View::make('movies.add');
    }

}