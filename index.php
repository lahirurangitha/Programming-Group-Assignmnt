<?php
/**
 * Created by PhpStorm.
 * User: lahiru
 * Date: 11/20/2015
 * Time: 2:35 PM
 */

require_once 'connect.php';
require_once 'session_start.php';

if(isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']==true){
    echo 'this is your profile';
}else{
    header("Location: login.php");
}