
$( document ).ready(function() {
    let functiontag = "";
    let services_selected=[];
    patientname="";
    patientemail="";
    valid=1;
    validpassword=1;
    changepasswordvalid=1;
    occupied=1;
    userloggedinrole="";
    sortradioselected="";
    changepassid="";
    changepassrole="";
    var url= window.location.href;
    
    if(url.includes("dentistdashboard.php")){
        userloggedinrole="dentist";
        viewallappointmentsfordentist(userloggedinrole);
        getappointmentdates(userloggedinrole);
        setcalendar();
        dentistsetdatesindicators();
    }
    if(url.includes("staffdashboard.php")){
        userloggedinrole="staff";
        viewallappointmentsforstaff(userloggedinrole);
        getappointmentdates(userloggedinrole);
        setcalendar();
        setdatesindicators();
        checkpatientstatus();
    }
    if(url.includes("patientsetappointment.php") || url.includes("staffsetappointmentforpatient.php")){
       createCaptcha();
       getDentist();
       getServices();
       setcalendar();
       setdatesindicators();
    }
     if(url.includes("patientprofile.php")){
        retrieveprofile();
    }
    if(url.includes("adminprofile.php")){
        retrieveadminprofile();
    }
    if(url.includes("staffprofile.php")){
        retrievestaffprofile();
    }
    if(url.includes("dentistprofile.php")){
        retrievedentistprofile();
    }
     if(url.includes("patientappointment.php")){
        retrievemyappointments();
    }
     if(url.includes("admindashboard.php")){
        retrievestaffcount();
        retrievedentistcount();
    }
     if(url.includes("admindentist.php")){
        retrievealldentist();
    }
    if(url.includes("staffappointment.php")){
        staffviewallappointments();
    }
    if(url.includes("dentistappointment.php")){
        dentistviewallappointments();
    }
    if(url.includes("reports.php")){
        generateallservices();
        setInterval(function(){ 
            checktotal();   
        }, 3000);
    }
    if(url.includes("adminreport.php")){
        generateallservices();
        setInterval(function(){ 
            checktotal();   
        }, 3000);
    }
    if(url.includes("dentistreport.php")){
        generateallservices();
        setInterval(function(){ 
            checktotal();   
        }, 3000);
    }
    if(url.includes("adminadddentist.php")){
        retrievespecialty();
        retrievegender();
    }
    if(url.includes("staffpatientedit.php")){
        getPatientHistory();
        getPatientRecords();
    }
    if((url.includes("patientaccountsettings.php")) || (url.includes("patientappointment.php")) || (url.includes("patientdashboard.php")) || (url.includes("patientprofile.php")) || (url.includes("patientsetappointment.php"))  ){
        getpatientfullname();
    }
    
    var userfullname=document.getElementById('userfullname');
    var username=document.getElementById('username');
    var userpassword=document.getElementById('userpassword');
    var userphonenumber=document.getElementById('userphonenumber');
    var useremail=document.getElementById('useremail');
    var loginusername=document.getElementById('loginusername');
    var loginpassword=document.getElementById('loginpassword');
    var confirmpassword=document.getElementById('confirmpassword');

    $(".toggle_pwd").click(function () {
        $(this).toggleClass("fa-eye fa-eye-slash");
       var type = $(this).hasClass("fa-eye-slash") ? "text" : "password";
        $(this).parent().find('input').attr("type", type);
    });
    $('body').on('keyup', '#confirmpassword', function (e) { 
       if(userpassword.value != confirmpassword.value){
            $('.tooltiptext').css('display','block');
            validpassword=0;
       }else{
            validpassword=1;
            $('.tooltiptext').css('display','none');
       }
    });
    $('body').on('keyup', '#confirmnewpassword', function (e) { 
        var usernewpassword=document.getElementById('newpassword');
        var userconfirmpassword=document.getElementById('confirmnewpassword');
        if(usernewpassword.value != userconfirmpassword.value){
             $('.passwordinputs .tooltiptext').css('display','block');
             changepasswordvalid=0;
        }else{
             changepasswordvalid=1;
             $('.passwordinputs .tooltiptext').css('display','none');
        }
     });
    $('body').on('keyup', '#newpassword', function (e) { 
        changepasswordvalid =1;
        var number = /([0-9])/;
        var alphabets = /([a-zA-Z])/;
        var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;
        var password = $('#newpassword').val().trim();
       
            valid=1;
            if (password.length < 8) {
                changepasswordvalid=0;
                $('.passwordinputs .passtooltiptext').css("display","block");
                $('.passwordinputs .passtooltiptext').removeClass('weakpassword');
                $('.passwordinputs .passtooltiptext').removeClass('strongpassword');
                $('.passwordinputs .passtooltiptext').removeClass('mediumpassword');
                $('.passwordinputs .passtooltiptext').addClass('weakpassword');
                $('.passwordinputs .passtooltiptext').html("Weak (should be atleast 8 characters.)");
            } else {
                $('.passwordinputs .passtooltiptext').css("display","block");
                if (password.match(number) && password.match(alphabets) && password.match(special_characters)) {
                  // changepasswordvalid=1;
                    $('.passwordinputs .passtooltiptext').removeClass('weakpassword');
                    $('.passwordinputs .passtooltiptext').removeClass('strongpassword');
                    $('.passwordinputs .passtooltiptext').removeClass('mediumpassword');
                    $('.passwordinputs .passtooltiptext').addClass('strongpassword');
                    $('.passwordinputs .passtooltiptext').html("Strong");
                    if($('#newpassword').val() == ($('#confirmnewpassword').val())){
                        changepasswordvalid=1;
                    }else{
                        changepasswordvalid=0;
                    }
                }
                else {
                    changepasswordvalid=0;
                    $('.passwordinputs .passtooltiptext').removeClass('weakpassword');
                    $('.passwordinputs .passtooltiptext').removeClass('strongpassword');
                    $('.passwordinputs .passtooltiptext').removeClass('mediumpassword');
                    $('.passwordinputs .passtooltiptext').addClass('mediumpassword');
                    $('.passwordinputs .passtooltiptext').html("Medium (should include alphabets, numbers and special characters.)");
                }
            }
       
    });
    
    $('body').on('keyup', '#userpassword', function (e) { 
        validpassword=1;
        var number = /([0-9])/;
        var alphabets = /([a-zA-Z])/;
        var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;
        var password = $('#userpassword').val().trim();
       
            valid=1;
            if (password.length < 8) {
                validpassword=0;
                $('.passtooltiptext').css("display","block");
                $('.passtooltiptext').removeClass('weakpassword');
                $('.passtooltiptext').removeClass('strongpassword');
                $('.passtooltiptext').removeClass('mediumpassword');
                $('.passtooltiptext').addClass('weakpassword');
                $('.passtooltiptext').html("Weak (should be atleast 8 characters.)");
            } else {
                $('.passtooltiptext').css("display","block");
                if (password.match(number) && password.match(alphabets) && password.match(special_characters)) {
                    validpassword=1;
                    $('.passtooltiptext').removeClass('weakpassword');
                    $('.passtooltiptext').removeClass('strongpassword');
                    $('.passtooltiptext').removeClass('mediumpassword');
                    $('.passtooltiptext').addClass('strongpassword');
                    $('.passtooltiptext').html("Strong");
                    if($('#userpassword').val() == ($('#confirmpassword').val())){
                        validpassword=1;
                    }else{
                        validpassword=0;
                    }
                }
                else {
                    validpassword=0;
                    $('.passtooltiptext').removeClass('weakpassword');
                    $('.passtooltiptext').removeClass('strongpassword');
                    $('.passtooltiptext').removeClass('mediumpassword');
                    $('.passtooltiptext').addClass('mediumpassword');
                    $('.passtooltiptext').html("Medium (should include alphabets, numbers and special characters.)");
                }
            }
    });
    $('body').on('keyup', '#changepasswordpass', function (e) { 
        validpassword=1;
        var number = /([0-9])/;
        var alphabets = /([a-zA-Z])/;
        var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;
        var password = $('#changepasswordpass').val().trim();
       
            valid=1;
            if (password.length < 8) {
                validpassword=0;
                $('.changepasstooltiptext').css("display","block");
                $('.changepasstooltiptext').removeClass('weakpassword');
                $('.changepasstooltiptext').removeClass('strongpassword');
                $('.changepasstooltiptext').removeClass('mediumpassword');
                $('.changepasstooltiptext').addClass('weakpassword');
                $('.changepasstooltiptext').html("Weak (should be atleast 8 characters.)");
            } else {
                $('.changepasstooltiptext').css("display","block");
                if (password.match(number) && password.match(alphabets) && password.match(special_characters)) {
                    validpassword=1;
                    $('.changepasstooltiptext').removeClass('weakpassword');
                    $('.changepasstooltiptext').removeClass('strongpassword');
                    $('.changepasstooltiptext').removeClass('mediumpassword');
                    $('.changepasstooltiptext').addClass('strongpassword');
                    $('.changepasstooltiptext').html("Strong");
                    if($('#changepasswordpass').val() == ($('#confirmchangepasswordpass').val())){
                        validpassword=1;
                    }else{
                        validpassword=0;  
                    }
                }
                else {
                    validpassword=0;
                    $('.changepasstooltiptext').removeClass('weakpassword');
                    $('.changepasstooltiptext').removeClass('strongpassword');
                    $('.changepasstooltiptext').removeClass('mediumpassword');
                    $('.changepasstooltiptext').addClass('mediumpassword');
                    $('.changepasstooltiptext').html("Medium (should include alphabets, numbers and special characters.)");
                }
            }
    });
    
    $('body').on('click', '.savecredentials', function (e) {
        changepasswordvalid=1;
        var usercurrentusername=document.getElementById('currentusername');
        var usernewusername=document.getElementById('newusername');
        var usercurrentpassword=document.getElementById('currentpassword');
        var usernewpassword=document.getElementById('newpassword');
        var userconfirmpassword=document.getElementById('confirmnewpassword');
        ValidateFieldInputs(usercurrentpassword);
        ValidateFieldInputs(usernewpassword);
        ValidateFieldInputs(userconfirmpassword);
        if(usercurrentusername.value != ""){
            ValidateFieldInputs(usernewusername);
        }
        if(valid ==1){    
        var number = /([0-9])/;
        var alphabets = /([a-zA-Z])/;
        var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;
        var password = $('#newpassword').val().trim();
            if (password.length < 8) {
                Swal.fire('Please input more complex password');
            } else {
                if (password.match(number) && password.match(alphabets) && password.match(special_characters)) {
                 
                    if($('#newpassword').val() == ($('#confirmnewpassword').val())){
                       UpdateCredentials(usercurrentusername,usernewusername,usercurrentpassword,usernewpassword);
                      
                    }else{
                        Swal.fire('Password does not match')
                    }
                }
                else {
                 Swal.fire('Please input more complex password');
                }
            }
        }
    });
    $('body').on('click', '#sendverificationforchangepass', function (e) {
        var countdown=10;
        var changepassemail=$('#changepassemailaddress').val();
        if( changepassemail != ""){
            $('.enteremailerror').addClass('hidden');
            if(validateEmail(changepassemail)){
                $('.enteremailerror').addClass('hidden');
                $(this).html('Resend Code');
               
                functiontag="sendverificationforchangepass";
                $.ajax({ 
                    type: "POST",
                    url: "server.php",
                    data: {
                        tag:functiontag, 
                        changepasswordemail:changepassemail      
                    },
                    success: function(html) {                                
                        if(html != "failed"){
                            var resultarr =html.split(' ');
                            changepassid=resultarr[0];
                            changepassrole=resultarr[1];
                            $('.sentverification').css("display","flex");
                            $('#group-verifyotp').removeClass('hidden');
                            $("#sendverificationforchangepass").html("Resend Code");
                        }else{
                            Swal.fire("Email not associated with an account");
                        }         
                    }
                }); 

            }else{
                $('.enteremailerror').removeClass('hidden');
                $('.enteremailerror').text('Please input valid email address');
            }
        }else{
            $('.enteremailerror').removeClass('hidden');
            $('.enteremailerror').text('Email address required');
        }
    });
    $('body').on('click', '#btnSendVerification', function (e) {
        let cnlength=userphonenumber.value.length;
        if(cnlength != 11){
            Swal.fire("Contact number should only be 11 digits")
        }else{
            valid=1;
            ValidateFieldInputs(userfullname);
            ValidateFieldInputs(username);
            ValidateFieldInputs(userpassword);
            ValidateFieldInputs(userphonenumber);
            ValidateFieldInputs(useremail);
            ValidateFieldInputs(confirmpassword);
    
            if((valid == 1) && (validpassword == 1) ){
            
                            functiontag = "sendverification";
                            $.ajax({ 
                                type: "POST",
                                url: "server.php",
                                data: {
                                    tag:functiontag, 
                                    ufname:userfullname.value,
                                    uname:username.value,
                                    upass:userpassword.value,
                                    uphone:userphonenumber.value,
                                    uemail:useremail.value
                                },
                                success: function(html) {                                
                                    if(html == "emailsuccess"){
                                        $('.sentverification').css("display","flex");
                                        $('.verificationfield').css("display","flex");
                                        $("#btnSendVerification").html("Resend Code");
                                    }else{
                                        Swal.fire('Username already taken');
                                    }           
                                }
                            }); 
            }
        }
    });
    
    $('body').on('click', '#loginuser', function (e) {
        valid =1;
        ValidateFieldInputs(loginusername);
        ValidateFieldInputs(loginpassword);
        
        if(valid == 1){
            var loginuname=loginusername.value;
            var loginp=loginpassword.value;
            functiontag="loginuser";
            $.ajax({    
                type: "POST",
                url: "server.php",
                data: {
                    tag:functiontag, 
                    username:loginuname,
                    password:loginp
                },
                success: function(html) {                     
                    if(html == "failed"){
                        $('.login.indicator').removeClass("errorindicator");
                        $('.login.indicator').addClass("errorindicator");   
                    }else if(html == "1"){
                        window.location.href = "patientdashboard.php";
                    } else if(html == "2"){
                        window.location.href = "admindashboard.php";
                    } else if(html == "3"){
                        window.location.href = "staffdashboard.php";
                    } else if(html == "4"){
                        window.location.href = "dentistdashboard.php";
                    }          
                }
            });  
        }
    });
    $('body').on('click', '.signupbtn', function (e) {
        resetsignupform();
        $('.indicator').removeClass("successindicator");
        $('.indicator').removeClass("errorindicator");
    });
    $('body').on('click', '#btnverifycode', function (e) {
        if($(".verificationcode").val()==""){
            $(".verificationcode").css("outline","1px solid red");
        }else{
            $(".verificationcode").css("outline","1px solid black");
            functiontag = "verifycodeandregister";
            var vcode=  $(".verificationcode").val();
            var vemail=$('#useremail').val();
            $.ajax({
                
                type: "POST",
                url: "server.php",
                data: {
                    tag:functiontag, 
                    code:vcode,
                    email:vemail
                },
                success: function(html) {                                
                    if(html == "verified"){
                        $('.verificationfield span').css("display","none");
                        RegisterUser();
                        
                    }else{
                       $('.verificationfield span').css("display","flex");
                    }
                             
                }
            });  
        }
    });
    $('body').on('click', '#verifyotpforchangepass', function (e) {
        if($("#inputverifyotpforchangepass").val()==""){
            $("#inputverifyotpforchangepass").css("outline","1px solid red");
        }else{
            $("#inputverifyotpforchangepass").css("outline","1px solid black");
            functiontag = "verifycodeandregister";
            var vcode=  $("#inputverifyotpforchangepass").val();
            var vemail=$('#changepassemailaddress').val();
            $.ajax({
                type: "POST",
                url: "server.php",
                data: {
                    tag:functiontag, 
                    code:vcode,
                    email:vemail
                },
                success: function(html) {                                
                    if(html == "verified"){
                        $('.verifyotperror').addClass('hidden');   
                        $('#sendandverifysection').addClass('hidden');  
                        $('#changepasswordsection').removeClass('hidden'); 
                    }else{
                        $('.verifyotperror').removeClass('hidden');
                    }            
                }
            });  
        }
    });
    $('body').on('click', '#changepassword', function (e) {
        var newuname=$('#changeusername').val();
        var newpass=$('#changepasswordpass').val();
        var confirmnewpass=$('#confirmchangepasswordpass').val();
        if(confirmnewpass != newpass){
            Swal.fire('Password does not match');
        }else{
            if(newuname == ""){
                Swal.fire('Please complete credentials')
            }else{
                functiontag = "forgotpasswordchange";
                $.ajax({
                    type: "POST",
                    url: "server.php",
                    data: {
                        tag:functiontag, 
                        id:changepassid,
                        role:changepassrole,
                        newusername:newuname,
                        newpassword: newpass
                    },
                    success: function(html) {                                
                           Swal.fire(html);
                           $('#myModalForgotPassword .close').trigger('click');
                    }
                });
            }
           
        }
       
    });
    $('body').on('click', '.setappointment', function (e) {
            var appointmenttag="";
            var url= window.location.href;
            if(url.includes("staffsetappointmentforpatient.php")){
                appointmenttag="staffsetappointmentforpatient"
            }else{
                appointmenttag="patientsetappointment";
            }
            if(occupied == 0){
                var captchatext=$('#cpatchaTextBox').val();
                if(captchatext == ""){
                    $('.captchaindicator').css("display","flex");
                    $('.captchaindicator').html("please type in captcha");
                }else{
                    if (document.getElementById("cpatchaTextBox").value == code) {
                        $('.captchaindicator').css("display","none");
                        setappointment(appointmenttag);
                    }else{
                        $('.captchaindicator').css("display","flex");
                        if (document.getElementById("cpatchaTextBox").value == code) {
                            $('.captchaindicator').css("display","none");
                        }else{
                            $('.captchaindicator').css("display","flex");
                            $('.captchaindicator').html("Incorrect Captcha");
                    
                        }
                        
                    }
                }
            }
            
    });
    $('body').on('click', '.refreshcaptcha', function (e) {
        createCaptcha();
    });
    $('body').on('click', '.profileedit .saveprofile', function (e) {
       if($(this).html()== "Edit Profile"){
        $(this).html("Update Profile");
        $('.cancelupdate').removeClass("hidden");
        setinputsenabled($('.profileedit #fullname'),"enabled");
        setinputsenabled($('.profileedit #email'),"enabled");
        setinputsenabled($('.profileedit #phone'),"enabled");
        if(url.includes('staffprofile.php')){ setinputsenabled($('.profileedit #age'),"enabled");}
        if(url.includes('dentistprofile.php')){ setinputsenabled($('.profileedit #age'),"enabled");}
       }else{
        if(url.includes("patientprofile.php")){
            savemyprofile();
        }
        if(url.includes("adminprofile.php")){
            savemyadminprofile();
        }
        if(url.includes("staffprofile.php")){
            savemystaffprofile();
        }
        if(url.includes("dentistprofile.php")){
            savemydentistprofile();
        }
      
        $(this).html("Edit Profile");
        $('.cancelupdate').addClass("hidden");
        setinputsenabled($('.profileedit #fullname'),"disabled");
        setinputsenabled($('.profileedit #email'),"disabled");
        setinputsenabled($('.profileedit #phone'),"disabled");
        if(url.includes('staffprofile.php')){ setinputsenabled($('.profileedit #age'),"disabled");}
        if(url.includes('dentistprofile.php')){ setinputsenabled($('.profileedit #age'),"disabled");}
       }
       
    });
    $('body').on('click', '.cancelupdate', function (e) {
        $(this).addClass('hidden');
        setinputsenabled($('.profileedit #fullname'),"disabled");
        setinputsenabled($('.profileedit #email'),"disabled");
        setinputsenabled($('.profileedit #phone'),"disabled");
        if(url.includes('staffprofile.php')){ setinputsenabled($('.profileedit #age'),"disabled");}
        if(url.includes('dentistprofile.php')){ setinputsenabled($('.profileedit #age'),"disabled");}
        setinputsenabled($('.profileedit #age'),"disabled");
        $('.profileedit .saveprofile').html("Edit Profile");
        if(url.includes("patientprofile.php")){
            retrieveprofile();
        }
        if(url.includes("adminprofile.php")){
            retrieveadminprofile();
        }
        if(url.includes("dentistprofile.php")){
            retrievedentistprofile();
        }
        if(url.includes("staffprofile.php")){
            retrievestaffprofile();
        }
        $('.profileupdateindicator').removeClass("successindicator");
    });
    $('body').on('change', '.servicesoptions input[type="checkbox"]', function (e) {
        var total=0;
        const servicesoptions=document.querySelectorAll('.servicesoptions input[type="checkbox"]:checked');
        servicesoptions.forEach((ele)=>{  
            var price=parseFloat(ele.parentNode.querySelector('.servicesprice').innerHTML);
            total += price;
        });  
        if(total !=0){
            $('.total-amount').text(total);
            $('.finalamount').text(total + 100);
        }else{
            $('.total-amount').text("0.00");
            $('.finalamount').text("0.00");
        }  
       
    });
    $('body').on('click', '.cancelpatientappointment', function (e) {
        var appointmentid=$(this).data('id');
        Confirm('Cancel appointment', 'Confirm cancellation of appointment ?', 'Yes', 'Cancel');
        $(".doAction").click(function (){
            functiontag="staffchangeappointmentstatus"; 
            $.ajax({   
                type: "POST",
                url: "server.php",
                data: {
                    tag:functiontag, 
                    appid:appointmentid
                },
                success: function(html) {                                
                    if(html == "success"){
                        location.reload(true);
                    }           
                }
            }); 
        });
    });
    $('body').on('click', '#printrecord', function (e) {
       printrecordPDF();
    });
    // $('body').on('click', '.changepatientstatus', function (e) {
    //     var currentstats=$(this).data('id');
    //     var uid=$(this).closest('tr').data('id');
    //     var tochangestats="";
    //     if(currentstats == "ACTIVE"){
    //         tochangestats="INACTIVE";
    //     }else{
    //         tochangestats="ACTIVE";
    //     }
    //     Confirm('Change status', 'This patient is currently an '+currentstats +' patient, Set to '+tochangestats+' ?', 'Yes', 'Cancel');
    //     $(".doAction").click(function (){
    //         functiontag="changepatientstatus"; 
    //         $.ajax({   
    //             type: "POST",
    //             url: "server.php",
    //             data: {
    //                 tag:functiontag, 
    //                 stats:tochangestats,
    //                 patientid:uid
    //             },
    //             success: function(html) {                                
    //                 if(html == "success"){
    //                     location.reload(true);
    //                 }           
    //             }
    //         }); 
    //     });
    // });
    $('body').on('click', '.cancelappointment', function (e) {
        var appointmentid=$(this).data('id');
        Confirm('Cancel appointment', 'Confirm cancellation of appointment ?', 'Yes', 'Cancel'); /*change*/
        $(".doAction").click(function (){
            functiontag="changeappointmentstatus";
            
            $.ajax({   
                type: "POST",
                url: "server.php",
                data: {
                    tag:functiontag, 
                    appid:appointmentid
                },
                success: function(html) {                                
                    if(html == "success"){
                        location.reload(true);
                    }           
                }
            }); 
        });
    });
    $('body').on('click', '.viewpatientappointment', function (e) {
       var userid= $(this).parent().parent().attr('data-id');
        var id=$(this).data('id');
        functiontag="getappointmentdetails";
        $.ajax({   
            type: "POST",
            url: "server.php",
            data: {
                tag:functiontag, 
                appid:id,
                uid:userid
            },
            success: function(html) {  
                                            
                var json = JSON.parse(html); 
                if(json.length > 0){
                    json.forEach((item)=>{ 
                        functiontag="getdentistname";
                        var dentistid=item['dentistID'];
                        $.ajax({         
                            type: "POST",
                            url: "server.php",
                            data: {
                                tag:functiontag, 
                                dentist:dentistid
                            },
                            success: function(html) {   
                                var convertedtime=converttime(item['time']);
                                viewappointmentmodal(item['app_id'],item['date'],convertedtime,html,item['status_name'],item['price']);     
                            }
                    
                        });    
                    });
                }
            }
        }); 
    });
    $('body').on('click', '.viewappointment', function (e) {
        var id=$(this).data('id');
        functiontag="getappointmentdetails";
        $.ajax({   
            type: "POST",
            url: "server.php",
            data: {
                tag:functiontag, 
                appid:id
            },
            success: function(html) {                                
                var json = JSON.parse(html); 
                if(json.length > 0){
                    json.forEach((item)=>{ 
                        functiontag="getdentistname";
                        var dentistid=item['dentistID'];
                        $.ajax({         
                            type: "POST",
                            url: "server.php",
                            data: {
                                tag:functiontag, 
                                dentist:dentistid
                            },
                            success: function(html) {
                                var convertedtime=converttime(item['time']);     
                                viewappointmentmodal(item['app_id'],item['date'],convertedtime,html,item['status_name'],item['price']);     
                            }
                        });    
                    });
                }
            }
        });     
    });
    $('#logineye').click(function(){
       
        if($(this).hasClass('fa-eye-slash')){
           
          $(this).removeClass('fa-eye-slash');
          
          $(this).addClass('fa-eye');
          
          $('#loginpassword').attr('type','text');
            
        }else{
         
          $(this).removeClass('fa-eye');
          
          $(this).addClass('fa-eye-slash');  
          
          $('#loginpassword').attr('type','password');
        }
    });
    $('#changepasseye').click(function(){
       
        if($(this).hasClass('fa-eye-slash')){
           
          $(this).removeClass('fa-eye-slash');
          
          $(this).addClass('fa-eye');
          
          $('#changepasswordpass').attr('type','text');
            
        }else{
         
          $(this).removeClass('fa-eye');
          
          $(this).addClass('fa-eye-slash');  
          
          $('#changepasswordpass').attr('type','password');
        }
    });
    $('#confirmchangepasseye').click(function(){
       
        if($(this).hasClass('fa-eye-slash')){
           
          $(this).removeClass('fa-eye-slash');
          
          $(this).addClass('fa-eye');
          
          $('#confirmchangepasswordpass').attr('type','text');
            
        }else{
         
          $(this).removeClass('fa-eye');
          
          $(this).addClass('fa-eye-slash');  
          
          $('#confirmchangepasswordpass').attr('type','password');
        }
    });
    $('body').on('click', '.forgotpassword', function (e) {
        $('#myModal2 .close').trigger('click');
    });
    $('body').on('change', '#uservalidid', function (e) {
       
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#valididimage').attr("src",e.target.result);          
        }
        reader.readAsDataURL(this.files[0]);
    });
    $('body').on('click', '.submitdentistedit', function (e) {
        
        
            var dentistid=$(this).data('id');
            var fname=$('#fullname').val();
            var contact=$('#cnum').val();
            var email=$('#Eadd').val();
            var age=$('#age').val();
            var specialty=$('#editspecialtyselect').find(":selected").val();
            var gender=$('#editgenderselect').find(":selected").val()
    
            let cnlength=contact.length;
            if(cnlength == 11){
                functiontag="dentistupdate";
                $.ajax({   
                    type: "POST",
                    url: "server.php",
                    data: {
                        tag:functiontag, 
                        dentist:dentistid,
                        fullname:fname,
                        cnum:contact,
                        Eadd:email,
                        sp:specialty,
                        age:age,
                        gn:gender
                    },
                    success: function(html) {                                
                    if(html=="success"){
                        Swal.fire("Profile Successfully Updated");
                    
                    }else{
                        Swal.fire("failed to update profile");
                    }
                    }
                });
               
            }else{
                Swal.fire('Contact number should only be 11 digits');
            }
    });
    $('body').on('click', '#sendemail', function (e) {  
        var emailadd=$('#exampleFormControlInput1').val();
        var emailsubject=$('#subject').val();
        var emailbody=$('#exampleFormControlTextarea1').val();
        $("#myModalsendemail .close").click();
        functiontag="send";
        $.ajax({   
            type: "POST",
            url: "server.php",
            data: {
                tag:functiontag, 
                email:emailadd,
                subject:emailsubject,
                message:emailbody
            },
            success: function(html) {                                
                if(html == "success"){
                    
                    Swal.fire("Email has been sent");
                    
                }           
            }
        }); 
    });
    $('body').on('click', '#deletepatient', function (e) {  
        var id=$(this).data('id');
        Confirm('Delete personnel record', 'Confirm deletion of personnel record ?', 'Yes', 'Cancel'); 
        $(".doAction").click(function (){
            functiontag="deletepatient";
            $.ajax({   
                type: "POST",
                url: "server.php",
                data: {
                    tag:functiontag, 
                    patientid:id
                },
                success: function(html) {                                
                    if(html == "success"){
                        Swal.fire("Patient record successfully deleted");
                        setTimeout(function(){location.href="staffpatient.php";}, 2000);
                    }           
                }
            }); 
        });
    });
    $('body').on('click', '.submitdentistdelete', function (e) {  
        var id=$(this).data('id');
        Confirm('Delete personnel record', 'Confirm deletion of personnel record ?', 'Yes', 'Cancel'); 
        $(".doAction").click(function (){
            functiontag="deletedentist";
            $.ajax({   
                type: "POST",
                url: "server.php",
                data: {
                    tag:functiontag, 
                    dentistid:id
                },
                success: function(html) {                                
                    if(html == "success"){
                        Swal.fire("Dentist record successfully deleted");
                        setTimeout(function(){location.href="admindentist.php";}, 2000);
                    }else{
                        alert('tst');
                    }       
                }
            }); 
        });
    });
    $('body').on('click', '#setappointmentcontainer #calendar .calendar .days li.available', function (e) { 
        $('#apointmentinputs #time').removeClass('disabled');
        $('.appointmentlistcontainer').empty();
        const dayslist=document.querySelectorAll('#setappointmentcontainer #calendar .calendar .days li');
        dayslist.forEach((ele)=>{
            ele.classList.remove('active');
        });
        $(this).addClass('active');
        var day=$(this).text();
        var date=document.querySelector('#setappointmentcontainer #calendar .current-date').innerHTML;
        const arr=date.split(" ");
        var month=arr[0];
        var year=arr[1];
        var monthnum=monthconvert(month);
       var myselecteddate=year + "-" + monthnum + "-" + day;

       $('.appointmentdateselected').html(myselecteddate);

    });
    $('body').on('click', '#appointmentsviewrecords #calendar .calendar .days li', function (e) {  
            $('.appointmentlistcontainer').empty();
            const dayslist=document.querySelectorAll('#appointmentsviewrecords #calendar .calendar .days li');
            dayslist.forEach((ele)=>{
                ele.classList.remove('active');
            });
            $(this).addClass('active');
            var day=$(this).text();
            var date=document.querySelector('#appointmentsviewrecords #calendar .current-date').innerHTML;
            const arr=date.split(" ");
            var month=arr[0];
            var year=arr[1];
            var monthnum=monthconvert(month);
           var myselecteddate=year + "-" + monthnum + "-" + day;
           functiontag="getappointments";
           $.ajax({   
               type: "POST",
               url: "server.php",
               data: {
                   tag:functiontag, 
                   date:myselecteddate,
                   role:userloggedinrole
               },
               success: function(html) {                
                var json = JSON.parse(html); 
                if(json.length > 0){

                    var $createtable=
                        "<table>"+
                           "<thead>"+    
                                "<th>Time</th>"+
                                "<th>Dentist</th>"+
                                "<th>Status</th>"+
                                "<th>Patient</th>"+
                                "<th>Total</th>"+
                                "<th></th>"+
                            "</thead>"+
                            "<tbody></tbody>"+
                        "</table>";
                        $('.appointmentlistcontainer').append($createtable);
                    json.forEach((item)=>{ 
                        var userid=item['userID'];
                        getpatientname(userid);
                        denname=item['dentistID'];
                        functiontag="getdentistname";
                       
                        $.ajax({         
                            type: "POST",
                            url: "server.php",
                            data: {
                                tag:functiontag, 
                                dentist:denname
                            },
                            success: function(html) {     
                                var convertedtime=converttime(item['time']);
                                    var $content=
                                    "<tr data-id='"+item['userID']+"'>"+ 
                                       
                                        "<td>"+convertedtime+"</td>"+
                                        "<td>"+html+"</td>"+
                                        "<td>"+item['status_name']+"</td>"+
                                        "<td>"+patientname+"</td>"+
                                        "<td> &#8369; "+item['price']+"</td>"+
                                        // "<td class='flex flex-row flex-nowrap' style='gap:10px'><div data-id='"+item['app_id']+"' class='btn btn-primary viewpatientappointment'>View</div><div data-id='"+item['app_id']+"' class='btn btn-cancel cancelpatientappointment'>Cancel</div></td>"+
                                        "<td class='flex flex-row flex-nowrap' style='gap:10px'><div data-id='"+item['app_id']+"' class='btn btn-primary viewpatientappointment'>View</div></td>"+
                                        "</tr>";         
                                $('.appointmentlistcontainer table tbody').append($content);
                            }
                        });                       
                    });
                }else{
                    var $nodata="<img src='images/nodata.png' alt='no data' />"+
                    "<h3>No appointment for this date</h3>";
                    $('.appointmentlistcontainer').append($nodata);
                }
            }
           }); 
            
    });
    $('body').on('click', '.sendemail', function (e) {   
        var email=$(this).parent().parent().find('#email').html();
        $('#myModalsendemail #exampleFormControlInput1').val(email);

    });
    $('body').on('click', '.staffapproveappointment', function (e) {   
        var id=$(this).data('id');
        var patient=$(this).parent().parent().attr('data-id');
        var email=$(this).parent().parent().find('#email').html();
       
        Confirm('Approve appointment', 'Confirm approval of appointment ?', 'Yes', 'Cancel');
        $(".doAction").click(function (){
            functiontag = "approveappointment";
            $.ajax({   
                type: "POST",
                url: "server.php",
                data: {
                    tag:functiontag, 
                    appid:id,
                    patientid:patient,
                    patientemail:email
                },
                success: function(html) {        
                    if(html == "success"){
                        Swal.fire("Appointment has been approved");
                        staffviewallappointments();
                    }    
                }
            }); 
        });
    });
    $('body').on('click', '#appointmentsviewrecords #calendar #prev,#appointmentsviewrecords #calendar #next', function (e) {   
        getappointmentdates(userloggedinrole);
        setcalendar();
        setdatesindicators();   
       
    });
    $('body').on('click', '#setappointmentcontainer #calendar #prev,#setappointmentcontainer #calendar #next', function (e) {   
        setcalendar();
        setdatesindicators();
    });
    
    
    $('body').on('click', '.logout', function (e) { 
        Confirm('Logout', 'Confirm Logout ?', 'Yes', 'Cancel');
        $(".doAction").click(function (){
            functiontag="logout"; 
            $.ajax({   
                type: "POST",
                url: "server.php",
                data: {
                    tag:functiontag, 
                },
                success: function(html) {        
                    window.location.href = "index.php";                            
                }
            }); 
        });
    });
    $('body').on('keyup', 'input[type="search"]', function (e) { 
       $(this).quicksearch("table tbody tr");
    });
    $('body').on('change', '#apointmentinputs #time', function (e) {
        let timevalue=this.value;
        let [hours,minutes]=timevalue.split(':').map(Number);

        if((hours > 17 || (hours === 17 && minutes > 0)) || (hours < 9)){
            Swal.fire('Sorry, we accepts appointments only from 9:00 am to 5:00pm');
            this.value="";
        }
    });
    $('body').on('change', '.appointmentsetup #time', function (e) { 
        occupied =0;
        var time=$(this).val();
        var date=$('.appointmentsetup #date').val();
        functiontag="checkappointmentdate";
        $.ajax({   
            type: "POST",
            url: "server.php",
            data: {
                tag:functiontag,
                appointmentdate:date,
                appointmenttime:time
                
            },
            success: function(html) {    
                if(html == "occupied"){
                    Swal.fire("sorry but your selected date and time already occupied");
                    occupied=1;
                    return false;
                } else{
                    occupied=0;
                    return true;
                }
            }
        })
    });
    $('body').on('change', 'input[type=radio][name=datesorts]', function (e) {
        var value=$(this).val();
        $('#rangecontainer').css('display','none');
        $('#monthrangecontainer').css('display','none');
        $('#weekcontainer').css('display','none');
        if(value == "daily"){
            $('#rangecontainer').css('display','flex');
        }else if(value == "monthly"){
            $('#monthrangecontainer').css('display','flex');
        }else if(value=="weekly"){
            $('#weekcontainer').css('display','flex');
        }
        sortradioselected=value;

    });
    
    $('body').on('click', function (e) {
        if(e.target == document.querySelector('#reportmodal')){
            $('#reportmodal').css('display','none');
        }
    });

    $('body').on('click', '#reportmodal .close', function (e) {
        $('#reportmodal').css('display','none');
    });
     $('body').on('click', '.generatereport', function (e) { 
        $('#reportmodal').css('display','block');
        $('#reportmodal').css('z-index','9999');
        $('#printreport').css('display','none');
        $('.reportstable').empty();
        var selectedservice=$('input[name=servicessorts]:checked').val();
        var selectedsort=$('input[name=datesorts]:checked').val();
        var dailyrangefrom=$('#rangefrom').val();
        var dailyrangeto=$('#rangeto').val();
        var monthrangefrom=$('#monthfrom').val();
        var monthrangeto=$('#monthto').val();
       var weekrange=$('weeksort').val();
       
        if(selectedsort == "daily"){
            functiontag="generatereports";
            if(dailyrangefrom === "" || dailyrangeto === ""){
                Swal.fire('Please select range for days');
            }else{   
                var total=0;
                $.ajax({   
                    type: "POST",
                    url: "server.php",
                    data: {
                        tag:functiontag,
                        serviceselected:selectedservice,
                        rangefromdaily:dailyrangefrom,
                        rangetodaily:dailyrangeto
                    },
                    success: function(html) {
                        var json = JSON.parse(html); 
                        if(json.length > 0){
                            json.forEach((item,index)=>{  
                               var appid=item['app_id'];
                                var user=item['name'];
                                var date=item['date'];
                                var $tablecontent="<div  class='flex flex-row flex-nowrap'><table data-id="+date+">"+
                                "<tr>"+
                                    "<th>Date</th>"+
                                    "<th>Patient</th>"+
                                    "<th>Service</th>"+
                                    "<th>Total</th>"+
                                    "<tr>"+
                                    "</table></div>";
                                    $('.reportstable').append($tablecontent);
                                getservicesfromapp(appid,selectedservice,user,date);
                               // if(url.includes("reports.php")){
                                    $('#printreport').css('display','block');
                              // }  
                            }); 
                        }  
                    }     
                });               
            }
        }else if(selectedsort == "monthly"){
            functiontag="generatereports";
            if(monthrangefrom != "0" && monthrangeto != "0"){
                    $.ajax({   
                        type: "POST",
                        url: "server.php",
                        data: {
                            tag:functiontag,
                            serviceselected:selectedservice,
                            rangefrommonthly:monthrangefrom,
                            rangetomonthly:monthrangeto
                        },
                        success: function(html) {
                            var json = JSON.parse(html); 
                            if(json.length > 0){
                                json.forEach((item,index)=>{ 
                                var appid=item['app_id'];
                                    var user=item['name'];
                                    
                                    var date=item['date'];
                                    const newdate = new Date(date);     
                                    const month = newdate.toLocaleString('default', { month: 'long' });
                                
                                    var $tablecontent="<div class='monthlyview flex flex-row flex-nowrap'><table data-id="+month+">"+
                                    "<tr>"+
                                        "<th>Date Monthly</th>"+
                                        "<th>Patient</th>"+
                                        "<th>Service</th>"+
                                        "<th>Total</th>"+
                                        "<tr>"+
                                        "</table></div>";
                                        $('.reportstable').append($tablecontent);
                                        
                                    monthlygetservicesfromapp(appid,selectedservice,user,date,month,selectedservice);
                                  // if(url.includes("reports.php")){
                                        $('#printreport').css('display','block');
                                    //}
                                }); 
                            }                     
                        }         
                    }); 
            }else{
                Swal.fire('Please select range for Months');
            }
        }else if(selectedsort == "weekly"){
            functiontag="generateweeklyreports";
            $.ajax({   
                type: "POST",
                url: "server.php",
                data: {
                    tag:functiontag,
                    serviceselected:selectedservice,
                },
                success: function(html) {
                    var json = JSON.parse(html); 
                    if(json.length > 0){
                        json.forEach((item,index)=>{ 
                        var appid=item['app_id'];
                            var user=item['name'];
                            
                            var date=item['date'];
                                                
                            var $tablecontent="<div class='monthlyview flex flex-row flex-nowrap'><table>"+
                            "<tr>"+
                                "<th>weekly</th>"+
                                "<th>Patient</th>"+
                                "<th>Service</th>"+
                                "<th>Total</th>"+
                                "<tr>"+
                                "</table></div>";
                                $('.reportstable').append($tablecontent);
                                
                            weeklygetservicesfromapp(appid,selectedservice,user,date);
                           // if(url.includes("reports.php")){
                                $('#printreport').css('display','block');
                            //}
                        }); 
                    }else{
                        Swal.fire('no data');
                    }                   
                }         
            });
        }
     });
    $('body').on('click', '#add_dentist', function (e) { 
        functiontag="adddentist";
        var fullname=$('#fullname').val();
        var username=$('#uname').val();
        var password=$('#pass').val();
        var contactnumber=$('#cnum').val();
        var emailadd=$('#Eadd').val();
        var age=$('#age').val();
        var gender=$('#gn').val();
        var specialty=$('#sp').val();
        var imgid=$('#uservalidid')[0].files;
    
        let cnlength=contactnumber.length;
        if(cnlength != 11){
            Swal.fire('Contact number should only be 11 digits');
        }else{
            var form_data = new FormData();
            form_data.append("tag",functiontag)
            form_data.append("fname",fullname)
            form_data.append("uname",username)
            form_data.append("pass",password)
            form_data.append("cn",contactnumber)
            form_data.append("email",emailadd)
            form_data.append("userage",age)
            form_data.append("usergender",gender)
            form_data.append("userspecialty",specialty)
            form_data.append("img",imgid[0])

            $.ajax({
                type: "POST",
                url: "server.php",
                data: form_data,
                cache:false,
                contentType: false,
                processData: false,
                success: function(html) {  
                    Swal.fire(html);
                    $('#adddentistform')[0].reset();
                    $('#uservalidid').val("");
                    $('#valididimage').attr('src','./images/idicon.png');
                }
            });
        }
        
       
    });
    $('body').on('click', '#add_staff', function (e) { 
        
        functiontag="addstaff";
        var fullname=$('#fullname').val();
        var username=$('#uname').val();
        var password=$('#pass').val();
        var contactnumber=$('#cnum').val();
        var emailadd=$('#Eadd').val();
        var age=$('#age').val();
        var imgid=$('#uservalidid')[0].files;
    
        let cnlength=contactnumber.length;
        if(cnlength != 11){
            Swal.fire('Contact number should only be 11 digits');
        }else{
            var form_data = new FormData();
            form_data.append("tag",functiontag)
            form_data.append("fname",fullname)
            form_data.append("uname",username)
            form_data.append("pass",password)
            form_data.append("cn",contactnumber)
            form_data.append("email",emailadd)
            form_data.append("userage",age)
            form_data.append("img",imgid[0])

            $.ajax({
                type: "POST",
                url: "server.php",
                data: form_data,
                cache:false,
                contentType: false,
                processData: false,
                success: function(html) {  
                    Swal.fire(html);
                    $('#addstaffform')[0].reset();
                    $('#uservalidid').val("");
                    $('#valididimage').attr('src','./images/idicon.png');
                }
            });
        }
       
    });
    $('body').on('click', '#submitrecord', function (e) { 
        var uid=$('input[name=uID]').val();
        var checkboxnumber=$('#checklistmodal .listofchecklist input[type=checkbox]:checked').length;
        var arr=[];
        var toothnumbers=[];
        var toothprocedures=[];

        $('#checklistmodal .listofchecklist input[type=checkbox]:checked').each(function() {
            arr.push($(this).val());
        });

        var tooths=$('#recordtoothnumbers .toothinputholders input');
        var procedures=$('#recordtoothnumbers .toothinputholders textarea');
        $(document.querySelectorAll('#recordtoothnumbers .toothinputholders input')).each(function() {
            if($(this).val() != ""){
                toothnumbers.push($(this).val());
            }
          
        });
        $(document.querySelectorAll('#recordtoothnumbers .toothinputholders textarea')).each(function() {
            if($(this).val() != "" ){
                toothprocedures.push($(this).val());
            }
         });
        
        if((checkboxnumber > 0) && (toothnumbers.length == tooths.length) && (toothprocedures.length == procedures.length)){
            functiontag="saverecord";
            $.ajax({   
                type: "POST",
                url: "server.php",
                data: {
                    tag:functiontag, 
                    items:arr,
                    patientid:uid,
                    tn:toothnumbers,
                    pd:toothprocedures
                },
                success: function(html) {                                
                    if(html == "success"){
                        Swal.fire("Record Saved");
                        $('#checklistmodal .close').trigger('click');
                        arr=[];
                        toothnumbers=[];
                        toothprocedures=[];
                        $('#checklistmodal .listofchecklist input[type=checkbox]').prop("checked", false);
                        var a=document.querySelectorAll('#recordtoothnumbers .toothinputholders');
                        for(var x=1;x<a.length;x++){
                            a[x].remove();
                        }
                        $('#recordtoothnumbers .toothinputholders input').val("");
                        $('#recordtoothnumbers .toothinputholders textarea').val("");
                        location.reload();
                        
                    }
                }
            });

        }else{
            Swal.fire('Please fill all fields necessary')
        }
    });
    $('body').on('click', '#printreport', function (e) { 
        generatePDF();
    });
    $('body').on('click', '#mobilenavburger', function (e) { 
        $('#mobilenav').addClass("shown");
    });
    $('body').on('click', '.closemenu', function (e) { 
        $('#mobilenav').removeClass("shown");
    });
    $('body').on('click', '#addappointmentforpatient', function (e) { 
        let uid=$('input[name="uID"]').val();
        window.location.href="staffsetappointmentforpatient.php?uid=" + uid;
    });
    $('body').on('click', '.donebtn', function (e) { 
        var appid=$(this).data('id');
        functiontag="setasdone";
        $.ajax({   
            type: "POST",
            url: "server.php",
            data: {
                tag:functiontag, 
                appointmentid:appid
            },
            success: function(html) {                                
                location.reload();
            }
        });
    });
    $('body').on('click', '#addtoothnumber', function (e) { 
        $('#checklistmodal .close').click();
        var a=document.querySelectorAll('#tnmodal .toothinputholders');
        for(var x=1;x<a.length;x++){
            a[x].remove();
        }
        $('#tnmodal .toothinputholders input').val("");
        $('#tnmodal .toothinputholders textarea').val("");
    });
    $('body').on('click', '#addtoothnumberfrommodal', function (e) { 
       var toothholders=document.querySelectorAll('#tnmodal .toothinputholders');
       var $content="<div class='toothinputholders flex flex-row'>"+
       "<input type='text' placeholder='Tooth Number'>"+
       "<textarea name='tooth_procedure' id='tooth_procedure' cols='30' rows='10' style='height:50px;' placeholder='Procedure'></textarea>"+
   "</div>";
            $('#tnmodal').append($content);       
    });
    $('body').on('click', '#submittoothnumbers', function (e) { 
        const tninputs=document.querySelectorAll("#tnmodal .toothinputholders");
        $(document.querySelectorAll('#tnmodal .toothinputholders')).each(function() {
            $(this).clone().appendTo('#recordtoothnumbers');
        });
        $('#toothnumbermodal .close').click();
        $('#addrecord').click();
    });
    $("#tnmodal .toothinputholders input").keypress(function (e) {
        var charCode = (e.which) ? e.which : e.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
    });
  
    function checkpatientstatus(){
        functiontag="changepatientstatus"; 
            $.ajax({   
                type: "POST",
                url: "server.php",
                data: {
                    tag:functiontag, 
                },
                success: function(html) {                                
                          
                }
            });
    }
    function getpatientfullname(){
        functiontag="getpatientfullname";
        $.ajax({   
            type: "POST",
            url: "server.php",
            data: {
                tag:functiontag, 
            },
            success: function(html) {                                
               $('#patientsfullname').text(html);          
            }
        }); 
    }
    function validateEmail(email) {
        var emailRegex = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Z|a-z]{2,}$/;
        return emailRegex.test(email);
    }
    function getPatientHistory(){
        var uid=$('input[name="uID"]').val();
        
        var $content="";
        functiontag="getpatienthistory";
        $.ajax({   
            type: "POST",
            url: "server.php",
            data: {
                tag:functiontag,
                patientid:uid   
            },
                success: function(html) {
                    var json = JSON.parse(html); 
                    if(json.length > 0){
                        $content=
                        "<table id='historytable' style='width:100%;text-align:left;'>"+
                            "<tr>"+
                                "<th>Date</th>"+
                                "<th>Time</th>"+
                                "<th>Services</th>"+
                                "<th>Price</th>"+
                                "<th>Doctor</th>"+
                            "<tr>"+
                        "</table>";
                        $('.patienthistorytablecontainer').append($content);
                        json.forEach((item)=>{ 
                            var doctorid=item['dentistID'];
                            var appointmentid=item['app_id'];
                            var doctorname="";
                            $.ajax({ 
                                type: "POST",
                                url: "server.php",
                                data: {
                                    tag:"getdoctorname",
                                    docid:doctorid   
                                },
                                success: function(docname) {
                                    doctorname=docname;
                                }   
                            });
                            $.ajax({   
                                type: "POST",
                                url: "server.php",
                                data: {
                                    tag:"getappointmentservices",
                                    appid:appointmentid   
                                },
                                    success: function(htmlresponse) {
                                        var jsonresponse = JSON.parse(htmlresponse); 
                                        if(jsonresponse.length > 0){
                                            jsonresponse.forEach((servicesresponse)=>{
                                                var convertedtime=converttime(item['time']);    
                                                var $datacontent=
                                                "<tr>"+
                                                    "<td>"+item['date']+"</td>"+
                                                    "<td>"+convertedtime+"</td>"+
                                                    "<td>"+servicesresponse['srv_name']+"</td>"+
                                                    "<td>"+servicesresponse['srv_price']+"</td>"+
                                                    "<td>"+doctorname+"</td>"+
                                                "</tr>";
                    
                                                $('#historytable').append($datacontent);
                                            });
                                        }
                                    }
                                });
                        });
                    }else{
                      $content=
                        "<div>"+
                            "<p>No History</p>"+
                        "</div>";
                        $('.patienthistorytablecontainer').append($content);
                    }
                   
                }
            });
    }
    function getPatientRecords(){
        functiontag="getpatientrecords";

        var uid=$('input[name="uID"]').val();
        var $content="";
        $.ajax({   
            type: "POST",
            url: "server.php",
            data: {
                tag:functiontag,
                patientid:uid   
            },
                success: function(html) {
                    var json = JSON.parse(html); 
                    if(json.length > 0){
                        $content=
                        "<table id='patientrecordtable' style='width:100%;text-align:left;'>"+
                            "<tr>"+
                                "<th>Record number</th>"+
                                "<th>Date</th>"+
                                "<th></th>"+
                              
                            "<tr>"+
                        "</table>";
                        $('.patientrecordcontainer').append($content);
                        json.forEach((item)=>{ 
                            var $datacontent=
                            "<tr>"+
                                "<td>"+item['record_id']+"</td>"+
                                "<td>"+item['date']+"</td>"+
                                "<td> <button id='viewrecord' data-id='"+item['record_id']+"' class='btn btn-primary'><a href='viewrecord.php?recid="+item['record_id']+"' target='_blank'>View</a></button></td>"+
                            "</tr>";

                            $('#patientrecordtable').append($datacontent);
                        });
                    }else{
                      $content=
                        "<div>"+
                            "<p>No Records</p>"+
                        "</div>";
                        $('.patientrecordtable').append($content);
                    }
                   
                }
            });
    }
    function checktotal(){
        const dates=document.querySelectorAll('.reportstable > div');
        if(dates.length > 0){
            for(var x=0;x< dates.length;x++){
                const table= dates[x].querySelector('table');
                const row=table.querySelectorAll('tr:not(:first-child):not(:last-child)');
                total=0;
                if(row.length > 0){
                    row.forEach((el)=>{
                
                 const totalexist=el.querySelector('.pricetotal') !== null;
                 if(totalexist){
                    const totalp=el.querySelector('.pricetotal');
                    var src_price=parseFloat(totalp.innerHTML);
                    total+=src_price;
                 }
                });

                 const totalrow=table.querySelector('tr:last-child');
                const totalpricerow=totalrow.querySelector('.totalhere');
                totalpricerow.innerHTML="&#8369; "+ total;
                }
               
             }
        }     
    }
    function setcalendar(){
       
        if(url.includes('patientsetappointment.php')){
             const calendar=[...document.querySelectorAll('#setappointmentcontainer .calendar .days li')];
             var today=calendar.indexOf(document.querySelector('.today'));
             for(var x=0;x< today;x++){
              calendar[x].classList.add('inactive');
             }   
        }else if(url.includes('staffdashboard.php')){  
            const calendar=[...document.querySelectorAll('#appointmentsviewrecords .calendar .days li')];
             var today=calendar.indexOf(document.querySelector('.today'));
             for(var x=0;x< today;x++){
            //   calendar[x].classList.add('inactive');
            if(!calendar[x].classList.contains('inactive')){
                calendar[x].classList.add('unavailable');
            }
           
             }   
        }else if(url.includes('dentistdashboard.php')){
            const calendar=[...document.querySelectorAll('#appointmentsviewrecords .calendar .days li')];
            var today=calendar.indexOf(document.querySelector('.today'));
            for(var x=0;x< today;x++){
            // calendar[x].classList.add('inactive');
            if(!calendar[x].classList.contains('inactive')){
                calendar[x].classList.add('unavailable');
            }
            }
        }
       
    }
    function dentistsetdatesindicators(){
        var dates="";
        var date="";
     
            dates= document.querySelectorAll('#appointmentsviewrecords .calendar .days li:not(.inactive)');
            date=document.querySelector('#appointmentsviewrecords #calendar .current-date').innerHTML;
      
        const arr=date.split(" ");
        var month=arr[0];
        var year=arr[1];
        var monthnum=monthconvert(month);
    
        dates.forEach((el,index)=>{
            //check for slot availability
            var myselecteddate=year + "-" + monthnum + "-" + el.innerHTML;
            functiontag="getdatesappointmentrecordcount";
            $.ajax({   
             type: "POST",
             url: "server.php",
             data: {
                 tag:functiontag,
                 date:myselecteddate   
             },
                 success: function(html) {
                   if(html == 5){el.classList.add('hasfullslot');}else{el.classList.add('available');}
                   for(var x=0;x<dates.length;x++){
                    var myselecteddate=year + "-" + monthnum + "-" + dates[x].innerHTML;
                    var dt=new Date(myselecteddate);
                   if(dt.getDay() == 0){  
                    dates[x].classList.add('inactive');
                    dates[x].classList.remove('available');
                   }      
                }
                 }
             });
             //check for canceled or pending appointment
                
                functiontag="dentistcheckforpending";
                $.ajax({   
                 type: "POST",
                 url: "server.php",
                 data: {
                     tag:functiontag,
                     date:myselecteddate   
                 },
                     success: function(html) {
                       if(html == 1){
                           el.classList.remove('available');
                           el.classList.add('haspendingcanceled');
                       }
                       for(var x=0;x<dates.length;x++){
                           var myselecteddate=year + "-" + monthnum + "-" + dates[x].innerHTML;
                           var dt=new Date(myselecteddate);
                          if(dt.getDay() == 0){  
                           dates[x].classList.add('inactive');
                           dates[x].classList.remove('available');
                          }     
                       }
                     }
                 });         
        }); 
    }
    function setdatesindicators(){
        var dates="";
        var date="";
        if(url.includes('patientsetappointment.php') || url.includes('staffsetappointmentforpatient.php')){
             dates= document.querySelectorAll('#setappointmentcontainer .calendar .days li:not(.inactive)');
              date=document.querySelector('#setappointmentcontainer #calendar .current-date').innerHTML;
        }else if(url.includes('staffdashboard.php')){
             dates= document.querySelectorAll('#appointmentsviewrecords .calendar .days li:not(.inactive)');
             date=document.querySelector('#appointmentsviewrecords #calendar .current-date').innerHTML;
        }else if(url.includes('dentistdashboard.php')){
            dates= document.querySelectorAll('#appointmentsviewrecords .calendar .days li:not(.inactive)');
            date=document.querySelector('#appointmentsviewrecords #calendar .current-date').innerHTML;
        }
      
        const arr=date.split(" ");
        var month=arr[0];
        var year=arr[1];
        var monthnum=monthconvert(month);
    
        dates.forEach((el,index)=>{
            //check for slot availability
            var myselecteddate=year + "-" + monthnum + "-" + el.innerHTML;
            functiontag="getdatesappointmentrecordcount";
            $.ajax({   
             type: "POST",
             url: "server.php",
             data: {
                 tag:functiontag,
                 date:myselecteddate   
             },
                 success: function(html) {
                   if(html == 5){el.classList.add('hasfullslot');}else{el.classList.add('available');}
                   for(var x=0;x<dates.length;x++){
                    var myselecteddate=year + "-" + monthnum + "-" + dates[x].innerHTML;
                    var dt=new Date(myselecteddate);
                   if(dt.getDay() == 0){  
                    dates[x].classList.add('inactive');
                    dates[x].classList.remove('available');
                   }      
                }
                 }
             });
             //check for canceled or pending appointment
                if(url.includes('patientsetappointment.php')){
                    functiontag="checkdateforpending";
                }else if(url.includes('staffdashboard.php')){
                    functiontag="staffcheckdateforpending";
                }else if(url.includes("dentistdashboard.php")){
                    functiontag="dentistcheckforpending";
                }
                $.ajax({   
                 type: "POST",
                 url: "server.php",
                 data: {
                     tag:functiontag,
                     date:myselecteddate   
                 },
                     success: function(html) {
                       if(html == 1){
                           el.classList.remove('available');
                           el.classList.add('haspendingcanceled');
                       }
                       for(var x=0;x<dates.length;x++){
                           var myselecteddate=year + "-" + monthnum + "-" + dates[x].innerHTML;
                           var dt=new Date(myselecteddate);
                          if(dt.getDay() == 0){  
                           dates[x].classList.add('inactive');
                           dates[x].classList.remove('available');
                          }     
                       }
                     }
                 });         
        }); 
    }
 
    function generateallservices(){
        functiontag="getservices";
        $.ajax({   
             type: "POST",
             url: "server.php",
             data: {
                 tag:functiontag
             },
             success: function(html) {
                 var json = JSON.parse(html); 
                 if(json.length > 0){
                     json.forEach((item,index)=>{ 
                            var $content="<div class='servicesbuttons'>"+
                             "<input type='radio' name='servicessorts' value='"+item['srv_id']+"'>"+
                             "<label for='d'>"+item['srv_name']+"</label>"+
                         "</div>";
                         $('#servicescontainerbuttons').append($content);
                     }); 
                 }
             }
         });
    }
    function weeklygetservicesfromapp(appid,selectedservice,user,date){
        var previousmonth=$('.reportstable .monthlyview:not(:last-child) table').attr('data-id');           
        functiontag = "getallservicesfromid";
        $.ajax({   
            type: "POST",
            url: "server.php",
            data: {
                tag:functiontag,
                apppointmentid:appid,
                service:selectedservice 
            },
            success: function(html) {  
                var total=0;
                var json = JSON.parse(html); 
                if(json.length > 0){
                    json.forEach((item)=>{ 
                    weeklygetservicedetails(item['service_id'],user,date);       
                    });  
                      
                }
                // else{
                //     if($('.reportstable .monthlyview').length > 1){
                //         $('.reportstable .monthlyview:not(:last-child)').remove();     
                //     }  
                // }   
            }
        });   
    }
    function monthlygetservicesfromapp(appid,selectedservice,user,date,month,selectedservice){
        var previousmonth=$('.reportstable .monthlyview:not(:last-child) table').attr('data-id');           
        functiontag = "getallservicesfromid";
        $.ajax({   
            type: "POST",
            url: "server.php",
            data: {
                tag:functiontag,
                apppointmentid:appid,
                service:selectedservice 
            },
            success: function(html) {  
                var total=0;
                var json = JSON.parse(html); 
                if(json.length > 0){
                    json.forEach((item)=>{ 
                    monthlygetservicedetails(item['service_id'],user,date,month,selectedservice);       
                    });  
                      
                }else{
                    if($('.reportstable .monthlyview').length > 1){
                        $('.reportstable .monthlyview:not(:last-child)').remove();     
                    }  
                }   
                if(month==previousmonth){
                    if($('.reportstable .monthlyview').length > 1){
                    $('.reportstable .monthlyview:first-child').remove();
                    }
                }
            }
        });   
    }
   function getservicesfromapp(appid,selectedservice,user,date){
    functiontag = "getallservicesfromid";
    $.ajax({   
        type: "POST",
        url: "server.php",
        data: {
            tag:functiontag,
            apppointmentid:appid,
            service:selectedservice  
        },
        success: function(html) {  
            var total=0;
            var json = JSON.parse(html); 
            if(json.length > 0){
                json.forEach((item)=>{ 
                   getservicedetails(item['service_id'],user,date,selectedservice);       
                });           
            }
            //else{
                // if(('.reportstable > div').length > 1){
                //     $('.reportstable > div:not(:last-child)').remove(); 
                // }
               
            //} 
        }
    });  
   }
   function weeklygetservicedetails(serviceid,user,date){
    
    functiontag="getservicesdetails";
    var newdate=date;
    $.ajax({   
        type: "POST",
        url: "server.php",
        data: {
            tag:functiontag,
            service:serviceid
        },
        success: function(html) {  
            var total=0;
            price=0;
                var json = JSON.parse(html); 
                if(json.length > 0){ 
                    json.forEach((item)=>{ 
                            price=parseFloat(item['srv_price']);
                            var $content="<tr>"+
                            "<td>"+date+"</td>"+
                            "<td>"+user+"</td>"+
                            "<td>"+item['srv_name']+"</td>"+
                            "<td class='pricetotal'>"+item['srv_price']+"</td>"+
                        "</tr>";
                        $('.reportstable table').append($content);     
                        total += price;
                    });  
                       
                }          
            
                var parentelementattr="";
                const dates=document.querySelectorAll('.reportstable table tr:not(:first-child):not(:last-child)');
                dates.forEach((el)=>{
               
                var row=el.getAttribute('data-id');
                var parentdate=el.parentElement.parentElement.getAttribute('data-id');
                parentelementattr=parentdate;
                if(row != parentdate){
                    el.remove();
                    
                }
                });
               
                        
                var $footer = "<tr class='totalcontainer'>"+
                        "<td></td>"+
                        "<td></td>"+
                        "<td></td>"+
                        "<td class='totalhere'></td>"+
                        "</tr>";
                        $('.reportstable table').append($footer);     



                       
                }
    });

     
}
   function monthlygetservicedetails(serviceid,user,date,month,selectedservice){
    
    functiontag="getservicesdetails";
    var newdate=date;
    $.ajax({   
        type: "POST",
        url: "server.php",
        data: {
            tag:functiontag,
            service:serviceid
        },
        success: function(html) {  
            var total=0;
            price=0;
                var json = JSON.parse(html); 
                if(json.length > 0){ 
                    json.forEach((item)=>{ 
                            price=parseFloat(item['srv_price']);
                            var $content="<tr data-id="+month+">"+
                            "<td>"+date+"</td>"+
                            "<td>"+user+"</td>"+
                            "<td>"+item['srv_name']+"</td>"+
                            "<td class='pricetotal'>"+item['srv_price']+"</td>"+
                        "</tr>";
                        $('.reportstable table').append($content);     
                        total += price;
                    });  
                       
                }          
            
              if(selectedservice == 0){
                  var parentelementattr="";
                const dates=document.querySelectorAll('.reportstable table tr:not(:first-child)');
                dates.forEach((el)=>{
               
                var row=el.getAttribute('data-id');
                var parentdate=el.parentElement.parentElement.getAttribute('data-id');
                parentelementattr=parentdate;
                if(row != parentdate){
                    el.remove();  
                }
                });
              }
               
                        
                var $footer = "<tr class='totalcontainer'>"+
                        "<td></td>"+
                        "<td></td>"+
                        "<td></td>"+
                        "<td class='totalhere'></td>"+
                        "</tr>";
                        $('.reportstable table').append($footer);     



                       
                }
    });

     
}
    function generatePDF() {
        
        const element = document.getElementById('generatedreport');
       
        html2pdf().from(element).save();
    }
    function printrecordPDF(){
        const element = document.getElementById('record-holders');
       
        html2pdf().from(element).save();
    }

   function getservicedetails(serviceid,user,date,serviceselected){
        functiontag="getservicesdetails";
        var newdate=date;
        $.ajax({   
            type: "POST",
            url: "server.php",
            data: {
                tag:functiontag,
                service:serviceid
            },
            success: function(html) {  
                    var total=0;
                    var json = JSON.parse(html); 
                    if(json.length > 0){
                        json.forEach((item)=>{ 
                                var $content="<tr data-id="+date+" class='datarow'>"+
                                "<td>"+date+"</td>"+
                                "<td>"+user+"</td>"+
                                "<td>"+item['srv_name']+"</td>"+
                                "<td class='pricetotal'>"+item['srv_price']+"</td>"+
                            "</tr>";
                            $('.reportstable table').append($content);     
                            total += parseFloat(item['srv_price']);

                        });       
                    }  
                    
                 
                                var parentelementattr="";
                                const dates=document.querySelectorAll('.reportstable table tr:not(:first-child)');
                                dates.forEach((el)=>{
                                    var row=el.getAttribute('data-id');
                                    var parentdate=el.parentElement.parentElement.getAttribute('data-id');
                                    parentelementattr=parentdate;
                                    if(row != parentdate){
                                            el.remove();       
                                    }  

                       
                                });
                                
                               
                           

                              
    
                       
                          
                            var $footer = "<tr class='totalcontainer'>"+
                            "<td></td>"+
                            "<td></td>"+
                            "<td></td>"+
                            "<td class='totalhere'>&#8369; "+total+"</td>"+
                            "</tr>";
                            $('.reportstable table').append($footer); 
                            


                                 const tabledates=document.querySelectorAll('.reportstable > div > table');
    
                                tabledates.forEach((el)=>{
                                  var rows=el.querySelectorAll('tr');
                                    if(rows.length < 3){
                                        el.remove();
                                    }
                                }); 
                                
                          


                        }
        });
   }
  
   function UpdateCredentials(currentusername,newusername,currentpassword,newpassword){
            functiontag="savecredentials";
            
                if(currentusername.value != ""){
                    $.ajax({   
                    type: "POST",
                    url: "server.php",
                    data: {
                        tag:functiontag,
                        curuname:currentusername.value,
                        newuname:newusername.value,
                        curpass:currentpassword.value,
                        newpass:newpassword.value  
                    },
                    success: function(html) {  
                        Swal.fire(html); 
                        if((html == "Username and Password Successfully Changed")|| (html == "Password Successfully Changed")){
                            ResetChangepasswordform();
                        } 
                    }
                    });
                }else{
                   
                    $.ajax({   
                        type: "POST",
                        url: "server.php",
                        data: {
                            tag:functiontag,
                            curpass:currentpassword.value,
                            newpass:newpassword.value
                            
                        },
                        success: function(html) {  
                            Swal.fire(html);  
                            if((html == "Username and Password Successfully Changed")|| (html == "Password Successfully Changed")){
                                ResetChangepasswordform();
                            } 
                        }
                    });
                }      
    }
    function ResetChangepasswordform(){
        var usercurrentusername=document.getElementById('currentusername');
        var usernewusername=document.getElementById('newusername');
        var usercurrentpassword=document.getElementById('currentpassword');
        var usernewpassword=document.getElementById('newpassword');
        var userconfirmpassword=document.getElementById('confirmnewpassword');
        usercurrentusername.value="";
        usernewusername.value="";
        usercurrentpassword.value="";
        usernewpassword.value="";
        userconfirmpassword.value="";
        $('.passwordinputs .passtooltiptext').css('display','none');
    }
    function dentistviewallappointments(){
        $('#allappointments').empty();
        var loggedinrole="dentist";
        functiontag="getallappointments";
        $.ajax({   
            type: "POST",
            url: "server.php",
            data: {
                tag:functiontag,
                role:loggedinrole
                
            },
            success: function(html) {                
             var json = JSON.parse(html); 
             if(json.length > 0){
                 var $createtable=
                     "<table style='width:100%;text-align:left;'>"+
                        "<thead>"+    
                             "<th>Time</th>"+
                             "<th>Dentist</th>"+
                             "<th>Status</th>"+
                             "<th>Patient</th>"+
                             "<th class='hidden'></th>"+
                             "<th>Total</th>"+
                             "<th></th>"+
                         "</thead>"+
                         "<tbody></tbody>"+
                     "</table>";
                     $('#allappointments').append($createtable);
                 json.forEach((item)=>{ 
                     var userid=item['userID'];
                     getpatientname(userid);
                     getpatientemail(userid);
                     denname=item['dentistID'];
                     functiontag="getdentistname";
                    
                     $.ajax({         
                         type: "POST",
                         url: "server.php",
                         data: {
                             tag:functiontag, 
                             dentist:denname
                         },
                         success: function(html) { 
                            var convertedtime=converttime(item['time']);    
                            // var $content=
                            // "<tr data-id='"+item['userID']+"'>"+
                            //     "<td>"+convertedtime+"</td>"+
                            //     "<td>"+html+"</td>"+
                            //     "<td>"+item['status_name']+"</td>"+
                            //     "<td>"+patientname+"</td>"+
                            //     "<td id='email' class='hidden'>"+patientemail+"</td>"+
                            //     "<td> &#8369; "+item['price']+"</td>"+
                            //     "<td class='flex flex-row flex-nowrap' style='gap:10px'><div data-id='"+item['app_id']+"' class='btn btn-primary viewpatientappointment'>View</div></td>"+
                            // "</tr>";   
                            
                            
                            if(item['statusID'] == 4){
                                var $content=
                                "<tr data-id='"+item['userID']+"'>"+    
                                    "<td>"+convertedtime+"</td>"+
                                    "<td>"+html+"</td>"+
                                    "<td>"+item['status_name']+"</td>"+
                                    "<td>"+patientname+"</td>"+
                                    "<td id='email' class='hidden'>"+patientemail+"</td>"+
                                    "<td> &#8369; "+item['price']+"</td>"+
                                    "<td class='flex flex-row flex-nowrap' style='gap:10px'><div data-id='"+item['app_id']+"' class='btn btn-primary viewpatientappointment'>View</div><div data-id='"+item['app_id']+"' class='btn btn-cancel cancelpatientappointment'>Cancel</div></td>"+
                                "</tr>";
                            }else if(item['statusID'] == 5){
                                var $content=
                                "<tr data-id='"+item['userID']+"'>"+
                                    "<td>"+convertedtime+"</td>"+
                                    "<td>"+html+"</td>"+
                                    "<td>"+item['status_name']+"</td>"+
                                    "<td>"+patientname+"</td>"+
                                    "<td id='email' class='hidden'>"+patientemail+"</td>"+
                                    "<td> &#8369; "+item['price']+"</td>"+
                                    "<td class='flex flex-row flex-nowrap' style='gap:10px'><div data-id='"+item['app_id']+"' class='btn btn-primary viewpatientappointment'>View</div></td>"+
                                "</tr>";
                            }else if(item['statusID'] == 3){
                               var $content=
                               "<tr data-id='"+item['userID']+"'>"+
                                   "<td>"+convertedtime+"</td>"+
                                   "<td>"+html+"</td>"+
                                   "<td>"+item['status_name']+"</td>"+
                                   "<td>"+patientname+"</td>"+
                                   "<td id='email' class='hidden'>"+patientemail+"</td>"+
                                   "<td> &#8369; "+item['price']+"</td>"+
                                   "<td class='flex flex-row flex-nowrap' style='gap:10px'><div data-id='"+item['app_id']+"' class='btn btn-primary viewpatientappointment'>View</div><div data-id='"+item['app_id']+"' class='btn btn-primary staffapproveappointment'>Approve</div></td>"+
                               "</tr>";
                            }  
                             $('#allappointments table tbody').append($content);
                         }
                     });                       
                 });
             }else{
                 var $nodata="<img src='images/nodata.png' alt='no data' />"+
                 "<h3>No appointment for this date</h3>";
                 $('#allappointments').append($nodata);
             }
         }
        }); 
    }
    function staffviewallappointments(){
        $('#allappointments').empty();
        functiontag="getallappointments";
        $.ajax({   
            type: "POST",
            url: "server.php",
            data: {
                tag:functiontag
                
            },
            success: function(html) {                
             var json = JSON.parse(html); 
             if(json.length > 0){
                 var $createtable=
                     "<table style='width:100%;'>"+
                        "<thead>"+    
                             "<th>Time</th>"+
                             "<th>Dentist</th>"+
                             "<th>Status</th>"+
                             "<th>Patient</th>"+
                             "<th class='hidden'></th>"+
                             "<th>Total</th>"+
                             "<th></th>"+
                         "</thead>"+
                         "<tbody></tbody>"+
                     "</table>";
                     $('#allappointments').append($createtable);
                 json.forEach((item)=>{ 
                     var userid=item['userID'];
                     getpatientname(userid);
                     getpatientemail(userid);
                     denname=item['dentistID'];
                     functiontag="getdentistname";
                    
                     $.ajax({         
                         type: "POST",
                         url: "server.php",
                         data: {
                             tag:functiontag, 
                             dentist:denname
                         },
                         success: function(html) {   
                            var convertedtime=converttime(item['time']);  
                             if(item['statusID'] == 4){
                                 var $content=
                                 "<tr data-id='"+item['userID']+"'>"+    
                                     "<td>"+convertedtime+"</td>"+
                                     "<td>"+html+"</td>"+
                                     "<td>"+item['status_name']+"</td>"+
                                     "<td>"+patientname+"</td>"+
                                     "<td id='email' class='hidden'>"+patientemail+"</td>"+
                                     "<td> &#8369; "+item['price']+"</td>"+
                                     "<td class='flex flex-row flex-nowrap' style='gap:10px'><div data-id='"+item['app_id']+"' class='btn btn-primary viewpatientappointment'>View</div><div data-id='"+item['app_id']+"' class='btn btn-cancel cancelpatientappointment'>Cancel</div></td>"+
                                 "</tr>";
                             }else if(item['statusID'] == 5){
                                 var $content=
                                 "<tr data-id='"+item['userID']+"'>"+
                                     "<td>"+convertedtime+"</td>"+
                                     "<td>"+html+"</td>"+
                                     "<td>"+item['status_name']+"</td>"+
                                     "<td>"+patientname+"</td>"+
                                     "<td id='email' class='hidden'>"+patientemail+"</td>"+
                                     "<td> &#8369; "+item['price']+"</td>"+
                                     "<td class='flex flex-row flex-nowrap' style='gap:10px'><div data-id='"+item['app_id']+"' class='btn btn-primary viewpatientappointment'>View</div></td>"+
                                 "</tr>";
                             }else if(item['statusID'] == 3){
                                var $content=
                                "<tr data-id='"+item['userID']+"'>"+
                                    "<td>"+convertedtime+"</td>"+
                                    "<td>"+html+"</td>"+
                                    "<td>"+item['status_name']+"</td>"+
                                    "<td>"+patientname+"</td>"+
                                    "<td id='email' class='hidden'>"+patientemail+"</td>"+
                                    "<td> &#8369; "+item['price']+"</td>"+
                                    "<td class='flex flex-row flex-nowrap' style='gap:10px'><div data-id='"+item['app_id']+"' class='btn btn-primary viewpatientappointment'>View</div><div data-id='"+item['app_id']+"' class='btn btn-primary staffapproveappointment'>Approve</div></td>"+
                                "</tr>";
                             }         
                             $('#allappointments table tbody').append($content);
                         }
                     });                       
                 });
             }else{
                 var $nodata="<img src='images/nodata.png' alt='no data' />"+
                 "<h3>No appointment for this date</h3>";
                 $('#allappointments').append($nodata);
             }
         }
        }); 
    }
    function getappointmentdates(loggedinrole){
        const dates=document.querySelectorAll('#appointmentsviewrecords #calendar .calendar .days li:not(.inactive)');
        dates.forEach((el)=>{
            
            var day=el.innerHTML;
            var date=document.querySelector('#appointmentsviewrecords #calendar .current-date').innerHTML;
            const arr=date.split(" ");
            var month=arr[0];
            var year=arr[1];
            var monthnum=monthconvert(month);
           var myselecteddate=year + "-" + monthnum + "-" + day;
        
           functiontag="checkdateforappointment";
           $.ajax({   
                type: "POST",
                url: "server.php",
                data: {
                    tag:functiontag, 
                    date:myselecteddate,
                    role:loggedinrole
                },
                success: function(html) {   
                    if(html > 0){
                        el.classList.add('hasappointment');
                    }
                }
            });
        });   
    }
    function viewallappointmentsforstaff(loggedinrole){
        $('.appointmentlistcontainer').empty();
        var currdate=$('#appointmentsviewrecords #calendar .calendar .days li.active');
        var day=currdate.html();
         var date=document.querySelector('#appointmentsviewrecords #calendar .current-date').innerHTML;
      
        const arr=date.split(" ");
        var month=arr[0];
        var year=arr[1];
        var monthnum=monthconvert(month);
       var myselecteddate=year + "-" + monthnum + "-" + day;
    //    functiontag="getappointments";
        functiontag="getallappointments";
       $.ajax({   
           type: "POST",
           url: "server.php",
           data: {
               tag:functiontag, 
            //    date:myselecteddate,
              //  role:loggedinrole
           },
           success: function(html) {                
            var json = JSON.parse(html); 
            if(json.length > 0){

                var $createtable=
                    "<table>"+
                       "<thead>"+ 
                            "<th>Date</th>"+
                            "<th>Time</th>"+
                            "<th>Dentist</th>"+
                            "<th>Status</th>"+
                            "<th>Patient</th>"+
                            "<th>Total</th>"+
                            "<th></th>"+
                        "</thead>"+
                        "<tbody></tbody>"+
                    "</table>";
                    $('.appointmentlistcontainer').append($createtable);
                json.forEach((item)=>{ 
                    var userid=item['userID'];
                    getpatientname(userid);
                    denname=item['dentistID'];
                    functiontag="getdentistname";
                   
                    $.ajax({         
                        type: "POST",
                        url: "server.php",
                        data: {
                            tag:functiontag, 
                            dentist:denname
                        },
                        success: function(html) {     
                                var convertedtime=converttime(item['time']);
                                var $content=
                                "<tr data-id='"+item['userID']+"'>"+ 
                                    "<td>"+item['date']+"</td>"+
                                    "<td>"+convertedtime+"</td>"+
                                    "<td>"+html+"</td>"+
                                    "<td>"+item['status_name']+"</td>"+
                                    "<td>"+patientname+"</td>"+
                                    "<td> &#8369; "+item['price']+"</td>"+
                                    // "<td class='flex flex-row flex-nowrap' style='gap:10px'><div data-id='"+item['app_id']+"' class='btn btn-primary viewpatientappointment'>View</div><div data-id='"+item['app_id']+"' class='btn btn-cancel cancelpatientappointment'>Cancel</div></td>"+
                                    "<td class='flex flex-row flex-nowrap' style='gap:10px'><div data-id='"+item['app_id']+"' class='btn btn-primary viewpatientappointment'>View</div></td>"+
                                "</tr>";
                                    
                            $('.appointmentlistcontainer table tbody').append($content);
                        }
                    });                       
                });
            }else{
                var $nodata="<img src='images/nodata.png' alt='no data' />"
                +"<h3>No appointment for this date</h3>";
                $('.appointmentlistcontainer').append($nodata);
            }
        }
       }); 
    }
    function viewallappointmentsfordentist(loggedinrole){
        $('.appointmentlistcontainer').empty();
        var currdate=$('#appointmentsviewrecords #calendar .calendar .days li.active');
        var day=currdate.html();
         var date=document.querySelector('#appointmentsviewrecords #calendar .current-date').innerHTML;
      
        const arr=date.split(" ");
        var month=arr[0];
        var year=arr[1];
        var monthnum=monthconvert(month);
       var myselecteddate=year + "-" + monthnum + "-" + day;
    //    functiontag="getappointments";
        functiontag="getallappointments";
       $.ajax({   
           type: "POST",
           url: "server.php",
           data: {
               tag:functiontag, 
            //    date:myselecteddate,
                role:loggedinrole
           },
           success: function(html) {                
            var json = JSON.parse(html); 
            if(json.length > 0){

                var $createtable=
                    "<table>"+
                       "<thead>"+ 
                       "<th>Date</th>"+
                            "<th>Time</th>"+
                            "<th>Dentist</th>"+
                            "<th>Status</th>"+
                            "<th>Patient</th>"+
                            "<th>Total</th>"+
                            "<th></th>"+
                        "</thead>"+
                        "<tbody></tbody>"+
                    "</table>";
                    $('.appointmentlistcontainer').append($createtable);
                json.forEach((item)=>{ 
                    var userid=item['userID'];
                    getpatientname(userid);
                    denname=item['dentistID'];
                    functiontag="getdentistname";
                   
                    $.ajax({         
                        type: "POST",
                        url: "server.php",
                        data: {
                            tag:functiontag, 
                            dentist:denname
                        },
                        success: function(html) {     
                                var convertedtime=converttime(item['time']);
                                var $content=
                                "<tr data-id='"+item['userID']+"'>"+ 
                                    "<td>"+item['date']+"</td>"+
                                    "<td>"+convertedtime+"</td>"+
                                    "<td>"+html+"</td>"+
                                    "<td>"+item['status_name']+"</td>"+
                                    "<td>"+patientname+"</td>"+
                                    "<td> &#8369; "+item['price']+"</td>"+
                                    // "<td class='flex flex-row flex-nowrap' style='gap:10px'><div data-id='"+item['app_id']+"' class='btn btn-primary viewpatientappointment'>View</div><div data-id='"+item['app_id']+"' class='btn btn-cancel cancelpatientappointment'>Cancel</div></td>"+
                                    "<td class='flex flex-row flex-nowrap' style='gap:10px'><div data-id='"+item['app_id']+"' class='btn btn-primary viewpatientappointment'>View</div></td>"+
                                "</tr>";
                                    
                            $('.appointmentlistcontainer table tbody').append($content);
                        }
                    });                       
                });
            }else{
                var $nodata="<img src='images/nodata.png' alt='no data' />"
                +"<h3>No appointment for this date</h3>";
                $('.appointmentlistcontainer').append($nodata);
            }
        }
       }); 
    }
    function getpatientname(userid){
        functiontag="getpatientname";
        $.ajax({   
            type: "POST",
            url: "server.php",
            data: {
                tag:functiontag, 
                uid:userid
            },
            success: function(html) {            
                patientname=html;
            }
        });
    }
    
    function getpatientemail(userid){
        functiontag="getpatientemail";
        $.ajax({   
            type: "POST",
            url: "server.php",
            data: {
                tag:functiontag, 
                uid:userid
            },
            success: function(html) {            
                patientemail=html;
            }
        });
    }
    function monthconvert(month){
        var monthnum=0;
        if(month.toLowerCase()== "january"){
            monthnum=1;
        }else if(month.toLowerCase()== "february"){
            monthnum=2;
        }else if(month.toLowerCase()== "march"){
            monthnum=3;
        }else if(month.toLowerCase()== "april"){
            monthnum=4;
        }else if(month.toLowerCase()== "may"){
            monthnum=5;
        }else if(month.toLowerCase()== "june"){
            monthnum=6;
        }else if(month.toLowerCase()== "july"){
            monthnum=7;
        }else if(month.toLowerCase()== "august"){
            monthnum=8;
        }else if(month.toLowerCase()== "september"){
            monthnum=9;
        }else if(month.toLowerCase()== "october"){
            monthnum=10;
        }else if(month.toLowerCase()== "november"){
            monthnum=11;
        }else if(month.toLowerCase()== "december"){
            monthnum=12;
        }
        return monthnum;
    }
    function retrievealldentist(){
        functiontag="retrievealldentist";
        $.ajax({         
            type: "POST",
            url: "server.php",
            data: {
                tag:functiontag, 
            },
            success: function(html) {  
                var json = JSON.parse(html); 
                if(json.length > 0){
                    json.forEach((item)=>{ 
                        var $dentistlist=
                        "<tr>"+
                             "<td>"+item['den_fname']+"</td>"+
                             "<td>"+item['den_emailAdd']+"</td>"+
                             "<td>"+item['den_cnum']+"</td>"+
                             "<td>"+item['sp_name']+"</td>"+
                             "<td><a href='admineditdentist.php? denlog_id="+item['denlog_id']+"' class='button-edit editdentist' data-id='"+item['denlog_id']+"' id='button-edit'></a>"+
                                // "<a href='admindeletedentist.php? denlog_id="+item['denlog_id']+"' class='button-delete deletedentist' data-id='"+item['denlog_id']+"' id='button-delete'></a>"+
                             "</td>"+
                         "</tr>";
                         $('.dentistlist table tbody').append($dentistlist);
                    });
                }
             
            }
        });
    }
    function retrievedentistcount(){
        functiontag="getdentistcount";
        $.ajax({         
            type: "POST",
            url: "server.php",
            data: {
                tag:functiontag, 
            },
            success: function(html) {     
               $('.dentistnumber').html(html);    
            }
        });
    }
    function retrievestaffcount(){
        functiontag="getstaffcount";
        $.ajax({         
            type: "POST",
            url: "server.php",
            data: {
                tag:functiontag, 
            },
            success: function(html) {     
                $('.staffnumber').html(html);       
            }
        });
    }
   
    function viewappointmentmodal(appid,date,time,dentist,status,total){
        var $content =
                "<div class='dialog-ovelay'>" +
                    "<div id='viewappointmentmodal' class='dialog'><header>" +
                    " <h3> Appointment ID: "+appid+" </h3> " +
                    "<a class='confirm-close'></a>" +
                "</header>" +
                "<div class='dialog-msg'>" +
                    " <p> Appointment Status: "+status+" </p> " +
                    " <p> Appointment Date: "+date+" </p> " +
                    " <p> Appointment Time: "+time+" </p> " +
                    " <p> Dentist Assigned: "+dentist+" </p> " +
                    " <p> Total: &#8369; "+total+" </p> " +

                    "<div id='viewservicescontainer' class='flex flex-col'>"+
                        "<p>Service(s)</p>"+
                        "<table id='servicestable'>"+
                            "<tr>"+
                                "<th>Service</th>"+
                                "<th>Price</th>"+
                            "</tr>"+
                        "</table>"+
                    "</div>"+
                "</div>" +
                "<footer>" +
                    "<div class='controls flex flex-row flex-nowrap' style='gap:20px'>" +  
                      
                        " <button class='button btn-cancel cancelAction'>Close</button> " +
                        "<button data-id=" + appid + " class='button btn-primary donebtn'>Done</button>"+
                    "</div>" +
                "</footer>" +
            "</div>" +
            "</div>";
            $('body').prepend($content);
            if(status != 'approve'){
                $('.donebtn').css('display','none');
            }

            functiontag="getservicesappointed";
            $.ajax({         
                type: "POST",
                url: "server.php",
                data: {
                    tag:functiontag, 
                    selectedappid:appid
                },
                success: function(html) {     
                    var json = JSON.parse(html); 
                    if(json.length > 0){
                        json.forEach((item)=>{ 
                           var $serviceslist=
                           "<tr>"+
                                "<td>"+item['srv_name']+"</td>"+
                                "<td>"+item['srv_price']+"</td>"+
                           "</tr>";
                           $('#servicestable').append($serviceslist);
                        });      
                    }
                }
            });  

        $('.cancelAction, .confirm-close').click(function () {
            $(this).parents('.dialog-ovelay').fadeOut(500, function () {
            $(this).remove();
            });
        });   
    }
    function Confirm(title, msg, $true, $false) { /*change*/
        var $content =  "<div class='dialog-ovelay'>" +
                        "<div class='dialog'><header>" +
                        " <h3> " + title + " </h3> " +
                        "<a class='confirm-close'></a>" +
                    "</header>" +
                    "<div class='dialog-msg'>" +
                        " <p> " + msg + " </p> " +
                    "</div>" +
                    "<footer>" +
                        "<div class='controls flex flex-row flex-nowrap' style='gap:20px'>" +
                            " <button class='button btn-primary doAction'>" + $true + "</button> " +
                            " <button class='button btn-cancel cancelAction'>" + $false + "</button> " +
                        "</div>" +
                    "</footer>" +
                "</div>" +
                "</div>";
            $('body').prepend($content);
        $('.doAction').click(function () {
            $(this).parents('.dialog-ovelay').fadeOut(500, function () {
            $(this).remove();
            });
        });
        $('.cancelAction, .confirm-close').click(function () {
            $(this).parents('.dialog-ovelay').fadeOut(500, function () {
            $(this).remove();
            });
        });    
    }
    
    function retrievemyappointments(){
        functiontag="retrievemyappointments";
        $.ajax({         
            type: "POST",
            url: "server.php",
            data: {
                tag:functiontag 
            },
            success: function(html) {
                                
                var json = JSON.parse(html); 
                if(json.length > 0){
                    json.forEach((item)=>{ 
                        denname=item['dentistID'];
                        functiontag="getdentistname";
                       
                        $.ajax({         
                            type: "POST",
                            url: "server.php",
                            data: {
                                tag:functiontag, 
                                dentist:denname
                            },
                            success: function(html) {  
                                
                                var convertedtime=converttime(item['time']);
                                if(item['statusID'] !=5){
                                    var $content=
                                    "<tr data-id='"+item['app_id']+"'>"+
                                        "<td>"+item['date']+"</td>"+
                                        "<td>"+convertedtime+"</td>"+
                                        "<td>"+item['status_name']+"</td>"+                
                                        "<td>"+html+"</td>"+
                                        "<td> &#8369; "+item['price']+"</td>"+
                                        "<td class='flex flex-row flex-nowrap' style='gap:10px'><div data-id='"+item['app_id']+"' class='btn btn-primary viewappointment'>View</div><div data-id='"+item['app_id']+"' class='btn btn-cancel cancelappointment'>Cancel</div></td>"+
                                    "</tr>";
                                }else{
                                    var $content=
                                    "<tr data-id='"+item['app_id']+"'>"+
                                        "<td>"+item['date']+"</td>"+
                                        "<td>"+convertedtime+"</td>"+
                                        "<td>"+item['status_name']+"</td>"+                
                                        "<td>"+html+"</td>"+
                                        "<td> &#8369; "+item['price']+"</td>"+
                                        "<td class='flex flex-row flex-nowrap' style='gap:10px'><div data-id='"+item['app_id']+"' class='btn btn-primary viewappointment'>View</div></td>"+
                                    "</tr>";
                                }           
                                $('#myappointmentscontainer #myappointments').append($content);
                            }
                        });                       
                    });
                }
            }
        });
    }
    function converttime(time){
        time = time.toString().match(/^([01]\d|2[0-3])(:)([0-5]\d)(:[0-5]\d)?$/) || [time];
        if (time.length > 1) { 
        time = time.slice(1); 
        time[5] = +time[0] < 12 ? ' AM' : ' PM'; 
        time[0] = +time[0] % 12 || 12; 
        }
        return time.join('');
    }
  
    function getServices(){
        functiontag="getservices";
        $.ajax({         
            type: "POST",
            url: "server.php",
            data: {
                tag:functiontag, 
            },
            success: function(html) {                                
                var json = JSON.parse(html); 
                if(json.length > 0){
                    json.forEach((item)=>{ 
                       var $content="<div class='flex flex-row'>"+
                       "<input data-id='"+item['srv_id']+"' type='checkbox'>"+
                       "<p>"+item['srv_name']+"</p>"+
                       "<p>( &#8369; </p><p class='servicesprice'>"+item['srv_price']+"</p><p>)</p>"+
                       "</div";
                       $('.servicesoptions').append($content);
                    });
                }
            }
        });  
    }
    function getDentist(){
        functiontag="getdentist";
        $.ajax({         
            type: "POST",
            url: "server.php",
            data: {
                tag:functiontag, 
            },
            success: function(html) {                                
                var json = JSON.parse(html); 
                if(json.length > 0){
                    json.forEach((item)=>{ 
                       $('.appointmentsetup #dentist').append('<option value='+ item['denlog_id'] +'>'+item['den_fname']+'</option>');
                       });
                }
            }
        });  
    }
    function savemydentistprofile(){
        functiontag="updatemystaffprofile";
        var fname=$('.profileedit #fullname').val();
        var email=$('.profileedit #email').val();
        var number=$('.profileedit #phone').val();
        var staffage=$('.profileedit #age').val();

        let cnlength=number.length;
        if(cnlength != 11){
            Swal.fire('Contact number should be 11 digits');
        }else{
        $.ajax({         
            type: "POST",
            url: "server.php",
            data: {
                tag:functiontag, 
                uname:fname,
                uemail:email,
                unum:number,
                age:staffage
            },
            success: function(html) {                                
               if(html == "success"){
                    $('.profileupdateindicator').addClass("successindicator");
                    retrievedentistprofile();
               }
            }
        });
    }
    }
    function savemystaffprofile(){
        functiontag="updatemystaffprofile";
        var fname=$('.profileedit #fullname').val();
        var email=$('.profileedit #email').val();
        var number=$('.profileedit #phone').val();
        var staffage=$('.profileedit #age').val();

        let cnlength=number.length;
        if(cnlength != 11){
            Swal.fire('Contact number should be 11 digits');
        }else{
        $.ajax({         
            type: "POST",
            url: "server.php",
            data: {
                tag:functiontag, 
                uname:fname,
                uemail:email,
                unum:number,
                age:staffage
            },
            success: function(html) {                                
               if(html == "success"){
                    $('.profileupdateindicator').addClass("successindicator");
                    retrievestaffprofile();
               }
            }
        });
    }
    }
    function savemyadminprofile(){
        functiontag="updatemyadminprofile";
        var fname=$('.profileedit #fullname').val();
        var email=$('.profileedit #email').val();
        var number=$('.profileedit #phone').val();

        let cnlength=number.length;
        if(cnlength != 11){
            Swal.fire('Contact number should be 11 digits');
        }else{
            $.ajax({         
                type: "POST",
                url: "server.php",
                data: {
                    tag:functiontag, 
                    uname:fname,
                    uemail:email,
                    unum:number
                },
                success: function(html) {                                
                if(html == "success"){
                        $('.profileupdateindicator').addClass("successindicator");
                        retrieveadminprofile();
                }
                }
            });
        }
    }
    function savemyprofile(){
        functiontag="updatemyprofile";
        var fname=$('.profileedit #fullname').val();
        var email=$('.profileedit #email').val();
        var number=$('.profileedit #phone').val();
        let cnlength=number.length;
        if(cnlength != 11){
            Swal.fire('Contact number should be 11 digits');
        }else{
        $.ajax({         
            type: "POST",
            url: "server.php",
            data: {
                tag:functiontag, 
                userid:loggedinid,
                uname:fname,
                uemail:email,
                unum:number
            },
            success: function(html) {                                
               if(html == "success"){
                    $('.profileupdateindicator').addClass("successindicator");
                    retrieveprofile();
               }
            }
        }); 
    } 
    }
    function retrieveadminprofile(){  
        functiontag="retrievemyadminprofile";
        $.ajax({         
         type: "POST",
         url: "server.php",
         data: {
             tag:functiontag       
         },
         success: function(html) {                                
             var json = JSON.parse(html); 
                 if(json.length > 0){
                     json.forEach((item)=>{ 
                         $('.profileedit #fullname').val(item['admin_name']);
                         $('.profileedit #email').val(item['admin_email']);
                         $('.profileedit #phone').val(item['admin_num']);
                        });
                 }
             }
         });  
     }
     function retrievedentistprofile(){
        functiontag="retrievemydentistprofile";
        $.ajax({         
         type: "POST",
         url: "server.php",
         data: {
             tag:functiontag       
         },
         success: function(html) {                                
             var json = JSON.parse(html); 
                 if(json.length > 0){
                     json.forEach((item)=>{ 
                         $('.profileedit #fullname').val(item['den_fname']);
                         $('.profileedit #email').val(item['den_emailAdd']);
                         $('.profileedit #phone').val(item['den_cnum']);
                         $('.profileedit #age').val(item['den_age']);
                        });
                 }
             }
         });
     }
     function retrievestaffprofile(){
        functiontag="retrievemystaffprofile";
        $.ajax({         
         type: "POST",
         url: "server.php",
         data: {
             tag:functiontag       
         },
         success: function(html) {                                
             var json = JSON.parse(html); 
                 if(json.length > 0){
                     json.forEach((item)=>{ 
                         $('.profileedit #fullname').val(item['staff_fname']);
                         $('.profileedit #email').val(item['staff_emailAdd']);
                         $('.profileedit #phone').val(item['staff_cnum']);
                         $('.profileedit #age').val(item['staff_age']);
                        });
                 }
             }
         }); 
     }
     function retrievespecialty(){
        functiontag="getallspecialty";
        $.ajax({         
            type: "POST",
            url: "server.php",
            data: {
                tag:functiontag    
            },
            success: function(html) {                                
                var json = JSON.parse(html); 
                    if(json.length > 0){
                        json.forEach((item)=>{ 
                          var $option="<option value = "+item['sp_id']+">"+item['sp_name']+"</option>";
                          $('#sp').append($option);
                        });
                    }
                }
            }); 

     }
     function retrievegender(){
        functiontag="getallgender";
        $.ajax({         
            type: "POST",
            url: "server.php",
            data: {
                tag:functiontag    
            },
            success: function(html) {                                
                var json = JSON.parse(html); 
                    if(json.length > 0){
                        json.forEach((item)=>{ 
                          var $option="<option value = "+item['gn_id']+">"+item['gn_name']+"</option>";
                          $('#gn').append($option);
                        });
                    }
                }
            }); 
     }
    function retrieveprofile(){  
       functiontag="retrievemyprofile";
       $.ajax({         
        type: "POST",
        url: "server.php",
        data: {
            tag:functiontag, 
            userid:loggedinid        
        },
        success: function(html) {                                
            var json = JSON.parse(html); 
                if(json.length > 0){
                    json.forEach((item)=>{ 
                        $('.profileedit #fullname').val(item['name']);
                        $('.profileedit #email').val(item['uEmail']);
                        $('.profileedit #phone').val(item['uPnum']);
                       });
                }
            }
        });  
    }
    function setinputsenabled(inputs,status){
       if(status == "enabled"){
        inputs.removeClass('disabled');
       }else{
        inputs.addClass('disabled');
       }
    }
    function resetsignupform(){
        userfullname.value="";
        username.value="";
        userpassword.value="";
        userphonenumber.value="";
        useremail.value="";
        confirmpassword.value="";
      
        $("#btnSendVerification").html("Send Code");
        $('.sentverification').css("display","none");
        $('.verificationfield').css("display","none");
        $('.verificationfield span').css("display","none");
    }
    function setappointment(appointmenttag){
        functiontag="setappointment";
        var appointeddate=$(".appointmentdateselected").html();
        var appointedtime=$(".appointmentsetup #time").val();
        var appointeddentist=$(".appointmentsetup #dentist option:selected").val();
        var totalprice=$(".finalamount").text();
        functiontag="sendappointment";    
        if(appointmenttag=="patientsetappointment"){
            $.ajax({        
                type: "POST",
                url: "server.php",
                data: {
                    tag:functiontag, 
                        date:appointeddate,
                        time:appointedtime,
                        dentist:appointeddentist,
                        total:totalprice     
                },
                success: function(html) {                                
                    if(html != "failed"){
                        setappointmentdetails(html);
                    }else{
                       console.log('failed to appointment');
                    }
                             
                }
            }); 
        }else{
            var patientid=$('input[name="patientid"]').val();
            $.ajax({        
                type: "POST",
                url: "server.php",
                data: {
                    tag:functiontag, 
                        uid:patientid,
                        date:appointeddate,
                        time:appointedtime,
                        dentist:appointeddentist,
                        total:totalprice   
                },
                success: function(html) {                                
                    if(html != "failed"){
                        setappointmentdetails(html);
                    }else{
                       console.log('failed to appointment');
                    }
                             
                }
            });
        }
       
        
    }
    function setappointmentdetails(newid){
        const servicesoptions=document.querySelectorAll('.servicesoptions input[type="checkbox"]:checked');
        servicesoptions.forEach((service)=>{
        var selectedservice=service.getAttribute('data-id');
        functiontag ="setappointmentdetails";
            $.ajax({        
                type: "POST",
                url: "server.php",
                data: {
                    tag:functiontag, 
                    newlyinsertedid:newid,
                    serviceselected:selectedservice
                },
                success: function(html) {                                
                    if(html == "success"){
                     Swal.fire("Your appointment is now pending for approval");
                     location.reload(true);
                    }else{
                    console.log('failed to appoint');
                    }           
                }
            });  
        });
    }
    function RegisterUser(){
        functiontag="registeruser";
        $.ajax({
                
            type: "POST",
            url: "server.php",
            data: {
                tag:functiontag, 
                    ufname:userfullname.value,
                    uname:username.value,
                    upass:userpassword.value,
                    uphone:userphonenumber.value,
                    uemail:useremail.value
            },
            success: function(html) {                                
                if(html == "success"){
                    
                    $('#myModal .indicator').removeClass("successindicator");
                    $('#myModal .indicator').removeClass("errorindicator");
                    $('#myModal .indicator').addClass("successindicator");
                    $('#myModal .indicator').html("Registered Successfully");
                    resetsignupform();
                }else if(html == "usernametaken"){
                        Swal.fire("Username already taken");
                }else{
                    $('#myModal .indicator').removeClass("successindicator");
                    $('#myModal .indicator').removeClass("errorindicator");
                    $('#myModal .indicator').addClass("errorindicator");
                    $('#myModal .indicator').html("Registration Failed");
                }
                         
            }
        });  
    }
    function ValidateFieldInputs(inputname){
        if(inputname.value == ""){
         
            inputname.style.border = "none";
            inputname.style.outline="1px solid red";
            valid=0;               
        }else{
            ResetInputStyles(inputname);  
            valid=1;
        }        
    }
   
    function ResetInputStyles(inputname){
        inputname.style.border="none";
        inputname.style.outline = "1px solid #330e3a";
    }
    var code;
    function createCaptcha() {
    //clear the contents of captcha div first 
    document.getElementById('captcha').innerHTML = "";
    var charsArray =
    "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@!#$%^&*";
    var lengthOtp = 6;
    var captcha = [];
    for (var i = 0; i < lengthOtp; i++) {
        var index = Math.floor(Math.random() * charsArray.length + 1); 
        if (captcha.indexOf(charsArray[index]) == -1)
        captcha.push(charsArray[index]);
        else i--;
    }
    var canv = document.createElement("canvas");
    canv.id = "captcha";
    canv.width = 100;
    canv.height = 50;
    var ctx = canv.getContext("2d");
    ctx.font = "25px Georgia";
    ctx.strokeText(captcha.join(""), 0, 30);
    code = captcha.join("");
    document.getElementById("captcha").appendChild(canv); 
    }
   
});
