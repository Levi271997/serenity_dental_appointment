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
  <script src="js/jquery.quicksearch.js" type="text/javascript" ></script>
<script src="js/jquery.quicksearch.min.js" type="text/javascript" ></script>
	<title>Dentist</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
	<a href="#" class="logo">
		<img src="images/logo.png">
			</a>
		<ul class="side-menu top">
			<li>
				<a href="dentistdashboard.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li class="active">
				<a href="dentist.php">
					<i class='bx bxs-group' ></i>
					<span class="text">Dentist</span>
				</a>
			</li>
			<li>
				<a href="dentiststaff.php">
					<i class='bx bxs-group' ></i>
					<span class="text">Staff</span>
				</a>
			</li>
			<li>
				<a href="dentistpatient.php">
					<i class='bx bxs-user' ></i>
					<span class="text">Patients</span>
				</a>
			</li>
			<li>
				<a href="dentistservices.php">
					<i class='bx bxs-calendar' ></i>
					<span class="text">Services</span>
				</a>
			</li>
			<li>
				<a href="dentistappointment.php">
					<i class='bx bxs-calendar' ></i>
					<span class="text">Appointments</span>
				</a>
			</li>
			<li>
				<a href="dentistprofile.php">
					<i class='bx bxs-user' ></i>
					<span class="text">Profile</span>
				</a>
			</li>
			<li>
				<a href="dentistaccountsettings.php">
					<i class='bx bxs-user' ></i>
					<span class="text">Account Settings</span>
				</a>
			</li>
			<li>
				<a href="dentistreport.php">
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
			<li class="active">
				<a href="dentistdashboard.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="dentist.php">
					<i class='bx bxs-group' ></i>
					<span class="text">Dentist</span>
				</a>
			</li>
			<li>
				<a href="dentiststaff.php">
					<i class='bx bxs-group' ></i>
					<span class="text">Staff</span>
				</a>
			</li>
			<li>
				<a href="dentistpatient.php">
					<i class='bx bxs-user' ></i>
					<span class="text">Patients</span>
				</a>
			</li>
			<li>
				<a href="dentistservices.php">
					<i class='bx bxs-calendar' ></i>
					<span class="text">Services</span>
				</a>
			</li>
			<li>
				<a href="dentistappointment.php">
					<i class='bx bxs-calendar' ></i>
					<span class="text">Appointments</span>
				</a>
			</li>
			<li>
				<a href="dentistprofile.php">
					<i class='bx bxs-user' ></i>
					<span class="text">Profile</span>
				</a>
			</li>
			<li>
				<a href="dentistaccountsettings.php">
					<i class='bx bxs-user' ></i>
					<span class="text">Account Settings</span>
				</a>
			</li>
			<li>
				<a href="dentistreport.php">
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
			<span class="text">Dentist</span>
		</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Dentist</h1>
					<ul class="breadcrumb">
						<li>
							<a href="dentistdashboard.php">Home</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Dentist</a>
						</li>
					</ul>
				</div>
			</div>

		<?php
        include "database/connection.php";
		// $sql = "SELECT a.*, b.srv_name FROM tbldentist a ";
		// $sql .="INNER JOIN tblservices b ON a.den_sp = b.srv_id ";
		// $sql .= "WHERE denlog_id" ;
		// $stmt = $conn->prepare($sql);
		// $stmt->execute();
		// $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $sql = 'SELECT * FROM tbldentist';
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);

		echo"<div class='table-data'>";
		echo"	<div class='order'>";
		echo"			<div class='head'>";
		echo"			<h3>Dentist List</h3>";		
		echo"	 </div>";

		echo"			<table>";
		echo"				<thead>";
		echo"					<tr>";
		echo"						<th>Dentist Name</th>";
	
		// echo"						<th>Speciality</th>";
		echo"						<th>Email Address</th>";
		echo"						<th>Age</th>";
		echo"						<th>Number</th>";
		echo"					</tr>";
		echo"				</thead>";
		              foreach($rs as $dentist){
		echo"				<tbody>";
		echo"				<tr>";
		echo"					<td>".$dentist['den_fname']."</td>";
		
		// echo"					<td>".$dentist['srv_name']."</td>";
		echo"					<td>".$dentist['den_emailAdd']."</td>";
		echo"					<td>".$dentist['den_age']."</td>";
		echo"					<td>".$dentist['den_cnum']."</td>";
		echo"					</tr>";}    
		echo"				</tbody>";
		echo"			</table>";
		echo"		</div>";
		echo"		</div>";
		echo"	</div> ";
		echo"</main>";
		?>

<!-- <?php
			session_start();
        include "database/connection.php";
		$sql = "SELECT a.*, b.srv_name FROM tbldentist a ";
		$sql .="INNER JOIN tblservices b ON a.den_sp = b.srv_id ";
		$sql .= "WHERE denlog_id" ;
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		$rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
		echo"<div class='table-data'>";
		echo"	<div class='order'>";
		echo"			<div class='head'>";
		echo"			<h3>Dentist List</h3>";
		echo"	 </div>";

		echo"			<table>";
		echo"				<thead>";
		echo"					<tr>";
		echo"						<th>Dentist Name</th>";
		echo"						<th>Username</th>";
		echo"						<th>Password</th>";
		echo"						<th>Speciality</th>";
		echo"						<th>Email Address</th>";
		echo"						<th>Age</th>";
		echo"						<th>Number</th>";
		echo"					</tr>";
		echo"				</thead>";
		              foreach($rs as $dentist){
		echo"				<tbody>";
		echo"				<tr>";
        echo"					<td>".$dentist['den_uname']."</td>";
		echo"					<td>".$dentist['srv_name']."</td>";
		echo"				        </td>";
		echo"					</tr>";}    
		echo"				</tbody>";
		echo"			</table>";	  
		?> -->

		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	
	<script src="js/mainscript.js"></script>
</body>
</html>