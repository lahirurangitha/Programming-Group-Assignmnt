<?php
/**
 * Created by PhpStorm.
 * User: lahiru
 * Date: 11/26/2015
 * Time: 10:03 PM
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
            <?php
            $getEmail = DB::getInstance();
            $getEmail->query("select email from user where username = ?",array($_SESSION['fp_username']));
            $email = $getEmail->results()[0]->email;

            //random string generate
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < 10; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            //
//            echo $randomString;
            $hashedPassword = hash("sha256",$randomString);

            // the message
            $msg = "Your New Password For VishwaEducations is $randomString";

            // use wordwrap() if lines are longer than 70 characters
            $msg = wordwrap($msg,70);

            // More headers
            $headers = 'From: <vishwaeducations.16mb.com>' . "\r\n";
            //$headers .= 'Cc: myboss@example.com' . "\r\n";
            // send email
            if(mail($email,"Password Reset",$msg,$headers)){
                echo "<div><strong>Email has been sent to $email. Try to Sign in with the new password. </strong></div>";
                $updatePassword = DB::getInstance();
                $updatePassword->query("Update user set password = ? WHERE username = ?",array($hashedPassword,$_SESSION['fp_username']));
                if($updatePassword->count()){
                    echo "database updated";
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