<link href="<?php echo Yii::getAlias('@fasset').'/css/select2.css'; ?>"
	rel="stylesheet" />
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

<?php echo $this->render('Audition_Booking',['genders' => $genders,'categories' => $categories,'customer_details' => $customer_details]);?>
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
<script src="<?php echo Yii::getAlias('@fasset').'/js/select2.js'; ?>"></script>
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
                minDate: moment().subtract(1,'d'),
                format: 'DD-MM-YYYY',
                
            });
            $('#datetimePicker').on("dp.change", function (e) {
            	getASlots($("#a_event_date").val());      
            });

        });  
</script>
<script>
  $(function () {
            $('#datetimePickers').datetimepicker({
            	minDate: moment().subtract(1,'d'),
                format: 'DD-MM-YYYY',
            });
            $("#datetimePickers").on("dp.change", function (e) {
            	getSlots($("#event_date").val());       
            });
        });
</script>
<script>

$(document).ready(function(){
$('.preview-open').click(function(){
	$('.audition-section-open').hide();
$('.preview-section-open').slideToggle();
});
});
</script>

<script>
$(document).ready(function(){
$('.audition-open').click(function(){
	$('.preview-section-open').hide();
$('.audition-section-open').slideToggle();
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

// var itype = 1;
//var booking_type = '<?php //echo $booking_type['booking_type']; ?>';
// if('preview' == booking_type && itype == 1){
// 	$('.preview-open').click(automaticPreview());	
// }else if('audit' == booking_type && itype == 1){
// 	$('.audition-open').click(automaticAudit());
// }
// function automaticPreview(){
// 	itype++;
// 	alert('hhh');
// 	$('.audition-section-open').hide();
// 		$('.preview-section-open').slideToggle();
// 	return true;
// }

// function automaticAudit(){
// 	itype++;
// 	$('.preview-section-open').hide();
// 	$('.audition-section-open').slideToggle();
// 	return true;
// }

var select = $('.slot_timings');

function formatSelection(state) {
    return state.text;   
}

function formatResult(state) {
    console.log(state)
    if (!state.id) return state.text; // optgroup
    var id = 'state' + state.id.toLowerCase();
    var label = $('<label></label>', { for: id })
            .text(state.text);
    var checkbox = $('<input type="checkbox">', { id: id });
    
    return checkbox.add(label);   
}

select.select2({
    closeOnSelect: false,
    formatResult: formatResult,
    formatSelection: formatSelection,
    escapeMarkup: function (m) {
        return m;
    },
    matcher: function(term, text, opt){
         return text.toUpperCase().indexOf(term.toUpperCase())>=0 || opt.parent("optgroup").attr("label").toUpperCase().indexOf(term.toUpperCase())>=0
    }
});

</script>

