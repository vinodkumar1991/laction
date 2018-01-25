
<title><?php echo Yii::t('titles', 'laction.admin').Yii::t('titles', 'settings.roles'); ?></title>
<div class="wraper container-fluid">
	<div class="page-title">
		<h3 class="title">List Of Roles</h3>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a
				href="<?php echo Yii::getAlias('@web').'/dashboard'?>"><i
					class="fa fa-dashboard"></i> Home</a></li>
			<li class="breadcrumb-item"><a
				href="<?php echo Yii::getAlias('@web').'/roles'?>">Settings</a></li>
			<li class="breadcrumb-item active"><a
				href="<?php echo Yii::getAlias('@web').'/roles'?>">Roles</a></li>
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
											<th>Role</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
									<?php
        if (! empty($roles)) {
            foreach ($roles as $arrRole) {
                ?>
                <tr>
											<td><?php echo $arrRole['name']; ?></td>
											<td><?php echo $arrRole['status']; ?></td>
											<td class="actions">
												<button class="btn btn-primary" data-toggle="modal"
													data-target="#con-close-modal"
													onclick="getRole(<?php echo $arrRole['id']; ?>)">
													<i class="fa fa-pencil"></i>
												</button>
											</td>
										</tr>
                <?php
            }
            unset($roles);
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
					aria-hidden="true">�</button>
				<h4 class="modal-title">Edit Role</h4>
			</div>
			<div class="modal-body">

				<div class="row">
					<form role="form" class="p-20" method="post" action="">
						<div class="form-group">
							<label for="exampleInputEmail1">Role Name</label> <input
								type="textbox" class="form-control" id="name" name="name"
								value="" /> <input type="hidden" name="role_id" id="role_id"
								value="" />
						</div>
						<input type="button" class="btn btn-purple" name='edit_role'
							id='edit_role' value='Update' onclick='updateRole()' />
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

            function updateRole(){
                var objRole = {};
                objRole = {
                        id : $("#role_id").val(),
                        name : $("#name").val()};
                return true;
                }

            function getRole(role_id){
                var objInputs = {};
                objInputs = {
                		_csrf: '<?=Yii::$app->request->csrfToken?>',
                        role_id : role_id
                        };
                $.post('<?php echo Yii::getAlias('@web').'/users/users/get-roles'; ?>',objInputs,function(response){
                	response = $.parseJSON(response);
                	if(response){
                		$("#name").val(response.name);
                		$("#role_id").val(response.id);
                    	}
                    });
                		return true;
            }
        </script>

