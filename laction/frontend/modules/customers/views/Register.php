<!DOCTYPE html>
<html lang="en">
<head>
<!-- Site information -->
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>L'Action Studios | Signup Page</title>
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
	rel="stylesheet" />

<!-- Favicon -->
<link rel="icon"
	href="<?php echo Yii::getAlias('@fimg').'/template/favicon.png'; ?>" />
<link rel="apple-touch-icon"
	href="<?php echo Yii::getAlias('@fimg').'/template/apple-touch-icon.png'; ?>" />
<link rel="apple-touch-icon" sizes="72x72"
	href="<?php echo Yii::getAlias('@fimg').'/template/icon-72x72.png'; ?>">
<link rel="apple-touch-icon" sizes="114x114"
	href="<?php echo Yii::getAlias('@fimg').'/template/icon-114x114.png'; ?>" />

</head>

<body class="account-page">

	<div class="account-wrap">

		<a class="site-logo"
			href="<?php echo Yii::getAlias('@fweb').'/home'; ?>"> <img
			src="<?php echo Yii::getAlias('@fimg').'/template/logo-black.png'; ?>"
			alt="Laction Studio" />
		</a>

		<form class="accountform signupform">
			<h3>Sign up, it's free..</h3>
			<div class="basic-field">
				<div class="row">
					<div class="col-sm-6">
						<label>First Name <br />
							<p>
								<input type="text" name="fname" required>
							</p>
						</label>
					</div>
					<div class="col-sm-6">
						<label>Last Name <br />
							<p>
								<input type="text" name="lname" required>
							</p>
						</label>
					</div>
				</div>
				<label>Username <br />
					<p>
						<input type="text" name="username" required>
					</p>
				</label> <label>E-mail address <br />
					<p>
						<input type="email" name="email" required>
					</p>
				</label> <label>Password <br />
					<p>
						<input type="password" name="password" required>
					</p>
				</label>
			</div>
			<button type="submit">Login</button>
			<p class="signup-recover">
				Do you already have an account? <a
					href="<?php echo Yii::getAlias('@web').'/login'; ?>">Login here</a>
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


<!-- Mirrored from codepassenger.com/html/bigshow/signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 07 Jan 2018 06:28:07 GMT -->
</html>
