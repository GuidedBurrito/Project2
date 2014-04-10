<!doctype html>
<!--
Name: Alex Valickis, Jonathan Hodder
Date: April 10th 2014
Purpose: Update user profile
-->
<html class="no-js" lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<!-- Page Tittle -->
		<title>Update Profile</title>
		<link rel="stylesheet" href="css/foundation.css" />
		<script src="js/modernizr.js"></script>
		<script src="js/jquery.js"></script>
		<script src="js/foundation.min.js"></script>
		<script>
			$(document).foundation();
		</script>
	</head>
	<?php
		session_start();
		if(!isset($_SESSION["user"])){ 
			header('location: login.php');
		}
		$host="localhost"; // Host name 
		$username="db200203673"; // username 
		$password="80087"; // password 
		$db_name="db200203673";  // Database name 
		$tbl_name="users"; // Table name 
		
		// Connect to server and select database.
		mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
		mysql_select_db("$db_name")or die("cannot select DB");
			
		$myusername = $_SESSION['username']; 
		//$select = "SELECT * FROM $tbl_name WHERE username='$myusername'";
		$object = mysql_query("SELECT * FROM $tbl_name WHERE username='$myusername'");
		//assign database values to the username
		while ($row = mysql_fetch_assoc($object)) {
		$myusername=$row['username'];
		$pass=$row['password'];
		$email=$row['email'];
		$role=$row['type'];}
		
		if(isset($_POST['insert'])) 
		{
			$pass = $_POST['password'];
			$email = $_POST['email'];
			$role = $_POST['role'];
			echo $password;
			$sql = "UPDATE $tbl_name SET password = '" . $pass . "', email = '" . $email . "', type = '". $role . "'  WHERE username = '$myusername '" or die("cannot update database");
			$result = mysql_query($sql);

			if ($result){
				$success = '<p> Profile Updated!</p>';
			}
		}
	?>
	<body>
		<div class="row">
			<div class="large-10">
				<!-- Nav Bar and links -->
				<div class="nav">
					<ul>
						<li>
							<a href="index.php" id="navHome">Home</a>
						</li>
						<li>
							<a href="logout.php" id="navLogout">Logout</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="row">
			<!-- Page Content -->
			<div class="large-12 columns">
				<h1>Update Profile</h1>
			</div>
		</div>
		<div class="row">
			<div class="large-4 columns">	
				<div class="panel">
					<!--Form -->
					<form name="insert" method="post"><br>
						<label>Username:
							<input disabled type="text" name="username" maxlength="20" id="inputtype" value="<?php echo $myusername; ?>">
						<label>Change Password: 
							<input required type="text" name="password" maxlength="20" id="inputtype" value="<?php echo $pass; ?>">
						</label>
						<label>Email Address:
							<input required type="email" name="email" maxlength="60" id="inputtype" value="<?php echo $email; ?>">
						</label>
						<label>Role:
							<select name='role'>
								<option value="user">User</option>
								<option value="admin">Admin</option>
							</select> 
						</label>
						<p><input type="submit" id="inputsubmit" name="insert" value="Save" id="save" width="10px"></p> <br />
					</form>
					<form method='post' action='updateProfile.php'></form>
				</div>
			</div>
		</div>	
	</body>
</html>
