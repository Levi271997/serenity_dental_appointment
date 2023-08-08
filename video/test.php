<?php

session_start();
function getSpeciality(){	
	include('database/connection.php');
	$sql = "SELECT * FROM tblspeciality ORDER BY sp_name" ;
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function getGender(){	
	include('database/connection.php');
	$sql = "SELECT * FROM tblgender ORDER BY gn_name" ;
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function getStatus(){	
	include('database/connection.php');
	$sql = "SELECT * FROM tblstatus ORDER BY status_name" ;
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
include('database/connection.php');
$denlog_id = $_GET['denlog_id'];
$sql ="SELECT a.*, b.sp_name ,c.gn_name FROM tbldentist a ";
$sql .= "INNER JOIN tblspeciality b ON a.den_sp = b.sp_id ";
$sql .= "INNER JOIN tblgender c ON a.den_gender = c.gn_id ";
$sql .= "WHERE a.denlog_id = :denlog_id ";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':denlog_id', $denlog_id);
$stmt->execute();
$rs = $stmt->fetch(PDO::FETCH_ASSOC);
	
	
if(isset($_POST['edit_dentist_btn'])){
include('database/connection.php');


	$fullname = $_POST["fullname"];
	$sp = $_POST['sp'];
	$uname = $_POST["uname"];
	$pass = $_POST["pass"];
	$cnum =$_POST['cnum'];
	$Eadd =$_POST['Eadd'];
	$gn =$_POST['gn'];
	$denlog_id = $_GET['denlog_id'];
	
	$sql ="UPDATE tbldentist SET den_fname =:fullname ,den_sp =:sp ,den_uname =:uname ,den_pass =:pass,den_cnum =:cnum ,den_emailAdd =:Eadd,den_gender=:gn ";
	$sql .="WHERE denlog_id = '$denlog_id'";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':fullname',$fullname);
	$stmt->bindParam(':sp',$sp);
	$stmt->bindParam(':uname',$uname);
	$stmt->bindParam(':pass',$pass);
	$stmt->bindParam(':cnum',$cnum);
	$stmt->bindParam(':Eadd',$Eadd);
	$stmt->bindParam(':gn',$gn);

	$stmt->execute();
if ($stmt->rowCount() > 0){
	echo "<script>alert('Record successfully saved!')</script>";
	header("Location: ./Dentist.php");
}else{
	echo "<script>alert('Record NOT saved!')</script>";
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
				<a href="DentistDashboard.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li class="active">
				<a href="Dentist.php">
					<i class='bx bxs-group' ></i>
					<span class="text">Dentist</span>
				</a>
			</li>
			<li>
				<a href="Denstaff.php">
					<i class='bx bxs-group' ></i>
					<span class="text">Staff</span>
				</a>
			</li>
			<li>
				<a href="Denpatient.php">
					<i class='bx bxs-user' ></i>
					<span class="text">Patients</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bxs-calendar' ></i>
					<span class="text">Schedule</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bxs-calendar' ></i>
					<span class="text">Appointments</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bxs-user' ></i>
					<span class="text">Profile</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="logout" class="logout">
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
			<span class="text">Dentist</span>
		</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Dentist</h1>
					<ul class="breadcrumb">
						<li>
							<a href="adminDentist.php">Dentist</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="admindashboard.php">Home</a>
						</li>
					</ul>
				</div>
			</div>

            <div class="container">
			<a href="Dentist.php" class="cancel">
			<i class='bx bxs-exit'></i>
				<span class="text">Cancel</span>
				</a>
                <div class="heading">Edit Dentist</div> 
				<input type="hidden" name="denlog_id" value="<?php echo $_GET['denlog_id'] ?>">
                    <form action="" method="post">

                        <div class="card-details">
                            <div class="card-box">
                                <span class="datails">Fullname</span>
                                <input name="fullname" id="fullname"  value ="<?php echo"".$rs['den_fname'].""?>"  type="text"  required placeholder="Enter fullname">
                            </div>
                            <div class="card-box">
                                <span class="datails">Username</span>
                                <input name="uname" id="uname" value ="<?php echo"".$rs['den_uname'].""?>" type="text"  required placeholder="Enter Username">
                            </div>
                            <div class="card-box">
                                <span class="datails">Password</span>
                                <input name="pass" id="pass" value ="<?php echo"".$rs['den_pass'].""?>" type="text"  required placeholder="Enter Password">
                            </div>
							<div class="card-box">
                                <span class="datails">Contact Number</span>
                                <input name="cnum" id="cnum" value ="<?php echo"".$rs['den_cnum'].""?>" type="text"  required placeholder="Enter Contact Number">
                            </div>
							<div class="card-box">
                                <span class="datails">Email Address</span>
                                <input name="Eadd" id="Eadd" value ="<?php echo"".$rs['den_emailAdd'].""?>" type="text"  required placeholder="Email Address">
                            </div>
							<div class="card-box">
                                <span class="datails">Speciality</span>
                                <select name="sp" id="sp">
				                <?php
				                $rs = getSpeciality();
				                foreach($rs as $sp){
					             $selected = $rs['den_sp'] == $rs['sp_id'] ? "selected" : "";
					             echo"<option  value='".$sp['sp_id']."' ". $selected .">".$sp['sp_name']."</option>";
				                }
				                ?>
				               </select></div>

							   <div class="card-box">
                                <span class="datails">Gender</span>
                                <select name="gn" id="gn">
				                <?php
				                $rs = getGender();
				                foreach($rs as $gn){
					             $selected = $rs['den_gender'] == $rs['gn_id'] ? "selected" : "";
					             echo"<option  value='".$gn['gn_id']."' ". $selected .">".$gn['gn_name']."</option>";
				                }
				                ?>
				               </select></div>
							   
                        </div>
                        <div class="button">
                            <input type="submit" name="edit_dentist_btn" value="Submit">
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