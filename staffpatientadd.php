
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
			<li class="active">
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
			<li>
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
	
<div id="mobilenav">
			<div class="relative">
			<a href="#" class="logo">
		<img src="images/logo.png">
<i class="closemenu">X</i>
         </a>
		 <ul class="side-menu top flex flex-col flex-nowrap">
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
			<li class="active">
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
			<li>
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
			<span class="text">Staff</span>
		</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Patient</h1>
					<ul class="breadcrumb">
						<li>
							<a href="staffdashboard.php">Home</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Patient</a>
						</li>
					</ul>
				</div>
			</div>

		<div class="container">
        <a href="staffpatient.php" class="cancel">
				<span class="text">Back</span>
				<i class='bx bxs-exit'></i>
				</a>
                <div class="heading">Add Patient</div>
		
                    <form id="staffaddpatient" action="#" method="post">
                        <div class="card-details">
                            <div class="card-box">
                                <span class="datails">Fullname</span>
                                <input name="fullname" id="fullname" type="text"  required placeholder="Enter fullname">
                            </div>
                            <div class="card-box">
                                <span class="datails">Username</span>
                                <input name="uname" id="uname" type="text"  required placeholder="Enter Username">
                            </div>
                            <div class="card-box">
                                <span class="datails">Password</span>
                                <input name="pass" id="pass" type="text"  required placeholder="Enter Password">
                            </div>
							<div class="card-box">
                                <span class="datails">Contact Number</span>
                                <input name="cnum" id="cnum" type="text"  required placeholder="Enter Contact Number">
                            </div>
							<div class="card-box">
                                <span class="datails">Email Address</span>
                                <input name="Eadd" id="Eadd" type="text"  required placeholder="Email Address">
                            </div>
                        </div>
                        <div class="button">
                            <input type="submit" name="add_patient_btn" value="Submit">
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
<?php 
//session_start();
include('database/connection.php');
include('database/config.php');

if(isset($_POST['add_patient_btn'])){
	include('database/connection.php');
	$fullname = $_POST["fullname"];
	$uname = $_POST["uname"];
	$pass = $_POST["pass"];
	$cnum = $_POST["cnum"];
	$Eadd = $_POST["Eadd"];



	$query="SELECT * FROM tblusers WHERE name = '$fullname' OR uEmail = '$Eadd' OR uPnum = '$cnum' ";
	$res = mysqli_query($dbc, $query);
	if ($res)
	{
	  $row = mysqli_num_rows($res);
	  if($row == 0){	
			$querytwo="SELECT * FROM tblcredentials WHERE username = '$uname'  ";
			$restwo = mysqli_query($dbc, $querytwo);
			if ($restwo)
			{
				$rowtwo = mysqli_num_rows($restwo);
				if($rowtwo == 0){

					$role="1";
					$sql ="INSERT INTO tblusers(name, uEmail, uPnum, status ) VALUES('$fullname','$Eadd','$cnum','ACTIVE')";
					if ($dbc->query($sql) === TRUE) {
					$last_id=mysqli_insert_id($dbc);
					$sqltwo ="INSERT INTO tblcredentials(userid, username,password,role ) VALUES('$last_id','$uname','$pass','1')";
					$dbc->query($sqltwo);
					echo "<script>Swal.fire('Patient Registered')</script>"; 
					}else{
						echo "<script>Swal.fire('Patient registration failed')</script>";
					} 

				}
			}else{
				echo "<script>Swal.fire('Username already exist')</script>";
			}
	  }else{
		echo "<script>Swal.fire('User already exist')</script>";
	  }
	}
}
?>