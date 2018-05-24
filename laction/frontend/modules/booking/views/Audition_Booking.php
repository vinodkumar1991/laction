<section class="booking-bg audition-section-open" id="audition-bk">
	<div class="container-fluid">
		<div class="container">

			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 booking-bg-mid">
				<div class="row">

					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 pull-right">
						<form class="">
							<div class="panel panel-primary book-prim">
								<div class="panel-heading book-heading">Schedule an Audition
									Booking</div>
								<div class="panel-body">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Fullname</label> <input
													type="text" class="form-control  book-form" name="fullname"
													id="fullname" value="" />
											</div>
											<span id="err_fullname"></span>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Email</label> <input
													type="text" class="form-control  book-form" name="email"
													id="email" value="" />
											</div>
											<span id="err_email"></span>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Phone</label> <input
													type="text" class="form-control  book-form" name="phone"
													id="phone" value="" />
											</div>
											<span id="err_phone"></span>
										</div>

										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Gender</label> <select
													class="form-control  book-form" name="gender" id="gender">
													<option value="">--Select Gender--</option>
													<?php
            if (! empty($genders)) {
                foreach ($genders as $key => $value) {
                    ?>
                    <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                    <?php
                }
            }
            ?>								</select>
											</div>
											<span id="err_gender"></span>
										</div>

									</div>

									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Age</label> <input type="text"
													class="form-control  book-form" name="age" id="age"
													value="" />
											</div>
											<span id="err_age"></span>
										</div>

										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Category</label> <select
													class="form-control  book-form" name="category"
													id="category" onchange="getSubCategories(this.value)">
													<option value="">--Select A Category--</option>
													<?php
            
            if (! empty($categories)) {
                foreach ($categories as $arrCategory) {
                    ?>
													        <option value="<?php echo $arrCategory['name']; ?>"><?php echo $arrCategory['name']; ?></option>
													        <?php
                }
            }
            ?>
												</select>
											</div>
											<span id="err_category"></span>
										</div>

									</div>

									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Sub Category</label> <select
													class="form-control  book-form" name="sub_category"
													id="sub_category">
													<option value="">--Select Sub Category--</option>
												</select>
											</div>
											<span id="err_sub_category"></span>
										</div>
										<div class='col-md-6'>
											<div class="form-group">
												<label class="control-label">Date</label>
												<div class="dateContainer">
													<div class="input-group date" id="datetimePicker">
														<input type="text" class="form-control  book-form"
															name="a_event_date" placeholder="DD/MM/YYYY "
															id="a_event_date" /> <span class="input-group-addon"><span
															class="glyphicon glyphicon-calendar"></span></span>
													</div>
												</div>
												<span id="err_a_event_date"></span>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Time</label> <select
													class="form-control  book-form" name="a_slot_time"
													id="a_slot_time" multiple>
													<option value=""></option>
												</select>
											</div>
											<span id="err_a_slot_time"></span>
										</div>
									</div>

									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<div class="checkbox">
													<label> <input type="checkbox" name="aagree" id="aagree"
														value="agree" />I Agree with the terms and conditions
													</label>
												</div>
											</div>
											<span id="err_a_agree"></span>
										</div>
									</div>
									<div class="col-lg-12 col-md-2 col-sm-12 col-xs-12">
										<input type="button" class="date-time-btm" value="Book"
											onclick="bookAudition()" />
									</div>
									<!--<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
         <button type="submit" class="date-time-close preview-close" > Close</button>
         </div>-->
								</div>
							</div>
						</form>
					</div>
				</div>

				<button type="submit" class="date-time-close preview-close">
					<i class="fa fa-close"></i>
				</button>
			</div>
		</div>

	</div>
</section>



<script type="text/javascript">
autoPopulate();
function autoPopulate(){
      $("#fullname").val("<?php echo Yii::$app->session['customer_data']['fullname']; ?>");
      $('#fullname').prop('readonly', true);
      $("#email").val("<?php echo Yii::$app->session['customer_data']['email']; ?>");
      $('#email').prop('readonly', true);
      $("#phone").val("<?php echo Yii::$app->session['customer_data']['phone']; ?>");
      $('#phone').prop('readonly', true);
      return true;
	 }
  function bookAudition(){
      var objAudition = {};
      objAudition = {
    		  category_type : 'audition',
              booking_type : 'dummyorder',
              fullname : $("#fullname").val(),
              email : $("#email").val(),
              phone : $("#phone").val(),
              gender : $("#gender").val(),
              age : $("#age").val(),
              category : $("#category").val(),
              subcategory : $("#sub_category").val(),
              event_date : $("#a_event_date").val(),
              slot_time : $("#a_slot_time").val(),
              agree : $('#aagree').is(":checked")
    	      };
      console.log(objAudition);
      //$.post();
      return true;
	  }

  function getSubCategories(category){
	  var objCategory = {};
	  objCategory = {
			  category : category};
	  $.post('<?php echo Yii::getAlias('@fweb').'/booking/booking/sub-categories'; ?>',objCategory,function(response){
		  $("#sub_category").html("");
		  $("#sub_category").html(response);
		  });
		  return true;
	  }
</script>