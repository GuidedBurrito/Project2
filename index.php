<!--
Name: Alex Valickis, Jonathan Hodder
Date: April 4th 2014
Purpose: Show the incident tickets to users
-->

<html>
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
	<body>
		<div class='row'>
			<div class="large-10">
				<div class='nav'>
	<?php
	session_start();
		if(isset($_SESSION["user"])){ 
			echo "
					<ul>
						<li>
							<a href='index.php' id='navHome'>Home</a>
						</li>
						<li>
							<a href='' id='navAnother'>Another</a>
						</li>
						<li>
							<a href='updateProfile.php' id='navUpdate'>Update Profile</a>
						</li>
						<li>
							<a href='logout.php' id='navLogout'>Logout</a>
						</li>
					</ul>";
		}
		else 
		{
			echo "		
					<ul>
						<li>
							<a href='index.php'>Home</a>
						</li>
						<li>
							<a href='' >Another</a>
						</li>
						<li>
							<a href='login.php' >Login</a>
						</li>
					</ul>";

		}
	?>
				</div>
			</div>
		</div>
	</body>
</html>