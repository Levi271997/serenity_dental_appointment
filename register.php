<?php
$message ='';
include "database/connection.php";
if(isset($_POST['btnSubmit'])){
   $name = $_POST['name'];
	$username = $_POST['uName'];
	$password = $_POST['uPass'];
	$email = $_POST['uEmail'];
	$phonenumber = $_POST['uPnum'];

	$sql ='INSERT INTO tblusers(name ,uName , uPass , uEmail, uPnum ) VALUES(:name, :username, :password ,:email,:phonenumber )';
	$stmt = $conn->prepare($sql); 

	if($stmt->execute(['name' => $name,'username' => $username, ':password' => $password  ,':email' => $email,':phonenumber' => $phonenumber ])){
      echo
      "<script> alert('Account Created!!'); </script>";
	//   $message="Acccount Created";
      header("location: index.php");
      return true;

   }
	$conn = null;
   exit;
}
?>