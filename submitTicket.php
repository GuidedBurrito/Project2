<!doctype html>
<!--
Name: Alex Valickis, Jonathan Hodder
Date: April 10th 2014
Purpose: adds the new ticket to the database
-->
<html class="no-js" lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<!-- Page Tittle -->
		<title>Add Ticket</title>
		<!-- Style and JavaScript links -->
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
	$ticketEnd = 1; // Starting id number
	
	
	// Connect to server and select database.
	mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
	mysql_select_db("$db_name")or die("cannot select DB");
	
	// gets values sent from form 
	$descriptiontxt=$_POST["description"];
	$prioritytxt=$_POST["priority"];
	$customertxt=$_POST["customer"];
	$narrativetxt=$_POST["narrative"];
	
	// Set time zone for id
	date_default_timezone_set('America/New_York');
	
	// add id number to the date
	$id = mktime(0,0,0,date('m'),date('d'), date('Y')) . "-" . $ticketEnd;
	
	// Make sure that id is unique
	$sql1="SELECT * FROM $tbl_name WHERE ticketID = '$id'";
	$result=mysql_query($sql1);
	// Mysql_num_row is counting table row
	$count = mysql_num_rows($result);
	
	// If id is not unique....
	while($count==1){
		//add 1 to the id number and try again	
		$ticketEnd = $ticketEnd + 1;	 
		$id = mktime(0,0,0,date('m'),date('d'), date('Y')) . "-" . $ticketEnd;
		$sql1="SELECT * FROM $tbl_name WHERE ticketID = '$id'";
		$result=mysql_query($sql1);
	
		// Mysql_num_row is counting table row
		$count =mysql_num_rows($result);
	}
	
	// INsert new ticket into the database
	$sql2="INSERT INTO " . $tbl_name . "(ticketID, incidentDescription, incidentPriority, customerInfo, incidentNarrative) 
	      VALUES ('" . $id . "','" .  $descriptiontxt . "','" . $prioritytxt . "','" . $customertxt . "','" . $narrativetxt . "')";
	$result=mysql_query($sql2);
	
		// Create session variable for id
		$_SESSION['id'] = $id;
	
	// Redirect to file "index.php"
	header("location:index.php");
?>
</body>