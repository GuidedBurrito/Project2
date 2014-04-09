<!--
Name: Alex Valickis
Date: April 4th 2014
Purpose: validate page
-->

<html>
 <head>
  <title>validate</title>
 </head>
 <body>
<?php
	session_start();
	$host="localhost"; // Host name 
	$username="db200203673"; // username 
	$password="80087"; // password 
	$db_name="db200203673";  // Database name 
	$tbl_name="users"; // Table name 
	
	// Connect to server and select database.
	mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
	mysql_select_db("$db_name")or die("cannot select DB");
	
	// username and password sent from form 
	$myusername=$_POST['usernametxt']; 
	$mypassword=$_POST['passwordtxt']; 
	
	// To protect MySQL injection (more detail about MySQL injection)
	$myusername = stripslashes($myusername);
	$mypassword = stripslashes($mypassword);
	$myusername = mysql_real_escape_string($myusername);
	$mypassword = mysql_real_escape_string($mypassword);
	$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
	$result=mysql_query($sql);
	
	// Mysql_num_row is counting table row
	$count=mysql_num_rows($result);
	
	// If result matched $myusername and $mypassword, table row must be 1 row
	if($count==1){
		
		// Create session variable for logged in user
		$_SESSION['user'] = 'Yes';
	
	// Redirect to file "ContactList.php"
	header("location:index.php");
	}
	// If the user doesn't have the correct creds
	else {
	echo "Wrong Username or Password";
	}
?>
</body>
</html>