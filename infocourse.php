<?php
/**
 * Created by PhpStorm.
 * User: pamba
 * Date: 10/20/2015
 * Time: 4:07 PM
 */




require_once 'config.php';


$data  = array();
if(!empty($_GET['course_number'])){
    $data['course_number'] = $_GET['course_number'];
}

if(!empty($_GET['course_name'])){
    $data['course_name'] = $_GET['course_name'];
}

if(!empty($_GET['duration'])){
    $data['duration'] = $_GET['duration'];
}

if(!empty($_GET['credits'])){
    $data['credits'] = $_GET['credits'];
}

if(!empty($_GET['qulification'])){
    $data['qulification'] = $_GET['qulification'];
}




//print_r($data);


$sql = "select * from course";

if(sizeof($data) != 0){
    $sql .=" where";
}


$x = 0;

foreach($data as $key=>$value){
    $sql.=  " $key like '%$value%'" ;
    if($x !== sizeof($data)-1){
        $sql.=" and ";
    }
    $x++;
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

<?php
    $result = $conn->query($sql);

    if($result) {
        $all = mysqli_fetch_all($result);
        //print_r($all);

        if(sizeof($all) ==0) {
            ?>
            <head>
                <link href="bootstrap-3.3.5/css/bootstrap.min.css" type="text/css" rel="stylesheet"/>
                <link href="bootstrap-3.3.5/css/bootstrap.css" type="text/css" rel="stylesheet"/>

            </head>
            <body>

            <div class="alert alert-danger" role="alert"><strong>There is no Results</strong></div>
            <?php
            }else{
            ?>


            <table class="table table-striped" border="1px">
                <thead>
                <tr>
                    <th>Course Number</th>
                    <th>Course Name</th>
                    <th>Duration</th>
                    <th>Credits</th>
                    <th>Qulification</th>
                </tr>
                </thead>
                <tbody>
                <?php

                for ($k = 0; $k < sizeof($all); $k++) {

                    ?>
                    <tr>
                        <?php
                        for ($y = 0; $y < 5; $y++) {
                            $element = $all[$k][$y];

                            ?>
                            <td> <?php echo $element; ?></td>
                        <?php
                        }
                        ?>
                    </tr>
                <?php


                }


                ?>


                </tbody>


            </table>


            </body>







        <?php
        }
    }else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    }


    ?>


    </div>



</body>
</html>





