<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Site information -->
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>L'Action Studios | Customer Registration</title>
        <meta name="" content="">

        <!-- External CSS -->
        <link rel="stylesheet"
              href="<?php echo Yii::getAlias('@fasset') . '/css/bootstrap.min.css'; ?>" />
        <link rel="stylesheet"
              href="<?php echo Yii::getAlias('@fasset') . '/css/font-awesome.min.css'; ?>" />
        <link rel="stylesheet"
              href="<?php echo Yii::getAlias('@fasset') . '/css/owl.carousel.css'; ?>" />
        <link rel="stylesheet"
              href="<?php echo Yii::getAlias('@fasset') . '/css/owl.transitions.css'; ?>" />
        <link rel="stylesheet"
              href="<?php echo Yii::getAlias('@fasset') . '/css/magnific-popup.css'; ?>" />

        <!-- Custom CSS -->
        <link rel="stylesheet"
              href="<?php echo Yii::getAlias('@fasset') . '/css/style.css'; ?>" />
        <link rel="stylesheet"
              href="<?php echo Yii::getAlias('@fasset') . '/css/responsive.css'; ?>" />

        <!-- Google Fonts -->
        <link
            href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600"
            rel="stylesheet" />

        <!-- Favicon -->
        <link rel="icon"
              href="<?php echo Yii::getAlias('@fimg') . '/template/favicon.png'; ?>" />
        <link rel="apple-touch-icon"
              href="<?php echo Yii::getAlias('@fimg') . '/template/apple-touch-icon.png'; ?>" />
        <link rel="apple-touch-icon" sizes="72x72"
              href="<?php echo Yii::getAlias('@fimg') . '/template/icon-72x72.png'; ?>">
        <link rel="apple-touch-icon" sizes="114x114"
              href="<?php echo Yii::getAlias('@fimg') . '/template/icon-114x114.png'; ?>" />

    </head>

    <body class="account-page">

        <div class="account-wrap">

            <a class="site-logo"
               href="<?php echo Yii::getAlias('@fweb') . '/home'; ?>"> <img
                    src="<?php echo Yii::getAlias('@fimg') . '/template/logo-black.png'; ?>"
                    alt="Laction Studio" />
            </a>

            <form class="accountform signupform">
                <h3>Sign up, it's free..</h3>
                <h3 id="customer_register_message"></h3>
                <div class="basic-field">
                    <label>Fullname <br />
                        <p>
                            <input type="text" name="fullname" id="fullname" value=""
                                   autocomplete="off" maxlength="95" />
                        </p> <span id="err_fullname"></span>
                    </label> <label>Phone <br />
                        <p>
                            <input type="text" name="phone" id="phone" value=""
                                   autocomplete="off" maxlength="10" />
                        </p> <span id="err_phone"></span>
                    </label> <label>E-mail<br />
                        <p>
                            <input type="text" name="email" id="email" value=""
                                   autocomplete="off" maxlength="40" />
                        </p> <span id="err_email"></span>
                    </label> <label>Password <br />
                        <p>
                            <input type="password" name="password" id="password" value=""
                                   autocomplete="off" maxlength="25" />
                        </p> <span id="err_password"></span>
                    </label>
                    <label id = "l_customer_register_otp">OTP <br />
                        <p>
                            <input type="text" name="reg_otp" id="reg_otp" value=""
                                   autocomplete="off" maxlength="6" />
                        </p> <span id="err_reg_otp"></span>
                    </label>
                </div>
                <input type="button" name="customer_register" id="customer_register"
                       value="Register" onclick="registerCustomer()" />
                <input type="button" name="customer_register_otp" id="customer_register_otp"
                       value="Register" onclick="generateRegOTP()" />
                <p class="signup-recover">
                    Do you already have an account? <a
                        href="<?php echo Yii::getAlias('@web') . '/login'; ?>">Login here</a>
                </p>
            </form>
        </div>

        <!-- Script -->
        <script
        src="<?php echo Yii::getAlias('@fasset') . '/js/jquery.min.js'; ?>"></script>
        <script
        src="<?php echo Yii::getAlias('@fasset') . '/js/bootstrap.min.js'; ?>"></script>
        <script
        src="<?php echo Yii::getAlias('@fasset') . '/js/owl.carousel.js'; ?>"></script>
        <script
        src="<?php echo Yii::getAlias('@fasset') . '/js/jquery.magnific-popup.min.js'; ?>"></script>
        <script
        src="<?php echo Yii::getAlias('@fasset') . '/js/jquery.ajaxchimp.min.js'; ?>"></script>
        <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmiJjq5DIg_K9fv6RE72OY__p9jz0YTMI"></script>
        <script src="<?php echo Yii::getAlias('@fasset') . '/js/map.js'; ?>"></script>
        <script src="<?php echo Yii::getAlias('@fasset') . '/js/custom.js'; ?>"></script>
    </body>


    <!-- Mirrored from codepassenger.com/html/bigshow/signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 07 Jan 2018 06:28:07 GMT -->
</html>
<script type="text/javascript">
                           handleIt();
                           function registerCustomer() {
                               var objCustomer = {};
                               objCustomer = {
                                   fullname: $("#fullname").val(),
                                   phone: $("#phone").val(),
                                   email: $("#email").val(),
                                   password: $("#password").val(),
                                   status: 'active'
                               };
                               $.post('<?php echo Yii::getAlias('@fweb') . '/customers/customers/save-customer'; ?>', objCustomer, function (response) {
                                   makeEmpty();
                                   var response = $.parseJSON(response);
                                   if (response.hasOwnProperty('errors')) {
                                       //Fullname
                                       if (undefined != response.errors.fullname && response.errors.fullname.length > 0) {
                                           $("#err_fullname").html(response.errors.fullname);
                                       }
                                       //Email
                                       if (undefined != response.errors.email && response.errors.email.length > 0) {
                                           $("#err_email").html(response.errors.email);
                                       }
                                       //Phone
                                       if (undefined != response.errors.phone && response.errors.phone.length > 0) {
                                           $("#err_phone").html(response.errors.phone);
                                       }
                                       //Password
                                       if (undefined != response.errors.password && response.errors.password.length > 0) {
                                           $("#err_password").html(response.errors.password);
                                       }
                                       return false;
                                   } else {
                                       makeFieldsEmpty();
                                       $("#customer_register_message").html(response.message);
                                       setTimeout(window.location.href = "<?php echo Yii::getAlias('@fweb') . '/home'; ?>", 3000);
                                       return true;
                                   }
                               });
                           }

                           function makeEmpty() {
                               $("#customer_register_message").html("");
                               $("#err_fullname").html("");
                               $("#err_email").html("");
                               $("#err_phone").html("");
                               $("#err_password").html("");
                               return true;
                           }

                           function makeFieldsEmpty() {
                               $("#email").val("");
                               $("#phone").val("");
                               $("#password").val("");
                               $("#fullname").val("");
                               return true;
                           }

                           function generateRegOTP() {
                               var otpInputs = {};
                               var isValid = '';
                               otpInputs = {
                                   phone: $("#phone").val(),
                                   category_type: 'registration',
                                   fullname: $("#fullname").val(),
                                   password: $("#password").val(),
                                   email: $("#email").val(),
                               };
                               isValid = validateRegistration(otpInputs);
                               if (0 == isValid) {
                                   $.post('<?php echo Yii::getAlias('@fweb') . '/customers/customers/generate-otp'; ?>', otpInputs, function (response) {
                                       alert(response);
                                   });
                               }
                               return true;
                           }

                           function handleIt() {
                               $("#customer_register").hide();
                               $("#l_customer_register_otp").hide();
                               return true;
                           }

                           function enableIt() {
                               $("#customer_register_otp").hide();
                               $("#customer_register").show();
                               $("#l_customer_register_otp").show();
                               return true;
                           }

                           function validateRegistration(objInputs) {
                               var response = 0;
                               var phonePattern = /^[0-9-+]+$/;
                               var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;
                               var fullnamePattern = /^[a-zA-Z \']+$/;

                               makeEmpty();
                               //Phone
                               if (objInputs.phone.length <= 0) {
                                   response = response + 1;
                                   $("#err_phone").html("Phone is required");
                               } else if (!phonePattern.test(objInputs.phone)) {
                                   response = response + 1;
                                   $("#err_phone").html("Phone numbers allows only numbers");
                               }
                               //Email
                               if (objInputs.email.length > 0 && !emailPattern.test(objInputs.email)) {
                                   response = response + 1;
                                   $("#err_email").html("Email is invalid");
                               }
                               //Password
                               if (objInputs.password.length <= 0) {
                                   response = response + 1;
                                   $("#err_password").html("Password is required");
                               }
                               //Fullname
                               if (objInputs.fullname.length <= 0) {
                                   response = response + 1;
                                   $("#err_fullname").html("Fullname is required");
                               } else if (!fullnamePattern.test(objInputs.fullname)) {
                                   response = response + 1;
                                   $("#err_fullname").html("Fullname allows only alphabets");
                               }
                               return response;
                           }

</script>