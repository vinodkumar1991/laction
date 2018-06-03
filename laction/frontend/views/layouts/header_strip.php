<!-- Top Header -->
<header class="topbar text-white" id="topbar">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-4 col-sm-6  col-xs-6">
				<div class="socials">
					<a href="<?php echo Yii::$app->params['urls']['social']['fb']; ?>"><i
						class="fa fa-facebook"></i></a> <a
						href="<?php echo Yii::$app->params['urls']['social']['tw']; ?>"><i
						class="fa fa-twitter"></i></a> <a
						href="<?php echo Yii::$app->params['urls']['social']['gplus']; ?>"><i
						class="fa fa-google-plus"></i></a> <a
						href="<?php echo Yii::$app->params['urls']['social']['yt']; ?>"><i
						class="fa fa-youtube-play"></i></a> <a
						href="<?php echo Yii::$app->params['urls']['social']['ht']; ?>"><i
						class="fa fa-instagram"></i></a>
				</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-6  col-xs-6 topbar-right-btns">
				<div class="">
				<?php
    
    if (Yii::$app->session['customer_data']['fullname']) {
        ?>
        <ul class="nav pull-right">
						<li class="dropdown"><a href="#" class="dropdown-toggle"
							data-toggle="dropdown">Welcome, <?php echo Yii::$app->session['customer_data']['fullname']; ?> <b
								class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="<?php echo Yii::getAlias('@fweb').'/profile'; ?>"><i
										class="fa fa-user-o" aria-hidden="true"></i> Profile</a></li>
								<li><a href="<?php echo Yii::getAlias('@fweb').'/bookings'; ?>"><i
										class="fa fa-calendar-check-o" aria-hidden="true"></i>
										Bookings</a></li>
								<li class="divider"></li>
								<li><a href="<?php echo Yii::getAlias('@fweb').'/logout'; ?>"><i
										class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
							</ul></li>
					</ul>
    <?php
    } else {
        ?>
					<a class="btn" href="<?php echo Yii::getAlias('@fweb').'/login';?>"><i
						class="fa fa-sign-in"></i><span> Log In</span></a> <a class="btn"
						href="<?php echo Yii::getAlias('@fweb').'/register';?>"><i
						class="fa fa-pencil-square-o"></i><span> Register</span></a>
						<?php } ?>
				</div>
			</div>
		</div>
	</div>
</header>
<!-- Top Header End -->