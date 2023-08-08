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
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.js"></script> 
  <script src="js/ajax.js" type="text/javascript" ></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.8/dist/sweetalert2.all.min.js"></script>
  <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
 
<body>

   
<!-- header section starts  -->

<header class="header fixed-top">

   <div class="container">

      <div class="row align-items-center justify-content-between">

         
        <div class="flex flex-row flex-nowrap navcontainer">
            <div class="navleft">
               <a id="navlogo" href="#" class="logo">
               <img src="images/logo.png">
               </a>
            </div>
               
             <div class="navright flex flex-row flex-nowrap">
                  <nav class="nav">
                     <ul>
                        <li><a href="#home"><i class="fa fa-home"></i>home</a></li>
                        <li><a href="#about"><i class="fa fa-user"></i>about</a><li>
                        <li><a href="#services"><i class="fa fa-clone"></i>services</a></li>
                        <li><a href="#footer"><i class="fa fa-phone"></i>contact</a></li> 
                     </ul>
                  </nav>
                  <div class="login flex center-vertical">
                     <a href="#" data-toggle="modal" data-target="#myModal" class="link-btn signupbtn">Signup</a>
                     <a href="#" data-toggle="modal" data-target="#myModal2" class="link-btn loginbtn">Login</a>
                  </div>
                  <div id="menu-btn" class="fas fa-bars"></div>
             </div>
        </div>

        
      </div>
   </div>
</header>
<!-- header section ends -->

<div class="container-fluid">
    <!-- The Modal -->
<div class="modal signupmodal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Register</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
              <div class="signupcontainer">
                        <p class="indicator"></p>
                        <form>
                           <div class="flex flex-row flex-nowrap gap">
                              <div class="form-group">
                                 <!-- <label for="fullname">Fullname:</label> -->
                                 <input type="text" class="form-control" placeholder="Enter Fullname" name="name" id="userfullname"  required autocomplete="off">
                              </div>
                              <div class="form-group">
                                 <!-- <label for="contactnum">Contact number:</label> -->
                                 <input type="text" class="form-control" placeholder="Enter Contact Number" name="uPnum" id="userphonenumber"  required autocomplete="off">
                              </div>
                           </div>

                           <div class="flex flex-row gap">
                              <div class="form-group">
                                 <!-- <label for="username">Username:</label> -->
                                 <input type="text" class="form-control" placeholder="Enter Username" name="uName" id="username"  required autocomplete="off">
                              </div>
                              <div class="form-group relatives">
                                 <!-- <label for="passwwword">Password:</label> -->
                                 
                                 <span  class="toggle_pwd fa fa-fw fa-eye field_icon"></span>
                                 <input type="password" class="form-control" placeholder="Enter Password" name="uPass" id="userpassword"  required autocomplete="off">
                                 <span class="passtooltiptext" ></span>
                              </div>
                           </div>
                          <div class="flex flex-row flex-nowrap gap">
                              <div class="form-group">
                                    <!-- <label for="Email">Email Address:</label> -->
                                    <input type="text" class="form-control" placeholder="Enter Email Address" name="uEmail" id="useremail"  required autocomplete="off">
                                    
                              </div>
                              <div class="form-group relatives">
                                    <!-- <label for="Email">Email Address:</label> -->
                                    <span class="toggle_pwd fa fa-fw fa-eye field_icon"></span>
                                    <input type="password" class="form-control" placeholder="Confirm password" name="confirmPass" id="confirmpassword"  required autocomplete="off">
                                    <span class="tooltiptext" >password does not match</span>
                              </div>
                          </div>
                           <div class="flex center-top-bottom">
                              <div id="btnSendVerification" class="btn btn-primary">Send Verification</div>
                              <p class="sentverification">We've sent your email for your code</p>
                           </div>
                           <div class="verificationfield flex flex-row flex-wrap" style="gap:20px;">
                           <div class="flex flex-col vcodecontainer">
                              <input type="number" class="verificationcode relative">
                              <span>Incorrect Code</span>
                           </div>
                              
                              <div id="btnverifycode" class="btn btn-primary">Verify Code and Submit</div>

                           </div>
                           
                     </form>
              </div>
      </div>
    </div>
  </div>
</div>
</div>

<div class="container-fluid">
    <!-- The Modal -->
<div class="modal" id="myModal2">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Login</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
                  <p class="login indicator">Invalid username or password</p>
                  <form class="loginform" autocomplete="off">
                  <a href="#" class="logo">
                        <img src="images/logo.png">
                        </a>
                    
                     <div class="flex flex-col gap" style="margin-block:20px;">
                         <!-- <span>username :</span> -->
                        <input type="username" class="form-control" placeholder="Enter Username" name="username" id="loginusername">
                        <!-- <span>password :</span> -->
                        <div class="password-group">
                           <input type="password" class="form-control" placeholder="Enter password" name="password" id="loginpassword">
                           <i class="fas fa-eye-slash eyetoggle" id="logineye"></i>
                        </div>
                     </div>
                     <div id="loginuser" class="btn btn-primary">Login</div>

                     <p class="forgotpassword" data-toggle="modal" data-target="#myModalForgotPassword">Forgot Password?</p>
                  </form>  
             
      </div>
    </div>
  </div>
</div>
</div>



<div class="container-fluid">
    <!-- The Modal -->
<div class="modal" id="myModalForgotPassword">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Change Password</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
               <p class="login indicator">Invalid username or password</p>
               <form class="loginform" autocomplete="off">
                  <a href="#" class="logo">
                     <img src="images/logo.png">
                  </a>

                  <div id="sendandverifysection">
                     <div class="group-sendotp" style="margin-block:20px;" >
                        <div class="flex flex-row flex-nowrap" style="align-items:center;">
                           <div class="flex flex-col gap" >
                              <input type="email" class="form-control" placeholder="Enter Email" name="changepassemailaddress" id="changepassemailaddress">
                              <span class="enteremailerror hidden"></span>
                           </div>
                        <div id="sendverificationforchangepass" class="btn btn-primary">Submit</div>
                        </div>
                        
                     </div>
                     <div class="sentverification">Please check you email for verification codes</div>

                     <div id="group-verifyotp" class="hidden">
                           <input class="form-control" placeholder="Enter Verification Code" name="verifyotpforchangepass" id="inputverifyotpforchangepass" >
                           <span class="verifyotperror hidden">Incorrect Code</span>
                           <div id="verifyotpforchangepass" class="btn btn-primary">Verify</div>
                     </div>
                  </div>
                  <div id="changepasswordsection"  class="hidden">
                        <input type="text" class="form-control" placeholder="Enter new username" name="changeusername" id="changeusername">
                     <div class="password-group">
                           <input type="password" class="form-control" placeholder="Enter new password" name="password" id="changepasswordpass">
                           <i class="fas fa-eye-slash eyetoggle" id="changepasseye"></i>
                           <p class="changepasstooltiptext"></p>
                     </div>
                     <div class="password-group">
                           <input type="password" class="form-control" placeholder="Confirm new password" name="password" id="confirmchangepasswordpass">
                           <i class="fas fa-eye-slash eyetoggle" id="confirmchangepasseye"></i>
                           <p class="confirmchangepasstooltip"></p>
                     </div>

                     <div id="changepassword" class="btn btn-primary">Submit</div>
                  </div>

                  
               </form>  
      </div>
    </div>
  </div>
</div>
</div>

<!-- home section starts  -->

<section class="home" id="home">

   <div class="container">

         <a  id="bannerlogo"  href="#" class="logo">
		   <img src="images/logo.png">
			</a>

      <div class="row min-vh-100 align-items-center">
         <div class="content text-center text-md-left">
            <h3>Serenity Dental Clinic</h3>
            <p>Makes your smile more comportable</p>
             <a href="#footer" class="link-btn">Contact Us</a>
             <a href="#" data-toggle="modal" data-target="#myModal2" class="link-btn">Get Started</a>
         </div>
      </div>

   </div>

</section>

<!-- home section ends -->

<!-- about section starts  -->

<section class="about" id="about">
   <div class="container">
      <div class="row align-items-center">
         <div class="col-md-6 image">
            <img src="images/home1.JPG" class="w-100 mb-5 mb-md-0" alt="">
         </div>
         <div class="col-md-6 content">
            <h3>Why Serenity Dental CLinic?</h3>
            <p>The Serenity Dental Clinic it has a good and highly skilled and qualified dentists.They will have a well equipped dental laboratory.Serenity Dental Clinic they believe the best care to their patients, this clinic is trustworthy to handling patients. We should treat you as we could treat our own family members.</p>
         </div>
      </div>
   </div>
   <br><br><br><br><br>
   <div class="container">
      <div class="row align-items-center">
      <div class="col-md-6 content">
            <p>Serenity Dental clinic located at No. 23 max suniel st
         Cor Mabolo Street
         St. Carmen, Cagayan de Oro
          9000 Misamis Oriental
          Philippines.</p>
          <p>Opening Hours: Mon-Fr: 	9:00 am - 5:00 pm</p>
         </div>
         <div class="col-md-6 image">
            <img src="images/map.png" class="w-100 mb-5 mb-md-0" alt="">
         </div>
      </div>
   </div>
</section>

<!-- about section ends -->


<!-- services section starts  -->

<section class="services" id="services">

   <h1 class="heading">our services</h1>

   <div class="box-container container">

      <div class="box">
         <img src="images/venners.webp" alt="">
         <h3>Venners</h3>
         <a href="#treatment" class="serv-btn">learn more..</a>
      </div>

      <div class="box">
         <img src="images/serv-2.jpg" alt="">
         <h3>orthondontics</h3>
         <a href="#orthondontics" class="serv-btn">learn more..</a>
      </div>

      <div class="box">
         <img src="images/serv-3.jpg" alt="">
         <h3>Dental Implants</h3>
         <a href="#DentalImplants" class="serv-btn">learn more..</a>
      </div>

      <div class="box">
         <img src="images/serv-4.jpg" alt="">
         <h3>Dentures</h3>
         <a href="#dentures" class="serv-btn">learn more..</a>
      </div>

      <div class="box">
         <img src="images/teeth-whitening.jpeg" alt="">
         <h3>Teeth Whitening</h3>
         <a href="#periodontology" class="serv-btn">learn more..</a>
      </div>

      <div class="box">
         <img src="images/toothextrction.jpg" alt="">
         <h3>Tooth Extraction</h3>
         <a href="#Tooth Extraction" class="serv-btn">learn more..</a>
      </div>

      <div class="box">
         <img src="images/Composite-Fillings.webp" alt="">
         <h3>Composite Filling</h3>
         <a href="#CompositeFilling" class="serv-btn">learn more..</a>
      </div>

      <div class="box">
         <img src="images/Prophylaxis.jpg" alt="">
         <h3>Oral prophylaxis(cleaning)</h3>
         <a href="#prophylaxis" class="serv-btn">learn more..</a>
      </div>

      <div class="box">
         <img src="images/Root-Canal-Treatment.jpg" alt="">
         <h3>Root Canal Treatment</h3>
         <a href="#root" class="serv-btn">learn more..</a>
      </div>
     

   </div>

</section>
<br><br><br>

<!-- services section ends -->

<!-- services section starts  -->

<section class="services" id="treatment">

<!-- <h1 class="heading"> services </h1><br><br><br> -->

   <div class="container">

      <div class="row align-items-center">

         <div class="col-md-6 image">
            <img src="images/venners.webp" class="w-100 mb-5 mb-md-0" alt="">
         </div>

         <div class="col-md-6 content">
            <h3>Venners</h3>
            <p>A veneer is a thin layer of porcelain made to fit over the front surface of a tooth, like a false fingernail fits over a nail. Sometimes a natural-colour 'composite' material is used instead of porcelain.</p>
         </div>

      </div>

   </div>
   </section>
   <br><br><br>

<section class="services" id="orthondontics">

   <div class="container">

      <div class="row align-items-center">

         <div class="col-md-6 image">
            <img src="images/serv-2.jpg" class="w-100 mb-5 mb-md-0" alt="">
         </div>

         <div class="col-md-6 content">
            <h3>orthondontics</h3>
            <p>a branch of dentistry dealing with irregularities of the teeth (such as malocclusion) and their correction (as by braces) also : the treatment provided by a specialist in orthodontics.</p>
         </div>

      </div>

   </div>
</section>
<br><br><br>

<section class="services" id="DentalImplants">

   <div class="container">

      <div class="row align-items-center">

         <div class="col-md-6 image">
            <img src="images/serv-3.jpg" class="w-100 mb-5 mb-md-0" alt="">
         </div>

         <div class="col-md-6 content">
            <h3>Dental Implants</h3>
            <p>Dental implants are medical devices surgically implanted into the jaw to restore a person's ability to chew or their appearance. They provide support for artificial (fake) teeth, such as crowns, bridges, or dentures.</p>
         </div>

      </div>

   </div>
</section>
<br><br><br>

<section class="services" id="dentures">

<div class="container">

   <div class="row align-items-center">

      <div class="col-md-6 image">
         <img src="images/serv-4.jpg" class="w-100 mb-5 mb-md-0" alt="">
      </div>

      <div class="col-md-6 content">
         <h3>dentures</h3>
         <p>an artificial replacement of one or several of the teeth (partial denture ), or all of the teeth (full denture ) of either or both jaws; dental prosthesis.</p>
      </div>

   </div>

</div>
</section>
<br><br><br>

<section class="services" id="periodontology">

   <div class="container">

      <div class="row align-items-center">

         <div class="col-md-6 image">
            <img src="images/teeth-whitening.jpeg" class="w-100 mb-5 mb-md-0" alt="">
         </div>

         <div class="col-md-6 content">
            <h3>teeth whitening</h3>
            <p>Tooth whitening is any process that lightens the color of a tooth. Whitening may be accomplished by physical removal of the stain or a chemical reaction to lighten the tooth color.</p>
         </div>

      </div>

   </div>
</section>
<br><br><br>

<section class="services" id="Tooth Extraction">

   <div class="container">

      <div class="row align-items-center">

         <div class="col-md-6 image">
            <img src="images/toothextrction.jpg" class="w-100 mb-5 mb-md-0" alt="">
         </div>

         <div class="col-md-6 content">
            <h3>Tooth Extraction</h3>
            <p>A tooth extraction is a procedure to remove a tooth from the gum socket. It is usually done by a general dentist, an oral surgeon, or a periodontist.</p>
         </div>

      </div>

   </div>
</section>
<br><br><br>

<section class="services" id="CompositeFilling">

   <div class="container">

      <div class="row align-items-center">

         <div class="col-md-6 image">
            <img src="images/Composite-Fillings.webp" class="w-100 mb-5 mb-md-0" alt="">
         </div>

         <div class="col-md-6 content">
            <h3>Composite Filling</h3>
            <p>Composite fillings are strong, but may not be as hard wearing as amalgam fillings. Composite fillings are tooth coloured and are made from powdered glass quartz, silica or other ceramic particles added to a resin base. After the tooth is prepared, the filling is bonded onto the area and a light shone onto it to set it. The dentist will choose a shade to match your own teeth, although over time staining can happen.</p>
         </div>

      </div>

   </div>
</section>
<br><br><br>

<section class="services" id="prophylaxis">

   <div class="container">

      <div class="row align-items-center">

         <div class="col-md-6 image">
            <img src="images/Prophylaxis.jpg" class="w-100 mb-5 mb-md-0" alt="">
         </div>

         <div class="col-md-6 content">
            <h3>Oral prophylaxis(cleaning)</h3>
            <p>Oral prophylaxis is a cleaning procedure performed by a dentist or oral hygienist in order to thoroughly clean the teeth. In this procedure  bacterial plaque and tartar are removed from te surface of the teeth with the help of scaling and polishing.</p>
         </div>

      </div>

   </div>
</section>
<br><br><br>

<section class="services" id="root">

   <div class="container">

      <div class="row align-items-center">

         <div class="col-md-6 image">
            <img src="images/Root-Canal-Treatment.jpg" class="w-100 mb-5 mb-md-0" alt="">
         </div>

         <div class="col-md-6 content">
            <h3>Root Canal Treatment</h3>
            <p>Root canal treatment (endodontics) is a dental procedure used to treat infection at the centre of a tooth. Root canal treatment is not painful and can save a tooth that might otherwise have to be removed completely.</p>
         </div>

      </div>

   </div>
</section>
<br><br><br>


<!-- process section ends -->

<!-- doctor and staff section starts  -->

<section class="doctorstaff" id="doctorstaff">
   <h1 class="heading"> Doctors and staff </h1>
   <div class="box-container container">

      <div class="box">
         <img src="images/dentist1.jpg" alt="">
         <p>Doctor</p>
         <h3>Dr. George A. Sohento</h3>
         <span>General dentist/Orthodontics</span><br><br>
         <!-- <a href="about.php#doc1" class="link-btn">view more</a> -->
      </div>

      <div class="box">
         <img src="images/staff1.jpg" alt="">
         <p>Staff</p>
         <h3>Mea ann Solante</h3><br><br>
         <!-- <a href="about.php#staff1" class="link-btn">view more</a> -->
      </div>

      <div class="box">
         <img src="images/dentist2.jpg" alt="">
         <p>Doctor</p>
         <h3>Dr. Claire Evangeline Chua</h3>
         <span> Cosmetic & General Dentist</span><br><br>
         <!-- <a href="about.php#doc2" class="link-btn">view more</a> -->
      </div>
   </div>

</section>


<section class="footer" id="footer">

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

      <!-- <div class="box">
         <i class="fa fa-facebook-official"></i>
         <h3>email address</h3>
         <p>Serenity@gmail.com</p>
      </div> -->

   </div>

   <div class="credit"> All Right Serve <?php echo date('Y'); ?> by <span>Serenity Dental Clinic</span>  </div>

</section>

<!-- footer section ends -->



<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>