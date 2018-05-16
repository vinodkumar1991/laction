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
												<label class="control-label">Enter Your Name</label> <input
													type="text" class="form-control  book-form" name="fname"
													id="fname">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Enter Your Email</label> <input
													type="text" class="form-control  book-form" name="email"
													id="email">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Enter Phone Number</label> <input
													type="text" class="form-control  book-form"
													name="phonenumber" id="phonenumber">
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Film Type</label> <select
													class="form-control  book-form" name=" " id=" " required=""
													onchange="display();">
													<option value=" ">Select Film</option>
													<option value=" ">Featured Film</option>
													<option value=" ">Short Film</option>
													<option value=" ">Personal</option>

												</select>
											</div>
										</div>

									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Film Name</label>
												<textarea type="text" class="form-control  book-form"
													name=" " id=" "></textarea>
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Film Censored</label>
												<div class="checkbox">
													<input type="radio" name="agree" value="agree" /> yes</br>
													<input type="radio" name="agree" value="agree" /> no
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class='col-md-6'>
											<div class="form-group">
												<label class="control-label">Date</label>
												<div class="dateContainer">
													<div class="input-group date" id="datetimePickers">
														<input type="text" class="form-control  book-form"
															name="meeting" placeholder="DD/MM/YYYY" /> <span
															class="input-group-addon"><span
															class="glyphicon glyphicon-calendar"></span></span>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Time</label> <select
													class="form-control  book-form" name="etime" id="etime"
													required="" placeholder="Select  Time"
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
													<option value="11:30 PM">12:00 PM</option>
													<option value="11:30 PM">12:30 PM</option>

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
										<button type="submit" class="date-time-btm">Pay</button>
									</div>
									<!--<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
<button type="submit" class="date-time-close audition-close" > Close</button>
</div>-->
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
<link
	href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css"
	rel="stylesheet" />
<script src="http://oss.maxcdn.com/momentjs/2.8.2/moment.min.js"></script>
<script
	src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<script>
  $(function () {
            $('#datetimePickers').datetimepicker({
                
                format: 'DD/MM/YYYY'
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
$('.preview-close').click(function(){
$('.preview-section-open').fadeOut('slow');
});
</script>