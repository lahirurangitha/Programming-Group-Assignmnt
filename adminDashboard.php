<?php
/**
 * Created by PhpStorm.
 * User: lahiru
 * Date: 11/24/2015
 * Time: 2:14 PM
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
    <title>Administrator</title>
    <?php include 'headerScripts.php'?>
</head>
<body>
<?php include 'navBar.php'?>
<div>

    <?php echo 'chathuranga' ?>


</div>
<?php include 'footerScripts.php'?>
</body>
</html>