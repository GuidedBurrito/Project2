<!--
Name: Alex Valickis, Jonathan Hodder
Date: April 10th 2014
Purpose: Update user profile
-->
<?php
	//kill the session
	session_start();
	session_destroy();
	header("location:login.php");
?>