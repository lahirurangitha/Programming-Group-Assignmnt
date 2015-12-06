<?php
/**
 * Created by PhpStorm.
 * User: lahiru
 * Date: 11/27/2015
 * Time: 12:46 PM
 */
require_once 'connect.php';
if(!isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn']==false){
    Redirect::to('index.php');
}
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Teacher | Page</title>
    <?php include 'headerScripts.php'?>
</head>
<body>
<?php include 'navBar.php'?>
<div class="container-fluid backgroundImg">
    <?php include 'teacherSidebar.php'?>
    <div class="container col-lg-9">
        <br>
        <div class="jumbotron col-lg-10 col-lg-offset-1">

        </div>

        <!--       write content in this division-->



    </div>
</div>
<?php include 'footerScripts.php'?>
<?php include 'footer.php'?>
</body>
</html>