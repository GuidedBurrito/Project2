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
		//if the user is not logged in throw them to the login page
		if(!isset($_SESSION["user"]))
		{ 
			header('location: login.php');
		}
		//create and assign variables
		$host="localhost"; // Host name 
		$username="db200203673"; // username 
		$password="80087"; // password 
		$db_name="db200203673";  // Database name 
		$tbl_name="users"; // Table name 
		
		// Connect to server and select database.
		mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
		mysql_select_db("$db_name")or die("cannot select DB");
		
		//assign username the session username value
		$myusername = $_SESSION['username']; 
		$object = mysql_query("SELECT * FROM $tbl_name WHERE username='$myusername'");
		//assign database values to the variables
		while ($row = mysql_fetch_assoc($object)) 
		{
			$myusername=$row['username'];
			$pass=$row['password'];
			$email=$row['email'];
			$role=$row['type'];
		}
		//when you update the profile
		if(isset($_POST['insert'])) 
		{
			//assign the entered form values to variables
			$pass = $_POST['password'];
			$email = $_POST['email'];
			$role = $_POST['role'];
			//update the database with the form values
			$sql = "UPDATE $tbl_name SET password = '" . $pass . "', email = '" . $email . "', type = '". $role . "'  WHERE username = '$myusername '" or die("cannot update database");
			$result = mysql_query($sql);
			//tells user that the profile has been updated
			echo '<script type="text/javascript"> alert("Profile Updated")</script>';
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
			<!-- Page Header -->
			<div class="large-12 columns">
				<h1>Update Profile<img border="0" src="logo.png" alt="logo" width="225" height="150" /></h1>
			</div>
		</div>
		<div class="row">
			<div class="large-4 columns">	
				<div class="panel">
					<!--Username Form -->
					<form name="insert" method="post"><br>
						<!--Username Disabled Field-->
						<label>Username:
							<input disabled type="text" name="username" maxlength="20" id="inputtype" value="<?php echo $myusername; ?>">
						<!--Password Required Field-->
						<label>Change Password: 
							<input required type="text" name="password" maxlength="20" id="inputtype" value="<?php echo $pass; ?>">
						</label>
						<!--Email Address Required Field-->
						<label>Email Address:
							<input required type="email" name="email" maxlength="60" id="inputtype" value="<?php echo $email; ?>">
						</label>
						<!--Role Drop Down List-->
						<label>Role:
							<select name='role'>
								<option <?php if ($role == 'user'){echo "selected='selected'";} ?> value="user">User</option>
								<option <?php if ($role == 'admin'){echo "selected='selected'";} ?> value="admin">Admin</option>
							</select> 
						</label>
						<p><input type="submit" id="inputsubmit" name="insert" value="Save" id="save"></p> <br />
					</form>
				</div>
			</div>
		</div>	
	</body>
</html>
