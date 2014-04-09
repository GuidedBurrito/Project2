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
	$usernametxt=$_POST['usernametxt']; 
	$passwordtxt=$_POST['passwordtxt'];
	$emailtxt=$_POST['emailtxt'];
	$roletxt=$_POST['roletxt'];
	
	// To protect MySQL injection (more detail about MySQL injection)
	$usernametxt = stripslashes($myusername);
	$passwordtxt = stripslashes($mypassword);
	$usernametxt = mysql_real_escape_string($myusername);
	$passwordtxt = mysql_real_escape_string($mypassword);
	$sql="INSERT INTO $tbl_name (username, password, eamil, type) VALUES ('$usernametxt', '$passwordtxt', '$emailtxt', '$roletxt');";
	$result=mysql_query($sql);
	
		// Create session variable for logged in user
		$_SESSION['user'] = 'Yes';
		$_SESSION['username'] = $usernametxt;
		$_SESSION['password'] = $passwordtxt;
		$_SESSION['email'] = $emailtxt;
	
	// Redirect to file "ContactList.php"
	header("location:index.php");
?>
</body>
</html>