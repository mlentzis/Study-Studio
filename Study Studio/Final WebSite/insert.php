
<?php
	mysql_connect('localhost', 'root', 'root') or die("Connection Failed");
	mysql_select_db('userdb')or die("Connection Failed");
	$setCard = nl2br($_POST['setCard']);
	$query = "INSERT INTO cards ('word')VALUES('$setCard')";
	if(mysql_query($query)){
	echo "Inserted into the database";}
		else{
	echo "Fail, please try again";}
	
?>