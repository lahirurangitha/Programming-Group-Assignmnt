<?php
/**
 * Created by PhpStorm.
 * User: lahiru
 * Date: 11/25/2015
 * Time: 2:42 PM
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
<!--    <title>Administrator</title>-->
    <?php
    if(isset($_SESSION['admin']) && $_SESSION['admin']==true){
        echo "<title>Administrator</title>";
    }elseif(isset($_SESSION['teacher']) && $_SESSION['teacher']==true){
        echo "<title>Teacher</title>";
    }elseif(isset($_SESSION['student']) && $_SESSION['student']==true){
        echo "<title>Student</title>";
    }
    ?>
    <?php include 'headerScripts.php'?>
</head>
<body>
<?php include 'navBar.php'?>
<div class="container-fluid backgroundImg">
    <?php
    if(isset($_SESSION['admin']) && $_SESSION['admin']==true){
        include 'adminSidebar.php';
    }elseif(isset($_SESSION['teacher']) && $_SESSION['teacher']==true){
        include 'teacherSidebar.php';
    }elseif(isset($_SESSION['student']) && $_SESSION['student']==true){
        include 'studentSidebar.php';
    }
    ?>
    <div class="container col-lg-9">
        <?php
//            echo $_SESSION['username'];
        $currUser = $_SESSION['currentUser'];
        $querySelect = DB::getInstance();
        $querySelect->query("SELECT * FROM user WHERE username = ?",array($currUser));
        if($querySelect->count()){
//        print_r($querySelect->results());
            $result = $querySelect->results();
            foreach($result as $r){
//            echo $r->email;
                $password = $r->password;
                $email = $r->email;
                $fname = $r->fname;
                $lname = $r->lname;
                $address = $r->address;
                $mnumber = $r->mnumber;
                $nic = $r->nicnumber;
                $uType = $r->utype;
            }
            ?>
            <br>
            <div class="jumbotron col-lg-6">
                <h3>Update</h3>
                <form action="updateConfirm.php" method="post">
                    <div class="gap">
                        <label>Username</label>
                        <input class="form-control" name="u_username" type="text" value="<?php echo $currUser;?>">
                    </div>
                    <div class="gap">
                        <label>Password</label>
                        <input class="form-control" name="u_password" type="password" value="<?php echo $password;?>">
                    </div>
                    <div class="gap">
                        <label>Re-Password</label>
                        <input class="form-control" name="u_repassword" type="password" value="<?php echo $password;?>">
                    </div>
                    <div class="gap">
                        <label>E-Mail</label>
                        <input class="form-control" name="u_email" type="email" placeholder="E-mail" value="<?php echo $email;?>">
                    </div>
                    <div class="gap">
                        <label>First Name</label>
                        <input class="form-control" name="u_fname" type="text" placeholder="First Name" value="<?php echo $fname;?>">
                    </div>
                    <div class="gap">
                        <label>Last Name</label>
                        <input class="form-control" name="u_lname" type="text" placeholder="Last Name" value="<?php echo $lname;?>">
                    </div>
                    <div class="gap">
                        <label>Mobile Number</label>
                        <input class="form-control" name="u_mobileNo" type="tel" placeholder="Mobile Number" value="<?php echo $mnumber;?>">
                    </div>
                    <div class="gap">
                        <label>Address</label>
                        <input class="form-control" name="u_address" type="text" placeholder="Address" value="<?php echo $address;?>">
                    </div>
                    <div class="gap">
                        <label>NIC Number</label>
                        <input class="form-control" name="u_nicNo" type="text" placeholder="NIC Number" value="<?php echo $nic?>">
                    </div>
                    <br>
                    <div>
                        <input class="btn btn-primary" type="submit" value="Update">
                    </div>
                </form>
            </div>

<?php
//
        }else{
            echo '<script type="text/javascript">alert("Username does not exist")</script>';
        }

        ?>
    </div>

</div>
<?php include 'footerScripts.php'?>
<?php include 'footer.php'?>
</body>
</html>