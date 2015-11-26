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
        <div class="jumbotron col-lg-4 col-lg-offset-4" id="regForm">
            <h3>Update Course</h3>
            <br>
            <form action="" method="post" class="form-horizontal">
                <div class="form-group" >
                    <label for="exampleInputEmail1">Course Number</label>
                    <input type="text" class="form-control" id="inputCourseNumber" name="course_number" placeholder="">
                    <br>
                    <button type="submit" class="btn btn-success col-lg-12 col-lg-offset-0">
                        <span class="glyphicon glyphicon-search col-lg-1" aria-hidden="true"></span>
                        Search</button>
                </div>
                <div class="form-group">

                    <label for="exampleInputPassword1">Course Name</label><br>
                    <label>Sinhala</label>

                    <input type="text" class="form-control" id="inputCourseName" name="course_name">
                </div>

                <div class="form-group">

                    <label for="exampleInputPassword1">Duration</label><br>

                    <div class="input-group">
                        <label>6 Months</label>

                        <input type="number" class="form-control col-lg-8" id="inputCredits" placeholder="" name="duration">

                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Credits</label>
                    <br>
                    <label>3</label>
                    <input type="number" class="form-control" id="inputCredits" placeholder="" name="credits">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Qualification</label>
                    <br><label>Must Get C in To SCS1105</label>
                    <input type="text" class="form-control" id="inputQuaification" name="qulification" placeholder="">
                </div>

                <button type="submit" class="btn btn-success col-lg-12" >
                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                    Update Course</button>




            </form>
        </div>
    </div>

</div>
<?php include 'footerScripts.php'?>
<?php include 'footer.php'?>
</body>
</html>