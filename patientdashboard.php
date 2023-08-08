
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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.js" integrity="sha512-nO7wgHUoWPYGCNriyGzcFwPSF+bPDOR+NvtOYy2wMcWkrnCNPKBcFEkU80XIN14UVja0Gdnff9EmydyLlOL7mQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> 
  
	<script src="js/ajax.js" type="text/javascript" ></script>

	<title>Patient Dashboard</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
	<a href="#" class="logo">
		<img src="images/logo.png">
         </a>
		<ul class="side-menu top">
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
							<a href="#">Home</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Dashboard</a>
						</li>
					</ul>
				</div>

			</div>
			<ul class="box-info dashboardoptions">
				<li>
					<a  href="patientsetappointment.php">
					<div>
						<i class='bx bxs-calendar-check'></i>
						<span class="text">
						<h4><p id="setappointmentbtn" >Set Appointment</p></h4>
						</span>
					
						</div>
						</a>
				</li>
				<li>
					<a  href="patientappointment.php">
					<div>
						<i class='bx bxs-calendar-check'></i>
						<span class="text">
						<h4><p id="setappointmentbtn" >View My Appointment</p></h4>
						</span>
					
						</div>
						</a>
				</li>
				
			</ul>



		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="js/mainscript.js"></script>
</body>
</html>