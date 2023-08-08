<?php
// include 'Calendar.php';
// $calendar = new Calendar;


session_start();
include('database/connection.php');
if(isset($_SESSION['staffid'])){
	header('Location: ./stafflog.php');
}
$sql = "SELECT * FROM tblstaff WHERE staff_id = :staff_id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':staff_id',$_SESSION['staff_id']);
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
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
	<!-- My CSS -->
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/calendarstyles.css">
	<link rel="stylesheet" href="css/responsive.css">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.8/dist/sweetalert2.all.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.js"></script> 
  	<script src="js/calendarscripts.js"></script>
  	<script src="js/ajax.js" ></script>
  



	<title>Staff</title>
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
			<li class="active">
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
					<h1>Dashboard</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Home</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Dashboard</a>
						</li>
					</ul>
				</div>

			</div>

			<div id="appointmentsviewrecords"  class="flex flex-row flex-nowrap" style="gap:20px;margin-top: 30px;">
				<div id="calendar" class="wrapper">
					<header>
						<p class="current-date"></p>
						<div class="icons">
						<span id="prev" class="material-symbols-rounded">chevron_left</span>
						<span id="next" class="material-symbols-rounded">chevron_right</span>
						</div>
					</header>
					<div class="calendar">
						<ul class="weeks">
						<li>Sun</li>
						<li>Mon</li>
						<li>Tue</li>
						<li>Wed</li>
						<li>Thu</li>
						<li>Fri</li>
						<li>Sat</li>
						</ul>
						<ul class="days"></ul>
					</div>
				</div>
				<div class="appointmentlistcontainer">
					
				</div>
			</div>
			<!-- <div class= "clock" id="clock"></div> -->

<ul class="box-info">
				<li>
					<i class='bx bxs-group'></i>
					<span class="text">
						<p>Patients</p>
						<?php
                    include "database/connection.php";
                    $sql = 'SELECT COUNT(*) AS num FROM tblusers';
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $rs = $stmt->fetch(PDO::FETCH_ASSOC);
					echo "<h3>".$rs['num']."</h3>";
                    ?>
					</span>
				</li>
				<li>
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">
						<p>Total Appointments</p>
						<?php
                    include "database/connection.php";
                    $sql = 'SELECT COUNT(*) AS num FROM tblappointment';
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $rs = $stmt->fetch(PDO::FETCH_ASSOC);
					echo "<h3>".$rs['num']."</h3>";
                    ?>
					</span>
				</li>	
			</ul>
			<br><br>


		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="js/mainscript.js"></script>
	
</body>

</html>