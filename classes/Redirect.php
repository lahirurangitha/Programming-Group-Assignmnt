<?php
/**
 * Created by PhpStorm.
 * User: lahiru
 * Date: 11/24/2015
 * Time: 6:32 PM
 */

class Redirect {
    public static function to($location  = null){
        if($location){
            header('Location: ' . $location );
            exit();
        }
    }
}
?>