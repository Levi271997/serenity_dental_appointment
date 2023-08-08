<?php 
session_start();
include('database/connection.php');

if(isset($_POST['add_services_btn']))
{
    $services = $_POST['services'];
    $description = $_POST['description'];

    $query = "INSERT INTO tblservices (srv_name,  description) VALUES (:services, :description)";
    $query_run = $conn->prepare($query);

    $data = [
        ':services' => $services,
        ':description' => $description,
    ];
    $query_execute = $query_run->execute($data);

    if($query_execute)
    {
        $_SESSION['message'] = "Inserted Successfully";
        header('Location: staffservices.php');
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Not Inserted";
        header('Location: staffservices.php');
        exit(0);
    }
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.8/dist/sweetalert2.all.min.js"></script>
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
				<a href="staffdashboard.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li class="active">
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
			<li class="active">
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
					<h1>Services</h1>
					<ul class="breadcrumb">
						<li>
						<a href="staffdashboard.php">Home</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Services</a>
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



		
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	
	<script src="js/mainscript.js"></script>
</body>
</html>