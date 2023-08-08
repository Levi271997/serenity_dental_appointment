<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.js"></script> 
  <script src="js/ajax.js" type="text/javascript" ></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.8/dist/sweetalert2.all.min.js"></script>
<script src="js/jquery.quicksearch.js" type="text/javascript" ></script>
<script src="js/jquery.quicksearch.min.js" type="text/javascript" ></script>
	<!-- My CSS -->
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/responsive.css">
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
			<li class="active">
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

		<?php
        include "database/connection.php";
        $sql = 'SELECT * FROM tblusers';
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
		echo"<div class='table-data'>";
		echo"	<div class='order'>";
		echo"			<div class='head'>";
		echo"			<h3>Patient List</h3>";
        echo"            <a href='staffpatientadd.php' class='add' id='add'>Add Patient</a>";		
		echo"	 </div>";

		echo"			<table id='allappointmentstable'>";
		echo"				<thead>";
		echo"					<tr>";
		echo"						<th>Patient Name</th>";
		echo"						<th>Email Address</th>";
		echo"						<th>Number</th>";
		echo"						<th>Action</th>";
		echo"					</tr>";
		echo"				</thead>";
		              foreach($rs as $patient){
		echo"				<tbody>";
		echo"				<tr data-id='".$patient['uID']."'>";
		echo"					<td>".$patient['name']."</td>";
		echo"					<td id='email'>".$patient['uEmail']."</td>";
		echo"					<td>".$patient['uPnum']."</td>";
		echo"					<td><a href='staffpatientedit.php? uID=".$patient['uID']."' class='button-edit' id='button-edit'></a>";
		// echo"                       <a href='staffpatientview.php? uID=".$patient['uID']."' class='button-view' id='button-view'>VIEW</a>";
		echo"            		<a  data-toggle='modal' data-target='#myModalsendemail' class='add sendemail'></a>";
								if($patient['status'] == 'ACTIVE'){
									echo"<a class='changepatientstatus' data-id='".$patient['status']."' style='margin-left:15px;padding:5px;background-color:#03C04A'><i style='color:white' class='bx bxs-user'></i></a>";
								}else{
									echo"<a class='changepatientstatus' data-id='".$patient['status']."' style='margin-left:15px;padding:5px;background-color:#FF2400'><i style='color:white' class='bx bxs-user'></i></a>";
								}
		//echo"                       <a href='staffpatientdelete.php? uID=".$patient['uID']."' class='button-delete' id='button-delete'></a>";
		echo"				        </td>";
		echo"					</tr>";
	
	}    
		echo"				</tbody>";
		echo"			</table>";
		echo"		</div>";
		echo"		</div>";
		echo"	</div> ";
		echo"</main>";
		?>

		
<div class="container-fluid">
    <!-- The Modal -->
<div class="modal" id="myModalsendemail">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Send Email</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>


      <!-- Modal body -->
      <div class="modal-body">
	  	<form class="" action="send.php" method="post">
			<div class="form-group">
				<!-- <label for="exampleFormControlInput1">Email address</label> -->
				<input type="email" class="form-control" name="email" id="exampleFormControlInput1" value="" placeholder="Email Address">
			</div>
			<div class="form-group">
				<!-- <label for="exampleFormControlInput1">Subject</label> -->
				<input type="text" class="form-control" name="subject" id="subject" value="" placeholder="Subject">
			</div>
			<div class="form-group">
				<textarea class="form-control" name="message" value="" id="exampleFormControlTextarea1" rows="3" placeholder="Type Here"></textarea>
			</div>
			<div id="sendemail" class="btn btn-primary">Send</div>
		</form>
      </div>
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