<?php
/**
 * A common utility class
 *
 * @author admin
 */
class Util {
    /*
     * 
     */
    public static function getCurlData($url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

        $data = curl_exec($ch);
        curl_close($ch);

        return $data;
    }
    
    public static function getMovieInfo($name) {
        
        $name = urlencode(trim($name));
        $url = "http://www.omdbapi.com/?s=".$name;
        
        $data = self::getCurlData($url);

//        try {
//            $movieInfo = Movies::addMovie($data);
//            return $url;
//        } catch (Exception $exc) {
//            echo $exc->message;
//        }
//        return "hmm";
        var_dump($data);
        
    }
    
}

?>
