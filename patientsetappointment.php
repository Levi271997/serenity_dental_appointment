
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/calendarstyles.css">
	<link rel="stylesheet" href="css/responsive.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.js" integrity="sha512-nO7wgHUoWPYGCNriyGzcFwPSF+bPDOR+NvtOYy2wMcWkrnCNPKBcFEkU80XIN14UVja0Gdnff9EmydyLlOL7mQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> 
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.8/dist/sweetalert2.all.min.js"></script>
	<script src="js/ajax.js" type="text/javascript" ></script>
	<script src="js/calendarscripts.js"></script>
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
			<li  class="active">
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
					<h1>Request Appointment</h1>
					<ul class="breadcrumb">
						<li>
							<a href="patientdashboard.php">Home</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Request Appointment</a>
						</li>
					</ul>
				</div>
			</div>

		<div  id="setappointmentcontainer" class="flex flex-row flex-nowwrap">
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
			<div class="container" style="margin-top:0">
					<a href="patientappointment.php" class="cancel">
						<i class='bx bxs-exit'></i>
						<span class="text">Cancel</span>
					</a>
					<div class="heading">Set Appointment</div>
						<p class="nomargin appointmentsuccess">Appointment Added</p>
						<form action="" method="post" class="appointmentsetup">
							<div class="card-details">
							<div id="apointmentinputs" class="flex flex-row flex-nowrap">		
									<div class="card-box">
										<div class="flex flex-col"><p>Date: </p><p class='appointmentdateselected'></p></div>
										<!-- <input name="date" id="date" type="date"  required> -->
									</div>
									<div class="card-box">
									<span class="datails">Time</span>
										<input name="time" id="time" type="time" required class="disabled" >
									</div>
									<div class="card-box">
										<span class="datails">Dentist</span>
										<select name="dentist" id="dentist">
										</select>
									</div>
								</div>
							</div>

								<div class="servicescontainer flex flex-col">
								<span class="datails">Please select services</span>
								<div class="servicesoptions flex flex-row flex-wrap"></div>
								</div>
								<div class="flex flex-row flex-nowrap" style="justify-content:space-between;margin-top:20px;	">
									<div class="flex flex-col">
									<p>* The price shown are estimates only</p>
										<div class="flex flex-col flex-nowrap">
											<div class="flex flex-row fex-nowrap">
												<p>Initial amount: &#8369 </p><p class="total-amount"> 0.00</p>
							
											</div>
											<p>PPE: &#8369 100.00</p>
										</div>
										<div class="total-container total flex flex-row flex-nowrap">
										<p>Total amount: &#8369 </p><p class="finalamount"> 0.00</p>
										</div>
									</div>

										<div id="containerforcaptcha" class="button flex flex-row">
										<div class="flex flex-col">
											<div id="captcha">
											</div>
											<div class="flex flex-col">
												<input type="text" placeholder="Captcha" id="cpatchaTextBox" style="width:100%"/>
												<p class="refreshcaptcha">Refresh</p>
												<p class="captchaindicator">Incorrect Captcha</p>
											</div>
										</div>
											<div class="setappointment">Submit</div>
											<!-- <input type="submit" name="set_appointment_btn" value="Submit"> -->
										</div>
								</div>
						</form>
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