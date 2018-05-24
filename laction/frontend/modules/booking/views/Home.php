<link
	href="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css"
	rel="stylesheet" />
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
								<?php
        if (Yii::$app->session['customer_data']['customer_id']) {
            ?>
        <h3 class="preview-open">Book Now</h3>
        <?php }else{ ?>
        
									<a href="<?php echo Yii::getAlias('@web').'/login'; ?>">Book
										Now</a>
        <?php } ?>
									
								</div>
							</div>
						</a>

					</div>
					<?php
    if (Yii::$app->session['customer_data']['customer_id']) {
        ?>
    <h3 class="preview-open">Preview Booking</h3>
    <?php }else{ ?>
    <h3 onclick="redirectToLogin()">Preview Booking</h3>
    <?php } ?>
					
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
												<?php
            if (Yii::$app->session['customer_data']['customer_id']) {
                ?>
                <h3 class="audition-open">Book Now</h3>
            <?php }else{?>
            <a onclick="redirectToLogin()">Book Now</a>
            <?php }?>
									
								</div>
							</div>
						</a>

					</div>
							<?php
    if (Yii::$app->session['customer_data']['customer_id']) {
        ?>
        <h3 class="audition-open">Audition Booking</h3>
        <?php }else{ ?>
					<h3 class="" onclick="redirectToLogin()">Audition Booking</h3>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php echo $this->render('Audition_Booking',['genders' => $genders,'categories' => $categories]);?>
<?php echo $this->render('Preview_Booking',['film_types' => $film_types,'censor' => $censored]);?>

<!-- Date Picker Related Files :: START -->
<script
	src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>
<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script
	src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script
	src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
<script>
<!-- Date Picker Related Files :: END -->
$('#myModal').modal('none');
</script>
<script>
$('#myModal1').modal('none');
function redirectToLogin(){
	window.location.href="<?php echo Yii::getAlias('@fweb').'/login'; ?>";
	return true;
}
</script>
<script>
  $(function () {
            $('#datetimePicker').datetimepicker({
                format: 'DD-MM-YYYY'
            });
        });

  
</script>
<script>
  $(function () {
            $('#datetimePickers').datetimepicker({
                format: 'DD-MM-YYYY',
                	//format: 'DD/MM/YYYY h:m A'
            });
        });
</script>
<script>
$(document).ready(function(){
$('.preview-open').click(function(){
$('.preview-section-open').slideToggle();
$('.audition-section-open').hide();
});
});
</script>

<script>
$(document).ready(function(){
$('.audition-open').click(function(){
$('.audition-section-open').slideToggle();
$('.preview-section-open').hide();
});
});
</script>

<script>
$('.preview-close').click(function(){
$('.preview-section-open').fadeOut('slow');
});
</script>

<script>
$('.audition-close').click(function(){
$('.audition-section-open').fadeOut('slow');
});
</script>

