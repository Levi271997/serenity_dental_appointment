
<?php 
	//session_start();
	include('database/connection.php');
	include('database/config.php');


	$denlog_id = $_GET['denlog_id'];
	$sql ="SELECT * FROM tbldentist WHERE denlog_id = :denlog_id";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':denlog_id', $denlog_id);
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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.js"></script> 
	
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.8/dist/sweetalert2.all.min.js"></script>
<script src="js/ajax.js" type="text/javascript" ></script>
	<title>Admin</title>
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
			<li class="active">
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
					<h1>Dentist</h1>
					<ul class="breadcrumb">
						<li>
							<a href="admindashboard.php">Home</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Dentist</a>
						</li>
					</ul>
				</div>
			</div>

            <div class="container">
			<a href="admindentist.php" class="cancel">
				<span class="text">Back</span>
				<i class='bx bxs-exit'></i>
				</a>
                <div class="heading">Edit Dentist</div> 
				<input type="hidden" name="denlog_id" value="<?php echo $_GET['denlog_id'] ?>">
                    <form  id="dentistedit" action="" method="post">

                        <div class="card-details">
                            <div class="card-box">
                                <span class="datails">Fullname</span>
                                <input name="fullname" id="fullname"  value ="<?php echo"".$rs['den_fname'].""?>"  type="text"  required placeholder="Enter fullname">
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
                                <?php 
										$query = "SELECT * FROM tblspeciality";
										$queryres = mysqli_query($dbc, $query);
										 
										echo "<select id='editspecialtyselect' name = 'specialty'>";
										while($rowretrieve = mysqli_fetch_assoc($queryres)){
											if($rowretrieve['sp_id']==$rs['den_sp']){
												echo "<option value=".$rowretrieve['sp_id']." selected>".$rowretrieve['sp_name']."</option>";
											}else{
												echo "<option value=".$rowretrieve['sp_id'].">".$rowretrieve['sp_name']."</option>";
											}
										
										}
										echo "</select>";
								?>
                            </div>
							<div class="card-box">
                                <span class="datails">Age</span>
                                <input name="age" id="age" value ="<?php echo"".$rs['den_age'].""?>" type="text"  required placeholder="Email Address">
                            </div>	
						<div class="card-box">
                                <span class="datails">Gender</span>
								<?php 
										$query = "SELECT * FROM tblgender";
										$queryres = mysqli_query($dbc, $query);
										 
										echo "<select id='editgenderselect' name = 'gender'>";
										while($rowretrieve = mysqli_fetch_assoc($queryres)){
											if($rowretrieve['gn_id']==$rs['den_gender']){
												echo "<option value=".$rowretrieve['gn_id']." selected>".$rowretrieve['gn_name']."</option>";
											}else{
												echo "<option value=".$rowretrieve['gn_id'].">".$rowretrieve['gn_name']."</option>";
											}
										
										}
										echo "</select>";
								?>
                            </div>
                        </div>
                        <div class="button" style="width:100%">
							<div <?php echo "data-id= ".$_GET['denlog_id'].""; ?> class="submitdentistedit">Submit</div>
                            
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
