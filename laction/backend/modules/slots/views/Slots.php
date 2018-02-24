<script src="https://code.jquery.com/ui/1.11.1/jquery-ui.min.js"></script>
<link rel="stylesheet"
	href="https://code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css" />
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
								<i class="glyphicon glyphicon-plus"></i> Add Slot
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
		<!-- Popup :: Model -->
		<div id="eventContent" title="Slot Details">
			<table id="eventInfo" border="1">
				<tr>
					<th>Event Date</th>
					<th>Slot Type</th>
					<th>From Time</th>
					<th>To Time</th>
					<th>Amount</th>
					<th>Status</th>
				</tr>
			</table>
			<p>
				<strong><a id="slot_edit_link" target="_blank">Edit Slot</a></strong>
			</p>
		</div>
	</div>
</div>
</div>


<!--Calendar Scripts -->
<script type="text/javascript">
$("#eventContent").hide();
var my_slots = [];
my_slots =<?php echo $all_slots; ?></script>
<script
	src="<?php echo Yii::getAlias('@asset').'/cal/assets/vendor_components/moment/moment.js'?>"></script>
<script
	src="<?php echo Yii::getAlias('@asset').'/cal/assets/vendor_components/fullcalendar/dist/fullcalendar.min.js'?>"></script>
<script src="<?php echo Yii::getAlias('@asset').'/cal/calendar.js'?>"></script>

<script type="text/javascript">

function showSlotsInfo(event_date, slot_type){
	$("#eventContent").show();
	var objSlot = {
event_date : event_date,
category_type : slot_type
			};
	$.post('<?php echo Yii::getAlias('@web').'/slots/slots/get-slot'; ?>',objSlot,function(response){
		   if(response){
			   $('#eventContent').dialog('option', 'title', 'Slot Details');
			   $("#eventInfo").html("");
			   var response = $.parseJSON(response);
			   var tr;
			   $.each(response, function( index, value ) {
			            tr = $('<tr/>');
			            tr.append("<td>" + value.slot_event_date + "</td>");
			            tr.append("<td>" + value.category_type + "</td>");
			            tr.append("<td>" + value.slot_from_time + "</td>");
			            tr.append("<td>" + value.slot_to_time + "</td>");
			            tr.append("<td>" + value.amount + "</td>");
			            tr.append("<td>" + value.status + "</td>");
			            $('#eventInfo').append(tr);
			            var edit_slot_link = '';
			            edit_slot_link = "<?php echo Yii::getAlias('@web'); ?>"+ '/edit-slot/'+value.event_date+'/'+value.category_type;
				 });
			   $("#slot_edit_link").value(edit_slot_link);
			   }
		});
}
</script>