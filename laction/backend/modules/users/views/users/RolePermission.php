
<div class="wraper container-fluid">
	<div class="page-title">
		<h3 class="title">Role Permission</h3>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a
				href="<?php echo Yii::getAlias('@web').'/dashboard'?>"><i
					class="fa fa-dashboard"></i> Home</a></li>
			<li class="breadcrumb-item">Settings</li>
			<li class="breadcrumb-item active">RolePermissions</li>
		</ol>
	</div>

	<!-- Tabs-style-1 -->
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">

				<div class="panel-body">

					<a href="<?php echo Yii::getAlias('@web').'/role-permissions'?>">
						<button type="button" class="btn btn-primary m-b-5">List</button>
					</a> <a
						href="<?php echo Yii::getAlias('@web').'/create-role-permissions'?>">
						<button type="button" class="btn btn-default m-b-5">Create</button>
					</a>
					<div class="tab-content">
						<div class="tab-pane active">
							<div>

								<table id="datatable" class="table table-striped table-bordered">
									<thead>
										<tr>
											<th>S.No</th>
											<th>Permissions</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td>
												<button class="btn btn-primary" data-toggle="modal"
													data-target=".bs-example-modal-sm">Permissions</button>
											</td>
											<td>Active</td>
											<td class="actions">
												<button class="btn btn-primary" data-toggle="modal"
													data-target="#con-close-modal">
													<i class="fa fa-pencil"></i>
												</button>
											</td>
										</tr>
										<div class="modal fade bs-example-modal-sm">
											<div class="modal-dialog modal-sm">
												<div class="modal-content">
													<div class="modal-header">
														<h4 class="modal-title" id="mySmallModalLabel">Permission
															Name</h4>
													</div>
													<div class="modal-body">
														<div class="form-group m-l-10">
															<label class="cr-styled"> <input type="checkbox"> <i
																class="fa"></i> Permission 1
															</label>
														</div>
														<div class="form-group m-l-10">
															<label class="cr-styled"> <input type="checkbox"> <i
																class="fa"></i> Permission 2
															</label>
														</div>
														<div class="form-group m-l-10">
															<label class="cr-styled"> <input type="checkbox"> <i
																class="fa"></i> Permission 3
															</label>
														</div>
														<div class="form-group m-l-10">
															<label class="cr-styled"> <input type="checkbox"> <i
																class="fa"></i> Permission 4
															</label>
														</div>

													</div>
													<button class="md-close btn-sm btn-primary"
														data-dismiss="modal" aria-hidden="true">Close me!</button>
												</div>
												<!-- /.modal-content -->

											</div>
											<!-- /.modal-dialog -->

										</div>
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