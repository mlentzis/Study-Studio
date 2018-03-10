

<?php

// This will avoid mysql_connect() deprecation error.
error_reporting( ~E_DEPRECATED &~E_NOTICE );

$usernameVal=$_REQUEST["username"];

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
$conn = mysql_connect($DBHOST, $DBUSER, $DBPASS);
$dbcon = mysql_select_db($DBNAME);

//Check Connection
if ( !$conn ) {
	die("Connection failed : " . mysql_error());
}

if ( !$dbcon ) {
	die("Database Connection failed : " . mysql_error());
}




?>