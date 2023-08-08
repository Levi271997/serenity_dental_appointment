<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Serenity Dental Clinic</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- bootstrap cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>


<body>


   
<!-- header section starts  -->

<header class="header fixed-top">

   <div class="container">

      <div class="row align-items-center justify-content-between">

      <a href="#" class="logo">
		   <!-- <img src="images/logo.png"> -->
			</a>
         <nav class="nav">
            <ul>
            <li><a href="index.php"><i class="fa fa-home"></i>home</a></li>
            <li><a href="about.php"><i class="fa fa-user"></i>about</a><li>
            <li><a href="services.php"><i class="fa fa-clone"></i>services</a></li>
            <li><a class="active" href="#"><i class="fa fa-phone"></i>contact</a></li>
            <li><a href="patientlog.php"><i class="fa fa-sign-in"></i>login</a>
            <!-- <div class="submenu">
               <ul>
                  <li><a href="adminlogin.php">admin</a></li>
                  <li><a href="dentistlogin.php">dentist</a></li>
                  <li><a href="stafflog.php">staff</a></li>
                  <li><a href="patientlog.php">patient</a></li>
               </ul>
            </div> -->
            </li>
           </ul>
         </nav>

         <!-- <a href="patientsignup.php" class="link-btn">make appointment</a> -->

         <div id="menu-btn" class="fas fa-bars"></div>

      </div>

   </div>

</header>

<!-- header section ends -->

<!-- home section starts  -->

<section class="home" id="">

   <div class="container">

   <a href="#" class="logo">
		   <img src="images/logo.png">
			</a>

      <div class="row min-vh-100 align-items-center">
         <div class="content text-center text-md-left">
            <h3>Serenity Dental Clinic</h3>
            <p>Makes your smile more comportable</p>
         </div>
      </div>

   </div>

</section>

<!-- home section ends -->

<!-- about section starts  -->

<section class="contact" id="contact">

   <h1 class="heading">Contact us</h1>

   <form action="" method="post">
      <span>your name :</span>
      <input type="text" name="name" placeholder="enter your name" class="box" required>
      <span>your email :</span>
      <input type="email" name="email" placeholder="enter your email" class="box" required>
      <span>Subject :</span><br>
      <textarea id="subject" name="subject" placeholder="Write something.."></textarea><br><br>
      <input type="submit" value="Submit" name="submit" class="link-btn">
   </form>  

</section>
<!-- footer section starts  -->

<section class="footer">

   <div class="box-container container">

   <div class="box">
         <i class="fas fa-phone"></i>
         <h3>phone number</h3>
         <p>0967 027 2813</p>
      </div>
      
      <div class="box">
         <i class="fas fa-map-marker-alt"></i>
         <h3>our address</h3>
         <p>No. 23 max suniel st
         Cor Mabolo Street
         St. Carmen, Cagayan de Oro
          9000 Misamis Oriental
          Philippines</p>
      </div>

      <div class="box">
         <i class="fas fa-clock"></i>
         <h3>opening hours</h3>
         <p>09:00am to 5:00pm</p>
      </div>

      <div class="box">
         <i class="fas fa-envelope"></i>
         <h3>email address</h3>
         <p>Serenity@gmail.com</p>
      </div>


   </div>

   <div class="credit"> All Right Serve <?php echo date('Y'); ?> by <span>Serenity Dental Clinic</span>  </div>


</section>

<!-- footer section ends -->

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>