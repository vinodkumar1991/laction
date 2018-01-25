<!DOCTYPE html>
<html lang="en">
<head>
<link rel="shortcut icon"
	href="<?php echo Yii::getAlias('@asset').'/img/favicon_1.ico';?>" />

<title>L'Action Studios | Admin</title>

<!-- Bootstrap core CSS -->
<link
	href="<?php echo Yii::getAlias('@asset').'/css/bootstrap.min.css'; ?>"
	rel="stylesheet" />
<link
	href="<?php echo Yii::getAlias('@asset').'/css/bootstrap-reset.css'; ?>"
	rel="stylesheet" />

<!--Icon-fonts css-->
<link
	href="<?php echo Yii::getAlias('@asset').'/font-awesome/css/font-awesome.css'; ?>"
	rel="stylesheet" />

<!-- Custom styles for this template -->
<link href="<?php echo Yii::getAlias('@asset').'/css/style.css';?>"
	rel="stylesheet" />
<link href="<?php echo Yii::getAlias('@asset').'/css/helper.css';?>"
	rel="stylesheet" />


</head>


<body class="bg-login">

	<div class="container">
		<div class="card card-container">
			<img id="profile-img" class="profile-img-card"
				src="<?php echo Yii::getAlias('@asset').'/img/avatar_2x.png';?>" />
			<p id="profile-name" class="profile-name-card"></p>
			<form class="form-signin">
				<span id="reauth-email" class="reauth-email"></span> <input
					type="email" id="inputEmail" class="form-control"
					placeholder="Email address" required autofocus> <input
					type="password" id="inputPassword" class="form-control"
					placeholder="Password" required>
				<button class="btn btn-lg btn-primary btn-block btn-signin"
					type="submit">Sign in</button>
			</form>
			<!-- /form -->
			<a href="#" class="forgot-password"> Forgot the password? </a>
		</div>
		<!-- /card-container -->
	</div>
</body>

</html>
