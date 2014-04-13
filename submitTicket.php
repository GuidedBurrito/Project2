<!doctype html>
<!--
Name: Alex Valickis, Jonathan Hodder
Date: April 11th 2014
Purpose: submit the new ticket to the database
-->
<?php
	session_start();
	//create and assign variables
	$host="localhost"; // Host name 
	$username="db200203673"; // username 
	$password="80087"; // password 
	$db_name="db200203673";  // Database name 
	$tbl_name="tickets"; // Table name
	$ticketEnd = 1; //End part of the ticket id
		
	// Connect to server and select database.
	mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
	mysql_select_db("$db_name")or die("cannot select DB");
	
	// username and password sent from form 
	$descriptiontxt=$_POST["description"];
	$prioritytxt=$_POST["priority"];
	$customertxt=$_POST["customer"];
	$narrativetxt=$_POST["narrative"];
	//create ticket id based on the timezone
	date_default_timezone_set('America/New_York');
	$id = mktime(0,0,0,date('m'),date('d'), date('Y')) . "-" . $ticketEnd;
	//Select all the data from the table where the ticketId is
	$sql1="SELECT * FROM $tbl_name WHERE ticketID = '$id'";
	$result=mysql_query($sql1);
	// Mysql_num_row is counting table row
	$count = mysql_num_rows($result);
		
	// If result matched the $id
	while($count==1)
	{	
		//assign the new ticket id
		$ticketEnd = $ticketEnd + 1;	 
		$id = mktime(0,0,0,date('m'),date('d'), date('Y')) . "-" . $ticketEnd;
		$sql1="SELECT * FROM $tbl_name WHERE ticketID = '$id'";
		$result=mysql_query($sql1);
		// Mysql_num_row is counting table row
		$count =mysql_num_rows($result);
	}	
	//insert the new ticket into the database set the status to New
	$sql2="INSERT INTO " . $tbl_name . "(ticketID, incidentDescription, incidentPriority, customerInfo, incidentNarrative, incidentStatus) 
		  VALUES ('" . $id . "','" .  $descriptiontxt . "','" . $prioritytxt . "','" . $customertxt . "','" . $narrativetxt . "', '" . "New" . "')";
	$result=mysql_query($sql2);
	echo $sql2;
	// Create session variable for logged in user
	$_SESSION['id'] = $id;
	//return to index
	header("location:index.php");
?>