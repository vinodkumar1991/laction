
<!-- Header -->
<header class="top-head container-fluid">
	<button type="button" class="navbar-toggle pull-left">
		<span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span>
		<span class="icon-bar"></span> <span class="icon-bar"></span>
	</button>


	<!-- Left navbar -->
	<nav class=" navbar-default" role="navigation">


		<!-- Right navbar -->
		<ul class="nav navbar-nav navbar-right top-menu top-right-menu">

			<span class="avtar_username">Welcome to <?php echo Yii::$app->session['session_data']['fullname']; ?> &emsp;<a
				href="<?php echo Yii::getAlias('@web').'/logout';?>"><i
					class="fa fa-sign-out"></i></a></span>
		</ul>
		<!-- End right navbar -->
	</nav>

</header>