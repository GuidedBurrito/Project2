<!doctype html>
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
	<?php
		if(isset($_SESSION["user"])){ 
			header('location: index.php');
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
							<a href="login.php" id="navLogin">Login</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="row">
			<!-- Page Content -->
			<div class="large-12 columns">
				<h1>User Regester</h1>
			</div>
		</div>

		<div class="row">
			<div class="large-12 columns">
				<!-- login form -->
				<div class="panel">
					<div class="large-4 columns">
						<form name="registerForm" method="post" action="registerUser.php">
							<label>Username:
								<input type="text" placeholder="Username" id="usernametxt" name="usernametxt" required/>
							</label>
							<label>Password:
								<input type="password" placeholder="Password" id="passwordtxt" name="passwordtxt" required/>
							</label>
							<label>Email:
								<input type="email" placeholder="Email" id="emailtxt" name="emailtxt" required/>
							</label>
							<label>Role:
								<select name='roletxt'>
									<option value="user">User</option>
									<option value="admin">Admin</option>
								</select> 
							</label>
							<br/>
							<input type="submit" name="Resgister" value="Register">
						</form>
					</div>
					<br/>
					<br/>
					<br/>
					<br/>
					<br/>
					<br/>
					<br/>
					<br/>
					<br/>
					<br/>
					<br/>
					<br/>
					<br/>
					<br/>
					<br/>
					<br/>
					<br/>
					<br/>
					<br/>
					<br/>
				</div>
				<div class="panel">
					<p>
						OR if you already have an account <a href="login.php">LOGIN</a>!
					</p>
				</div>
			</div>
		</div>
	</body>
