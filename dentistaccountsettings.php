<?php
include 'calendar.php';
$calendar = new Calendar;


session_start();
include('database/connection.php');
if(isset($_SESSION['denlogid'])){
	header('Location: ./index.php');
}
$sql = "SELECT * FROM tbldentist WHERE denlog_id = :denlog_id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':denlog_id',$_SESSION['denlog_id']);
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
  <link rel="stylesheet" href="css/calendarstyles.css">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.js"></script> 
  <script src="js/calendarscripts.js"></script>
  <script src="js/ajax.js" type="text/javascript" ></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.8/dist/sweetalert2.all.min.js"></script>

	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/calendar.css">
	<link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
	<!-- My CSS -->
	

	<title>Dentist Dashboard</title>
</head>
<style>
 * {
        box-sizing: border-box;
      }
      
      table {
	  border-collapse: collapse;
      width: 100%;
      } 
	  h2{
		text-align: center;
	  }
	  .clock {
	  margin-left: 90%;
	  }
	  
   th, td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: center;
   }

  th {
    background-color: #f2f2f2;
  }

td {
    height: 100px;
    vertical-align: top;
}
.event a {
	background-color : #448cd6;
	color: white;
	border-radius: 10px;
}
    
</style>
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
			<li class="active">
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

	<div class="container-fluid">
    <!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Details</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
		
      </div>
    </div>
  </div>
</div>
</div>

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
			<span class="text">Dentist</span>
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
							<a href="dentistdashboard.php">Home</a>
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
	

	<script src="js/mainscript.js"></script>
</body>
</html>