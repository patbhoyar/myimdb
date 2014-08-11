<?php

require_once './Classes/Movies.php';
        
if (!isset($_POST['request'])) {
    echo 'error';
    return;
}

$request = trim($_POST['request']);

switch ($request) {
    case 'searchMovie':
        $result = Movies::getMovies(trim($_POST['q']));
        echo ($result !== false)?$result:'error';
        break;
    case 'addMovie':
        $result = Movies::addMovie(trim($_POST['q']));
        echo ($result !== false)?$result:'error';
        break;
    default:
        break;
}

?>