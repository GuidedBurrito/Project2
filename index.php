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
		if(!isset($_SESSION["user"])){ 
			echo "
					<ul>
						<li>
							<a href='index.php' id='navHome'>Home</a>
						</li>
						<li>
							<a href='login.php' id='navLogout'>Login</a>
						</li>
					</ul>";
		}
		else 
		{
			$host="localhost"; // Host name 
			$username="db200203673"; // username 
			$password="80087"; // password 
			$db_name="db200203673";  // Database name 
			$tbl_name="tickets"; // Table name 	
			
			// Connect to server and select database.
			mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
			mysql_select_db("$db_name")or die("cannot select DB");
			
			$sqlSelect = "SELECT * FROM $tbl_name";
			$selectResult = mysql_query($sqlSelect)or die(mysql_error());	
			
			echo "		
					<ul>
						<li>
							<a href='index.php'>Home</a>
						</li>
						<li>
							<a href='ticket.php' id='navTicket'>Create Incident Ticket</a>
						</li>
						<li>
							<a href='updateProfile.php' id='navUpdate'>Update Profile</a>
						</li>
						<li>
							<a href='logout.php' >Logout</a>
						</li>
					</ul>";

		}
	?>
				</div>
			</div>
			<div class="large-8 columns">
				<div class="callout panel">
					<h2>Incident Tickets</h2><hr>
					<?php
						while($row = mysql_fetch_array($selectResult))
						{
							$incidentNum = $row['ticketID'];
							$incidentDesc = $row['incidentDescription'];
							// For each name in the database populate them
							echo"<h5>$incidentNum &nbsp; &nbsp; &nbsp; $incidentDesc</h5>";
							echo"<hr>";
						} 
					?>
				</div>
			</div>
		</div>
	</body>
</html>