<!DOCTYPE html>
<html lang="en">
<head>
<!-- Site information -->
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>L'Action Studios | Forgot Password</title>
<meta name="" content="">

<!-- External CSS -->
<link rel="stylesheet"
	href="<?php echo Yii::getAlias('@fasset').'/css/bootstrap.min.css'; ?>" />
<link rel="stylesheet"
	href="<?php echo Yii::getAlias('@fasset').'/css/font-awesome.min.css'; ?>" />
<link rel="stylesheet"
	href="<?php echo Yii::getAlias('@fasset').'/css/owl.carousel.css'; ?>" />
<link rel="stylesheet"
	href="<?php echo Yii::getAlias('@fasset').'/css/owl.transitions.css'; ?>" />
<link rel="stylesheet"
	href="<?php echo Yii::getAlias('@fasset').'/css/magnific-popup.css'; ?>" />

<!-- Custom CSS -->
<link rel="stylesheet"
	href="<?php echo Yii::getAlias('@fasset').'/css/style.css'; ?>" />
<link rel="stylesheet"
	href="<?php echo Yii::getAlias('@fasset').'/css/responsive.css'; ?>" />

<!-- Google Fonts -->
<link
	href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600"
	rel="stylesheet">

<!-- Favicon -->
<link rel="icon"
	href="<?php echo Yii::getAlias('@fimg').'/template/favicon.png'; ?>" />
<link rel="apple-touch-icon"
	href="<?php echo Yii::getAlias('@fimg').'/template/apple-touch-icon.png'; ?>" />
<link rel="apple-touch-icon" sizes="72x72"
	href="<?php echo Yii::getAlias('@fimg').'/template/icon-72x72.png'; ?>" />
<link rel="apple-touch-icon" sizes="114x114"
	href="<?php echo Yii::getAlias('@fimg').'/template/icon-114x114.png'; ?>" />


</head>

<body class="account-page">

	<div class="account-wrap">

		<a class="site-logo"
			href="<?php echo Yii::getAlias('@web').'/home'; ?>"> <img
			src="<?php echo Yii::getAlias('@fimg').'/template/logo-black.png'; ?>"
			alt="L'Action Studios" />
		</a>

		<form class="accountform loginform">
			<h3>Forgot Password</h3>
			<h3 id="f_success_message"></h3>
			<div class="basic-field">
				<label id="lphone">Phone <br />
					<p>
						<input type="text" name="phone" id="phone" value="" maxlength="10"
							autocomplete="off" />
					</p>
				</label><span id="err_phone"></span> <label id="lotp">OTP <br />
					<p>
						<input type="text" name="otp" id="otp" value="" maxlength="6"
							autocomplete="off" />
					</p>
				</label><span id="err_otp"></span> <label id="lnewpassword">New
					Password <br />
					<p>
						<input type="password" name="newpassword" id="newpassword"
							value="" maxlength="6" autocomplete="off" />
					</p>
				</label><span id="err_newpassword"></span><label
					id="lconfirmpassword">Confirm Password <br />
					<p>
						<input type="password" name="confirmpassword" id="confirmpassword"
							value="" maxlength="6" autocomplete="off" />
					</p>
				</label><span id="err_confirmpassword"></span> <input type="hidden"
					name="customer_id" id="customer_id" value="" />
			</div>
			<!--  <label class="stay-login">
                <input type="checkbox" name="stay-login"> Stay logged in
            </label> -->
			<input type="button" name="get_otp" id="get_otp" value="Get OTP"
				onclick="generatePwd()" /> <input type="button"
				name="change_password" id="change_password" value="Change Password"
				onclick="updatePassword()" />
			<!-- 			<p class="signup-recover"> -->
			<!-- 				Check Your Email</a> -->
			<!-- 			</p> -->
		</form>
	</div>

	<!-- Script -->
	<script
		src="<?php echo Yii::getAlias('@fasset').'/js/jquery.min.js'; ?>"></script>
	<script
		src="<?php echo Yii::getAlias('@fasset').'/js/bootstrap.min.js'; ?>"></script>
	<script
		src="<?php echo Yii::getAlias('@fasset').'/js/owl.carousel.js'; ?>"></script>
	<script
		src="<?php echo Yii::getAlias('@fasset').'/js/jquery.magnific-popup.min.js'; ?>"></script>
	<script
		src="<?php echo Yii::getAlias('@fasset').'/js/jquery.ajaxchimp.min.js'; ?>"></script>
	<script
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmiJjq5DIg_K9fv6RE72OY__p9jz0YTMI"></script>
	<script src="<?php echo Yii::getAlias('@fasset').'/js/map.js'; ?>"></script>
	<script src="<?php echo Yii::getAlias('@fasset').'/js/custom.js'; ?>"></script>
</body>


<!-- Mirrored from codepasse~ger.com/html/bigshow/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 07 Jan 2018 06:28:07 GMT -->
</html>

<script type="text/javascript">
makeIt();
function makeIt(){
	$("#change_password").hide();
	$("#lotp").hide();
	$("#lnewpassword").hide();
	$("#lconfirmpassword").hide();
	return true;
}

function generatePwd(){
    var objPhone = {};
    objPhone = {
    	    phone : $("#phone").val()
    	    };
    $.post('<?php echo Yii::getAlias('@fweb').'/customers/customers/generate-otp'; ?>',objPhone,function(response){
    	makeEmpty();
    	var response = $.parseJSON(response);
        if(response.hasOwnProperty('errors')){
      	//Phone
      	  if(undefined != response.errors.phone && response.errors.phone.length > 0){
      		   $("#err_phone").html(response.errors.phone);
      		   }
 		   return false;
            }else{
            	makeFieldsEmpty();
            	$("#customer_id").val(response.customer_id);
               $("#f_success_message").html(response.message);
               setTimeout(makeActivate, 3000);
               return true;         
                }
        });
	return true;
}

function makeEmpty(){
	$("#f_success_message").html("");
	$("#err_phone").html("");
	$("#err_otp").html("");
	$("#err_newpassword").html("");
	$("#err_confirmpassword").html("");
	return true;
}

function makeFieldsEmpty(){
	$("#phone").val("");
	$("#otp").val("");
	$("#newpassword").val("");
	$("#confirmpassword").val("");
	return true;
}

function makeActivate(){
	$("#f_success_message").html("");
	$("#lphone").hide();
	$("#get_otp").hide();
	$("#change_password").show();
	$("#lotp").show();
	$("#lnewpassword").show();
	$("#lconfirmpassword").show();
	return true;
}

function updatePassword(){
	var objPassword = {
			id : $("#customer_id").val(),
          otp : $("#otp").val(),
          newpassword : $("#newpassword").val(),
          confirmpassword : $("#confirmpassword").val()
			};
	$.post('<?php echo Yii::getAlias('@fweb').'/customers/customers/update-password'; ?>',objPassword,function(response){
		makeEmpty();
    	var response = $.parseJSON(response);
        if(response.hasOwnProperty('errors')){
      	//OTP
      	  if(undefined != response.errors.otp && response.errors.otp.length > 0){
      		   $("#err_otp").html(response.errors.otp);
      		   }
      	//New Password
      	  if(undefined != response.errors.newpassword && response.errors.newpassword.length > 0){
      		   $("#err_newpassword").html(response.errors.newpassword);
      		   }
      	//Confirm Password
      	  if(undefined != response.errors.confirmpassword && response.errors.confirmpassword.length > 0){
      		   $("#err_confirmpassword").html(response.errors.confirmpassword);
      		   }
 		   return false;
            }else{
               makeFieldsEmpty();
               $("#f_success_message").html(response.message); 
               setTimeout(function(){window.location="<?php echo Yii::getAlias('@fweb').'/login';?>";},2000);        	
               return true;         
                }
		});
	
return true;	
}
</script>
