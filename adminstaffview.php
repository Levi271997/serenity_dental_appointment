<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/responsive.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.js"></script> 
  <script src="js/ajax.js" type="text/javascript" ></script>

	<title>Staff</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
	<a href="#" class="logo">
		<img src="images/logo.png">
			</a>
		<ul class="side-menu top">
			<li>
				<a href="admindashboard.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="admindentist.php">
					<i class='bx bxs-group' ></i>
					<span class="text">Dentist</span>
				</a>
			</li>
			<li class="active">
				<a href="adminstaff.php">
					<i class='bx bxs-group' ></i>
					<span class="text">Staff</span>
				</a>
			</li>
			<li>
				<a href="adminprofile.php">
					<i class='bx bxs-user' ></i>
					<span class="text">Profile</span>
				</a>
			</li>
			<li>
				<a href="adminaccountsettings.php">
					<i class='bx bxs-user' ></i>
					<span class="text">Account Settings</span>
				</a>
			</li>
			<li>
				<a href="adminreport.php">
					<i class='bx bxs-calendar' ></i>
					<span class="text">Reports</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a class="logout">
					<i class='bx bxs-log-out'></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	
<div id="mobilenav">
			<div class="relative">
			<a href="#" class="logo">
			<img src="images/logo.png">
			<i class="closemenu">X</i>
			</a>
		<ul class="side-menu top flex flex-col flex-nowrap">
			<li>
				<a href="admindashboard.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="admindentist.php">
					<i class='bx bxs-group' ></i>
					<span class="text">Dentist</span>
				</a>
			</li>
			<li>
				<a href="adminstaff.php">
					<i class='bx bxs-group' ></i>
					<span class="text">Staff</span>
				</a>
			</li>
			<li>
				<a href="adminprofile.php">
					<i class='bx bxs-user' ></i>
					<span class="text">Profile</span>
				</a>
			</li>
			<li class="active">
				<a href="adminaccountsettings.php">
					<i class='bx bxs-user' ></i>
					<span class="text">Account Settings</span>
				</a>
			</li>
			<li>
				<a href="adminreport.php">
					<i class='bx bxs-calendar' ></i>
					<span class="text">Reports</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a class="logout">
					<i class='bx bxs-log-out'></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
			</div>
		</div>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu'></i>
			<i id='mobilenavburger'></i>
			<a href="#" class="nav-link">Categories</a>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<a href="#" class="brand">
			<i class='bx bxs-user'></i>
			<span class="text">Admin</span>
		</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Staff</h1>
					<ul class="breadcrumb">
						<li>
							<a href="admindashboard.php">Home</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Staff</a>
						</li>
					</ul>
				</div>
			</div>

			<?php
        session_start();
		include('database/connection.php');
		
		
		$staff_id = $_GET['staff_id'];
		$sql ="SELECT * FROM tblstaff WHERE staff_id = :staff_id";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':staff_id', $staff_id);
		$stmt->execute();
		$rs = $stmt->fetch(PDO::FETCH_ASSOC);
			
		echo"<div class='table-data'>";
		echo"	<div class='order'>";
		echo"			<div class='head'>";
		echo"			<h3>Staff List</h3>";
        echo"            <a href='adminstaff.php' class='add' id='add'>Back to list</a>";		
		echo"	 </div>";

		echo"			<table>";
		echo"				<thead>";
		echo"					<tr>";
		echo"						<th>Staff Name</th>";
		echo"						<th>Email Address</th>";
		echo"						<th>Number</th>";
		echo"						<th>Username</th>";
		echo"						<th>Password</th>";
		echo"						<th>Age</th>";
		echo"					</tr>";
		echo"				</thead>";
		echo"				<tbody>";
		echo"				<tr>";
		echo"					<td>".$rs['staff_fname']."</td>";
		echo"					<td>".$rs['staff_emailAdd']."</td>";
		echo"					<td>".$rs['staff_cnum']."</td>";
		echo"					<td>".$rs['staff_uname']."</td>";
		echo"					<td>".$rs['staff_pass']."</td>";
		echo"					<td>".$rs['staff_age']."</td>";
		echo"				</tbody>";
		echo"			</table>";
		echo"		</div>";
		echo"		</div>";
		echo"	</div> ";
		echo"</main>";
		?>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	
	<script src="js/mainscript.js"></script>
</body>
</html>