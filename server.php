<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
require("database/connection.php");
require("database/config.php");
$usersid;
$role;
$functiontitle='';
if(isset($_POST['tag'])){
    $functiontitle= $_POST['tag'];
}
switch($functiontitle)
{
    case 'sendverification':
      
        if(isset($_POST['uemail'])){$email =  $_POST['uemail'];}
        if(isset($_POST['uname'])){$username = $_POST['uname'];}
       
        $searchusername="SELECT * FROM tblcredentials WHERE username = '$username'";
        $querysearch = mysqli_query($dbc, $searchusername);
        if ($querysearch)
        {
            $row = mysqli_num_rows($querysearch);
          if($row > 0){
              echo "usernametaken";
          }else{
           //$email  = $conn->real_escape_string($email);
        $otp    = mt_rand(1111, 9999);
        $query  = "SELECT * FROM tblemailotp WHERE email =:email";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":email",$email);
        $stmt->execute();
        if($stmt->rowCount()>0){
            $conn->query("UPDATE tblemailotp SET otp = '$otp' WHERE email = '$email'");
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'romergalendez@gmail.com';
            $mail->Password = 'zhbvnwwysdqvkzgy';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom('romergalendez@gmail.com');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = "Serenity Dental Clinic OTP Verification";
            $mail->Body = $otp." is your verification code";
            $mail->send();
            echo "emailsuccess";      
        }else{
            $conn->query("INSERT INTO tblemailotp(`email`,`otp`) VALUES ('$email','$otp')");
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'romergalendez@gmail.com';
            $mail->Password = 'zhbvnwwysdqvkzgy';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom('romergalendez@gmail.com');
            $mail->addAddress($email);       
            $mail->isHTML(true);       
            $mail->Subject = "Serenity Dental Clinic OTP Verification";
            $mail->Body = $otp." is your verification code";       
            $mail->send();        
            echo "emailsuccess";
        } 
          }
          }
        
    break;
    case 'sendverificationforchangepass':

      if(isset($_POST['changepasswordemail'])){$email =  $_POST['changepasswordemail'];}
     
    

      $searchuseremail="SELECT * FROM tblusers WHERE uEmail = '$email'";
      $querysearchuseremail = mysqli_query($dbc, $searchuseremail);
      if ($querysearchuseremail)
      {
        $row = mysqli_num_rows($querysearchuseremail);
        if($row > 0){
          $usersresult = mysqli_fetch_assoc($querysearchuseremail);
          $usersid=$usersresult['uID'];
          $role=1;
        }
      }

      $searchstaffemail="SELECT * FROM tblstaff WHERE staff_emailAdd = '$email'";
      $querysearchstaffemail = mysqli_query($dbc, $searchstaffemail);
      if ($querysearchstaffemail)
      {
          $rowtwo = mysqli_num_rows($querysearchstaffemail);
        if($rowtwo > 0){
          $staffresult = mysqli_fetch_assoc($querysearchstaffemail);
          $usersid=$staffresult['staff_id'];
          $role=3;
        }
      }
      
      $searchdentistemail="SELECT * FROM tbldentist WHERE den_emailAdd = '$email'";
      $querysearchdentistemail = mysqli_query($dbc, $searchdentistemail);
      if ($querysearchdentistemail)
      {
        $rowthree = mysqli_num_rows($querysearchdentistemail);
        if($rowthree > 0){
          $dentistresult = mysqli_fetch_assoc($querysearchdentistemail);
          $usersid=$dentistresult['denlog_id'];
          $role=4;
        }
      }
        
      $searchadminemail="SELECT * FROM tbladmin WHERE admin_email = '$email'";
      $querysearchadminemail = mysqli_query($dbc, $searchadminemail);
      if ($querysearchadminemail)
      {
        $rowfour = mysqli_num_rows($querysearchadminemail);
        if($rowfour > 0){
          $adminresult = mysqli_fetch_assoc($querysearchadminemail);
          $usersid=$adminresult['admin_id'];
          $role=2;
        }
      } 

      if(!empty($usersid)){

      $otp    = mt_rand(1111, 9999);
      $query  = "SELECT * FROM tblemailotp WHERE email =:email";
      $stmt = $conn->prepare($query);
      $stmt->bindParam(":email",$email);
      $stmt->execute();
      if($stmt->rowCount()>0){
          $conn->query("UPDATE tblemailotp SET otp = '$otp' WHERE email = '$email'");
          $mail = new PHPMailer(true);
          $mail->isSMTP();
          $mail->Host = 'smtp.gmail.com';
          $mail->SMTPAuth = true;
          $mail->Username = 'romergalendez@gmail.com';
          $mail->Password = 'zhbvnwwysdqvkzgy';
          $mail->SMTPSecure = 'ssl';
          $mail->Port = 465;
          $mail->setFrom('romergalendez@gmail.com');
          $mail->addAddress($email);
          $mail->isHTML(true);
          $mail->Subject = "Serenity Dental Clinic OTP Verification";
          $mail->Body = $otp." is your verification code";
          $mail->send();
          echo $usersid." ".$role;  
      }else{
          $conn->query("INSERT INTO tblemailotp(`email`,`otp`) VALUES ('$email','$otp')");
          $mail = new PHPMailer(true);
          $mail->isSMTP();
          $mail->Host = 'smtp.gmail.com';
          $mail->SMTPAuth = true;
          $mail->Username = 'romergalendez@gmail.com';
          $mail->Password = 'zhbvnwwysdqvkzgy';
          $mail->SMTPSecure = 'ssl';
          $mail->Port = 465;
          $mail->setFrom('romergalendez@gmail.com');
          $mail->addAddress($email);       
          $mail->isHTML(true);       
          $mail->Subject = "Serenity Dental Clinic OTP Verification";
          $mail->Body = $otp." is your verification code";       
          $mail->send();        
          echo $usersid." ".$role;
      } 
    }else{
      echo "failed";
    }
    break;
    case 'getpatientfullname':
      $patientid=$_SESSION['uID'];
      //$sql="SELECT name FROM tblusers WHERE uID ="$_SESSION['uID']";
      $sql="SELECT name FROM tblusers WHERE uID='$patientid' LIMIT 1";
      $queryres = mysqli_query($dbc, $sql);
      $val=mysqli_fetch_assoc($queryres);
      echo $val['name'];
    break;
    case 'forgotpasswordchange':
        $id=$_POST['id'];
        $role=$_POST['role'];
        $newuname=$_POST['newusername'];
        $newpass=$_POST['newpassword'];

        $query="SELECT * FROM tblcredentials WHERE userid = '$id' AND role='$role'";
        $result = mysqli_query($dbc, $query);
        if ($result)
        {
          $row = mysqli_num_rows($result);
          if($row > 0){
            $sql = "UPDATE tblcredentials SET username ='$newuname',password='$newpass' WHERE userid='$id' AND role='$role'";
                    if ($dbc->query($sql) === TRUE) {
                        echo  "Username and Password Successfully Changed"; 
                    }else{
                        echo "Failed to change username and password";
                    }
            }
        } 

    break;
    case 'verifycodeandregister':
            $code=$_POST['code'];
            $email=$_POST['email'];
            $sql = "SELECT * FROM tblemailotp WHERE email=:email AND otp=:code ";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":email",$email);
            $stmt->bindParam(":code",$code);
            $stmt->execute();
            if($stmt->rowCount()>0){
                echo "verified";
            }else{
                echo "notverified";
            }
    break;
    case 'registeruser':
            $name = $_POST['ufname'];
            $username = $_POST['uname'];
            $password = $_POST['upass'];
            $email = $_POST['uemail'];
            $phonenumber = $_POST['uphone'];
            $role="1";

                  $sql ="INSERT INTO tblusers(name, uEmail, uPnum, status ) VALUES('$name','$email','$phonenumber','ACTIVE')";
                  if ($dbc->query($sql) === TRUE) {
                    $last_id=mysqli_insert_id($dbc);
                    $sqltwo ="INSERT INTO tblcredentials(userid, username,password,role ) VALUES('$last_id','$username','$password','1')";
                    $dbc->query($sqltwo);
                    echo "success"; 
                  }else{
                      echo "failed";
                  } 
               
    break;
    case 'savecredentials':
           
            $curpassword=$_POST['curpass'];
            $newpass=$_POST['newpass'];
            $curuser=$_SESSION['uID'];
            if(isset($_POST['curuname']) && isset($_POST['newuname'])){
              $curuname=$_POST['curuname'];
              $newuname=$_POST['newuname'];
              $searchusername="SELECT * FROM tblcredentials WHERE username = '$curuname' && password='$curpassword' AND userid='$curuser'";
              $querysearch = mysqli_query($dbc, $searchusername);
              if ($querysearch)
              {
                  $row = mysqli_num_rows($querysearch);
                if($row > 0){
                    $sql = "UPDATE tblcredentials SET username ='$newuname',password='$newpass' WHERE userid='$curuser'";
                    if ($dbc->query($sql) === TRUE) {
                        echo  "Username and Password Successfully Changed"; 
                    }else{
                        echo "failed";
                    }
                }else{
                    echo  "Username or Password may be incorrect";
                }
              }
            }else{
              $searchusername="SELECT * FROM tblcredentials WHERE password='$curpassword' AND userid='$curuser'";
              $querysearch = mysqli_query($dbc, $searchusername);
              if ($querysearch)
              {
                  $row = mysqli_num_rows($querysearch);
                if($row > 0){
                    $sql = "UPDATE tblcredentials SET password='$newpass' WHERE userid='$curuser'";
                    if ($dbc->query($sql) === TRUE) {
                        echo  "Password Successfully Changed"; 
                    }else{
                        echo "failed";
                    }
                }else{
                    echo  "Password may be incorrect";
                }
              }
            }
            

    break;
    case 'setappointment':
            $date = $_POST["date"];
            $time = $_POST["time"];
            $dentist = $_POST["dentist"];
            $services = $_POST["services"];
            
            $sql ="INSERT INTO tblappointment(userID,date,time,dentistID,services)";
            $sql.="VALUES(:uID,:date,:time,:dentist,:services)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':uID',$_SESSION['uID']);
            $stmt->bindParam(':date',$date);
            $stmt->bindParam(':time',$time);
            $stmt->bindParam(':dentist',$dentist);
            $stmt->bindParam(':services',$services);
            if($stmt->execute()){               
                    echo 'success';
            } else {                  
                    echo 'failed';
            }
    break;
    case 'loginuser':
            $sql = "SELECT * FROM tblcredentials WHERE username=:username ";
            $sql .= "AND password=:password";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":username",$_POST['username']);
            $stmt->bindParam(":password",$_POST['password']);
            $stmt->execute();
            if($stmt->rowCount()>0){
              $rs = $stmt->fetch(PDO::FETCH_ASSOC);
              $_SESSION['uID'] = $rs['userid'];
              $_SESSION['uRole']=$rs['role'];
              echo $rs['role'];
            }else{
              echo "failed";
            }
    break;
    case 'retrievemyprofile':
            $userid=$_POST['userid'];
            $sql="SELECT * FROM tblusers WHERE uID='$userid'";
            $queryres = mysqli_query($dbc, $sql);
            $arrretrieve =[];
            $z=0;  
            while($rowretrieve = mysqli_fetch_assoc($queryres))
            { 
               $arrretrieve[$z] = $rowretrieve;
               $z++;
             }
             echo json_encode($arrretrieve);
    break;
    case 'retrievemyadminprofile':
            $userid=$_SESSION['uID'];
            $sql="SELECT * FROM tbladmin WHERE admin_id='$userid'";
            $queryres = mysqli_query($dbc, $sql);
            $arrretrieve =[];
            $z=0;  
            while($rowretrieve = mysqli_fetch_assoc($queryres))
            { 
              $arrretrieve[$z] = $rowretrieve;
              $z++;
            }
            echo json_encode($arrretrieve);
    break;
    case 'retrievemystaffprofile':
            $userid=$_SESSION['uID'];
            $sql="SELECT * FROM tblstaff WHERE staff_id='$userid'";
            $queryres = mysqli_query($dbc, $sql);
            $arrretrieve =[];
            $z=0;  
            while($rowretrieve = mysqli_fetch_assoc($queryres))
            { 
              $arrretrieve[$z] = $rowretrieve;
              $z++;
            }
            echo json_encode($arrretrieve);

    break;
    case 'retrievemydentistprofile':
            $userid=$_SESSION['uID'];
            $sql="SELECT * FROM tbldentist WHERE denlog_id='$userid'";
            $queryres = mysqli_query($dbc, $sql);
            $arrretrieve =[];
            $z=0;  
            while($rowretrieve = mysqli_fetch_assoc($queryres))
            { 
              $arrretrieve[$z] = $rowretrieve;
              $z++;
            }
            echo json_encode($arrretrieve);

    break;
    case 'updatemyprofile':
            $userid=$_POST['userid'];
            $name=$_POST['uname'];
            $email=$_POST['uemail'];
            $number=$_POST['unum'];
            $sql = "UPDATE tblusers SET name ='$name', uEmail= '$email', uPnum='$number' WHERE uID='$userid'";
            if ($dbc->query($sql) === TRUE) {
                echo "success"; 
            }else{
                echo "failed";
            }
    break;
    case 'updatemyadminprofile':
            $userid=$_SESSION['uID'];
            $name=$_POST['uname'];
            $email=$_POST['uemail'];
            $number=$_POST['unum'];
            $sql = "UPDATE tbladmin SET admin_name ='$name', admin_num= '$number', admin_email='$email' WHERE admin_id='$userid'";
            if ($dbc->query($sql) === TRUE) {
                echo "success"; 
            }else{
                echo "failed";
            }
    break;
    case 'updatemystaffprofile':
            $userid=$_SESSION['uID'];
            $name=$_POST['uname'];
            $email=$_POST['uemail'];
            $number=$_POST['unum'];
            $age=$_POST['age'];
            $sql = "UPDATE tblstaff SET staff_fname ='$name', staff_cnum= '$number', staff_emailAdd='$email',staff_age='$age' WHERE staff_id='$userid'";
            if ($dbc->query($sql) === TRUE) {
                echo "success"; 
            }else{
                echo "failed";
            }
    break;
    case 'getdentist':
            $sql="SELECT * FROM tbldentist";
            $queryres = mysqli_query($dbc, $sql);
            $arrretrieve =[];
            $z=0;  
            while($rowretrieve = mysqli_fetch_assoc($queryres))
            { 
               $arrretrieve[$z] = $rowretrieve;
               $z++;
             }
             echo json_encode($arrretrieve);
    break;
    case 'getservices':
            $sql="SELECT * FROM tblservices";
            $queryres = mysqli_query($dbc, $sql);
            $arrretrieve =[];
            $z=0;  
            while($rowretrieve = mysqli_fetch_assoc($queryres))
            { 
               $arrretrieve[$z] = $rowretrieve;
               $z++;
             }
             echo json_encode($arrretrieve);
    break;
    case 'sendappointment':
            $date=$_POST['date'];
            $time=$_POST['time'];
            $dentist=$_POST['dentist'];
            $total=$_POST['total'];
            $registerquery="";
            if(isset($_POST['uid'])){
              $patientid=$_POST['uid'];
              $registerquery = "INSERT INTO tblappointment(`date`,`time`,`statusID`,`dentistID`,`userID`,price)VALUES('$date','$time','4','$dentist','".$patientid."','$total')";
            }else{
              $registerquery = "INSERT INTO tblappointment(`date`,`time`,`statusID`,`dentistID`,`userID`,price)VALUES('$date','$time','3','$dentist','".$_SESSION['uID']."','$total')";
            }
              if ($dbc->query($registerquery) === TRUE) {
                $last_id=mysqli_insert_id($dbc);
                echo $last_id;
              }else{
                echo "failed";
              }
    break;
    case 'setappointmentdetails':
            $newlyaddedid=$_POST['newlyinsertedid'];
            $service=$_POST['serviceselected'];
            $sql="INSERT INTO tblappointmentdetails(`app_id`,`service_id`) VALUES('$newlyaddedid','$service')";
            if ($dbc->query($sql) === TRUE) {
                echo "success";
              }else{
                echo "failed";
              }
    break;
    case 'retrievemyappointments':
            $userid=$_SESSION['uID'];
            $sql="SELECT tblstatus.status_name,tblappointment.* FROM tblstatus INNER JOIN tblappointment ON tblstatus.status_id=tblappointment.statusID  WHERE tblappointment.userID='$userid'";
          
            $queryres = mysqli_query($dbc, $sql);
            $arrretrieve =[];
            $z=0;  
           
            while($rowretrieve = mysqli_fetch_assoc($queryres))
            {  
              $arrretrieve[$z] = $rowretrieve;
              $z++;
             }
             
             echo json_encode($arrretrieve);
    break;
    case 'getdentistname':
          $dentist=$_POST['dentist'];
          $query = "SELECT den_fname FROM tbldentist WHERE denlog_id ='$dentist'";
          $results = mysqli_query($dbc, $query);

          if (mysqli_num_rows($results) !=0) { 
              $dentistname = mysqli_fetch_assoc($results);
              $dentistfname=$dentistname['den_fname'];
              echo $dentistfname;
          }
    break;
    case 'changeappointmentstatus':
          $appid=$_POST['appid'];
          $userid=$_SESSION['uID'];
          $sqlupdate= "UPDATE tblappointment SET statusID='5' WHERE userID='$userid' AND app_id='$appid'";
          if ($dbc->query($sqlupdate) === TRUE) {
              echo "success";
          }else{
              echo "failed";
          }  
    break;
    case 'staffchangeappointmentstatus':
          $appid=$_POST['appid'];
          $sqlupdate= "UPDATE tblappointment SET statusID='5' WHERE app_id='$appid'";
          if ($dbc->query($sqlupdate) === TRUE) {
              echo "success";
          }else{
              echo "failed";
          } 
    break;
    case 'getappointmentdetails':
          $appid=$_POST['appid'];
          if(isset($_POST['uid'])){
            $userid=$_POST['uid'];
          }else{
            $userid=$_SESSION['uID'];
          }
          $sql="SELECT tblstatus.status_name,tblappointment.* FROM tblstatus INNER JOIN tblappointment ON tblstatus.status_id=tblappointment.statusID  WHERE tblappointment.userID='$userid' AND app_id='$appid'";
          $queryres = mysqli_query($dbc, $sql);
          $arrretrieve =[];
          $z=0;  
          while($rowretrieve = mysqli_fetch_assoc($queryres))
          {  
            $arrretrieve[$z] = $rowretrieve;
            $z++;
          }  
          echo json_encode($arrretrieve);
    break; 
    case 'generatereports':
          $serviceid=$_POST['serviceselected'];

          if((isset($_POST['rangefromdaily'])) && (isset($_POST['rangetodaily']))){
            $dailyrangefrom=$_POST['rangefromdaily'];
            $dailyrangeto=$_POST['rangetodaily'];
            $sql="SELECT tblusers.*,tblappointment.* FROM tblusers INNER JOIN tblappointment ON tblusers.uID=tblappointment.userID WHERE tblappointment.date BETWEEN '$dailyrangefrom' AND '$dailyrangeto' AND tblappointment.statusID='6'";
          }
          if((isset($_POST['rangefrommonthly'])) && (isset($_POST['rangetomonthly']))){
            $monthlyrangefrom=$_POST['rangefrommonthly'];
            $monthlyrangeto=$_POST['rangetomonthly'];

            $sql="SELECT tblusers.*,tblappointment.* FROM tblusers INNER JOIN tblappointment ON tblusers.uID=tblappointment.userID WHERE MONTH(tblappointment.date) BETWEEN '$monthlyrangefrom' AND '$monthlyrangeto' AND tblappointment.statusID='6'";
          }
          $queryres = mysqli_query($dbc, $sql);
          $arrretrieve =[];
          $z=0;  
          while($rowretrieve = mysqli_fetch_assoc($queryres))
          {  
            $arrretrieve[$z] = $rowretrieve;
            $z++;
          }  
          echo json_encode($arrretrieve);
    break;
    case 'generateweeklyreports':
          $sql="SELECT tblusers.*,tblappointment.* FROM tblusers INNER JOIN tblappointment ON tblusers.uID=tblappointment.userID WHERE WEEK(tblappointment.date)=WEEK(NOW()) AND tblappointment.statusID='6'";
          $queryres = mysqli_query($dbc, $sql);
          $arrretrieve =[];
          $z=0;  
          while($rowretrieve = mysqli_fetch_assoc($queryres))
          {  
            $arrretrieve[$z] = $rowretrieve;
            $z++;
          }  
          echo json_encode($arrretrieve);
    break;
    case 'getallspecialty':
          $sql="SELECT * FROM tblspeciality";
          $queryres = mysqli_query($dbc, $sql);
          $arrretrieve =[];
          $z=0;  
          while($rowretrieve = mysqli_fetch_assoc($queryres))
          {  
            $arrretrieve[$z] = $rowretrieve;
            $z++;
          }  
          echo json_encode($arrretrieve);
    break;
    case 'getallgender':
      $sql="SELECT * FROM tblgender";
      $queryres = mysqli_query($dbc, $sql);
      $arrretrieve =[];
      $z=0;  
      while($rowretrieve = mysqli_fetch_assoc($queryres))
      {  
        $arrretrieve[$z] = $rowretrieve;
        $z++;
      }  
      echo json_encode($arrretrieve);
break;
    case 'getallservicesfromid':
          $appid=$_POST['apppointmentid'];
          $service=$_POST['service'];
         
          if($service != "0"){
            $sql="SELECT * FROM tblappointmentdetails WHERE app_id='$appid' AND service_id='$service'";
          }else{
            $sql="SELECT * FROM tblappointmentdetails WHERE app_id='$appid'";
          }
          
          $queryres = mysqli_query($dbc, $sql);
          $arrretrieve =[];
          $z=0;  
          while($rowretrieve = mysqli_fetch_assoc($queryres))
          {  
            $arrretrieve[$z] = $rowretrieve;
            $z++;
          }  
          echo json_encode($arrretrieve);
    break;
    case 'getservicesdetails':
          $serviceid=$_POST['service'];
          $sql="SELECT * FROM tblservices WHERE srv_id='$serviceid'";
          $queryres = mysqli_query($dbc, $sql);
          $arrretrieve =[];
          $z=0;  
          while($rowretrieve = mysqli_fetch_assoc($queryres))
          {  
            $arrretrieve[$z] = $rowretrieve;
            $z++;
          }  
          echo json_encode($arrretrieve);
    break;
    case 'getservicesappointed':
          $appid=$_POST['selectedappid'];
          $sql="SELECT tblservices.*, tblappointmentdetails.* FROM tblservices INNER JOIN tblappointmentdetails ON tblservices.srv_id=tblappointmentdetails.service_id WHERE tblappointmentdetails.app_id='$appid'";
          $queryres = mysqli_query($dbc, $sql);
          $arrretrieve =[];
          $z=0;  
          while($rowretrieve = mysqli_fetch_assoc($queryres))
          {  
            $arrretrieve[$z] = $rowretrieve;
            $z++;
          }  
          echo json_encode($arrretrieve);
    break;
    case 'getdentistcount':
          $sql="SELECT * FROM tbldentist";
          $queryres = mysqli_query($dbc, $sql);
          if ($queryres)
          {
              $row = mysqli_num_rows($queryres);
              echo $row;
          }
    break;
    case 'getstaffcount':
          $sql="SELECT * FROM tblstaff";
          $queryres = mysqli_query($dbc, $sql);
          if ($queryres)
          {
              $row = mysqli_num_rows($queryres);
              echo $row;
          }
    break;
    case 'checkdateforpending':
          $user=$_SESSION['uID'];
          $date=$_POST['date'];
          $sql="SELECT * FROM tblappointment WHERE userID='$user' AND statusID='3' OR statusID='5' AND date='$date' ";
          $queryres = mysqli_query($dbc, $sql);
          if ($queryres)
          {
              $row = mysqli_num_rows($queryres);
              echo $row;
          }
    break;
    case 'staffcheckdateforpending':
      $date=$_POST['date'];
      $sql="SELECT * FROM tblappointment WHERE statusID='3' OR statusID='5' AND date='$date' ";
      $queryres = mysqli_query($dbc, $sql);
      if ($queryres)
      {
          $row = mysqli_num_rows($queryres);
          echo $row;
      }
    break;
    case 'dentistcheckdateforpending':
      $date=$_POST['date'];
      $dentistID=$_SESSION['uID'];
      $sql="SELECT * FROM tblappointment WHERE statusID='3' OR statusID='5' AND date='$date' AND dentistID='$dentistID' ";
      $queryres = mysqli_query($dbc, $sql);
      if ($queryres)
      {
          $row = mysqli_num_rows($queryres);
          echo $row;
      }
    break;
    case 'getdatesappointmentrecordcount':
      $date=$_POST['date'];
      $sql="SELECT * FROM tblappointment WHERE date='$date'";
      $queryres = mysqli_query($dbc, $sql);
      if ($queryres)
      {
          $row = mysqli_num_rows($queryres);
          echo $row;
      }

    break;
    case 'retrievealldentist':
          $sql="SELECT tblspeciality.*,tbldentist.* FROM tblspeciality INNER JOIN tbldentist ON tblspeciality.sp_id=tbldentist.den_sp";
          $queryres = mysqli_query($dbc, $sql);
          $arrretrieve =[];
          $z=0;  
          while($rowretrieve = mysqli_fetch_assoc($queryres))
          {  
            $arrretrieve[$z] = $rowretrieve;
            $z++;
          }  
          echo json_encode($arrretrieve);
    break;
    case 'dentistupdate':
          $fullname = $_POST["fullname"];
          $cnum =$_POST['cnum'];
          $Eadd =$_POST['Eadd'];
          $sp =$_POST['sp'];
          $age =$_POST['age'];
          $gn =$_POST['gn'];
          $denlog_id = $_POST['dentist'];   
          $sql ="UPDATE tbldentist SET den_fname =:fullname,den_gender =:gn,den_cnum =:cnum ,den_sp =:sp,den_emailAdd =:Eadd ,den_age =:age ";
          $sql .="WHERE denlog_id = '$denlog_id'";
          $stmt = $conn->prepare($sql);
          $stmt->bindParam(':fullname',$fullname);
          $stmt->bindParam(':gn',$gn);
          $stmt->bindParam(':cnum',$cnum);
          $stmt->bindParam(':sp',$sp);
          $stmt->bindParam(':Eadd',$Eadd);
          $stmt->bindParam(':age',$age);  
          if($stmt->execute()){
            echo "success";
          } else {
            echo "failed";
          }
    break;
    case 'deletedentist':
          $denlog_id = $_POST['dentistid'];
          $sql ="DELETE FROM tbldentist WHERE denlog_id = '$denlog_id'";
          $stmt = $conn->prepare($sql);
          if($stmt->execute()){
            $sqltwo ="DELETE FROM tblcredentials WHERE userid = '$denlog_id' AND role = '4' ";
            $stmttwo = $conn->prepare($sqltwo);
            $stmttwo->execute();
            echo "success";
          }else{
            echo "failed";
          }
    break;
    case 'getappointments':
          $date=$_POST['date'];
          $role=$_POST['role'];
          $sql="";
          if($role == "staff"){
             $sql="SELECT tblstatus.status_name,tblappointment.* FROM tblstatus INNER JOIN tblappointment ON tblstatus.status_id=tblappointment.statusID  WHERE tblappointment.date='$date'"; 
          }else if($role == "dentist"){
            $dentistid=$_SESSION['uID'];
             $sql="SELECT tblstatus.status_name,tblappointment.* FROM tblstatus INNER JOIN tblappointment ON tblstatus.status_id=tblappointment.statusID  WHERE tblappointment.date='$date' AND dentistID='$dentistid'"; 
          }
          $queryres = mysqli_query($dbc, $sql);
          $arrretrieve =[];
          $z=0;  
          while($rowretrieve = mysqli_fetch_assoc($queryres))
          {  
            $arrretrieve[$z] = $rowretrieve;
            $z++;
          }
          echo json_encode($arrretrieve);
    break;
    case 'getallappointments':
          if(isset($_POST['role'])){
            $dentistid=$_SESSION['uID'];
            $sql="SELECT tblstatus.status_name,tblappointment.* FROM tblstatus INNER JOIN tblappointment ON tblstatus.status_id=tblappointment.statusID WHERE dentistID='$dentistid' AND tblappointment.statusID != '6'";  
          }else{
            $sql="SELECT tblstatus.status_name,tblappointment.* FROM tblstatus INNER JOIN tblappointment ON tblstatus.status_id=tblappointment.statusID AND tblappointment.statusID != '6'";  
          }      
          $queryres = mysqli_query($dbc, $sql);
          $arrretrieve =[];
          $z=0;  
          while($rowretrieve = mysqli_fetch_assoc($queryres))
          {  
            $arrretrieve[$z] = $rowretrieve;
            $z++;
          }
          echo json_encode($arrretrieve);
    break;
    case 'getpatientname':
          $uid=$_POST['uid'];
          $sql="SELECT name FROM tblusers WHERE uID = '$uid'";
          $queryres = mysqli_query($dbc, $sql);
          $val=mysqli_fetch_assoc($queryres);
          echo $val['name'];
    break;
    case 'getpatientemail':
          $uid=$_POST['uid'];
          $sql="SELECT uEmail FROM tblusers WHERE uID = '$uid'";
          $queryres = mysqli_query($dbc, $sql);
          $val=mysqli_fetch_assoc($queryres);
          echo $val['uEmail'];
    break;
    case 'checkdateforappointment':
          $date=$_POST['date'];    
          $role=$_POST['role'];
          $sql="";
          if($role == "staff"){
              $sql="SELECT * FROM tblappointment WHERE date = '$date'";
          }else if($role == "dentist"){
              $dentistid=$_SESSION['uID'];
              $sql="SELECT * FROM tblappointment WHERE date = '$date' AND dentistID='$dentistid'";
          }   
          $queryres = mysqli_query($dbc, $sql);
          if ($queryres)
          {
              $row = mysqli_num_rows($queryres);
              echo $row;
          }
    break;
    case 'deletepatient':
          $patientid = $_GET['patientid'];
          $sql ="DELETE FROM tblusers WHERE uID = '$patientid'";
          $stmt = $conn->prepare($sql);
          $stmt->execute();
          if($stmt->execute()){
            echo "success";
          }else{
            echo "failed";
          }	
    break;
    case 'approveappointment':
          $appid=$_POST['appid'];
          $patient=$_POST['patientid'];
          $email=$_POST['patientemail'];
          $sqlupdate= "UPDATE tblappointment SET statusID='4' WHERE app_id='$appid' AND userID='$patient'";
          if ($dbc->query($sqlupdate) === TRUE) {
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'romergalendez@gmail.com';
            $mail->Password = 'zhbvnwwysdqvkzgy';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom('romergalendez@gmail.com');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = "Serenity Dental Clinic Appointment approved";
            $mail->Body = "This is to inform you that your appointment for Serenity Clinic has been approved.";
            $mail->send();
              echo "success";
          }else{
              echo "failed";
          } 
    break;
    case 'logout':
            session_destroy();   
    break;
    case 'send':
            $mail = new PHPMailer(true);

            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'romergalendez@gmail.com';
            $mail->Password = 'zhbvnwwysdqvkzgy';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;

            $mail->setFrom('romergalendez@gmail.com');

            $mail->addAddress($_POST["email"]);

            $mail->isHTML(true);

            $mail->Subject = $_POST["subject"];
            $mail->Body = $_POST["message"];
            $mail->send();
            echo "success";
    break;
    case 'checkappointmentdate':
            $date=$_POST['appointmentdate'];
            $time=$_POST['appointmenttime'];
            $query = "SELECT * FROM tblappointment WHERE date ='$date' AND time='$time'";
            $results = mysqli_query($dbc, $query);
            if (mysqli_num_rows($results) !=0) { 
                echo "occupied";
            }
    break;
    case 'adddentist':
      $fullname =  $_POST['fname'];
      $username =  $_POST['uname'];
      $password =  $_POST['pass'];
      $contact=$_POST['cn'];
      $email=$_POST['email'];
      $age=$_POST['userage'];
      $gender=$_POST['usergender'];
      $specialty=$_POST['userspecialty'];
      
      $imageid = $_FILES['img']['name'];
      $imgid_size = $_FILES['img']['size'];
      $imgid_tmp = $_FILES['img']['tmp_name'];
      $imgid_ex = pathinfo($imageid, PATHINFO_EXTENSION);
      $imgid_ex_lc = strtolower($imgid_ex);
      $imgid_img_name = uniqid("IMG-", true).'.'.$imgid_ex_lc;
      $imgid_upload_path = "validids/" .$imgid_img_name;
      move_uploaded_file($imgid_tmp, $imgid_upload_path);
    
      $insertsql="INSERT INTO tbldentist (`den_fname`,`den_gender`,`den_cnum`,`den_sp`,`den_emailAdd`,`den_age`)VALUES ('$fullname','$gender','$contact','$specialty','$email','$age')";
      if($dbc->query($insertsql) === TRUE) {
          $last_id = mysqli_insert_id($dbc);
          if(!empty($imageid)){
              $insertimageonesql="INSERT INTO tblvalidphoto(`userid`,`id_path`) VALUES ('$last_id','$imgid_upload_path')";
              mysqli_query($dbc,$insertimageonesql);
          }
          $insertcredentials="INSERT INTO tblcredentials(`userid`,`username`,`password`,`role`) VALUES ('$last_id','$username','$password','4')";
          mysqli_query($dbc,$insertcredentials);
          
          echo "Registered Successfully";
      }else{
          echo "Registration Failed";
      }
    break;
    case 'addstaff':
      $fullname =  $_POST['fname'];
      $username =  $_POST['uname'];
      $password =  $_POST['pass'];
      $contact=$_POST['cn'];
      $email=$_POST['email'];
      $age=$_POST['userage'];
     

      $imageid = $_FILES['img']['name'];
      $imgid_size = $_FILES['img']['size'];
      $imgid_tmp = $_FILES['img']['tmp_name'];
      $imgid_ex = pathinfo($imageid, PATHINFO_EXTENSION);
      $imgid_ex_lc = strtolower($imgid_ex);
      $imgid_img_name = uniqid("IMG-", true).'.'.$imgid_ex_lc;
      $imgid_upload_path = "validids/" .$imgid_img_name;
      move_uploaded_file($imgid_tmp, $imgid_upload_path);
    
      $insertsql="INSERT INTO tblstaff (`staff_fname`,`staff_cnum`,`staff_emailAdd`,`staff_age`)VALUES ('$fullname','$contact','$email','$age')";
      if($dbc->query($insertsql) === TRUE) {
          $last_id = mysqli_insert_id($dbc);
          if(!empty($imageid)){
              $insertimageonesql="INSERT INTO tblvalidphoto(`userid`,`id_path`) VALUES ('$last_id','$imgid_upload_path')";
              mysqli_query($dbc,$insertimageonesql);
          }
          $insertcredentials="INSERT INTO tblcredentials(`userid`,`username`,`password`,`role`) VALUES ('$last_id','$username','$password','3')";
          mysqli_query($dbc,$insertcredentials);
          
          echo "Registered Successfully";
      }else{
          echo "Registration Failed";
      }
    break;
    case 'getpatienthistory':
      $uid=$_POST['patientid'];
      $sql="SELECT * FROM tblappointment WHERE userID='$uid' AND statusID ='6' ORDER BY app_id DESC";
      $queryres = mysqli_query($dbc, $sql);
      $arrretrieve =[];
      $z=0;  
      while($rowretrieve = mysqli_fetch_assoc($queryres))
      {  
        $arrretrieve[$z] = $rowretrieve;
        $z++;
      }  
      echo json_encode($arrretrieve);
    break;
    case 'getappointmentservices':
      $appid=$_POST['appid'];
      $sql="SELECT tblservices.*,tblappointmentdetails.* FROM tblservices INNER JOIN tblappointmentdetails ON tblservices.srv_id=tblappointmentdetails.service_id  WHERE tblappointmentdetails.app_id='$appid'";
      $queryres = mysqli_query($dbc, $sql);
      $arrretrieve =[];
      $z=0;  
          while($rowretrieve = mysqli_fetch_assoc($queryres))
          {  
            $arrretrieve[$z] = $rowretrieve;
            $z++;
          }  
          echo json_encode($arrretrieve);
      break;
      case 'getdoctorname':
        $dentistid=$_POST['docid'];
        $sql="SELECT * FROM tbldentist WHERE denlog_id = '$dentistid'";
        $queryres = mysqli_query($dbc, $sql);
        if(mysqli_num_rows($queryres) > 0){
          $rowretrieve = mysqli_fetch_assoc($queryres);
          echo $rowretrieve['den_fname'];
        }
      break;
      case 'changepatientstatus':
        $sqlgetallusers="SELECT * FROM tblusers";
        $resultgetallusers = mysqli_query($dbc, $sqlgetallusers);
        if ($resultgetallusers)
        {
          $rowres = mysqli_num_rows($resultgetallusers);
          if($rowres > 0){
            while($rowresults = mysqli_fetch_assoc($resultgetallusers)) {
              $uid=$rowresults['uID'];
              $query="SELECT * FROM tblappointment WHERE userID = '$uid' ORDER BY app_id DESC LIMIT 1";
              $res = mysqli_query($dbc, $query);
              if ($res)
              { 
                $lastappointment = mysqli_fetch_assoc($res);
                $lastdateofappointment=$lastappointment['date'];  
                $checkDate = new DateTime($lastdateofappointment);
                $now = new DateTime();
                $interval = $now->diff($checkDate);
                if ($interval->m == 3 || $interval->y > 0) {
                  $sql = "UPDATE tblusers SET status='INACTIVE' WHERE uID='$uid'";
                  mysqli_query($dbc, $sql);
                 
                }
              } 
            }
          }
        }
      break;
      case 'setasdone':
        $appid=$_POST['appointmentid'];
        $sql = "UPDATE tblappointment SET statusID='6' WHERE app_id='$appid'";
        mysqli_query($dbc, $sql);
      break;
      case 'saverecord':
        $items=$_POST['items'];
        $patientid=$_POST['patientid'];
        $currentDate = date('Y-m-d');
        $toothnumbers = $_POST['tn'];
        $toothprocedures = $_POST['pd'];

        $sql ="INSERT INTO tblrecord(patient_id,date) VALUES('$patientid','$currentDate')";
        if ($dbc->query($sql) === TRUE) {
          $last_id=mysqli_insert_id($dbc);

          $toothnumbercount = count($toothnumbers);
          for($x=0;$x < $toothnumbercount;$x++){
            $sqlthree ="INSERT INTO tblrecordtooth(record_id,tooth_number,tooth_procedure) VALUES('$last_id','$toothnumbers[$x]','$toothprocedures[$x]')";
            $dbc->query($sqlthree);
          }

          foreach($items as $item){
            $sqltwo ="INSERT INTO tblrecordchecklist(record_id,service) VALUES('$last_id','$item')";
            $dbc->query($sqltwo);
          }
         
            echo "success"; 
        }else{
            echo "failed";
        } 
      break;
      case 'getpatientrecords':

        $patientid=$_POST['patientid'];

        $sql="SELECT * FROM tblrecord WHERE patient_id = '$patientid' ORDER BY date DESC";
        $queryres = mysqli_query($dbc, $sql);
        $arrretrieve =[];
        $z=0;  
        while($rowretrieve = mysqli_fetch_assoc($queryres))
        { 
           $arrretrieve[$z] = $rowretrieve;
           $z++;
         }
         echo json_encode($arrretrieve);
      break;
    }

?>