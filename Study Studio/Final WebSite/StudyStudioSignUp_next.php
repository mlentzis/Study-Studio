<?php

$usernameVal=$_REQUEST["userName"];

/*
define('DBHOST', 'localhost');
define('DBUSER', 'root');
define('DBPASS', '');
define('DBNAME', 'userDB');
*/
$DBHOST = "localhost";
$DBUSER = "root";
$DBPASS = "root";
$DBNAME = "userdb";



//Create connection
//$conn = mysql_connect($DBHOST, $DBUSER, $DBPASS);
//$dbcon = mysql_select_db($DBNAME);

/*
//Check Connection
if ( !$conn ) {
	die("Connection failed : " . mysql_error());
}

if ( !$dbcon ) {
	die("Database Connection failed : " . mysql_error());
}
*/




$conn = mysqli_connect($DBHOST, $DBUSER, $DBPASS, $DBNAME);

  $escapedPW = mysqli_real_escape_string($conn,$_REQUEST['password2']);


//$salt = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));


$bytes = 32;

# generates a random salt to use for this account
$salt = bin2hex(openssl_random_pseudo_bytes($bytes));
$saltedPW =  $escapedPW . $salt;
///sha256 is a hashing algorithm
$hashedPW = hash('sha256', $saltedPW); 
    
   $fname = $_POST["firstName"];
   $lname = $_POST["lastName"];
   $school = $_POST["school"];
   $email = $_POST["email"];
   $un = $_POST["userName"];
   $pw = $_POST["passwordID"];
   echo strlen($fname);



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
		$query = "SELECT email FROM user WHERE email='$email'";
		$result = mysqli_query($conn,$query);
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
		$query = "SELECT userName FROM user WHERE userName='$un'";
		$result = mysqli_query($conn,$query);
		$count = mysql_num_rows($result);
		if ( $count ) {
			$error = true;
			$unError = "Provided username is already in use.";
		}
	}

	//password validation
	if (empty($hashedPW)) {
		$error = true;
		$pwError = "Please enter password.";
	} else if(strlen($hashedPW) < 6) {
		$error =  true;
		$pwError = "Password must have at least 6 characters.";
	}
	


//No Errors - Continue to SignUp
if($error){
    echo $fnameError;
    echo $lnameError;
    echo $emailError;
    echo $unError;
    echo $pwError;
} else {
    $sql="insert into user (fname,lname,school,email,userName,password,salt) 
 VALUES ('$fname','$lname','$school','$email','$un','$hashedPW','$salt')";
    $result=mysqli_query($conn,$sql);
    if($result==true){
        echo "user inserted successfully";
        echo " $salt";
    }
    }
    


?>