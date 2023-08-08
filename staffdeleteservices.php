<?php

session_start();
include('database/connection.php');


$srv_id = $_GET['srv_id'];
$sql ="SELECT * FROM tblservices WHERE srv_id = :srv_id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':srv_id', $srv_id);
$stmt->execute();
$rs = $stmt->fetch(PDO::FETCH_ASSOC);
	
	
	
if(isset($_POST['delete_services_btn'])){

    $srv_id = $_GET['srv_id'];
	$sql ="DELETE FROM tblservices WHERE srv_id = '$srv_id'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
	header("Location: ./staffservices.php");
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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.js"></script> 
  <script src="js/ajax.js" type="text/javascript" ></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.8/dist/sweetalert2.all.min.js"></script>
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
				<a href="staffdashboard.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="staffdentist.php">
					<i class='bx bxs-group' ></i>
					<span class="text">Dentist</span>
				</a>
			</li>
			<li>
				<a href="staff.php">
					<i class='bx bxs-group' ></i>
					<span class="text">Staff</span>
				</a>
			</li>
			<li>
				<a href="staffpatient.php">
					<i class='bx bxs-user' ></i>
					<span class="text">Patients</span>
				</a>
			</li>
			<li class="active">
				<a href="staffservices.php">
					<i class='bx bxs-calendar' ></i>
					<span class="text">Services</span>
				</a>
			</li>
			<li>
				<a href="staffappointment.php">
					<i class='bx bxs-calendar' ></i>
					<span class="text">Appointments</span>
				</a>
			</li>
			<li>
				<a href="staffprofile.php">
					<i class='bx bxs-user' ></i>
					<span class="text">Profile</span>
				</a>
			</li>
			<li>
				<a href="staffaccountsettings.php">
					<i class='bx bxs-user' ></i>
					<span class="text">Account Settings</span>
				</a>
			</li>
			<li>
				<a href="reports.php">
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
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu'></i>
			<a href="#" class="nav-link">Categories</a>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<a href="#" class="brand">
			<i class='bx bxs-user'></i>
			<span class="text">Staff</span>
		</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Services</h1>
					<ul class="breadcrumb">
						<li>
							<a href="staffdashboard.php">Staff</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Services</a>
						</li>
					</ul>
				</div>
			</div>

		<div class="container">
        <a href="staffservices.php" class="cancel">
				<span class="text">Back</span>
                <i class='bx bxs-exit'></i>
				</a>
                <div class="heading">Add Services</div>
                <input type="hidden" name="srv_id" value="<?php echo $_GET['srv_id'] ?>">
		
                    <form action="#" method="post">
                        <div class="card-details">
                            <div class="card-box">
                                <span class="datails">Services</span>
                                <input name="services" id="services" value ="<?php echo"".$rs['srv_name'].""?>" type="text"  required placeholder="Enter Services">
                            </div>
                            <div class="card-box">
                                <span class="datails">Description</span>
                                <input name="description" id="description" value ="<?php echo"".$rs['description'].""?>" type="text"  required placeholder="Enter Description">
                            </div>
                        </div>
                        <div class="button">
                            <input type="submit" name="delete_services_btn" value="Delete">
							</a>
                        </div>

                    </form>
				</div>
			</div>
        </div>



		
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	
	<script src="js/mainscript.js"></script>
</body>
</html>