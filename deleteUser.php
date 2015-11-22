<?php
/**
 * Created by PhpStorm.
 * User: lahiru
 * Date: 10/18/2015
 * Time: 8:38 PM
 */

require_once 'connect.php';

if(!isset($_POST['username'])){
    ?>
    <!DOCTYPE html>
    <html>
    <head lang="en">
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
    <div>
        <h1>Delete User</h1>
        <form action="" method="post">
            <div>
                <label>Username</label>
                <input id="username" name="username" type="text" placeholder="username" required>
            </div>
            <input type="submit" value="Delete">
        </form>
    </div>
    </body>
    </html>

    <?php

}else{
    $username = $_POST['username'];
    $userCheck = DB::getInstance();
    $userCheck->query("select username from user where username = ?",array($username));
    if($userCheck->count()){
        $deleteUser = DB::getInstance();
        $deleteUser->query("delete from user where username = ?",array($username));
        echo '<script type="text/javascript">alert("user deleted successfully.");</script>';
    }else{
        echo '<script type="text/javascript">alert("Username doesn\'t exist.");</script>';
    }
}
?>