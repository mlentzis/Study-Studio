<?php

ob_start();
session_start();
require_once 'dbConnect.php';

//if session is not set this will redirect to the login page
if ( !isset($_SESSION['user']) ) {
    header("Location: index.php");
    exit;
}
//select logged in users details
$res = mysql_query("SELECT * FROM users WHERE id=".$_SESSION['user']);
$userRow = mysql_fetch_array($res);




?>