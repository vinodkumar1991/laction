<!-- Page Header -->
<div class="page-header single-celebrity-header booking-bg-header">
	<div class="page-header-overlay">
		<div class="container">
			<h2 class="page-title">Booking</h2>
		</div>
	</div>
</div>
<!-- Page Header End -->
<div class="section section-padding celebrity-single-section gray-bg">
	<div class="container">
		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 book-show">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 booking">
						<img
							src="<?php echo Yii::getAlias('@fimg').'/booking/preview-booking.jpg'; ?>"
							alt=" " class="image"> <a href="#preview-bk" class="">
							<div class="overlay">
								<div class="text tx-book">
									<a href="<?php echo Yii::getAlias('@web').'/login'; ?>">Book
										Now</a>
								</div>
							</div>
						</a>

					</div>
					<h3 class="preview-open">Preview Booking</h3>
				</div>
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 book-show">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 booking">
						<img
							src="<?php echo Yii::getAlias('@fimg').'/booking/audition-booking.jpg'; ?>"
							alt=" " class="image"> <a href="#audition-bk" class="">
							<div class="overlay">
								<div class="text tx-book">
									<a href="<?php echo Yii::getAlias('@web').'/login'; ?>">Book
										Now</a>
								</div>
							</div>
						</a>

					</div>
					<h3 class="audition-open">Audition Booking</h3>
				</div>
			</div>
		</div>
	</div>
</div>

<?php echo $this->render('Audition_Booking');?>
<?php echo $this->render('Preview_Booking');?>

<script>
$('#myModal').modal('none');
</script>
<script>
$('#myModal1').modal('none');
</script>

