<!DOCTYPE html>
<html lang="en">
<head>
<!-- Site information -->
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>L'Action Studios | Login</title>
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
	href="<?php echo Yii::getAlias('@fasset').'/css/responsive.css'; ?>">

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
			href="<?php echo Yii::getAlias('@fweb').'/home'; ?>"> <img
			src="<?php echo Yii::getAlias('@fimg').'/template/logo-black.png'; ?>"
			alt="L'Action Studios" />
		</a>

		<form class="accountform loginform">
			<h3>Log in</h3>
			<div class="basic-field">
				<label>Phone <br />
					<p>
						<input type="text" name="phone" id="phone" value="" maxlength="10"
							autocomplete="off" />
					</p> <span id="err_phone"></span>
				</label> <label>Password <br />
					<p>
						<input type="password" name="password" id="password" value=""
							maxlength="25" autocomplete="off" />
					</p> <span id="err_password"></span>
				</label>
			</div>
			<!-- 			<label class="stay-login"> <input type="checkbox" name="stay-login"> -->
			<!-- 				Stay logged in -->
			<!-- 			</label> -->
			<input type="button" name="do_login" id="do_login"
				onclick="doLogin()" value="Login" />
			<!-- <i class="fa fa-sign-in" /> </i> -->
			<p class="signup-recover">
				Don't you have an account yet? <a
					href="<?php echo Yii::getAlias('@web').'/register'; ?>">Sign up
					here</a><br /> <a
					href="<?php echo Yii::getAlias('@fweb').'/forgot-password'; ?>">I
					forgot my password</a>
			</p>
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
</html>

<script type="text/javascript">
function doLogin(){
	
	var objLogin = {};
	objLogin = {
         phone : $("#phone").val(),
         password : $("#password").val(),
			};
	$.post('<?php echo Yii::getAlias('@fweb').'/customers/customers/do-login';?>',objLogin,function(response){
		makeEmpty();
    	var response = $.parseJSON(response);
        if(response.hasOwnProperty('errors')){
      	//Phone
      	  if(undefined != response.errors.phone && response.errors.phone.length > 0){
      		   $("#err_phone").html(response.errors.phone);
      		   }
      	//Password
      	  if(undefined != response.errors.password && response.errors.password.length > 0){
      		   $("#err_password").html(response.errors.password);
      		   }
 		   return false;
            }else{
            	window.location.href="<?php echo Yii::getAlias('@fweb').'/home'; ?>";
              return true;         
                }
		});
}

function makeEmpty(){
	$("#err_phone").html("");
	$("#err_password").html("");
	return true;
}
</script>
