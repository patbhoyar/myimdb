<?php

if (!isset($_POST['request'])) {
    echo 'error';
    return;
}

$request = trim($_POST['request']);

switch ($request) {
    case 'addMovie':
        require_once 'Classes/Movies.php';
        $result = Movies::getMovies(trim($_POST['q']));
        echo ($result !== false)?$result:'error';
        //echo $_POST['q'];
        break;
    default:
        break;
}

?>