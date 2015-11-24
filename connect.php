<?php
/**
 * Created by PhpStorm.
 * User: lahiru
 * Date: 10/18/2015
 * Time: 3:47 PM
 */

spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.php';
});
session_start();
$connect = DB::getInstance();
//$host = 'localhost';
//$username = 'root';
//$password = '';
//$dbname = 'smsystem';
//$con_error = "Could not connect";
//$con_succ = "Connected to $dbname";
//
//if(!(mysql_connect($host,$username,$password) && mysql_select_db($dbname))){
//    die($con_error);
//}else{
////    echo($con_succ);
//}
