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
			<a href="<?php echo Yii::getAlias('@web'); ?>"><img id="profile-img"
				class="profile-img-card"
				src="<?php echo Yii::getAlias('@asset').'/img/avatar_2x.png';?>" /></a>
			<p id="profile-name" class="profile-name-card"></p>
			<form class="form-signin" method="post" action="">
				<!-- Phone :: START -->
				<input type="text" id="phone" name="phone" class="form-control"
					placeholder="Enter Phone" maxlength="10"
					value="<?php echo isset($fields['phone']) ? $fields['phone'] : NULL; ?>"
					autocomplete="off" autofocus /> <span id="err_phone"><?php echo isset($errors['phone'][0]) ? $errors['phone'][0] : NULL; ?></span>
				<!-- Phone :: END -->
				<!-- Password :: START -->
				<input type="password" id="password" name="password"
					class="form-control" placeholder="Enter Password" maxlength="6"
					autocomplete="off" /> <span id="err_password"><?php echo isset($errors['password'][0]) ? $errors['password'][0] : NULL; ?></span>
				<!-- Password :: END -->
				<input type="submit"
					class="btn btn-lg btn-primary btn-block btn-signin" value="Login"
					name="do_login" id="do_login" />
			</form>
			<div class="m-t-30">
				<a href="<?php echo Yii::getAlias('@web').'/forgot-password';?>"
					class="forgot-password"> Forgot the password? </a>
			</div>
		</div>
		<!-- /card-container -->
	</div>
</body>

</html>
