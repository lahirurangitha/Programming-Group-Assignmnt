<?php
/**
 * Created by PhpStorm.
 * User: lahiru
 * Date: 10/18/2015
 * Time: 3:48 PM
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
        <div class="jumbotron col-lg-4 col-lg-offset-4">
            <div class="col-lg-12 ">
                <img src="images/logo.png" height="75px">
            </div>
            <div class="col-lg-12">
                <h3>Signin</h3>
            </div>
            <div class="col-lg-12">
                <form action="" method="post" class="form-horizontal">
                    <div class="gap">
                        <label>Username</label>
                        <input class="form-control" id="username" name="username" type="text" placeholder="username" required>
                    </div>
                    <div class="gap">
                        <label>Password</label>
                        <input class="form-control" id="password" name="password" type="password" placeholder="password" required>
                    </div>
                    <div class="gap">
                        <input class="btn btn-primary col-lg-12" type="submit" value="Signin">
                    </div>
                    <div class="gap">
                        <a href="forgotPassword.php">Forgot Password</a>
                    </div>
                </form>
                <div class="gap">
                    <button class="btn btn-default col-lg-12"><a>Signup</a></button>
                </div>
            </div>

<?php
if(isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $password = hash("sha256",$_POST['password']);
    $tdb = DB::getInstance();
    $tdb->query("select username from user where username = ? AND password = ?",array($username,$password));
    if($tdb->count()){
        $_SESSION['isLoggedIn'] = true;
        $_SESSION['currentUser'] = $username;
        $utype = DB::getInstance();
        $utype->query("select utype from user where username = ?",array($username));
        $temp = $utype->results()[0]->utype;
        if($temp=="admin"){
            $_SESSION['admin'] = true;
            Redirect::to('adminDashboard.php');
        }elseif($temp=="teacher"){
            $_SESSION['teacher'] = true;
            Redirect::to('teacherDashboard.php');
        }else{
            $_SESSION['student'] = true;
            Redirect::to('studentDashboard.php');
        }
    }else{
        echo '<script type="text/javascript">alert("Credentials does not match.");</script>';
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
