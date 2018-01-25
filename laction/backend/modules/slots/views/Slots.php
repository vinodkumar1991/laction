<link
	href="<?php echo Yii::getAlias('@asset').'/fullcalendar/fullcalendar.css'?>"
	rel="stylesheet" />
<!--Main Content Start-->
<div class="wraper container-fluid">
	<!--<div class="page-title"> 
                    <h3 class="title">Audition Booking</h3> 
                </div>
                <div class="clearfix"></div>-->

	<div class="row m-b-30">
		<div class="row">

			<!-- /.col -->
			<div class="col-lg-12 col-md-12">
				<div class="box box-primary">
					<div class="box-body no-padding">
						<a href="<?php echo Yii::getAlias('@web').'/create-slot'?>"
							target="_blank"><button class="btn btn-primary add-more"
								type="button" data-toggle="collapse" data-target="#demo">
								<i class="glyphicon glyphicon-plus"></i> Add Project
							</button></a> <br> <br>
						<!-- THE CALENDAR -->
						<div id="calendar"></div>
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /. box -->
			</div>
			<!-- /.col -->
		</div>
		<!-- BEGIN MODAL -->
		<div class="modal none-border" id="my-event">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"
							aria-hidden="true">&times;</button>
						<h4 class="modal-title">
							<strong>Add Event</strong>
						</h4>
					</div>
					<div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">Slot Type</label> <select
									class="form-control" name="category">
									<option value="bg-danger">Slot 1</option>
									<option value="bg-success">Slot 2</option>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">Event Date</label>
								<div class="input-group">
									<input type="date" class="form-control"
										placeholder="mm/dd/yyyy" id="datepicker-multiple"> <span
										class="input-group-addon"><i
										class="glyphicon glyphicon-calendar"></i></span>
								</div>
							</div>
							<div class="input-group-btn">
								<button class="btn btn-success add-more styl-button"
									type="button">
									<i class="glyphicon glyphicon-plus"></i> Add
								</button>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<div class="panel-body">


							<!-- 							<div class="input-group control-group after-add-more"> -->
							<div class="col-md-4">
								<div class="form-group">
									<label class="control-label">from Time</label>
									<div class="input-group m-b-15">

										<div class="timepicker">
											<input id="timepicker" type="time" class="form-control">
											<div class="bootstrap-timepicker-widget dropdown-menu">
												<table>
													<tbody>
														<tr>
															<td><a href="#" data-action="incrementHour"><i
																	class="glyphicon glyphicon-chevron-up"></i></a></td>
															<td class="separator">&nbsp;</td>
															<td><a href="#" data-action="incrementMinute"><i
																	class="glyphicon glyphicon-chevron-up"></i></a></td>
															<td class="separator">&nbsp;</td>
															<td class="meridian-column"><a href="#"
																data-action="toggleMeridian"><i
																	class="glyphicon glyphicon-chevron-up"></i></a></td>
														</tr>
														<tr>
															<td><input type="text" name="hour"
																class="form-control bootstrap-timepicker-hour"
																maxlength="2"></td>
															<td class="separator">:</td>
															<td><input type="text" name="minute"
																class="form-control bootstrap-timepicker-minute"
																maxlength="2"></td>
															<td class="separator">&nbsp;</td>
															<td><input type="text" name="meridian"
																class="form-control bootstrap-timepicker-meridian"
																maxlength="2"></td>
														</tr>
														<tr>
															<td><a href="#" data-action="decrementHour"><i
																	class="glyphicon glyphicon-chevron-down"></i></a></td>
															<td class="separator"></td>
															<td><a href="#" data-action="decrementMinute"><i
																	class="glyphicon glyphicon-chevron-down"></i></a></td>
															<td class="separator">&nbsp;</td>
															<td><a href="#" data-action="toggleMeridian"><i
																	class="glyphicon glyphicon-chevron-down"></i></a></td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
										<span class="input-group-addon"><i
											class="glyphicon glyphicon-time"></i></span>
									</div>
								</div>
							</div>

							<div class="col-md-4">
								<div class="form-group">
									<label class="control-label">To Time</label>
									<div class="input-group m-b-15">

										<div class="timepicker">
											<input id="timepicker" type="time" value="num"
												class="form-control">
											<div class="bootstrap-timepicker-widget dropdown-menu">
												<table>
													<tbody>
														<tr>
															<td><a href="#" data-action="incrementHour"><i
																	class="glyphicon glyphicon-chevron-up"></i></a></td>
															<td class="separator">&nbsp;</td>
															<td><a href="#" data-action="incrementMinute"><i
																	class="glyphicon glyphicon-chevron-up"></i></a></td>
															<td class="separator">&nbsp;</td>
															<td class="meridian-column"><a href="#"
																data-action="toggleMeridian"><i
																	class="glyphicon glyphicon-chevron-up"></i></a></td>
														</tr>
														<tr>
															<td><input type="text" name="hour"
																class="form-control bootstrap-timepicker-hour"
																maxlength="2"></td>
															<td class="separator">:</td>
															<td><input type="text" name="minute"
																class="form-control bootstrap-timepicker-minute"
																maxlength="2"></td>
															<td class="separator">&nbsp;</td>
															<td><input type="text" name="meridian"
																class="form-control bootstrap-timepicker-meridian"
																maxlength="2"></td>
														</tr>
														<tr>
															<td><a href="#" data-action="decrementHour"><i
																	class="glyphicon glyphicon-chevron-down"></i></a></td>
															<td class="separator"></td>
															<td><a href="#" data-action="decrementMinute"><i
																	class="glyphicon glyphicon-chevron-down"></i></a></td>
															<td class="separator">&nbsp;</td>
															<td><a href="#" data-action="toggleMeridian"><i
																	class="glyphicon glyphicon-chevron-down"></i></a></td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
										<span class="input-group-addon"><i
											class="glyphicon glyphicon-time"></i></span>
									</div>
								</div>
							</div>

							<div class="col-md-4">
								<div class="form-group">
									<label class="control-label">Amount</label>
									<div class="input-group m-b-15">

										<div class="bootstrap-timepicker">
											<input id="timepicker" type="number" class="form-control">
											<div class="bootstrap-timepicker-widget dropdown-menu">
												<table>
													<tbody>
														<tr>
															<td><a href="#" data-action="incrementHour"><i
																	class="glyphicon glyphicon-chevron-up"></i></a></td>
															<td class="separator">&nbsp;</td>
															<td><a href="#" data-action="incrementMinute"><i
																	class="glyphicon glyphicon-chevron-up"></i></a></td>
															<td class="separator">&nbsp;</td>
															<td class="meridian-column"><a href="#"
																data-action="toggleMeridian"><i
																	class="glyphicon glyphicon-chevron-up"></i></a></td>
														</tr>
														<tr>
															<td><input type="text" name="hour"
																class="form-control bootstrap-timepicker-hour"
																maxlength="2"></td>
															<td class="separator">:</td>
															<td><input type="text" name="minute"
																class="form-control bootstrap-timepicker-minute"
																maxlength="2"></td>
															<td class="separator">&nbsp;</td>
															<td><input type="text" name="meridian"
																class="form-control bootstrap-timepicker-meridian"
																maxlength="2"></td>
														</tr>
														<tr>
															<td><a href="#" data-action="decrementHour"><i
																	class="glyphicon glyphicon-chevron-down"></i></a></td>
															<td class="separator"></td>
															<td><a href="#" data-action="decrementMinute"><i
																	class="glyphicon glyphicon-chevron-down"></i></a></td>
															<td class="separator">&nbsp;</td>
															<td><a href="#" data-action="toggleMeridian"><i
																	class="glyphicon glyphicon-chevron-down"></i></a></td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>

									</div>
								</div>
							</div>


						</div>




						<!-- Copy Fields-These are the fields which we get through jquery and then add after the above input,-->
						<div class="copy-fields hide">
							<div class="control-group input-group" style="margin-top: 10px">
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">from Time</label>
										<div class="input-group m-b-15">

											<div class="timepicker">
												<input id="timepicker" type="time" class="form-control">
												<div class="bootstrap-timepicker-widget dropdown-menu">
													<table>
														<tbody>
															<tr>
																<td><a href="#" data-action="incrementHour"><i
																		class="glyphicon glyphicon-chevron-up"></i></a></td>
																<td class="separator">&nbsp;</td>
																<td><a href="#" data-action="incrementMinute"><i
																		class="glyphicon glyphicon-chevron-up"></i></a></td>
																<td class="separator">&nbsp;</td>
																<td class="meridian-column"><a href="#"
																	data-action="toggleMeridian"><i
																		class="glyphicon glyphicon-chevron-up"></i></a></td>
															</tr>
															<tr>
																<td><input type="text" name="hour"
																	class="form-control bootstrap-timepicker-hour"
																	maxlength="2"></td>
																<td class="separator">:</td>
																<td><input type="text" name="minute"
																	class="form-control bootstrap-timepicker-minute"
																	maxlength="2"></td>
																<td class="separator">&nbsp;</td>
																<td><input type="text" name="meridian"
																	class="form-control bootstrap-timepicker-meridian"
																	maxlength="2"></td>
															</tr>
															<tr>
																<td><a href="#" data-action="decrementHour"><i
																		class="glyphicon glyphicon-chevron-down"></i></a></td>
																<td class="separator"></td>
																<td><a href="#" data-action="decrementMinute"><i
																		class="glyphicon glyphicon-chevron-down"></i></a></td>
																<td class="separator">&nbsp;</td>
																<td><a href="#" data-action="toggleMeridian"><i
																		class="glyphicon glyphicon-chevron-down"></i></a></td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
											<span class="input-group-addon"><i
												class="glyphicon glyphicon-time"></i></span>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">To Time</label>
										<div class="input-group m-b-15">
											<div class="timepicker">
												<input id="timepicker" type="time" class="form-control">
												<div class="bootstrap-timepicker-widget dropdown-menu">
													<table>
														<tbody>
															<tr>
																<td><a href="#" data-action="incrementHour"><i
																		class="glyphicon glyphicon-chevron-up"></i></a></td>
																<td class="separator">&nbsp;</td>
																<td><a href="#" data-action="incrementMinute"><i
																		class="glyphicon glyphicon-chevron-up"></i></a></td>
																<td class="separator">&nbsp;</td>
																<td class="meridian-column"><a href="#"
																	data-action="toggleMeridian"><i
																		class="glyphicon glyphicon-chevron-up"></i></a></td>
															</tr>
															<tr>
																<td><input type="text" name="hour"
																	class="form-control bootstrap-timepicker-hour"
																	maxlength="2"></td>
																<td class="separator">:</td>
																<td><input type="text" name="minute"
																	class="form-control bootstrap-timepicker-minute"
																	maxlength="2"></td>
																<td class="separator">&nbsp;</td>
																<td><input type="text" name="meridian"
																	class="form-control bootstrap-timepicker-meridian"
																	maxlength="2"></td>
															</tr>
															<tr>
																<td><a href="#" data-action="decrementHour"><i
																		class="glyphicon glyphicon-chevron-down"></i></a></td>
																<td class="separator"></td>
																<td><a href="#" data-action="decrementMinute"><i
																		class="glyphicon glyphicon-chevron-down"></i></a></td>
																<td class="separator">&nbsp;</td>
																<td><a href="#" data-action="toggleMeridian"><i
																		class="glyphicon glyphicon-chevron-down"></i></a></td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
											<span class="input-group-addon"><i
												class="glyphicon glyphicon-time"></i></span>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">Amount</label>
										<div class="input-group m-b-15">

											<div class="bootstrap-timepicker">
												<input id="timepicker" type="number" class="form-control">
												<div class="bootstrap-timepicker-widget dropdown-menu">
													<table>
														<tbody>
															<tr>
																<td><a href="#" data-action="incrementHour"><i
																		class="glyphicon glyphicon-chevron-up"></i></a></td>
																<td class="separator">&nbsp;</td>
																<td><a href="#" data-action="incrementMinute"><i
																		class="glyphicon glyphicon-chevron-up"></i></a></td>
																<td class="separator">&nbsp;</td>
																<td class="meridian-column"><a href="#"
																	data-action="toggleMeridian"><i
																		class="glyphicon glyphicon-chevron-up"></i></a></td>
															</tr>
															<tr>
																<td><input type="text" name="hour"
																	class="form-control bootstrap-timepicker-hour"
																	maxlength="2"></td>
																<td class="separator">:</td>
																<td><input type="text" name="minute"
																	class="form-control bootstrap-timepicker-minute"
																	maxlength="2"></td>
																<td class="separator">&nbsp;</td>
																<td><input type="text" name="meridian"
																	class="form-control bootstrap-timepicker-meridian"
																	maxlength="2"></td>
															</tr>
															<tr>
																<td><a href="#" data-action="decrementHour"><i
																		class="glyphicon glyphicon-chevron-down"></i></a></td>
																<td class="separator"></td>
																<td><a href="#" data-action="decrementMinute"><i
																		class="glyphicon glyphicon-chevron-down"></i></a></td>
																<td class="separator">&nbsp;</td>
																<td><a href="#" data-action="toggleMeridian"><i
																		class="glyphicon glyphicon-chevron-down"></i></a></td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>


										</div>
									</div>
								</div>

								<!--  <div class="input-group-btn"> 
              <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
            </div> -->
							</div>
						</div>
						<div class="input-group-btn">
							<button class="btn btn-success" type="button">Create</button>
						</div>
					</div>
				</div>
			</div>
		</div>




	</div>
	<!-- page end-->

</div>
<!-- END Wraper -->
</div>
<!--Main Content END-->


<!--Calendar Scripts -->
<script
	src="<?php echo Yii::getAlias('@asset').'/cal/assets/vendor_components/moment/moment.js'?>"></script>
<script
	src="<?php echo Yii::getAlias('@asset').'/cal/assets/vendor_components/fullcalendar/dist/fullcalendar.min.js'?>"></script>
<script src="<?php echo Yii::getAlias('@asset').'/cal/calendar.js'?>"></script>
<script type="text/javascript">

    $(document).ready(function() {

	//here first get the contents of the div with name class copy-fields and add it to after "after-add-more" div class.
      $(".add-more").click(function(){ 
          var html = $(".copy-fields").html();
          $(".after-add-more").after(html);
      });
//here it will remove the current value of the remove button which has been pressed
      $("body").on("click",".remove",function(){ 
          $(this).parents(".control-group").remove();
      });

    });
   $(".form_datetime").datetimepicker({

        format: "dd MM yyyy - hh:ii"
    });

</script>