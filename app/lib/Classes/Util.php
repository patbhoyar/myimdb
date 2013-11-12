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
        $url = "http://mymovieapi.com/?title=".$name."&type=json&plot=simple&episode=1&limit=1&yg=0&mt=none&lang=en-US&offset=&aka=simple&release=simple&business=0&tech=0";
        
        $data = self::getCurlData($url);

        try {
            $movieInfo = Movies::addMovie($data);
            return $url;
        } catch (Exception $exc) {
            echo $exc->message;
        }
        return "hmm";
    }
    
}

?>
