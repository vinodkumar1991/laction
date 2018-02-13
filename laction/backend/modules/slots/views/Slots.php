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
		<!-- BEGIN MODAL -->
		<div class="modal none-border" id="my-event">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"
							aria-hidden="true">&times;</button>
						<h4 class="modal-title">
							<strong>Slot Details</strong>
						</h4>
					</div>
					<div></div>
					<div class="modal-footer">
						<div class="panel-body"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>


<!--Calendar Scripts -->
<script>
var my_slots = [];
my_slots =<?php echo $all_slots; ?></script>
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