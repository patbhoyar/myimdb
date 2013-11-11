<?php

class HomeController extends BaseController {

    public function home() {
        return View::make('index');
    }
    
    public function addMovie(){
        return View::make('movies.add');
    }

}