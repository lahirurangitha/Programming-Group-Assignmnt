<?php
/**
 * Created by PhpStorm.
 * User: Chathuranga-Pamba
 * Date: 15/11/27
 * Time: 2:18 AM
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
<div class="container-fluid backgroundImg">
    <?php include 'adminSidebar.php'?>
    <div class="container col-lg-9">
        <!--       write content in this division-->

        <div class="jumbotron col-lg-12 ">
            <?php
            if(!isset($_POST['course_number']) || !isset($_POST['course_name']) || !isset($_POST['duration']) ||  !isset($_POST['qulification']) ){
                ?>

                <h3>Info Courses</h3>
                <br>
                <form action="" method="post" class="form-inline">
                    <div class="form-group col-lg-2 col-lg-offset-1" >
                        <label for="exampleInputEmail1">Course Number</label>
                        <input type="text" class="form-control" id="inputCourseNumber" name="course_number" placeholder="">
                    </div>
                    <div class="form-group col-lg-2 ">
                        <label for="exampleInputPassword1">Course Name</label>
                        <input type="text" class="form-control" id="inputCourseName" name="course_name">
                    </div>

                    <div class="form-group col-lg-2">

                        <label for="exampleInputPassword1">Duration</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="inputCredits" placeholder="" name="duration">

                        </div>
                    </div>

                    <div class="form-group col-lg-2">
                        <label for="exampleInputPassword1">Credits</label>
                        <input type="number" class="form-control col-lg-2" id="inputCredits" placeholder="" name="credits" width="150px">
                    </div>

                    <div class="form-group col-lg-2">
                        <label for="exampleInputPassword1">Qualification</label>
                        <input type="text" class="form-control" id="inputQuaification" name="qulification" placeholder="">
                    </div>

                    <label class="col-lg-offset-10 col-lg-1" "></label>

                    <button type="submit" class="btn btn-success col-lg-offset-5">
                        <span class="glyphicon glyphicon-search col-lg-5" aria-hidden="true"></span>
                        Search</button>




                </form>






                <?php

            }


            ?>
        </div>
    </div>

</div>
<?php include 'footerScripts.php'?>
<?php include 'footer.php'?>
</body>
</html>