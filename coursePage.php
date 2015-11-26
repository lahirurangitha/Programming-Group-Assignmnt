<?php
/**
 * Created by PhpStorm.
 * User: Chathuranga-Pamba
 * Date: 15/11/27
 * Time: 1:56 AM
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
    <div class="jumbotron container col-lg-8" >
        <h3><center>Course</center></h3>
        <br>
        <div class="row">
            <div class="col-md-6">
                <div class="thumbnail">
                    <div class="caption">
                        <center><h3>Insert A Course</h3></center>
                        <p>.fsafsafdafdfsadfa..</p>
                        <p><a href="#" class="btn btn-primary center-block" role="button">Insert</a> </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="thumbnail">
                    <div class="caption">
                        <center><h3>Info  Course</h3></center>
                        <p>.fsafsafdafdfsadfa..</p>
                        <p><a href="#" class="btn btn-primary center-block" role="button">Search</a> </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="thumbnail">
                    <div class="caption">
                        <center><h3>Update A Course</h3></center>
                        <p>.fsafsafdafdfsadfa..</p>
                        <p><a href="#" class="btn btn-primary center-block" role="button">Update</a> </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="thumbnail">
                    <div class="caption">
                        <center><h3>Delete A Course</h3></center>
                        <p>.fsafsafdafdfsadfa..</p>
                        <p><a href="#" class="btn btn-primary center-block" role="button">Delete</a> </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?php include 'footerScripts.php'?>
<?php include 'footer.php'?>
</body>
</html>