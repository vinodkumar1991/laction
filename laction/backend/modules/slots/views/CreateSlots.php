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
					<div id="slots_success_message"></div>
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
												type="text" name="from_time[]" id="from_time1"
												class="timepicker form-styl input-sm" /> <span
												id="err_from_time1"></span> <label class="control-label">To
												Time :</label> <input type="text" name="to_time[]"
												id="to_time1" class="timepicker form-styl input-sm" /> <span
												id="err_to_time1"></span> <label class="control-label">From
												Amount :</label> <input type="text" name="amount[]"
												id="amount1" class=" form-styl" maxlength="6" /> <span
												id="err_amount1"></span>

										</div>
									</div>
								</div>
						
						</form>

					</div>

					<button class="field-styl  btn btn-primary" onclick="createSlot()">Create</button>
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
var formats = {
		format: '<?php echo date('H:i A');?>',
		inline:true,
		twentyFour: false,
		upArrow: 'wickedpicker__controls__control-up',
		downArrow: 'wickedpicker__controls__control-down',
		close: 'wickedpicker__close',
		hoverState: 'hover-state',
		title: 'Select Time',
		 		};
var timepicker = $('.timepicker ').wickedpicker(formats);
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
            $(wrapper).append('<div class="my_slots"><label class="control-label">From Time : </label><input type="text" name="from_time[]" id="from_time'+x+'" class="timepicker form-styl input-sm " /><span id="err_from_time'+x+'"></span><label class="control-label">To Time : </label><input type="text" name="to_time[]" id="to_time'+x+'" class="timepicker form-styl input-sm" /><span id="err_to_time'+x+'"></span><label class="control-label">Amount : </label><input type="text" name="amount[]" id="amount'+x+'" class="form-styl" maxlength="6"/><span id="err_amount'+x+'"></span> <a href="#" class="remove_field">Remove</a></div>');
        	           
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});


function createSlot(){
    var objSlot = {}; 
    objDaySlots =  gatherSlots();
    objSlot = {
            category_type : $("#category_type").val(),
            event_date : $("#event_date").val(),
            slots : objDaySlots
            };
    $.post('<?php echo Yii::getAlias('@web').'/slots/slots/save-slots'; ?>',objSlot,function(response){
        makeEmpty();
    	var response = $.parseJSON(response);
        if(response.hasOwnProperty('errors')){
      	var errLength = $(".my_slots").length;
      	var arrErrors = response.errors;
      	$.each(arrErrors, function(key, arrValue) {
      	//Slot Type
      	  if(undefined != arrValue.category_type && arrValue.category_type.length > 0){
      		   $("#err_category_type").html(arrValue.category_type);
      		   }
      	 //Event Date
      	  if(undefined != arrValue.event_date && arrValue.event_date.length > 0){
      		   $("#err_event_date").html(arrValue.event_date);
      		   }      	
      	for(j=1;j<=errLength;j++){
      	//From Time
      	  if(undefined != arrValue.from_time && arrValue.from_time.length > 0){
      		   $("#err_from_time"+key).html(arrValue.from_time);
      		   }
      	//To Time
    	  if(undefined != arrValue.to_time && arrValue.to_time.length > 0){
    		   $("#err_to_time"+key).html(arrValue.to_time);
    		   }
      	//Amount
        	  if(undefined != arrValue.amount && arrValue.amount.length > 0){
        		   $("#err_amount"+key).html(arrValue.amount);
        		   }
          	}
      	});
 		   return false;
            }else{
            	makeEmptyFields();
              $("#slots_success_message").html(response.message);
              return true;         
                }
        });
    }

function gatherSlots(){
	var response = [];
	var z = $(".my_slots").length;
		for(i=1;i<=z;i++){
			response.push({from_time : $("#from_time"+i).val(),
					to_time : $("#to_time"+i).val(),
					amount : $("#amount"+i).val(),status : 'active'});
		}
return response;
}

function makeEmpty(){
	var z = $(".my_slots").length;
	$("#slots_success_message").empty();
	$("#err_category_type").html("");
	$("#err_event_date").html("");
	$("#err_from_time1").html("");
	$("#err_to_time1").html("");
	$("#err_amount1").html("");
	for(i=1;i<=z;i++){
		$("#err_from_time"+z).html("");
		$("#err_to_time"+z).html("");
		$("#err_amount"+z).html("");
	}
	return true;
}

function makeEmptyFields(){
	var z = $(".my_slots").length;
	$("#category_type").val("");
	$("#event_date").val("");
	$("#from_time1").val("");
	$("#to_time1").val("");
	$("#amount1").val("");
	for(i=1;i<=z;i++){
		$("#from_time"+z).val("");
		$("#to_time"+z).val("");
		$("#amount"+z).val("");
	}
	return true;
}
</script>