<?php
/**
 * Created by PhpStorm.
 * User: Chathuranga-Pamba
 * Date: 15/11/26
 * Time: 11:44 PM
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

    <script type="text/javascript">
        $("a[data-tab-destination]").on('click', function() {
            var tab = $(this).attr('data-tab-destination');
            $("#"+tab).click();
        });

    </script>

</head>
<body>
<?php include 'navBar.php'?>
<div class="container-fluid backgroundImg">
    <?php include 'adminSidebar.php'?>
    <div class="container jumbotron col-lg-8">
        <h3><center>Accept User Registration</center></h3>
        <br>
        <br>
        <ul class="nav nav-tabs" id="myTabs">

            <?php
            $instance = DB::getInstance();
            $instance->query("select a.userID,u.utype
                              FROM acceptregistration a,user u
                              WHERE u.userID = a.userID and a.status = 'waiting'");

            $data = $instance->results();
            $count = $instance->count();
            //print_r($data);


            $alldata = array(
                "teacher"=>array(),
                "admin"=>array(),
                "student"=>array()
            );


            for($i=0;$i<$count;$i++){

                if($data[$i]->utype === "teacher"){
                    array_push($alldata["teacher"] ,$data[$i]->userID);
                }elseif($data[$i]->utype === "admin"){
                    array_push($alldata["admin"] ,$data[$i]->userID);
                }else{
                    array_push($alldata["student"] ,$data[$i]->userID);
                }
            }

            //print_r($alldata);

            function getDetails($userID){
                global $instance;
                $instance->query("SELECT userID,fname,lname,email,address,nicnumber,mnumber FROM user WHERE userID = $userID");
                return $instance->results();

            }




            ?>






            <li class="active"><a id="tab-1" href="#one" data-toggle="tab">STUDETS   <span class="badge"><strong><?php echo count(@$alldata["student"])?></strong></span></a></li>
            <li><a href="#two" id="tab-2" data-toggle="tab">TEACHER  <span class="badge"><strong><?php echo count(@$alldata["teacher"])?></strong></span> </a></li>
            <li><a href="#three" id="tab-3" data-toggle="tab">ADMIN  <span class="badge"><strong><?php echo count(@$alldata["admin"])?></strong></span></a></li>
        </ul>


        <div class="tab-content">
            <div class="tab-pane active" id="one">
                <br>
                <table class="table table-responsive"  >
                    <thead>
                    <tr>
                        <th>User ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Nic Number</th>
                        <th>Mobile Number</th>
                        <th>Accept</th>
                        <th>Cancel</th>



                    </tr>
                    </thead>
                    <tbody>

                <?php
                for($i=0;$i<count( @$alldata["student"]);$i++){
                    $id = @$alldata["student"][$i];
                    $a = getDetails($id)[0];
                    //print_r($a);
                    echo '<tr>';
                    echo '<td> '.$a->userID .'</td>';
                    echo '<td> '.$a->fname .'</td>';
                    echo '<td> '.$a->lname .'</td>';
                    echo '<td> '.$a->email .'</td>';
                    echo '<td> '.$a-> address.'</td>';
                    echo '<td> '.$a->nicnumber .'</td>';
                    echo '<td> '.$a-> mnumber.'</td>';
                    echo ' <td><input type="checkbox" /></td>
                        <th><input type="checkbox" /></th>';

                    echo '</tr>';

                }



                ?>

                    </tbody>
                </table>

            </div>
            <div class="tab-pane" id="two">
                <table class="table table-responsive" bgcolor="#fffaf0">
                    <thead>
                    <tr>
                        <th>User ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Nic Number</th>
                        <th>Mobile Number</th>
                        <th>Accept</th>
                        <th>Cancel</th>



                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    for($i=0;$i<count( @$alldata["teacher"]);$i++){
                        $id = @$alldata["teacher"][$i];
                        $a = getDetails($id)[0];
                        //print_r($a);
                        echo '<tr>';
                        echo '<td> '.$a->userID .'</td>';
                        echo '<td> '.$a->fname .'</td>';
                        echo '<td> '.$a->lname .'</td>';
                        echo '<td> '.$a->email .'</td>';
                        echo '<td> '.$a-> address.'</td>';
                        echo '<td> '.$a->nicnumber .'</td>';
                        echo '<td> '.$a-> mnumber.'</td>';
                        echo ' <td><input type="checkbox" /></td>
                        <th><input type="checkbox" /></th>';

                        echo '</tr>';

                    }



                    ?>

                    </tbody>
                </table>


            </div>
            <div class="tab-pane" id="three">
                <table class="table table-responsive" >
                    <thead>
                    <tr>
                        <th>User ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Nic Number</th>
                        <th>Mobile Number</th>
                        <th>Accept</th>
                        <th>Cancel</th>



                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    for($i=0;$i<count( @$alldata["admin"]);$i++){
                        $id = @$alldata["admin"][$i];
                        $a = getDetails($id)[0];
                        //print_r($a);
                        echo '<tr>';
                        echo '<td> '.$a->userID .'</td>';
                        echo '<td> '.$a->fname .'</td>';
                        echo '<td> '.$a->lname .'</td>';
                        echo '<td> '.$a->email .'</td>';
                        echo '<td> '.$a-> address.'</td>';
                        echo '<td> '.$a->nicnumber .'</td>';
                        echo '<td> '.$a-> mnumber.'</td>';
                        echo ' <td><input type="checkbox" /></td>
                        <th><input type="checkbox" /></th>';

                        echo '</tr>';

                    }



                    ?>

                    </tbody>
                </table>

            </div>
        </div>
        <button type="submit" class="btn btn-success col-lg-12">
               <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                 Accept Selected Registrations</button>

    </div>

</div>
<?php include 'footerScripts.php'?>
<?php include 'footer.php'?>
</body>
</html>