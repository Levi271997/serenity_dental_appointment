<?php
session_start();
if(isset($_SESSION['den_id'])){
	header('Location: ./adminadddentist.php');
}
function getSpeciality(){	
	include('database/connection.php');
	$sql = "SELECT * FROM tblspeciality ORDER BY sp_name";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function getGender(){	
	include('database/connection.php');
	$sql = "SELECT * FROM tblgender ORDER BY gn_name";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
if(isset($_POST['add_dentist_btn'])){
	include('database/connection.php');
	$fullname = $_POST["fullname"];
	$cnum = $_POST["cnum"];
	$Eadd = $_POST["Eadd"];
	$age = $_POST["age"];
	$gn = $_POST["gn"];
	$sp = $_POST["sp"];
	$uname = $_POST["uname"];
	$pass = $_POST["pass"];

	$sql ="INSERT INTO tbldentist(den_fname,den_gender,den_cnum,den_sp,den_emailAdd,den_age)";
	$sql.="VALUES(:fullname,:gn,:cnum,:sp,:Eadd,:age)";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':fullname',$fullname);
	$stmt->bindParam(':gn',$gn);
	$stmt->bindParam(':cnum',$cnum);
	$stmt->bindParam(':sp',$sp);
	$stmt->bindParam(':Eadd',$Eadd);
	$stmt->bindParam(':age',$age);
	
	if($stmt->execute()){
            $last_id=$conn->lastInsertId();;
			
			$sqltwo ="INSERT INTO tblcredentials(userid,username,password,role)";
			$sqltwo.="VALUES(:lastid,:username,:password,4)";
			$stmttwo = $conn->prepare($sqltwo);
			$stmttwo->bindParam(':lastid',$last_id);
			$stmttwo->bindParam(':username',$uname);
			$stmttwo->bindParam(':password',$pass);
			
			if($stmttwo->execute()){
				echo "<script>location.href='admindentist.php'</script>";
			}
	
    } else {
        echo 'failed';
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
			<span class="text">Admin</span>
		</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Account Settings</h1>
					<ul class="breadcrumb">
						<li>
							<a href="admindashboard.php">Home</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Account Setting</a>
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