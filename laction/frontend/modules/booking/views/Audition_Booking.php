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
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Email</label> <input
													type="text" class="form-control  book-form" name="email"
													id="email" value="" />
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Phone</label> <input
													type="text" class="form-control  book-form" name="phone"
													id="phone" value="" />
											</div>
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
										</div>

									</div>

									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Age</label> <input type="text"
													class="form-control  book-form" name="age" id="age"
													value="" />
											</div>
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
										</div>
										<div class='col-md-6'>
											<div class="form-group">
												<label class="control-label">Date</label>
												<div class="dateContainer">
													<div class="input-group date" id="datetimePicker">
														<input type="text" class="form-control  book-form"
															name="meeting" placeholder="DD/MM/YYYY " /> <span
															class="input-group-addon"><span
															class="glyphicon glyphicon-calendar"></span></span>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Time</label> <select
													class="form-control  book-form" name="etime" id="etime"
													placeholder="Select  Time" required=""
													onchange="display();">
													<option value=""></option>
													<option value="1:00 AM">12:00 AM</option>
													<option value="1:00 AM">12:30 AM</option>
													<option value="1:00 AM">1:00 AM</option>
													<option value="1:30 AM">1:30 AM</option>
													<option value="2:00 AM">2:00 AM</option>
													<option value="2:00 AM">2:30 AM</option>
													<option value="2:30 AM">3:00 AM</option>
													<option value="3:30 AM">3:30 AM</option>
													<option value="4:00 AM">4:00 AM</option>
													<option value="4:30 AM">4:30 AM</option>
													<option value="5:00 AM">5:00 AM</option>
													<option value="5:30 AM">5:30 AM</option>
													<option value="6:00 AM">6:00 AM</option>
													<option value="6:30 AM">6:30 AM</option>
													<option value="7:00 AM">7:00 AM</option>
													<option value="7:30 AM">7:30 AM</option>
													<option value="8:00 AM">8:00 AM</option>
													<option value="8:30 AM">8:30 AM</option>
													<option value="9:00 AM">9:00 AM</option>
													<option value="9:30 AM">9:30 AM</option>
													<option value="10:00 AM">10:00 AM</option>
													<option value="10:30 AM">10:30 AM</option>
													<option value="11:00 AM">11:00 AM</option>
													<option value="11:30 AM">11:30 AM</option>
													<option value="1:00 PM">1:00 PM</option>
													<option value="1:30 PM">1:30 PM</option>
													<option value="2:00 PM">2:00 PM</option>
													<option value="2:30 PM">2:30 PM</option>
													<option value="3:00 PM">3:00 PM</option>
													<option value="3:30 PM">3:30 PM</option>
													<option value="4:00 PM">4:00 PM</option>
													<option value="4:30 PM">4:30 PM</option>
													<option value="5:00 PM">5:00 PM</option>
													<option value="5:30 PM">5:30 PM</option>
													<option value="6:00 PM">6:00 PM</option>
													<option value="6:30 PM">6:30 PM</option>
													<option value="7:00 PM">7:00 PM</option>
													<option value="7:30 PM">7:30 PM</option>
													<option value="8:00 PM">8:00 PM</option>
													<option value="8:30 PM">8:30 PM</option>
													<option value="9:00 PM">9:00 PM</option>
													<option value="9:30 PM">9:30 PM</option>
													<option value="10:00 PM">10:00 PM</option>
													<option value="10:30 PM">10:30 PM</option>
													<option value="11:00 PM">11:00 PM</option>
													<option value="11:30 PM">11:30 PM</option>

												</select>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-12">
											<div class="form-group">

												<div class="checkbox">
													<label> <input type="checkbox" name="agree" value="agree" />I
														Agree with the terms and conditions
													</label>
												</div>
											</div>
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
<link
	href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css"
	rel="stylesheet" />
<script src="http://oss.maxcdn.com/momentjs/2.8.2/moment.min.js"></script>
<script
	src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<script>

  $(function () {
            $('#datetimePicker').datetimepicker({
                
                format: 'DD/MM/YYYY '
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
$('.audition-close').click(function(){
$('.audition-section-open').fadeOut('slow');
});
</script>

<script type="text/javascript">
  function bookAudition(){
      var objAudition = {};
      objAudition = {};
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