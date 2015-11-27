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


if(isset($_POST['course_number'])  && isset($_POST['course_name'])  && isset($_POST['duration'])  && isset($_POST['credits'])  && isset($_POST['qulification'])  ){
    $courseNumber = $_POST['course_number'];
    $courseName = $_POST['course_name'];
    $duration = $_POST['duration'];
    $credits = $_POST['credits'];
    $qulification = $_POST['qulification'];

    if(!empty($courseNumber) && !empty($courseName) && !empty($duration) && !empty($credits) && !empty($qulification)) {


        $in = DB::getInstance();
        $q = $in->query("insert into course(number,name, duration, credits, qulification) VALUES (?,?,?,?,?)", array($courseNumber, $courseName, $duration, $credits, $qulification));
        if ($q) {
            echo '<script type="text/javascript">alert("Insert Successful");</script>';
        } else {
            echo '<script type="text/javascript">alert("insertn un-successful");</script>';
        }
    }else{
        echo '<script type="text/javascript">alert("Please fill all fields");</script>';
    }



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

        <div class="jumbotron col-lg-4 col-lg-offset-4" id="regForm">
            <h3>Insert Cource</h3>
            <br>
            <form action="" method="post" class="form-horizontal">
                <div class="form-group" >
                    <label for="exampleInputEmail1">Course Number</label>
                    <input type="text" class="form-control" id="inputCourseNumber" name="course_number" placeholder="">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Course Name</label>
                    <input type="text" class="form-control" id="inputCourseName" name="course_name">
                </div>

                <div class="form-group">

                    <label for="exampleInputPassword1">Duration</label>
                    <div class="input-group">
                        <input type="number" class="form-control" id="inputCredits" placeholder="" name="duration">
                        <span class="input-group-addon" id="basic-addon2">months</span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Credits</label>
                    <input type="number" class="form-control" id="inputCredits" placeholder="" name="credits">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Qualification</label>
                    <input type="text" class="form-control" id="inputQuaification" name="qulification" placeholder="">
                </div>

                <button type="submit" class="btn btn-success">
                    <span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span>
                    Submit</button>




            </form>
        </div>


    </div>

</div>
<?php include 'footerScripts.php'?>
<?php include 'footer.php'?>
</body>
</html>