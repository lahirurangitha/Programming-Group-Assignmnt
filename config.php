<?php
/**
 * Created by PhpStorm.
 * User: pamba
 * Date: 10/20/2015
 * Time: 2:04 PM
 */


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "smsystem";


$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}else{
    //echo 'connected';
}