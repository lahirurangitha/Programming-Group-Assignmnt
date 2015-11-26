<?php
/**
 * Created by PhpStorm.
 * User: lahiru
 * Date: 11/25/2015
 * Time: 7:24 PM
 */
require_once 'connect.php';
if(isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']==true){
    Redirect::to('index.php');
}
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <?php include 'headerScripts.php'?>
</head>
<body>
<?php include 'navBar.php'?>
<div class="container-fluid backgroundImg">
    <div class="container">
        <br>
        <div class="jumbotron col-lg-6 col-lg-offset-3">
            <form action="" method="post">
                <div>
                    <h3>Forgot Password</h3>
                </div>
                <div class="gap">
                    <label>Enter Your Username To Reset Your Password</label>
                    <input class="form-control" type="text" name="fp_username">
                </div>
                <input class="btn btn-primary" type="submit" name="action" value="Check Username">
            </form>
            <?php
            if(isset($_POST['action'])){
                $fp_username = $_POST['fp_username'];
                $checkUsername = DB::getInstance();
                $checkUsername->query('select username from user WHERE username = ?',array($fp_username));
                if($checkUsername->count() != 0){
//                    echo $checkUsername->results()[0]->username;
                    $_SESSION['fp_username'] = $fp_username;
                    ?>
                    <br>
                    <div>
                        <lable>Username Found</lable><br>
                        <label class="alert alert-danger">Click The Button Below To Reset Your Password. New Password Will Be Sent To Your Email. </label>
                    </div>
                    <a href="resetPassword.php"><button class="btn btn-danger">Reset Password</button></a>

                    <?php

                }else {
                    echo "<script type='text/javascript'>alert('Username does not exist');</script>";
                }
            }
            ?>

        </div>
    </div>
</div>
<?php include 'footerScripts.php'?>
<?php include 'footer.php'?>
</body>
</html>