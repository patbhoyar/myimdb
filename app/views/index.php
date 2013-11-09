<?php

    $data = Util::getMovieInfo("andaz apna apna");
    //$data = json_decode($data, 1);
    
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
    
    //echo (string)$data[0]['poster']['imdb'];
    

?>