<!doctype html>
<!--
Name: Alex Valickis, Jonathan Hodder
Date: April 4th 2014
Purpose: login form page if you don't a have a login go to the register page
-->
<html class="no-js" lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<!-- Page Tittle -->
		<title>Login</title>
		<link rel="stylesheet" href="css/foundation.css" />
		<script src="js/modernizr.js"></script>
		<script src="js/jquery.js"></script>
		<script src="js/foundation.min.js"></script>
		<script>
			$(document).foundation();
		</script>
	</head>
    <?php
		//if the user is already logged in you are thrown back to the index page
		if(isset($_SESSION["user"]))
		{ 
			header('location: index.php');
		}
	?>
	<body>
		<div class="row">
			<div class="large-12">
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
			<!-- Page Header -->
			<div class="large-12 columns">
				<h1>User Login<img border="0" src="logo.png" alt="logo" width="225" height="150" /></h1>
			</div>
		</div>

		<div class="row">
			<div class="large-6 columns">
				<!-- login form -->
				<div class="panel">
					<div class="large-10 columns">
						<!--When you submit the login form you are directed to the validate page-->
						<form name="login" method="post" action="validate.php">
							<!--Username Required Field-->
							<label>Username:
								<input type="text" placeholder="Username" id="usernametxt" name="usernametxt" maxlength="20" required/>
							</label>
							<!--Password Required Field-->
							<label>Password:
								<input type="password" placeholder="Password" id="passwordtxt" name="passwordtxt" maxlength="20" required/>
							</label>
							<br/>
							<input type="submit" name="Submit" value="Login">
						</form>
					</div>
					<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
				</div>
				<div class="panel">
					<!--Create a register link for new users-->
					<p>OR if you dont have an account <a href="register.php">REGISTER</a>!</p>
				</div>
			</div>
		</div>
	</body>
</html>
