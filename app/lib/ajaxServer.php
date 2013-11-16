<?php
use Illuminate\Support\Facades\DB;
if (!isset($_POST['request'])) {
    echo 'error';
    return;
}

$request = trim($_POST['request']);

switch ($request) {
    case 'searchMovie':
        require_once 'Classes/Movies.php';
        $result = Movies::getMovies(trim($_POST['q']));
        echo ($result !== false)?$result:'error';
        break;
    case 'addMovie':
        require_once 'Classes/Movies.php';
        $result = Movies::addMovie(trim($_POST['q']));
        echo ($result !== false)?$result:'error';
        break;
    default:
        break;
}

?>