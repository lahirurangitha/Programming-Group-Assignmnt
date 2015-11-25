<?php
/**
 * Created by PhpStorm.
 * User: lahiru
 * Date: 11/24/2015
 * Time: 2:17 PM
 */
?>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="index.php"><img id="img" src="images/logo.png" height="50px" ></a>
        </div>
        <div class="collapse navbar-collapse"  id="navbar-1" >
            <ul class="nav navbar-nav">
<!--                <li>-->
<!--                    <a href="index.php">HOME</a>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <a href="about.php">ABOUT</a>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <a href="contact.php">CONTACT</a>-->
<!--                </li>-->
                <?php
                if(!isset($_SESSION['isLoggedIn'])|| $_SESSION['isLoggedIn']==false){
                    ?>
                    <li>
                        <a href="login.php">LOGIN</a>
                    </li>
                    <li>
                        <a href="register.php">REGISTER</a>
                    </li>
                <?php
                }else{
                    if(isset($_SESSION['admin'])&& $_SESSION['admin']==true){
                        ?>
                        <li>
                            <a href="adminDashboard.php">DASHBOARD</a>
                        </li>
                        <li>
                            <a href="#">STUDENT</a>
                        </li>
                        <li>
                            <a href="#">TEACHER</a>
                        </li>
                        <li>
                            <a href="#">USERS</a>
                        </li>
                        <li>
                            <a href="#">COURSES</a>
                        </li>

                    <?php
                    }elseif(isset($_SESSION['teacher'])&& $_SESSION['teacher']==true){
                        ?>
                        <li>
                            <a href="teacherDashboard.php">DASHBOARD</a>
                        </li>
                    <?php
                    }elseif(isset($_SESSION['student']) && $_SESSION['student']==true){
                        ?>
                        <li>
                            <a href="studentDashboard.php">DASHBOARD</a>
                        </li>
                    <?php
                    }
                ?>

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>  LOGOUT</a></li>
            </ul>
            <?php
            }
            ?>
        </div>
    </div>
</nav>