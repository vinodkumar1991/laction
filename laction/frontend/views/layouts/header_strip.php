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
        <span class="avtar_username">Welcome to <?php echo Yii::$app->session['customer_data']['fullname']; ?> &emsp;<a
						href="<?php echo Yii::getAlias('@web').'/logout';?>"><i
							class="fa fa-sign-out"></i></a></span>
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
<script type="text/javascript">
makeActiveMenu();
</script>