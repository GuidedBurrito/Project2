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
							<a href="logout.php" id="navLogout">Logout</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="row">
			<!-- Page Content -->
			<div class="large-12 columns">
				<h1>New Ticket</h1>
			</div>
		</div>

		<div class="row">
			<div class="large-12 columns">
				<!-- login form -->
				<div class="panel">
					<div class="large-4 columns">
						<form name="TicketForm" method="post" action="submitTicket.php">
							<label>Incident Description:
								<input type="text" placeholder="Breif Description" id="description" name="description" maxlength="50" required/>
							</label>
							<label>Customer Name:
								<input type="text" placeholder="Customer Name...." id="customer" name="customer" maxlength="20" required/>
							</label>
                            <label>Incident Priority:
								<select name='priority'>
									<option value="Urgent">Urgent</option>
									<option value="Critical">Critical</option>
                                    <option value="Moderate">Moderate</option>
									<option value="Minor">Minor</option>
								</select> 
							</label>
							<label>What Happend?:
								<textarea type="text" placeholder="Description of what happened...." id="narrative" name="narrative" cols="60" rows="10" required></textarea>
							</label>
							
							<br/>
							<input type="submit" name="add" value="Create New Ticket">
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
			</div>
		</div>
	</body>
</html>