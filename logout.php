<?php
/**
 * Created by PhpStorm.
 * User: lahiru
 * Date: 11/20/2015
 * Time: 2:57 PM
 */
require_once 'connect.php';
require_once 'session_start.php';

session_destroy();
header("Location: login.php");
