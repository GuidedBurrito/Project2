!doctype html>
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
	$tbl_name="tickets"; // Table name
	$ticketEnd = 1; 
	
	
	// Connect to server and select database.
	mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
	mysql_select_db("$db_name")or die("cannot select DB");
	
	// username and password sent from form 
	$descriptiontxt=$_POST["description"];
	$prioritytxt=$_POST["priority"];
	$customertxt=$_POST["customer"];
	$narrativetxt=$_POST["narrative"];
	$id = date(Y-m-d) . "-" . $ticketEnd;
	
	$sql1="SELECT * FROM $tbl_name WHERE ticketID = '$id";
	$result=mysql_query($sql1);
	
	// Mysql_num_row is counting table row
	$count = mysql_num_rows($result);
	
	// If result matched $myusername and $mypassword, table row must be 1 row
	while($count==1){	
		$ticketEnd = $ticketEnd + 1;	 
		$id = date(Y-d-m) . "-" . $ticketEnd;
		$sql1="SELECT * FROM $tbl_name WHERE ticketID = '$id";
		$result=mysql_query($sql1);
	
		// Mysql_num_row is counting table row
		$count =mysql_num_rows($result);
	}
	
	$sql2="INSERT INTO " . $tbl_name . "(ticketID, incidentDescription, incidentPriority, customerInfo, incidentNarrative) 
	      VALUES ('" . $id . "','" .  $descriptiontxt . "','" . $prioritytxt . "','" . $customertxt . "','" . $narrativetxt . "')";
	$result=mysql_query($sql2);
	
		// Create session variable for logged in user
		$_SESSION['id'] = $id;
	
	// Redirect to file "ContactList.php"
	header("location:index.php");
?>
</body>