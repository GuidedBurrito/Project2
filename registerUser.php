<!--
Name: Alex Valickis, Jonathan Hodder
Date: April 4th 2014
Purpose: process information from the register form and create a new user
--><!doctype html>
<!--
Name: Alex Valickis, Jonathan Hodder
Date: April 4th 2014
Purpose: register new user form page
-->
<html class="no-js" lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<!-- Page Tittle -->
		<title>Register</title>
		<link rel="stylesheet" href="css/foundation.css" />
		<script src="js/modernizr.js"></script>
		<script src="js/jquery.js"></script>
		<script src="js/foundation.min.js"></script>
		<script>
			$(document).foundation();
		</script>
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
	$usernametxt=$_POST["usernametxt"]; 
	$passwordtxt=$_POST['passwordtxt'];
	$emailtxt=$_POST['emailtxt'];
	$roletxt=$_POST['roletxt'];
	
	// To protect MySQL injection (more detail about MySQL injection)
	$usernametxt = stripslashes($usernametxt);
	$passwordtxt = stripslashes($passwordtxt);
	$usernametxt = mysql_real_escape_string($usernametxt);
	$passwordtxt = mysql_real_escape_string($passwordtxt);
	$sql="INSERT INTO " . $tbl_name . "(username, password, email, type) 
	      VALUES ('" . $usernametxt . "','" .  $passwordtxt . "','" . $emailtxt . "','" . $roletxt . "')";
	$result=mysql_query($sql);
	
		// Create session variable for logged in user
		$_SESSION['user'] = 'Yes';
		$_SESSION['username'] = $usernametxt;
	
	// Redirect to file "ContactList.php"
	header("location:index.php");
?>
</body>