<?php
session_start();
include('database/connection.php');

if(isset($_POST['add_dentist_btn']))
{
    $fullname = $_POST['fullname'];
    $sp = $_POST['sp'];
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];
	$cnum =$_POST['cnum'];
	$Eadd =$_POST['Eadd'];

    $query = "INSERT INTO tbldentist (den_fname, den_sp, den_uname, den_pass,den_cnum,den_emailAdd) VALUES (:fullname, :sp, :uname, :pass, :cnum, :Eadd)";
    $query_run = $conn->prepare($query);

    $data = [
        ':fullname' => $fullname,
        ':sp' => $sp,
        ':uname' => $uname,
        ':pass' => $pass,
		':cnum' => $cnum,
		':Eadd' => $Eadd,
    ];
    $query_execute = $query_run->execute($data);

    if($query_execute)
    {
        $_SESSION['message'] = "Inserted Successfully";
        header('Location: AddDentist.php');
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Not Inserted";
        header('Location: AddDentist.php');
        exit(0);
    }
}

?>
<?php
session_start();
include('database/connection.php');

if(isset($_POST['set_appointment_btn']))
{
    $date = $_POST['date'];
    $time = $_POST['time'];

    $query = "INSERT INTO tblappointment (date,time) VALUES ('$date','$time')";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Date Time Inserted Successfully";
        header("Location: patientsetappointment.php");
    }
    else
    {
        $_SESSION['message'] = "Date Time Not Inserted";
        header("Location: patientsetappointment.php");
    }
}
?>