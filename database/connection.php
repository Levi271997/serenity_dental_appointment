<?php
$servername = "localhost";
$dbusername = "root";
$dbpassword = ""; 
$dbname = "dcms";
$option = [];

try{
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbusername, $dbpassword ,$option);
    $conn->setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
}catch(PDOException $e){
	echo"Connection FAILED: ". $e->getMessage();
	die();
}
?>