
<title><?php echo Yii::t('titles', 'laction.admin').Yii::t('titles', 'settings.roles'); ?></title>
<div class="wraper container-fluid">
	<div class="page-title">
		<h3 class="title"><?php echo 'List Of Customers';//echo Yii::t('breadcrumb','settings.roles_heading'); ?></h3>
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
											<th>Fullname</th>
											<th>Email</th>
											<th>Phone</th>
											<th>Status</th>
										</tr>
									</thead>
									<tbody>
									<?php
        if (! empty($customers)) {
            foreach ($customers as $arrCustomer) {
                ?> 
                <tr>
											<td><?php echo $arrCustomer['fullname']; ?></td>
											<td><?php echo $arrCustomer['email']; ?></td>
											<td><?php echo $arrCustomer['phone']; ?></td>
											<td><?php echo $arrCustomer['status']; ?></td>
										</tr>
                <?php
            }
            unset($customers);
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

