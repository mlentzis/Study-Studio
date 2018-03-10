<?php
ob_start();
session_start();
if ( isset($_SESSION['user'])!="") {
	header("Location: home.php");
}
include_once 'db_connect.php';

$error = false;

if ( isset($_POST['btn-signup']) ) {
	//clean up user inputs to prevent sql injections
	$fname = trim($_POST['fname']);
	$fname = strip_tags($fname);
	$fname = htmlspecialchars($fname);

	$lname = trim($_POST['lname']);
	$lname = strip_tags($lname);
	$lname = htmlspecialchars($lname);
	
	$school = trim($_POST['school']);
	$school = strip_tags($school);
	$school = htmlspecialchars($school);

	$email = trim($_POST['email']);
	$email = strip_tags($email);
	$email = htmlspecialchars($email);

	$un = trim($_POST['un']);
	$un = strip_tags($un);
	$un = htmlspecialchars($un);

	$pw = trim($_POST['pw']);
	$pw = strip_tags($pw);
	$pw = htmlspecialchars($pw);

	//basic name validation
	if (empty($fname)) {
		$error = true;
		$fnameError = "Please enter your name.";
	} else if (strlen($fname) < 3) {
		$error = true;
		$fnameError = "Name must have at least 3 characters.";
	} else if (!preg_match("/^[a-zA-Z]+$/", $fname)) {
		$error = true;
		$fnameError = "Name must contain letters.";
	}

	if (empty($lname)) {
		$error = true;
		$lnameError = "Please enter your name.";
	} else if (strlen($lname) < 3) {
		$error = true;
		$lnameError = "Name must have at least 3 characters.";
	} else if (!preg_match("/^[a-zA-Z]+$/", $lname)) {
		$error = true;
		$lnameError = "Name must contain letters.";
	}
	
	//basic email validation
	if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
		$error = true;
		$emailError = "Please enter a valid email address.";
	} else {
		//check if email exists or not
		$query = "SELECT eMail FROM userProfile WHERE eMail='$email'";
		$result = mysql_query($query);
		$count = mysql_num_rows($result);
		if ( $count!=0 ) {
			$error = true;
			$emailError = "Provided Email is already in use.";
		}
	}

	//User Name Validation
	if (empty($un)) {
		$error = true;
		$unError = "Please enter a Username.";
	} else if (strlen($un) < 6) {
		$error = true;
		$unError = "Username must have at least 6 characters.";
	} else if (!preg_match("/^[a-zA-Z0-9]+$/", $un)) {
		$error = true;
		$unError = "Username may contain letter and numbers.";
	} else {
		$query = "SELECT username FROM userProfile WHERE username='$un'";
		$result = mysql_query($query);
		$count = mysql_num_rows($result);
		if ( $count ) {
			$error = true;
			$unError = "Provided username is already in use.";
		}
	}
	
	//password validation
	if (empty($pw)) {
		$error = true;
		$pwError = "Please enter password.";
	} else if(strlen($pw) < 6) {
		$error =  true;
		$pwError = "Password must have at least 6 characters.";
	}

	//if there is no error continue to sign up
	if ( !$error ) {
	   $query = "INSERT INTO userProfile(fname, lname, school, eMail, username, password) 
                    VALUES('$fname','$lname','$school','$email','$un','$pw')";
       $res = mysql_query($query);
       
       if ($res) {
           $errorType = "success";
           $errorMSG = "Successfully registered, you may login now";
           unset($fname);
           unset($lname);
           unset($school);
           unset($email);
           unset($un);
           unset($pw);
       } else {
           $errorType = "danger";
           $errorMSG = "Something went wrong, please try again...";
       }		
	}
	
	
}

?>