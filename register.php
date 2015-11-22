<?php
/**
 * Created by PhpStorm.
 * User: lahiru
 * Date: 10/18/2015
 * Time: 3:48 PM
 */

require_once 'connect.php';

if(isset($_POST['username'])) {
    $username = $_POST['username'];
//    $userCheck = "select username from user where username = '$username'";
    $userCheck = DB::getInstance();
    $userCheck->query("select username from user where username = ?",array($username));
    if($userCheck->count()){
        echo '<script type="text/javascript">alert("Username already exist");</script>';
    }else{
        if ($_POST['password'] == $_POST['repassword']) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $utype = $_POST['utype'];
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $mnumber = $_POST['mobileNo'];
            $address = $_POST['address'];
            $nicnumber = $_POST['nicNo'];

            $regUser = DB::getInstance();
            $regUser->query("insert into user(username,password,email,utype,fname,lname,address,mnumber,nicnumber) values(?,?,?,?,?,?,?,?,?)",array($username,$password,$email,$utype,$fname,$lname,$address,$mnumber,$nicnumber));
            if($regUser->count()){
                echo '<script type="text/javascript">alert("Registration Successful");</script>';
            }else{
                echo '<script type="text/javascript">alert("Registration failed");</script>';
            }
        }else{
            echo '<script type="text/javascript">alert("Password and Re-Password doen\'t match");</script>';
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Register | Page</title>
</head>
<body>
<div id="regForm">
    <h1>Signup</h1>
    <form action="" method="post">
        <div>
            <label>Username</label>
            <input id="username" name="username" type="text" placeholder="Choose Username" required>
        </div>
        <div>
            <label>Password</label>
            <input id="password" name="password" type="password" placeholder="Choose Password" required>
        </div>
        <div>
            <label>Re-Password</label>
            <input id="repassword" name="repassword" type="password" placeholder="Re-Enter password" required>
        </div>
        <div>
            <label>E-Mail</label>
            <input id="email" name="email" type="email" placeholder="E-mail" required>
        </div>
        <div>
            <label for="utype">Select user type</label>
            <select id="utype" name="utype" required>
                <option></option>
                <option value="admin">Administrator</option>
                <option value="teacher">Teacher</option>
                <option value="student">Student</option>
            </select>
        </div>
        <div>
            <label>First Name</label>
            <input id="fname" name="fname" type="text" placeholder="First Name" required>
        </div>
        <div>
            <label>Last Name</label>
            <input id="lname" name="lname" type="text" placeholder="Last Name" required>
        </div>
        <div>
            <label>Mobile Number</label>
            <input id="mobileNo" name="mobileNo" type="tel" placeholder="Mobile Number" required>
        </div>
        <div>
            <label>Address</label>
            <input id="address" name="address" type="text" placeholder="Address" required>
        </div>
        <div>
            <label>NIC Number</label>
            <input id="nicNo" name="nicNo" type="text" placeholder="NIC Number" required>
        </div>
<!--        <input type="hidden" name="submitted" value="Submitted">-->
        <div>
            <input type="submit" value="Signup">
        </div>
    </form>
</div>
</body>
</html>