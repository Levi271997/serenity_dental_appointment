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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script src="js/ajax.js" type="text/javascript" ></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.8/dist/sweetalert2.all.min.js"></script>
<script src="js/jquery.quicksearch.js" type="text/javascript" ></script>
<script src="js/jquery.quicksearch.min.js" type="text/javascript" ></script>

	<title>Staff</title>
</head>
<body>
<!-- <div id="reportmodal" class="modal">
		<div class="modal-content">
			<span class="close">&times;</span>
			<div id="generatedreport" class="reportstable"></div>
			<button id="printreport">Print</button>					
		</div>
	</div> -->

	<!-- SIDEBAR -->
	<section id="sidebar">
	<a href="#" class="logo">
		<img src="images/logo.png">
			</a>
		<ul class="side-menu top">
        <li>
				<a href="admindashboard.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="admindentist.php">
					<i class='bx bxs-group' ></i>
					<span class="text">Dentist</span>
				</a>
			</li>
			<li>
				<a href="adminstaff.php">
					<i class='bx bxs-group' ></i>
					<span class="text">Staff</span>
				</a>
			</li>
			<li>
				<a href="adminprofile.php">
					<i class='bx bxs-user' ></i>
					<span class="text">Profile</span>
				</a>
			</li>
			<li>
				<a href="adminaccountsettings.php">
					<i class='bx bxs-user' ></i>
					<span class="text">Account Settings</span>
				</a>
			</li>
			<li class="active">
				<a href="adminreport.php">
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
				<a href="admindashboard.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="admindentist.php">
					<i class='bx bxs-group' ></i>
					<span class="text">Dentist</span>
				</a>
			</li>
			<li>
				<a href="adminstaff.php">
					<i class='bx bxs-group' ></i>
					<span class="text">Staff</span>
				</a>
			</li>
			<li>
				<a href="adminprofile.php">
					<i class='bx bxs-user' ></i>
					<span class="text">Profile</span>
				</a>
			</li>
			<li class="active">
				<a href="adminaccountsettings.php">
					<i class='bx bxs-user' ></i>
					<span class="text">Account Settings</span>
				</a>
			</li>
			<li>
				<a href="adminreport.php">
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
					<h1>Profile</h1>
					<ul class="breadcrumb">
						<li>
							<a href="staffdashboard.php">Home</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Reports</a>
						</li>
					</ul>
				</div>
			</div>

			<div class="reportscontainer">
                    <div id="servicescontainerbuttons" class="flex flex-row flex-wrap">
                    <div class='servicesbuttons'>
                             <input type="radio" name="servicessorts" value="0" checked="checked" >
                             <label for='d'>All</label>
                         </div>
                    </div>

						<div class="flex flex-row flex-nowrap generating">
								<div  id="datesortscontainer" class="flex flex-row flex-nowrap">
										<input type="radio" id="daily" name="datesorts" class="sortreports" value="daily" checked="checked">
										<label for="daily">Daily</label>
										<input type="radio" id="weekly" name="datesorts" class="sortreports" value="weekly">
										<label for="weekly">Weekly</label>
										<input type="radio" id="monthly" name="datesorts" class="sortreports" value="monthly">
										<label for="monthly">Monthly</label>
									</div>
									<!-- <div class="generatereport btn-primary">
										<p>Generate</p>
									</div> -->
						</div>


                    <div id="rangecontainer" class="flex flex-row flex-nowrap">
                        <div class="flex flex-col">
                            <label for="rangefrom">From</label>
                            <input type="date" id="rangefrom" >
                        </div>
                      
                        <div class="flex flex-col">
                            <label for="rangeto">To</label>
                            <input type="date" id="rangeto" >
                        </div>

						<div class="generatereport btn-primary" style="margin-left:auto;align-self:center;">
							<p>Generate</p>
						</div>
                    </div>
					<div id="weekcontainer">
						<div class="generatereport btn-primary" style="margin-left:auto;align-self:center;">
							<p>Generate</p>
						</div>
					</div>

					<div id="monthrangecontainer" class="flex flex-row flex-nowrap">
                        <div class="flex flex-col">
                           <select name="monthfrom" id="monthfrom">
						   <option value="0">Select Month</option>
							<option value="1">January</option>
							<option value="2">February</option>
							<option value="3">March</option>
							<option value="4">April</option>
							<option value="5">May</option>
							<option value="6">June</option>
							<option value="7">July</option>
							<option value="8">August</option>
							<option value="9">September</option>
							<option value="10">October</option>
							<option value="11">November</option>
							<option value="12">December</option>
						   </select>
                        </div>
                      
                        <div class="flex flex-col">
						<select name="monthto" id="monthto">
						<option value="0">Select Month</option>
							<option value="1">January</option>
							<option value="2">February</option>
							<option value="3">March</option>
							<option value="4">April</option>
							<option value="5">May</option>
							<option value="6">June</option>
							<option value="7">July</option>
							<option value="8">August</option>
							<option value="9">September</option>
							<option value="10">October</option>
							<option value="11">November</option>
							<option value="12">December</option>
						   </select>
                        </div>
						<div class="generatereport btn-primary" style="margin-left:auto;align-self:center;">
							<p>Generate</p>
						</div>
                    </div>

                     <div id="generatedreport" class="reportstable">
						
					
					</div>
					<button id="printreport" style="margin-left:auto;">Print</button>

            </div>

		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	
	<script src="js/mainscript.js"></script>
    
</body>

</html>