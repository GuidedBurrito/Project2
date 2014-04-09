<!doctype html>
<!--
Name: Alex Valickis
Date: April 4th 2014
Purpose: login page
-->
<html class="no-js" lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<!-- Page Tittle -->
		<title>Login | Alex's Portfolio</title>
		<link rel="stylesheet" href="css/foundation.css" />
		<script src="js/modernizr.js"></script>
		<script src="js/jquery.js"></script>
		<script src="js/foundation.min.js"></script>
		<script>
			$(document).foundation();
		</script>
	</head>
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
							<a href="" id="navAbout">Another Link</a>
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
				<h1>User Login</h1>
			</div>
		</div>

		<div class="row">
			<div class="large-12 columns">
				<!-- login form -->
				<div class="panel">
					<div class="large-4 columns">
						<form name="form1" method="post" action="validate.php">
							<label>Username:
								<input type="text" placeholder="Username" id="usernametxt" name="usernametxt"/>
							</label>
							<label>Password:
								<input type="password" placeholder="Password" id="passwordtxt" name="passwordtxt"/>
							</label>
						<br/>
						<input type="submit" name="Submit" value="Login">
						</form>
					</div>
					<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
				</div>
				<div class="panel">
					<p>
						OR if you dont have an account <a href="register.php">REGESTER</a>!
					</p>
				</div>
			</div>
		</div>
	</body>
</html>
