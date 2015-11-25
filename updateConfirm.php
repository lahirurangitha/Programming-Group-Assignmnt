<?php
/**
 * Created by PhpStorm.
 * User: lahiru
 * Date: 10/19/2015
 * Time: 8:42 PM
 */

require_once 'connect.php';

if(!isset($_POST['u_username'])){
//    echo 'No form submitted';
    echo '<script type="text/javascript">alert("No form submitted");</script>';
}else{
    if($_POST['u_password']==$_POST['u_repassword']){
        $username =  $_POST['u_username'] ;
        $password= $_POST['u_password'];
        $email = $_POST['u_email'];
        $fname = $_POST['u_fname'];
        $lname = $_POST['u_lname'];
        $mnumber = $_POST['u_mobileNo'];
        $address = $_POST['u_address'];
        $nicnumber = $_POST['u_nicNo'];

        $update = DB::getInstance();
        $update->query("update user set username = ?,password = ?,email = ?,fname = ?,lname = ?,address = ?,mnumber = ?,nicnumber = ? WHERE username = ?",array($username,$password,$email,$fname,$lname,$address,$mnumber,$nicnumber,$username));
        if($update->count()){
//            echo '<h1>Update successful</h1>';
            echo '<script type="text/javascript">alert("Update successful");</script>';
        }else{
//            echo '<h1>Update failed</h1>';
            echo '<script type="text/javascript">alert("Update failed");</script>';

        }

    }else{
        echo '<script type="text/javascript">alert("Password and Re-Password does not match");</script>';
    }

}
