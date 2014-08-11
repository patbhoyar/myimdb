<?php

class BaseController extends Controller {

    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    protected function setupLayout() {
        if (!is_null($this->layout)) {
            $this->layout = View::make($this->layout);
        }
    }
    
    public function __construct() {
        require_once $_SERVER['DOCUMENT_ROOT'].'/projects/movies/app/lib/Myapp/lang/en.php';
        View::share('path', constant('MY_PATH'));
        View::share('webroot', constant('WEBROOT'));
        View::share('website', constant('WEBSITE'));
    }

}