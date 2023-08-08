<?php
session_start();
include('database/connection.php');
if(isset($_SESSION['userID'])){
	header('Location: ./.php');
}
include('database/connection.php');
$sql = "SELECT * FROM tblappointment WHERE userID = :uID";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':uID',$_SESSION['uID']);
$stmt->execute();

if($stmt->rowCount() > 0){
$rcrd = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
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
  <script> 
	var loggedinid=<?=$_SESSION['uID']?>;
</script>
	<title>Patient Dashboard</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
	<a href="#" class="logo">
		<img src="images/logo.png">
         </a>
		<ul class="side-menu top">
			<li>
				<a href="patientdashboard.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="patientappointment.php">
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">Appointment</span>
				</a>
			</li>
			<li  class="active">
				<a href="patientprofile.php">
					<i class='bx bxs-user' ></i>
					<span class="text">Profile</span>
				</a>
			</li>
			<li>
			<a href="patientaccountsettings.php">
					<i class='bx bxs-user' ></i>
					<span class="text">Account Settings</span>
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
				<ul class="side-menu top flex flex-col">
					<li class="active">
						<a href="patientdashboard.php">
							<i class='bx bxs-dashboard' ></i>
							<span class="text">Dashboard</span>
						</a>
					</li>
					<li>
						<a href="patientappointment.php">
							<i class='bx bxs-calendar-check' ></i>
							<span class="text">Appointment</span>
						</a>
					</li>
					<li>
						<a href="patientprofile.php">
							<i class='bx bxs-user' ></i>
							<span class="text">Profile</span>
						</a>
					</li>
					<li>
					<a href="patientaccountsettings.php">
							<i class='bx bxs-user' ></i>
							<span class="text">Account Settings</span>
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
			</form> 
			<a href="#" class="brand">
			<i class='bx bxs-user'></i>
			<span id="patientsfullname" class="text"></span>
		</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Dashboard</h1>
					<ul class="breadcrumb">
						<li>
							<a href="patientdashboard.php">Home</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Profile</a>
						</li>
					</ul>
				</div>
			</div>
            
			<div class="profileview">
				<div class="profileedit">
					<h1>Edit my profile</h1>
					<p class="profileupdateindicator hidden">Update Successfully</p>
					<div class="flex flex-col profileinputs">
						<label for="fullname">fullname</label>
						<input id="fullname" class="disabled" type="text">
						<label for="email">Email</label>
						<input id="email" class="disabled" type="text">
						<label for="phone">Mobile Number</label>
						<input id="phone" class="disabled" type="number">
					<div class="flex flex-row" style="justify-content:center;gap:20px;">
						<div class="saveprofile buttons">Edit Profile</div>
						<div class="cancelupdate hidden">Cancel</div>
					</div>
					</div>
				</div>
			</div>


		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="js/mainscript.js"></script>
</body>
</html>