<link
	href="<?php echo Yii::getAlias('@asset').'/jquery-ui/jquery-ui.css'?>"
	rel="Stylesheet" type="text/css" />
<script type="text/javascript"
	src="<?php echo Yii::getAlias('@asset').'/jquery-ui/jquery-ui.js'?>"></script>

<title>Laction Admin | Slots</title>

<div class="wraper container-fluid">
	<!--<div class="page-title"> 
                    <h3 class="title">Audition Booking</h3> 
                </div>
                <div class="clearfix"></div>-->

	<!-- /.col -->
	<div class="page-title">
		<h3 class="title">Add Event</h3>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a
				href="<?php echo Yii::getAlias('@web').'/dashboard'?>"><i
					class="fa fa-dashboard"></i> Home</a></li>
			<li class="breadcrumb-item"><a
				href="<?php echo Yii::getAlias('@web').'/calendar'?>">Calendar</a></li>
			<li class="breadcrumb-item active">Slots</li>
		</ol>

	</div>


	<div class="panel">
		<div class="panel-body">
			<div class="col-lg-12 col-md-12">
				<div class="box box-primary">
					<div class="box-body no-padding">
						<div>
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal"
									aria-hidden="true">&times;</button>
								<h4 class="modal-title">
									<strong>Add Event</strong>
								</h4>
							</div>
							<!-- Slot Type :: STARAT -->
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Slot Type</label> <select
										id="category_type" class="form-control" name="category_type">
										<option value="">--Select Slot Type--</option>
										<?php
        
        if (! empty($slot_types)) {
            foreach ($slot_types as $key => $value) {
                ?>
										    <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
										    <?php
            }
        }
        ?>
									</select>
								</div>
								<div id="err_category_type"></div>
							</div>
							<!-- Slot Type :: END -->
							<!-- Event Date :: START -->
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Event Date</label>
									<div class="input-group">
										<input type="text" readonly="readonly" id="event_date"
											name="event_date" class="form-control"
											placeholder="mm/dd/yyyy" /> <span class="input-group-addon"><i
											class="glyphicon glyphicon-calendar"></i></span>
									</div>
								</div>
								<div id="err_event_date"></div>
							</div>
							<!-- Event Date :: END -->
						</div>



						<div class="modal-footer">
							<div class="panel-body">
								<div class="input-group control-group after-add-more">
									<div class="input-group-btn">
										<button class="btn btn-success add-more" type="button"
											name="create_slot" id="create_slot" onclick="createSlot()">Create</button>
										<button class="btn btn-success add-more" type="button">
											<i class="glyphicon glyphicon-plus"></i> Add
										</button>
									</div>
								</div>
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





							<!-- Copy Fields-These are the fields which we get through jquery and then add after the above input,-->
							<div class="copy-fields hide">

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
								<!--  <div class="input-group-btn"> 
              <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
            </div> -->

							</div>


						</div>

					</div>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /. box -->
		</div>
	</div>
</div>

</div>

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

<script language="javascript">
    $(document).ready(function () {
        $("#event_date").datepicker({
            minDate: 0
        });
    });


    function createSlot(){
        var objSlot = {};
        objDaySlots = [{from_time : '09:22 AM',to_time : '12:00 PM',amount : 120,status:'active'},
            {from_time : '09:22 AM',to_time : '12:00 PM',amount : 120,status:'active'},
            {from_time : '09:22 AM',to_time : '12:00 PM',amount : 120,status:'active'}
            ];
        objSlot = {
                category_type : $("#category_type").val(),
                event_date : $("#event_date").val(),
                slots : objDaySlots
                };
        $.post('<?php echo Yii::getAlias('@web').'/slots/slots/save-slots'; ?>',objSlot,function(response){
            alert(response);
            return false;
            });
        }
</script>