<!-- Footer Start -->
<footer class="text-white">
	<div class="footer-widget-area">
		<div class="container">
			<div class="row">
				<div class="col-md-5 col-xs-12 sm-bottom-40">
					<div class="widget about-widget">
						<div class="widget-inner foot-logo-bx">
							<a class="footer-logo" href="index.html"> <img
								src="<?php echo Yii::getAlias('@fimg').'/template/logo.png';?>"
								alt="Laction Studios">
							</a>
							<p class="about-text">Lorem ipsum dolor sit amet, consectetur
								adipisicing elit. Itaque, ducimus, atque. Praesentium suscipit
								provident explicabo dignissimos nostrum numquam deserunt earum
								accusantium et fugit.</p>

						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-4 col-xs-12">
					<div class="widget category-widget">
						<h3 class="widget-title">Quick Links</h3>
						<div class="widget-inner">
							<ul class="widget-cat">
								<li class="cat foot"><a
									href="<?php echo Yii::getAlias('@fweb').'/home'; ?>">Home </a></li>
								<li class="cat foot"><a
									href="<?php echo Yii::getAlias('@fweb').'/booking'; ?>">Booking</a></li>
								<li class="cat foot"><a
									href="<?php echo Yii::getAlias('@fweb').'/videos'; ?>">Videos </a></li>
								<li class="cat foot"><a
									href="<?php echo Yii::getAlias('@fweb').'/profiles'; ?>">Profile
								</a></li>
								<li class="cat foot"><a
									href="<?php echo Yii::getAlias('@fweb').'/contact-us'; ?>">Contact
										Us </a></li>
							</ul>
						</div>
					</div>
				</div>

				<div class="col-md-4 col-sm-4 col-xs-12">
					<div class="widget category-widget">
						<h3 class="widget-title">Address</h3>
						<div class="widget-inner">
							<div class="textwidget footer-bx">
								<p>
									<i class="fa fa-map-marker"></i> : <?php echo Yii::$app->params['contact_details']['address']; ?>
								</p>
								<p>
									<i class="fa fa-mobile"></i> : <?php echo Yii::$app->params['contact_details']['phone']; ?>
								</p>
								<p>
									<i class="fa fa-envelope"></i> : <a
										href="mailto:<?php echo Yii::$app->params['contact_details']['email']; ?>"><?php echo Yii::$app->params['contact_details']['email']; ?></a>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="copyright-footer">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-sm-6 col-xs-12 xs-text-center">
					<ul class="footer-nav">
						<li><a href="<?php echo Yii::getAlias('@fweb').'/policy'; ?>"
							target="_blank">Privacy Policy</a></li>
					</ul>
				</div>
				<div class="col-md-6 col-sm-6 col-xs-12 xs-text-center">
					<p class="copyright-text">
						&copy; <?php echo date('Y'); ?> <a
							href="<?php echo Yii::getAlias('@fweb').'/tnc'; ?>"
							target="_blank">L'Action Studios</a>. All Rights Reserved
					</p>
				</div>
			</div>
		</div>
	</div>
</footer>
<!-- Footer End -->