<?php
/**
 * Created by PhpStorm.
 * User: lahiru
 * Date: 11/20/2015
 * Time: 2:57 PM
 */
require_once 'connect.php';

session_destroy();
Redirect::to('login.php');
