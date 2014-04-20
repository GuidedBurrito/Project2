<!doctype html>
<!--
Name: Alex Valickis, Jonathan Hodder
Date: April 11th 2014
Purpose: Create a new incident ticket
-->
<html class="no-js" lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<!-- Page Title -->
		<title>New Ticket</title>
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
		//if the user is not signed in throw him back to the index page
		if(!isset($_SESSION["user"])){ 
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
							<a href="logout.php" id="navLogout">Logout</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="row">
			<!-- Page Header -->
			<div class="large-12 columns">
				<h1>New Ticket<img border="0" src="logo.png" alt="logo" width="225" height="150" /></h1>
			</div>
		</div>

		<div class="row">
			<div class="large-6 columns">
				<!-- create new ticket form -->
				<div class="panel">
					<div class="large-10 columns">
						<!--Go to the sumbit ticket page when you submit the form -->
						<form name="TicketForm" method="post" action="submitTicket.php">
							<!--Incident Description Required Field-->
							<label>Incident Description:
								<input type="text" placeholder="Brief Description" id="description" name="description" maxlength="50" required/>
							</label>
							<!--Customer Name Required Field-->
							<label>Customer Name:
								<input type="text" placeholder="Customer Name...." id="customer" name="customer" maxlength="20" required/>
							</label>
							<!--Incident Priority Drop Down List-->
                            <label>Incident Priority:
								<select name='priority'>
									<option value="Urgent">Urgent</option>
									<option value="Critical">Critical</option>
                                    <option value="Moderate">Moderate</option>
									<option value="Minor">Minor</option>
								</select> 
							</label>
							<!--What Happened Required Field-->
							<label>What Happened?:
								<textarea type="text" placeholder="Description of what happened...." id="narrative" name="narrative" cols="60" rows="10" required></textarea>
							</label>
							<br/>
							<input type="submit" name="add" value="Create New Ticket">
						</form>
					</div>
					<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
				</div>
			</div>
		</div>
	</body>
</html>