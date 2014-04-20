<!--
Name: Alex Valickis, Jonathan Hodder
Date: April 4th 2014
Purpose: Show the incident tickets to logged in users
-->
<html>
	<head>
		<meta charset="utf-8" />
			<meta name="viewport" content="width=device-width, initial-scale=1.0" />
			<!-- Page Title -->
			<title>Incident Tickets</title>
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
			<div class="large-12">
				<div class='nav'>
	<?php
	session_start();
		if(!isset($_SESSION["user"]))
		{ 
			echo "
					<ul>
						<li>
							<a href='index.php' id='navHome'>Home</a>
						</li>
						<li>
							<a href='login.php' id='navLogin'>Login</a>
						</li>
					</ul>";
		}
		else 
		{
			//create and assign variables
			$host="localhost"; // Host name 
			$username="db200203673"; // username 
			$password="80087"; // password 
			$db_name="db200203673";  // Database name 
			$tbl_name="tickets"; // Table name 	
			
			// Connect to server and select database.
			mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
			mysql_select_db("$db_name")or die("cannot select DB");
			
			//select all the incident tickets and order by the ticket id
			$sqlSelect = "SELECT * FROM $tbl_name ORDER BY incidentStatus DESC, ticketID ASC;";
			$selectResult = mysql_query($sqlSelect)or die(mysql_error());	
			//load up the navigation links
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
			<br><br><br><br>
			<div class="large-11 columns">
				<div class="callout panel">
					<!--Incident Tickets Header-->
					<h2>Incident Tickets <img border="0" src="logo.png" alt="logo" width="225" height="150" /></h2></br>
					<b>Ticket ID &nbsp &nbsp | &nbsp &nbsp Ticket Description &nbsp &nbsp |&nbsp &nbsp Status &nbsp &nbsp |&nbsp &nbsp Resolution</b>
					<hr>
					<?php
						//if you are logged in load the incident tickets
						if(isset($_SESSION["user"]))
						{
							while($row = mysql_fetch_array($selectResult))
							{
								$incidentNum = $row['ticketID'];
								$incidentDesc = $row['incidentDescription'];
								$status = $row['incidentStatus'];
								$Resolution = $row['incidentResolution'];
								$_SESSION['ticketID'] = $incidentNum;
								$newURL = "editTicket.php?id=" . $incidentNum;
								//if the status is set to closed de-activate the incident tickets
								if($status == "Closed")
								{
									echo"<h5><table><tr><td>$incidentNum</td><td>$incidentDesc</td><td>$status</td><td>$Resolution</td></tr></table></h5> <hr>";
								}
								else
								{
									// For each name in the database populate them
									echo"<h5><a href='" . $newURL . "'>$incidentNum &nbsp &nbsp &nbsp $incidentDesc &nbsp &nbsp &nbsp $status</a></h5>";
									echo"<hr>";
								}
							} 
						}
						//if you are not logged in do not load any incident tickets
						else 
						{
							echo"<h5>Please login to view the incident tickets.</h5>";
						}
					?>
				</div>
			</div>
		</div>
	</body>
</html>