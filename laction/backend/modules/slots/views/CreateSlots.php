<!-- Timepicker Related :: CSS :: START -->
<link
	href="<?php echo Yii::getAlias('@asset').'/css/wickedpicker.css'?>"
	rel="Stylesheet" type="text/css" />
<!-- Timepicker Related :: CSS :: START -->
<link
	href="<?php echo Yii::getAlias('@asset').'/jquery-ui/jquery-ui.css'?>"
	rel="Stylesheet" type="text/css" />
<script type="text/javascript"
	src="<?php echo Yii::getAlias('@asset').'/jquery-ui/jquery-ui.js'?>"></script>
<!-- Timepicker Related :: JS :: START -->
<script type="text/javascript"
	src="<?php echo Yii::getAlias('@asset').'/js/wickedpicker.js'?>"></script>
<!-- Timepicker Related :: JS :: END -->
<title>Laction Admin | Slots</title>

<div class="wraper container-fluid">
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
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="row">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<form method="post" action="">
							<div>
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

							<div class="input_fields_wrap">
								<input type="button" class="field-styl btn btn-primary"
									name="create_slot" id="create_slot" value="Create"
									onclick="createSlot()" />
								<button class="add_field_button field-styl  btn btn-success">
									<i class="glyphicon glyphicon-plus"></i>ADD
								</button>
								<div class="row">
									<div class="col-md-12">
										<div class="my_slots">
											<label class="control-label">From Time : </label><input
												type="text" name="from_time[]" id="from_time"
												class="timepicker form-styl input-sm" /> <label
												class="control-label">FromTo Time :</label> <input
												type="text" name="to_time[]" id="to_time"
												class="timepicker form-styl input-sm" /><label
												class="control-label">From Amount :</label> <input
												type="text" name="amount[]" id="amount" class=" form-styl" />

										</div>
									</div>
								</div>
						
						</form>

					</div>

					<button class="field-styl  btn btn-primary">Create</button>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">

$(document).ready(function () {
    $("#event_date").datepicker({
        minDate: 0
    });
});

var timepicker = $('.timepicker ').wickedpicker();
//Append Time Picker For Each Row :: START
$('body').on('focus',".timepicker", function(){
    $(this).wickedpicker();
});
//Append Time Picker For Each Row :: END
$(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div class="my_slots"><label class="control-label">From Time : </label><input type="text" name="from_time[]" class="timepicker form-styl input-sm " /><label class="control-label">FromTo Time : </label><input type="text" name="to_time[]" class="timepicker form-styl input-sm" /><label class="control-label">FromAmount : </label><input type="text" name="amount[]" id="amount" class="form-styl"/> <a href="#" class="remove_field">Remove</a></div>'); //add input box
        	           
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});


function createSlot(){
    var objSlot = {}; 
    objDaySlots =  gatherSlots();
    objDaySlots = JSON.stringify(objDaySlots);
    console.log(objDaySlots);
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

function gatherSlots(){
	var response = {};
	 var  arrFTimes = arrTTimes = arrAmounts = [];	 
	var from_Times = $('input[name^="from_time"]');
	var to_Times = $('input[name^="to_time"]');
	var t_amounts = $('input[name^="amount"]');
	console.log(from_Times);
	return false;
    //From Time
	$.each(from_Times, function(index, value) {
		alert(index+"---"+value);
	    arrFTimes.push($(this).val());
	});
    response.f_times = arrFTimes;
	 //To Time
	$.each(to_Times, function(to_val) {
	    arrTTimes.push($(this).val());
	});
    response.t_times = arrTTimes;
	 //Amounts
	$.each(t_amounts, function(amount_val) {
	    arrAmounts.push($(this).val());
	});
    response.amounts = arrAmounts;
    console.log(response);
	 return response;

}


</script>