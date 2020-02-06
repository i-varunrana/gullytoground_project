//forget password panel switch
$("#forgot-password").click(function(){
    $(".login-panel").addClass("hide");
    $(".forgot-panel").removeClass("hide");
    $(".title").text("Reset Password");
   });
   
   //back to login button
   $("#back-to-login-btn").click(function(){
       $(".forgot-panel").addClass("hide");
       $(".login-panel").removeClass("hide");
       $(".title").text("Login");
   });
   
   $("#phone-num").keyup(function(){
       var phoneNum = $("#phone-num").val();
       if(phoneNum.length == 10){
           $("#mobile-verify-btn").css("background-color","#68c5b8");
           $("#mobile-verify-btn").removeAttr("disabled");
       }else{
           $("#mobile-verify-btn").css("background-color","#999");
           $("#mobile-verify-btn").addAttr("disabled");
       }
   });
   
   // Register with mobile verification
   $("#mobile-verify-btn").click(function(e){
       var phoneNum = $("#phone-num").val();
                   $(".mobile-verification").addClass("hide");
                   $(".otp-verification").removeClass("hide");
                   $(".otp-msg").removeClass("hide");
                   $(".sent-msg").text("OTP is successfully sent to "+phoneNum);
       e.preventDefault();
   });
   
   $("#otp-num").keyup(function(){
       var phoneNum = $("#otp-num").val();
       if(phoneNum.length == 4){
           $("#otp-verify-btn").css("background-color","#68c5b8");
           $("#otp-verify-btn").removeAttr("disabled");
       }else{
           $("#otp-verify-btn").css("background-color","#999");
           $("#otp-verify-btn").addAttr("disabled");
       }
   });
   
   // Register with mobile verification
   $("#otp-verify-btn").click(function(e){
       var otpNum = $("#otp-num").val();
       var response = 1;
                if(response){
                   $(".otp-verification").addClass("hide");
                   $(".register-inputs").removeClass("hide");
                   $(".otp-msg").addClass("hide");
                   $(".sent-msg").removeClass("hide");
                   $(".sent-msg").text("OTP is successfully sent to "+phoneNum);
               }else{
                   $(".sent-msg").css("color","red");
                   $(".sent-msg").text("You entered incorrect OTP ");
               }
       e.preventDefault();
   });


$(document).ready(function(){
   
    // add item to cart
    $("#register-form").submit(function(e){
        var form_data = $(this).serialize();
        var button_content = $(this).find('button[type=submit]');
        button_content.html('Please Wait..');
        $.ajax({
            url: BASE_URL+"ControlUnit/userRegister",
            type: "POST",
            data: form_data,
            success: function(response){
                console.log(response);
                if(response == 'success'){
                    window.location = BASE_URL+"profile";
                }else if(response == 'user_exist'){
                    swal({
                        title: "Account Already Exist",
                        icon: "warning",
                        button: "ok",
                      });
                      button_content.html('Register');
                }
                else {
                    swal({
                        title: "Something went worng",
                        icon: "error",
                        button: "ok",
                      });
                      button_content.html('Register');
                }
        }
       });
        e.preventDefault();
    });

});
   
   
   $(document).ready(function(){
   
       // add item to cart
       $("#login-form").submit(function(e){
           var form_data = $(this).serialize();
           var button_content = $(this).find('button[type=submit]');
           button_content.html('Logging In..');
           $.ajax({
               url: BASE_URL+"ControlUnit/loginAuth",
               type: "POST",
               data: form_data,
               success: function(response){
                   if(response)
                   {
                        window.location = BASE_URL+"ControlUnit/homePage";
                   }
                   else if(response == "invalid_user")
                   {
                       swal({
                           title: "Incorrect password",
                           icon: "warning",
                           button: "ok",
                         });
                         button_content.html('Login');
                   }
                   else {
                       swal({
                           title: "Incorrect phone no.",
                           icon: "error",
                           button: "ok",
                         });
                         button_content.html('Login');
                   }
           }
          });
           e.preventDefault();
       });
   
   });