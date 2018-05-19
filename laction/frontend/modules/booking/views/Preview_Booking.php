<section class="booking-bg preview-section-open" id="preview-bk">
	<div class="container-fluid">
		<div class="container">

			<div class="col-lg-12 col-md-12 col-sm-12 cl-xs-12 booking-bg-mid">
				<div class="row">

					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 pull-right">
						<form class="">
							<div class="panel panel-primary book-prim">
								<div class="panel-heading book-heading">Schedule an Preview
									Booking</div>
								<div class="panel-body">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Fullname</label> <input
													type="text" class="form-control  book-form"
													name="p_fullname" id="p_fullname" value="" />
											</div>
											<span id="err_pfullname"></span>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Email</label> <input
													type="text" class="form-control  book-form" name="p_email"
													id="p_email" value="" />
											</div>
											<span id="err_pemail"></span>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Phone</label> <input
													type="text" class="form-control  book-form" name="p_phone"
													id="p_phone" value="" />
											</div>
											<span id="err_pphone"></span>
										</div>

										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Film Type</label> <select
													class="form-control  book-form" name="film_type"
													id="film_type">
													<option value="">--Select Film Type--</option>
													<?php
            if (! empty($film_types)) {
                foreach ($film_types as $key => $value) {
                    ?>
                    <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                    <?php
                }
            }
            ?>
												</select>
											</div>
											<span id="err_film_type"></span>
										</div>

									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Film Name</label>
												<textarea class="form-control  book-form" name="film_name"
													id="film_name"></textarea>
											</div>
											<span id="err_film_name"></span>
										</div>

										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Film Censored</label> <select
													class="form-control  book-form" name="censor" id="censor">
													<option value="">--Is Film Censored--</option>
													<?php
            if (! empty($censor)) {
                foreach ($censor as $key => $value) {
                    ?>
                    <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                    <?php
                }
            }
            ?>								</select>
											</div>
											<span id="err_censor"></span>
										</div>
									</div>
									<div class="row">
										<div class='col-md-6'>
											<div class="form-group">
												<label class="control-label">Date</label>
												<div class="dateContainer">
													<div class="input-group date" id="datetimePickers">
														<input type="text" class="form-control  book-form"
															name="event_date" id="event_date"
															oninput="getSlots(this.value)" /> <span
															class="input-group-addon"><span
															class="glyphicon glyphicon-calendar"></span></span>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Time</label> <select
													class="form-control  book-form" name="slot_time[]"
													id="slot_time" multiple>
													<option value="">--Select Time Slots--</option>
												</select>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-12">
											<div class="form-group">

												<div class="checkbox">
													<label> <input type="checkbox" name="agree" value="agree"
														id="agree" />I Agree with the terms and conditions
													</label>
												</div>
											</div>
										</div>

									</div>
									<div class="col-lg-12 col-md-2 col-sm-12 col-xs-12">
										<input type="button" class="date-time-btm" value="Pay"
											onclick="bookPreview()" />
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>

				<button type="submit" class="date-time-close audition-close">
					<i class="fa fa-close"></i>
				</button>
			</div>
		</div>

	</div>
</section>

<script type="text/javascript">
autoPopulate();
 function autoPopulate(){
       $("#p_fullname").val("<?php echo Yii::$app->session['customer_data']['fullname']; ?>");
       $('#p_fullname').prop('readonly', true);
       $("#p_email").val("<?php echo Yii::$app->session['customer_data']['email']; ?>");
       $('#p_email').prop('readonly', true);
       $("#p_phone").val("<?php echo Yii::$app->session['customer_data']['phone']; ?>");
       $('#p_phone').prop('readonly', true);
       return true;
	 }
 function bookPreview()
 {
	 var objPreview = {};
	 objPreview = {
          category_type : 'preview',
          booking_type : 'dummyorder',
          fullname : $("#p_fullname").val(),
          email : $("#p_email").val(),
          phone : $("#p_phone").val(),
          film_type : $("#film_type").val(),
          film_name : $("#film_name").val(),
          film_censor : $("#censor").val(),
          event_date : $("#event_date").val(),
          slot_time : $("#slot_time").val(),
          agree : $('#agree').is(":checked")
			 };
	 $.post('<?php echo Yii::getAlias('@fweb'.'/booking/booking/book-preview'); ?>',objPreview,function(response){
		 alert(response);
		 return false;
		 });
	 }

 function getSlots(event_date){
	    var objEventDate = {};
	    objEventDate = {
	    	    event_date : event_date,
	    	    category_type : 'preview'
		    	    };
	    $.post('<?php echo Yii::getAlias('@fweb').'/booking/booking/slots'; ?>',objEventDate,function(response){
		       $("#slot_time").html("");
		       $("#slot_time").html(response);
		    });
			    return true;
	 }
</script>