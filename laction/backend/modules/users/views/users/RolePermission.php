<title><?php echo Yii::t('titles', 'laction.admin').Yii::t('titles', 'settings.role_permissions'); ?></title>
<div class="wraper container-fluid">
	<div class="page-title">
		<h3 class="title"><?php echo Yii::t('breadcrumb','settings.role_permissions_heading');?></h3>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a
				href="<?php echo Yii::getAlias('@web').'/dashboard'?>"><i
					class="fa fa-dashboard"></i> <?php echo Yii::t('breadcrumb','common.home');?></a></li>
			<li class="breadcrumb-item"><a
				href="<?php echo Yii::getAlias('@web').'/roles'?>"><?php echo Yii::t('breadcrumb','settings.module_name');?></a></li>
			<li class="breadcrumb-item active"><a
				href="<?php echo Yii::getAlias('@web').'/role-permissions';?>"><?php echo Yii::t('breadcrumb','settings.role_permissions');?></a>
			</li>
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
											<th>Role</th>
											<th>Permissions</th>
										</tr>
									</thead>
									<tbody>
									<?php
        if (! empty($roles)) {
            foreach ($roles as $arrRole) {
                ?>
                <tr>
											<td><?php echo $arrRole['name']; ?></td>
											<td>
												<button class="btn btn-primary" data-toggle="modal"
													data-target=".bs-example-modal-sm"
													onclick="getPermissions('<?php echo $arrRole['name']; ?>')">Permissions</button>
											</td>
										</tr>
									        <?php
            }
        }
        ?>
										
										<div class="modal fade bs-example-modal-sm">
											<div class="modal-dialog modal-sm">
												<div class="modal-content">
													<div class="modal-header">
														<h4 class="modal-title" id="mySmallModalLabel">Permissions</h4>
													</div>
													<div class="modal-body">
													<?php
            
            if (! empty($permissions)) {
                foreach ($permissions as $arrPermission) {
                    ?>
                    <div class="form-group m-l-10">
															<input type="checkbox"
																name="permission_<?php echo $arrPermission['name']; ?>"
																id="permission_<?php echo $arrPermission['name']; ?>"
																onclick="setPermission('<?php echo $arrPermission['name']; ?>')" />&emsp;<label
																class="cr-styled"><?php echo $arrPermission['name']; ?> </label>
														</div>
                    
                    <?php
                }
            }
            ?>
														

													</div>
													<div id="permission_message"></div>
													<button class="md-close btn-sm btn-primary"
														data-dismiss="modal" aria-hidden="true">Close</button>
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
var role = '';
function getPermissions(role_name){
	makeEmpty();
	role = role_name;
	var objRole = {};
	objRole = {
			role : role_name,
			status : 'active',
			};
	$.post('<?php echo Yii::getAlias('@web').'/users/users/get-role-permissions';?>',objRole,function(response){
		var response = $.parseJSON(response);
		if(response){
			$.each(response,function(key, value){
				$("#permission_"+value.permission).prop('checked',true);
				});
			}
		});
			return true;
}

function setPermission(permission_name){ 
	makeEmpty();
	var objPermission = {};
	var status = 'active';
	if($("#permission_"+permission_name).prop('checked') == false){
	   status = 'inactive';
	}	
	objPermission = {
			permission : permission_name,
			role : role,
			status : status,
			sign : 1,
			};
	$.post('<?php echo Yii::getAlias('@web').'/users/users/save-permission';?>',objPermission,function(response){
		var response = $.parseJSON(response);
		$("#permission_message").html(response.message);
		});
		return true;
}

function makeEmpty(){
	$("#permission_message").empty();
	return true;
}
</script>