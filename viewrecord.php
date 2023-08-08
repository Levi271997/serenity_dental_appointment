<?php
require("database/connection.php");
require("database/config.php");
$recid=$_GET['recid'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Record</title>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/responsive.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.js"></script> 
  <script src="js/ajax.js" type="text/javascript" ></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.8/dist/sweetalert2.all.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


</head>
<body>
    <section id="record-container">
        <div class="container">
            <div class="flex flex-col">
               
                <div id="record-holders">
                    <div class="flex flex-row">
                    <p>Patient Name: </p>
                <?php
                
                
                    $sqlgetrecord="SELECT * FROM tblrecord WHERE record_id='$recid'";
                    $res=mysqli_query($dbc,$sqlgetrecord);
                    $rowretrieve = mysqli_fetch_assoc($res);
                    $user = $rowretrieve['patient_id'];


                    $sqlgetusers="SELECT name FROM tblusers WHERE uID='$user'";
                $resusers=mysqli_query($dbc,$sqlgetusers);
                $rowretrieved = mysqli_fetch_assoc($resusers);
                echo "<p>".$rowretrieved['name']."</p>";

                    
                ?>
                    </div>
                    <img src="images/newbanner.png" alt="banner">
                   
                <?php 
                

             
                
                
                $sql="SELECT * FROM tblrecordchecklist WHERE record_id='$recid'";
                $queryres = mysqli_query($dbc, $sql);

                 echo "<ul id='serviceslist'>";
                while($rowretrieve = mysqli_fetch_assoc($queryres))
                {  
                    echo "<li>" .$rowretrieve['service']. "<li>";
                }  
                echo "</ul>";

                


                ?>
                <div class="patient-record-holder flex flex-row" style="gap:20px;"><div class="left"><p>Tooth Number</p></div>  <div class="right"><p>Procedure</p></div></div>
                <?php
                    $sqlgetrecord="SELECT tooth_number,tooth_procedure FROM tblrecordtooth WHERE record_id='$recid'";
                    $res=mysqli_query($dbc,$sqlgetrecord);
                   
                    while ( $rowretrieve = mysqli_fetch_assoc($res)) {
                       
                            echo "<div class='patient-record-holder flex flex-row' style='gap:20px;'><div class='left'><p>".$rowretrieve['tooth_number']."</p></div><div class='right'><p>".$rowretrieve['tooth_procedure']."</p> </div></div>";
                      
                    }
                
                ?>
             
                </div>
                <button id="printrecord" class="btn btn-primary">Print</button>  
            </div>

        </div>
    </section>
    
</body>
</html>