<title>Laction Admin | Permissions</title>
<div class="wraper container-fluid">
	<div class="page-title">
		<h3 class="title">List Of Permissions</h3>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a
				href="<?php echo Yii::getAlias('@web').'/dashboard'?>"><i
					class="fa fa-dashboard"></i> Home</a></li>
			<li class="breadcrumb-item"><a
				href="<?php echo Yii::getAlias('@web').'/roles'?>">Settings</a></li>
			<li class="breadcrumb-item active"><a
				href="<?php echo Yii::getAlias('@web').'/permissions'?>">Permissions</a></li>
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
											<th>Permission</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
									<?php
        if (! empty($permissions)) {
            foreach ($permissions as $arrPermission) {
                ?>
                <tr>

											<td><?php echo $arrPermission['name']; ?></td>
											<td><?php echo $arrPermission['status']; ?></td>
											<td class="actions">
												<button class="btn btn-primary" data-toggle="modal"
													data-target="#con-close-modal">
													<i class="fa fa-pencil"></i>
												</button>
											</td>
										</tr>
                <?php
            }
            unset($permissions);
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


<div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel" aria-hidden="true"
	style="display: none;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"
					aria-hidden="true">×</button>
				<h4 class="modal-title">Create User</h4>
			</div>
			<div class="modal-body">

				<div class="row">
					<form role="form" class="p-20">
						<div class="form-group">
							<label for="exampleInputEmail1">Permissions</label> <select
								class="form-control">
								<option>--Select Role--</option>
								<option>Admin</option>

							</select>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Status</label> <input type="text"
								class="form-control" id="exampleInputEmail1"
								placeholder="Enter email">
						</div>

						<button type="submit" class="btn btn-purple">Update</button>
					</form>
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
