<!doctype html>
<!--
Name: Alex Valickis, Jonathan Hodder
Date: April 4th 2014
Purpose: process information from the register form and create a new user
-->
<?php
	session_start();
	//Create and assign new variable
	$host="localhost"; // Host name 
	$username="db200203673"; // username 
	$password="80087"; // password 
	$db_name="db200203673";  // Database name 
	$tbl_name="users"; // Table name 
	
	// Connect to server and select database.
	mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
	mysql_select_db("$db_name")or die("cannot select DB");
	
	//store username, password, email, and role info sent from form into the variables
	$usernametxt=$_POST["usernametxt"]; 
	$passwordtxt=$_POST['passwordtxt'];
	$emailtxt=$_POST['emailtxt'];
	$roletxt=$_POST['roletxt'];
	
	// To protect MySQL injection 
	$usernametxt = stripslashes($usernametxt);
	$passwordtxt = stripslashes($passwordtxt);
	$usernametxt = mysql_real_escape_string($usernametxt);
	$passwordtxt = mysql_real_escape_string($passwordtxt);
	//insert the new username into the database
	$sql="INSERT INTO " . $tbl_name . "(username, password, email, type) 
	      VALUES ('" . $usernametxt . "','" .  $passwordtxt . "','" . $emailtxt . "','" . $roletxt . "')";
	$result=mysql_query($sql);
	
	// Create session variable for logged in and for the username
	$_SESSION['user'] = 'Yes';
	$_SESSION['username'] = $usernametxt;
	
	// Redirect to the index page
	header("location:index.php");
?>