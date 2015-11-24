<?php
/**
 * Created by PhpStorm.
 * User: lahiru
 * Date: 11/20/2015
 * Time: 2:35 PM
 */

require_once 'connect.php';

if(isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']==true){
    if(isset($_SESSION['admin']) && $_SESSION['admin']==true){
        Redirect::to('adminDashboard.php');
    }elseif(isset($_SESSION['teacher']) && $_SESSION['teacher']==true){
        Redirect::to('teacherDashboard.php');
    }elseif(isset($_SESSION['student']) && $_SESSION['student']==true){
        Redirect::to('studentDashboard.php');
    }
}
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Home | Page</title>
    <?php include 'headerScripts.php'?>
</head>
<body>
<?php include 'navBar.php'?>
<div>
<h1>Home | page</h1>
</div>
<?php include 'footerScripts.php'?>
</body>
</html>