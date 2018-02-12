
<title><?php echo Yii::t('titles', 'laction.admin').Yii::t('titles', 'settings.roles'); ?></title>
<div class="wraper container-fluid">
	<div class="page-title">
		<h3 class="title"><?php echo 'List Of Bookings';//echo Yii::t('breadcrumb','settings.roles_heading'); ?></h3>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a
				href="<?php echo Yii::getAlias('@web').'/dashboard'?>"><i
					class="fa fa-dashboard"></i><?php echo Yii::t('breadcrumb', 'common.home'); ?> </a></li>
			<li class="breadcrumb-item"><a
				href="<?php echo Yii::getAlias('@web').'/roles'?>"><?php echo Yii::t('breadcrumb', 'settings.module_name'); ?></a></li>
			<li class="breadcrumb-item active"><a
				href="<?php echo Yii::getAlias('@web').'/roles'?>"><?php echo Yii::t('breadcrumb', 'settings.roles'); ?></a></li>
		</ol>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<table id="datatable" class="table table-striped table-bordered">
									<thead>
										<tr>
											<th>Booking No</th>
											<th>Slot</th>
											<th>Booking Type</th>
											<th>Customer</th>
											<th>Email</th>
											<th>Phone</th>
											<th>Event Date</th>
											<th>From Time</th>
											<th>To Time</th>
											<th>Status</th>
										</tr>
									</thead>
									<tbody>
									<?php
        if (! empty($bookings)) {
            foreach ($bookings as $arrBooking) {
                ?> 
                <tr>
											<td><?php echo $arrBooking['booking_no']; ?></td>
											<td><?php echo $arrBooking['category_type']; ?></td>
											<td><?php echo $arrBooking['booking_type']; ?></td>
											<td><?php echo $arrBooking['fullname']; ?></td>
											<td><?php echo $arrBooking['email']; ?></td>
											<td><?php echo $arrBooking['phone']; ?></td>
											<td><?php echo $arrBooking['event_date']; ?></td>
											<td><?php echo $arrBooking['from_time']; ?></td>
											<td><?php echo $arrBooking['to_time']; ?></td>
											<td><?php echo $arrBooking['booking_status']; ?></td>
										</tr>
                <?php
            }
            unset($bookings);
        }
        ?>
										
									</tbody>
								</table>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>




<script type="text/javascript">
            $(document).ready(function() {
                $('#datatable').dataTable();
                $('#datatable-keytable').DataTable( { keys: true } );
                $('#datatable-responsive').DataTable();
                $('#datatable-scroller').DataTable( { ajax: "assets/datatables/json/scroller-demo.json", deferRender: true, scrollY: 380, scrollCollapse: true, scroller: true } );
                var table = $('#datatable-fixed-header').DataTable( { fixedHeader: true } );
            } );
            TableManageButtons.init();
        </script>

