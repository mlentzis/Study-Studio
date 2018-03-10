<?php
$un=$_REQUEST["userName"];
//$pw=$_REQUEST["password"];

$DBHOST = "localhost";
$DBUSER = "root";
$DBPASS = "root";
$DBNAME = "userdb";

// Create connection
$conn = new mysqli($DBHOST, $DBUSER, $DBPASS, $DBNAME);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
else
{

     $escapedPW = mysqli_real_escape_string($conn,$_GET['password']);

     //save this user and pass as cookie if remeber checked start
 if (isset($_REQUEST['remember']))
   $escapedRemember = mysqli_real_escape_string($conn,$_REQUEST['remember']);

 $cookie_time = 60 * 60 * 24 * 30; // 30 days
  $cookie_time_Onset=$cookie_time+ time();
  if (isset($escapedRemember)) {
    /*
     * Set Cookie from here for one hour
     * */
    setcookie("userName", $un, $cookie_time_Onset);
    setcookie("password", $escapedPW, $cookie_time_Onset);  

  } else {

      $cookie_time_fromOffset=time() -$cookie_time;
setcookie("userName", '',$cookie_time_fromOffset );
    setcookie("password", '', $cookie_time_fromOffset);  

  }
  //save this user and pass as cookie if remember checked end
     
//now check user and pass verification
 $query = "select * from user where userName = '$un';";
 
     $resultSet = mysqli_query($conn,$query);
                        
                           if(mysqli_num_rows($resultSet) > 0){
                           //check noraml user salt and pass
                           //echo "noraml";
                            
 $saltQuery = "select salt from user where userName = '$un';";
$result = mysqli_query($conn,$saltQuery);
$row = mysqli_fetch_assoc($result);
$salt = $row['salt'];

$saltedPW =  $escapedPW . $salt;

$hashedPW = hash('sha256', $saltedPW);

 $query = "select * from user where userName = '$un' 
and password = '$hashedPW' ";
                        
                            $resultSet = mysqli_query($conn,$query);
        
                           if(mysqli_num_rows($resultSet) > 0){
                               $row = mysqli_fetch_assoc($resultSet);
                               echo "your userName and  password is correct";
                               session_start();
                               $_SESSION["user_id"]=$row["user_id"];
                               $_SESSION["user_name"]=$row["userName"];
header("location:index.php");
}
else
{
echo "your userName or password is incorrect";
}

}
     
}
?>