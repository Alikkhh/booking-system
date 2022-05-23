<?php
	session_start();
?>
<html>
	<head>
		<title>
			Welcome Administrator
		</title>
		<link rel="stylesheet" type="text/css" href="css/style3.css"/>
		<link rel="stylesheet" href="font-awesome-4.7.0\css\font-awesome.min.css">
	</head>
	<body>
		<h1 id="title">
			Train Tickets
		</h1>
		<div>
			<ul>
				<li><a href="admin_homepage.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
				<li><a href="admin_homepage.php"><i class="fa fa-desktop" aria-hidden="true"></i> Dashboard</a></li>
				<li><a href="logout_handler.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
			</ul>
		</div>
		<h2>Welcome Administrator!</h2>
		<table cellpadding="5">
			
			<tr>
				<td class="admin_func"><a href="admin_view_booked_tickets.php"> View List of Booked Tickets for a Railway</a>
				</td>
			</tr>
			<tr>
				<td class="admin_func"><a href="add_railway_details.php"> Add Railway Schedule Details</a>
				</td>
			</tr>
			<!-- <tr>
				<td class="admin_func"><a href="modify_flight_details.php"><i class="fa fa-plane" aria-hidden="true"></i> Modify Railway Schedule Details</a>
				</td>
			</tr> -->
			<tr>
				<td class="admin_func"><a href="delete_railway_details.php"> Delete Railway Schedule Details</a>
				</td>
			</tr>
			<tr>
				<td class="admin_func"><a href="add_train_details.php"> Add Trains Details</a>
				</td>
			</tr>
			<tr>
				<td class="admin_func"><a href="activate_train_details.php"> Activate Train</a>
				</td>
			</tr>
			<tr>
				<td class="admin_func"><a href="deactivate_train_details.php"> Deactivate Aircraft</a>
			</tr>
		</table>
	</body>
</html>