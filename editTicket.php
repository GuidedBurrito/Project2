<!doctype html>
<!--
Name: Alex Valickis, Jonathan Hodder
Date: April 13th 2014
Purpose: update incident ticket
-->
<html class="no-js" lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<!-- Page Tittle -->
		<title>Update Ticket</title>
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
		// If the user is not logged in send them to home page
		if(!isset($_SESSION["user"]))
		{ 
			header('location: index.php');
		}
		$host="localhost"; // Host name 
		$username="db200203673"; // username 
		$password="80087"; // password 
		$db_name="db200203673";  // Database name 
		$tbl_name="tickets"; // Table name
		
		// Connect to server and select database.
		mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
		mysql_select_db("$db_name")or die("cannot select DB");
		
		// Get database info for selected ticket
		$ticketId = $_GET['id'];
		$object = mysql_query("SELECT * FROM $tbl_name WHERE ticketID = '$ticketId'");
		
		// Assign database values to the variables
		while ($row = mysql_fetch_assoc($object)) 
		{
			$descriptiontxt=$row["incidentDescription"];
			$prioritytxt=$row["incidentPriority"];
			$customertxt=$row["customerInfo"];
			$narrativetxt=$row["incidentNarrative"];
			
		}
		
		 // When updating...
		if(isset($_POST['updateTicketInfo'])) 
		{
			// Get previous values
			$object = mysql_query("SELECT * FROM $tbl_name WHERE ticketID = '$ticketId'");
			while ($row = mysql_fetch_assoc($object)) 
		{
			// Assign database values to the variables
			$descriptiontxt=$row["incidentDescription"];
			$prioritytxt=$row["incidentPriority"];
			$customertxt=$row["customerInfo"];
			$prevNarrativetxt=$row["incidentNarrative"];
			$status=$row['incidentStatus'];
			
		}
			// Get changes made to the ticket
			$prioritytxt=$_POST["priority"];
			$status = $_POST['status'];
			
			// Add updated narrative to previous entries
			$narrativetxt= $prevNarrativetxt . "\n" . $_POST['narrative'];
			$resolutiontxt = $_POST['txtRes'];
			
			// Update statement
			$sql = "UPDATE $tbl_name SET incidentPriority = '" . $prioritytxt . "', incidentNarrative = '". $narrativetxt . "', incidentStatus = '". $status . "', incidentResolution = '" . $resolutiontxt . "' WHERE ticketID = '$ticketId'"; 
			
			// Run SQL statement
			mysql_query($sql);
			
			// Go to home page
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
				<h1>Update Ticket<img border="0" src="logo.png" alt="logo" width="225" height="150" /></h1>
			</div>
		</div>

		<div class="row">
			<div class="large-12 columns">
				<!-- Edit ticket form -->
				<div class="panel">
					<div class="large-4 columns">
						<form name="updateTicketInfo" method="post">
							<!-- Ticket fields and their values that are pulled from the database -->
							<label>Incident Description:
								<input type="text" placeholder="Brief Description" id="description" name="description" maxlength="50" value="<?php echo $descriptiontxt; ?>" disabled/>
							</label>
							<label>Customer Name:
								<input type="text" placeholder="Customer Name...." id="customer" name="customer" maxlength="20" value="<?php echo $customertxt; ?>" disabled/>
							</label>
							<label>What Happened Previously?:
								<textarea type="text" placeholder="What Happened Previously...." id="prevNarrative" name="prevNarrative" cols="60" rows="10" disabled><?php echo $narrativetxt; ?></textarea>
							</label>
                            <label>Incident Priority:
								<select name='priority'>
									<option <?php if ($prioritytxt == 'Urgent'){echo "selected='selected'";} ?> value="Urgent">Urgent</option>
									<option <?php if ($prioritytxt == 'Critical'){echo "selected='selected'";} ?> value="Critical">Critical</option>
                                    <option <?php if ($prioritytxt == 'Moderate'){echo "selected='selected'";} ?> value="Moderate">Moderate</option>
									<option <?php if ($prioritytxt == 'Minor'){echo "selected='selected'";} ?> value="Minor">Minor</option>
								</select> 
							</label>
							<label>What Happened?:
								<textarea type="text" placeholder="Description of what happened...." id="narrative" name="narrative" cols="60" rows="10" required></textarea>
							</label>
							<label>Status:
								<select name='status' id="StatusDrop" onChange="showText(this.selectedIndex);">
									<option <?php if ($status == 'New'){echo "selected='selected'";} ?> value="New">New</option>
									<option <?php if ($status == 'In-Progress'){echo "selected='selected'";} ?> value="In-Progress">In-Progress</option>
									<option <?php if ($status == 'Dispatched'){echo "selected='selected'";} ?> value="Dispatched">Dispatched</option>
									<option <?php if ($status == 'Closed'){echo "selected='selected'";} ?> value="Closed">Closed</option>
								</select>
							</label>
							<label id="lblRes" style="display:none">How It Was Resolved:
								<textarea type="text" placeholder="How It Was Resolved...." id="txtRes" name="txtRes" cols="60" rows="10" style="display:none"></textarea>
							</label>
							<!-- Function to show hidden form elements -->
							<script>
  									function showText(ind){
									var selectBox = document.getElementById('StatusDrop');
									if(selectBox.options[ind].value=="Closed"){
										document.getElementById('lblRes').style.display = "block";
										document.getElementById('txtRes').style.display = "block";
									  }
									else{
										document.getElementById('lblRes').style.display = "none";
										document.getElementById('txtRes').style.display = "none";
										}
									}
							</script>
							<br/>
							<!-- Save button -->
							<input type="submit" id="inputsubmit" name="updateTicketInfo" value="Save" id="save">
						</form>
					</div>
					<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
				</div>
			</div>
		</div>
	</body>
</html>