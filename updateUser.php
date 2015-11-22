<?php
/**
 * Created by PhpStorm.
 * User: lahiru
 * Date: 10/18/2015
 * Time: 8:39 PM
 */

require_once 'connect.php';

if(!isset($_POST['username'])){
    ?>
    <div>
        <form action="" method="post">
            <h3>Enter username to search</h3>
            <div>
                <input type="text" name="username">
            </div>

            <input type="submit" value="Search">
        </form>
    </div>
<?php
}else{
    $username = $_POST['username'];
    $querySelect = DB::getInstance();
    $querySelect->query("SELECT * FROM user WHERE username = ?",array($username));
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
            <div>
                <h1>Update</h1>
                <form action="updateConfirm.php" method="post">
                    <div>
                        <label>Username</label>
                        <input name="u_username" type="text" value="<?php echo $username;?>">
                    </div>
                    <div>
                        <label>Password</label>
                        <input name="u_password" type="password" value="<?php echo $password;?>">
                    </div>
                    <div>
                        <label>Re-Password</label>
                        <input name="u_repassword" type="password" value="<?php echo $password;?>">
                    </div>
                    <div>
                        <label>E-Mail</label>
                        <input name="u_email" type="email" placeholder="E-mail" value="<?php echo $email;?>">
                    </div>
                    <div>
                        <label>Select user type</label>
                        <select name="u_utype" required >
                            <option></option>
                            <option value="admin">Administrator</option>
                            <option value="teacher">Teacher</option>
                            <option value="student">Student</option>
                        </select>
                    </div>
                    <div>
                        <label>First Name</label>
                        <input name="u_fname" type="text" placeholder="First Name" value="<?php echo $fname;?>">
                    </div>
                    <div>
                        <label>Last Name</label>
                        <input name="u_lname" type="text" placeholder="Last Name" value="<?php echo $lname;?>">
                    </div>
                    <div>
                        <label>Mobile Number</label>
                        <input name="u_mobileNo" type="tel" placeholder="Mobile Number" value="<?php echo $mnumber;?>">
                    </div>
                    <div>
                        <label>Address</label>
                        <input name="u_address" type="text" placeholder="Address" value="<?php echo $address;?>">
                    </div>
                    <div>
                        <label>NIC Number</label>
                        <input name="u_nicNo" type="text" placeholder="NIC Number" value="<?php echo $nic?>">
                    </div>
                    <div>
                        <input type="submit" value="Update">
                    </div>
                </form>
            </div>

<?php
//
        }else{
            echo '<script type="text/javascript">alert("Username does not exist")</script>';
        }
}

?>
