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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
	<!-- My CSS -->
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/responsive.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.js"></script> 
  <script src="js/ajax.js" type="text/javascript" ></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.8/dist/sweetalert2.all.min.js"></script>
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
			<li>
				<a href="patientprofile.php">
					<i class='bx bxs-user' ></i>
					<span class="text">Profile</span>
				</a>
			</li>
			<li class="active">
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
							<a class="active" href="#">Account Settings</a>
						</li>
					</ul>
				</div>
			</div>
            
			<div class="passwordview">
				<div class="passwordedit">
					<h1>Change username or password</h1>
					<p class="passwordupdateindicator hidden">Update Successfully</p>
					<div class="flex flex-col passwordinputs">
                    <div class="form-group relatives">
                            <input type="text" class="form-control" placeholder="Enter Current Username" id="currentusername"  required autocomplete="off"> 
                        </div>
                        <div class="form-group relatives">
                            <input type="text" class="form-control" placeholder="Enter New Username" id="newusername"  required autocomplete="off">
                        </div>
                        <div class="form-group relatives">
                            <span  class="toggle_pwd fa fa-fw fa-eye field_icon"></span>
                            <input type="password" class="form-control" placeholder="Enter Current Password" id="currentpassword"  required autocomplete="off">
                        </div>
                        <div class="form-group relatives">
                            <span  class="toggle_pwd fa fa-fw fa-eye field_icon"></span>
                            <input type="password" class="form-control" placeholder="Enter New Password" id="newpassword"  required autocomplete="off">
                            <span class="passtooltiptext" ></span>
                        </div>
                        <div class="form-group relatives">
                            <span  class="toggle_pwd fa fa-fw fa-eye field_icon"></span>
                            <input type="password" class="form-control" placeholder="Confirm New Password" id="confirmnewpassword"  required autocomplete="off">
                            <span class="tooltiptext" >Password does not match</span>
                        </div>
					<div class="flex flex-row" style="justify-content:center;gap:20px;">
						<div class="savecredentials buttons">Save</div>
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