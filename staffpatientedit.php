<?php

//session_start();
include('database/connection.php');


$uID = $_GET['uID'];
$sql ="SELECT * FROM tblusers WHERE uID = :uID";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':uID', $uID);
$stmt->execute();
$rs = $stmt->fetch(PDO::FETCH_ASSOC);
	
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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

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
			<li  class="active">
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

<!-- modal -->

<div class="container-fluid">
    <!-- The Modal -->
<div class="modal" id="checklistmodal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
	  <h4>Patient Record</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
			<img src="images/record-banner.png" alt="bannner">
			<div class="flex flex-col">
			<div id="checklist" class="listofchecklist flex flex-row flex-nowrap" style="margin-top:25px;">
				<div class="divone">
					<p class="weight">LEGEND: CONDITION</p>
					<div class="flex flex-col">
						<div class="flex flex-row ">
							<input type="checkbox" value="PRESENT TEETH">
							<p>PRESENT TEETH</p>
						</div>
						<div class="flex flex-row ">
							<input type="checkbox" value="DECAYED (CARIES INDICATED FOR FILLIN">
							<p>DECAYED (CARIES INDICATED FOR FILLIN)</p>
						</div>
						<div class="flex flex-row ">
							<input type="checkbox" value="MISSING DUE TO CARIES">
							<p>MISSING DUE TO CARIES</p>
						</div>
						<div class="flex flex-row ">
							<input type="checkbox" value="MISSING DUE TO OTHER CAUSES">
							<p>MISSING DUE TO OTHER CAUSES</p>
						</div>
						<div class="flex flex-row ">
							<input type="checkbox" value="IMPACTED TOOTH">
							<p>IMPACTED TOOTH</p>
						</div>
						<div class="flex flex-row ">
							<input type="checkbox" value="SUPERMUMERARY TOOTH">
							<p>SUPERMUMERARY TOOTH</p>
						</div>
						<div class="flex flex-row ">
							<input type="checkbox" value="ROOT FRAGMENT">
							<p>ROOT FRAGMENT</p>
						</div>
						<div class="flex flex-row ">
							<input type="checkbox" value="UNERUPTED">
							<p>UNERUPTED</p>
						</div>
					</div>
				</div>
				<div class="divone">
				<p class="weight">RESTORATIONSS & PROSTHETICS</p>
					<div class="flex flex-col">
						<div class="flex flex-row ">
							<input type="checkbox" value="AMAIGAM FILLING">
							<p>AMAIGAM FILLING</p>
						</div>
						<div class="flex flex-row ">
							<input type="checkbox" value="COMPOSITE FILLING">
							<p>COMPOSITE FILLING</p>
						</div>
						<div class="flex flex-row ">
							<input type="checkbox" value="JACKET CROWN">
							<p>JACKET CROWN</p>
						</div>
						<div class="flex flex-row ">
							<input type="checkbox" value="ABUTMENT">
							<p>ABUTMENT</p>
						</div>
						<div class="flex flex-row ">
							<input type="checkbox" value="PONTIC">
							<p>PONTIC</p>
						</div>
						<div class="flex flex-row ">
							<input type="checkbox" value="INPLAY">
							<p>INPLAY</p>
						</div>
						<div class="flex flex-row ">
							<input type="checkbox" value="IMPLANT">
							<p>IMPLANT</p>
						</div>
						<div class="flex flex-row ">
							<input type="checkbox" value="SEALANTS">
							<p>SEALANTS</p>
						</div>
						<div class="flex flex-row ">
							<input type="checkbox" value="REMOVABLE DENTURE">
							<p>REMOVABLE DENTURE</p>
						</div>
					</div>
				</div>
				<div class="divone">
				<p class="weight">SURGERY</p>
					<div class="flex flex-col">
						<div class="flex flex-row ">
							<input type="checkbox" value="EXTRACTION DUE TO CARIES">
							<p>EXTRACTION DUE TO CARIES</p>
						</div>
						<div class="flex flex-row ">
							<input type="checkbox" value="EXTRACTION DUE TO OTHER CAUSES">
							<p>EXTRACTON DUE TO OTHER CAUSES</p>
						</div>
						<p class='weight'>X-RAY TAKEN:</p>
						<div class="flex flex-row ">
							<input type="checkbox" value="PERAPICAL">
							<p>PERAPICAL</p>
						</div>
						<div class="flex flex-row ">
							<input type="checkbox" value="GEPHALOMETRIC">
							<p>GEPHALOMETRIC</p>
						</div>
						<div class="flex flex-row ">
							<input type="checkbox" value="OCCLUSAL(UPPER/LOWER)">
							<p>OCCLUSAL(UPPPER/LOWER)</p>
						</div>
						<div class="flex flex-row ">
							<input type="checkbox" value="PANORAMIC">
							<p>PANORAMIC</p>
						</div>
						<div class="flex flex-row ">
							<input type="checkbox" value="SURGERY(OTHER)">
							<p>OTHER</p>
						</div>
						
					</div>
				</div>
			</div>
			<div class="listofchecklist flex flex-row flex-nowrap" style="justify-content:space-between;margin-top:25px">
				<div class="divone flex flex-col">
					<p class="weight">PERIODINTAL SCREENING</p>
					<div class="flex flex-col">
						<div class="flex flex-row ">
								<input type="checkbox" value="GINGIVITIES">
								<p>GINGIVITIES</p>
						</div>
						<div class="flex flex-row ">
								<input type="checkbox" value="EARLY PERIODONTITIS">
								<p>EARLY PERIODONTITIS</p>
						</div>
						<div class="flex flex-row ">
								<input type="checkbox" value="MODERATE PERIODONTITIS">
								<p>MODERATE PERIODONTITIS</p>
						</div>
						<div class="flex flex-row ">
								<input type="checkbox" value="ADVANCED PERIODONTITIS">
								<p>ADVANCED PERIODONTITIS</p>
						</div>
					</div>
				</div>
				<div class="divone flex flex-col">
					<p class="weight">OCCLUSION</p>
					<div class="flex flex-row ">
							<input type="checkbox" value="CLASS(MOLAR)">
							<p>CLASS(MOLAR)</p>
					</div>
					<div class="flex flex-row ">
							<input type="checkbox" value="OVERJET">
							<p>OVERJET</p>
					</div>
					<div class="flex flex-row ">
							<input type="checkbox" value="OVERBITE">
							<p>OVERBITE</p>
					</div>
					<div class="flex flex-row ">
							<input type="checkbox" value="MIDLINE DEVIATION">
							<p>MIDLINE DEVIATION</p>
					</div>
					<div class="flex flex-row ">
							<input type="checkbox" value="CROSSBITE">
							<p>CROSSBITE</p>
					</div>
				</div>
				<div class="divone flex flex-col">
					<p class="weight">APPLIANCES:</p>
					<div class="flex flex-row ">
							<input type="checkbox" value="ORTHODONTIC">
							<p>ORTHODONTIC</p>
					</div>
					<div class="flex flex-row ">
							<input type="checkbox" value="STAYPLATE">
							<p>STAYPLATE</p>
					</div>
					<div class="flex flex-row ">
							<input type="checkbox" value="APPLIANCES(OTHER)">
							<p>OTHER</p>
					</div>
				</div>
				<div class="divone flex flex-col">
						<p class="weight">TMD</p>
						<div class="flex flex-row ">
							<input type="checkbox" value="CLICKING">
							<p>CLICKING</p>
						</div>
						<div class="flex flex-row ">
							<input type="checkbox" value="CLENCHING">
							<p>CLENCHING</p>
						</div>
						<div class="flex flex-row ">
							<input type="checkbox" value="MUSCLE">
							<p>MUSCLE</p>
						</div>
						<div class="flex flex-row ">
							<input type="checkbox" value="TRISMUS">
							<p>TRISMUS</p>
						</div>
				</div>
			</div>
			<div class="flex flex-col" style="gap:20px;">
			<div id="recordtoothnumbers" class="flex flex-col">
				<div class="toothinputholders flex flex-row">
					<input id="toothnumber" type="text" placeholder="Tooth Number">
					<textarea id="procedure" name="procedure" id="procedure" cols="30" rows="10" style="height:55px" placeholder="Procedure"></textarea>
				</div>
			</div>
				<div class="flex flex-row">

				
				<button id="addtoothnumber" class="btn btn-primary" data-toggle="modal" data-target="#toothnumbermodal" style="cursor:pointer">Add Tooth Number</button>
				<button id="submitrecord" class="btn btn-primary">Submit</button>
				</div>
			</div>
		</div>         
      </div>
    </div>
  </div>
</div>
</div>

<!-- end modal -->

<div class="container-fluid">
    <!-- The Modal -->
<div class="modal" id="toothnumbermodal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
	  <h4>Add Tooth</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
			<div class="modal-body">
	<div id="tnmodal" class="flex flex-col">
		<div class="flex flex-row" style="gap:20px;">
			<div style="width:20%"><p>Tooth Number</p></div>
			<div style="width:80%"><p>Procedure</p></div>
		</div>
		<div class="toothinputholders flex flex-row">
			<input type="text" placeholder="Tooth Number">
			<textarea name="tooth_procedure" id="tooth_procedure" cols="30" rows="10" style="height:50px;" placeholder="Procedure"></textarea>
		</div>	
	</div>
	<div class="flex flex-row" style="justify-content:space-between">
		<button id="addtoothnumberfrommodal" class="btn btn-primary">Add Tooth Number</button>
		<button id="submittoothnumbers" class="btn btn-primary">Submit</button>
	</div>
	
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
					<h1>Staff</h1>
					<ul class="breadcrumb">
						<li>
							<a href="staffdashboard.php">Home</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Staff</a>
						</li>
					</ul>
				</div>
			</div>

          <div class="patientprofileholder">
		  	<div class="container">
				<div class="flex flex-row" style="justify-content:space-between;">
					<a href="staffpatient.php" class="cancel">
						<span class="text">Back</span>
						<i class='bx bxs-exit'></i>
					</a>
					<p id="addappointmentforpatient" style="cursor:pointer">Add Appointment</p>
				</div>
                <div class="heading">Edit Patient Information</div> 
				<input type="hidden" name="uID" value="<?php echo $_GET['uID'] ?>">
                    <form id="staffpatientedit" action="" method="post">

                        <div class="card-details">
                            <div class="card-box">
                                <span class="datails">Fullname</span>
                                <input name="fullname" id="fullname"  value ="<?php echo"".$rs['name'].""?>"  type="text"  required placeholder="Enter fullname">
                            </div>
                           
							<div class="card-box">
                                <span class="datails">Contact Number</span>
                                <input name="cnum" id="cnum" value ="<?php echo"".$rs['uPnum'].""?>" type="text"  required placeholder="Enter Contact Number">
                            </div>
							<div class="card-box">
                                <span class="datails">Email Address</span>
                                <input name="Eadd" id="Eadd" value ="<?php echo"".$rs['uEmail'].""?>" type="text"  required placeholder="Email Address">
                            </div>
                        </div>
                        <div class="button">
                            <input type="submit" name="edit_patient_btn" value="Submit">
                        </div>
                    </form>
				</div>
		  	</div>
			<div class="patientprofileholder flex flex-col relatives" style="margin-top:20px;padding:20px;text-align:center;">

				<div class="tableheadings">Patient History</div>
				<p id="addrecord" data-toggle="modal" data-target="#checklistmodal" style="cursor:pointer">Add Record</p>

				<div class="patienthistorytablecontainer"></div>
			</div>
			<div class="patientrecordcontainer"><div class="tableheadings">Patient Record</div></div>
		</div>
        </div>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	
	<script src="js/mainscript.js"></script>
</body>
</html>
<?php
if(isset($_POST['edit_patient_btn'])){
	include('database/connection.php');
	
	
		$fullname = $_POST["fullname"];
		$cnum =$_POST['cnum'];
		$Eadd =$_POST['Eadd'];
		$uID = $_GET['uID'];
		
		$sql ="UPDATE tblusers SET name =:fullname ,uPnum =:cnum ,uEmail =:Eadd ";
		$sql .="WHERE uID = '$uID'";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':fullname',$fullname);
		$stmt->bindParam(':cnum',$cnum);
		$stmt->bindParam(':Eadd',$Eadd);
		$stmt->execute();
		if($stmt->execute()){
			echo '<script>Swal.fire("Updated Successfully")</script>';
			echo '<script>setTimeout(function(){location.href="staffpatient.php";}, 1000);</script>';
		} else {
			echo '<script>Swal.fire("Failed to update")</script>';
			echo '<script>setTimeout(function(){location.href="staffpatient.php";}, 1000);</script>';
		}
	}
?>