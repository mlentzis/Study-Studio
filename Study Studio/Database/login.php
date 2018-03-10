<?php
ob_start();
session_start();
require 'dbConnect.php';
require '../PasswordHash.php';



if ( isset($_SESSION['user'])!="" ) {
    header("Location: home.php");
    exit;
}

$error = false;

if ( isset($_POST['btn-login']){

//prevent sql injections/clear invalid user inputs
    $un = trim($_POST['un']);
    $un = strip_tags($un);
    $un = htmlspecialchars($un);
    
    $pw = trim($_POST['pw']);
    $pw = strip_tags($pw);
    $pw = htmlspecialchars($pw);
    
    if(empty($un)) {
        $error = true;
        $unError = "Please enter your username.";
    } else if ( !filter_var($un,FILTER_VALIDATE_EMAIL) ) {
        $error = true;
        $unError = "Please enter valid username.";
    }
    
    if(empty($pw)) {
        $error = true;
        $pwError = "Please enter your password.";
        
    }

    
    //if there is no error continue to login
    
    if(!$error) {
        
        // Base-2 logarithm of the iteration count used for password stretching
        $hash_cost_log2 = 8;
        // Require the hashes to be portable to older systems (less secure)?
        $hash_portable = FALSE;
        
        //password hashing
        
        // Should validate the username length and syntax here
        $user = $_POST['un'];
        $pass = $_POST['pw'];
        
        $hasher = new PasswordHash($hash_cost_log2, $hash_portable);
        $hash = $hasher->HashPassword($pw);
        if (strlen($hash) < 20)
        	fail('Failed to hash new password');
            unset($hasher);
            
        function fail($pub, $pvt = ''){
            	$msg = $pub;
            	if ($pvt !== '')
            		$msg .= ": $pvt";
            	exit("An error occurred ($msg).\n");
            }
            //Keeps the page from showing scripts as Html
        header('Content-Type: text/plain');
        
        $db = new mysqli($db_host, $db_un, $db_pw, $db_name, $db_port);
        if (mysqli_connect_errno())
        	fail('MySQL connect', mysqli_connect_error());
        	
        ($stmt = $db->prepare('insert into users (un, pw) values (?, ?)'))
        	|| fail('MySQL prepare', $db->error);
        $stmt->bind_param('ss', $un, $hash)
        	|| fail('MySQL bind_param', $db->error);
        $stmt->execute()
        	|| fail('MySQL execute', $db->error);
        	
        	$stmt->close();
            $db->close();
            
            //End Hashing
        
      /*  $res = mysql_query("SELECT id, username, password FROM userProfile WHERE eMail=($email)";
        $row = mysql_fetch_array($res);
        $count = mysql_num_rows($res);
        
        if ( $count == 1 && $row['password']==$pw ) {
            $_SESSION['user'] = $row['username'];
            header("Location: home.php");
        } else {
            $errorMSG = "Incorrect Credentials, Try again...";
        }
        */
    }
    
}//End Login



?>