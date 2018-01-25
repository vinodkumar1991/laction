<title><?php echo Yii::t('titles', 'laction.admin').Yii::t('titles', 'settings.permissions'); ?></title>
<div class="wraper container-fluid">
	<div class="page-title">
		<h3 class="title"><?php echo Yii::t('breadcrumb','settings.permissions_heading');?></h3>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a
				href="<?php echo Yii::getAlias('@web').'/dashboard'?>"><i
					class="fa fa-dashboard"></i><?php echo Yii::t('breadcrumb','common.home');?></a></li>
			<li class="breadcrumb-item"><a
				href="<?php echo Yii::getAlias('@web').'/roles'?>"><?php echo Yii::t('breadcrumb','settings.module_name');?></a></li>
			<li class="breadcrumb-item active"><a
				href="<?php echo Yii::getAlias('@web').'/permissions'?>"><?php echo Yii::t('breadcrumb','settings.permissions');?></a></li>
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
													data-target="#con-close-modal"
													onclick="getPermission(<?php echo $arrPermission['id']; ?>)">
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
				<h4 class="modal-title">Edit Permission</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div id="permission_message"></div>
					<form role="form" class="p-20" method="post" action="">
						<div class="form-group">
							<label for="permission">Permission Name</label> <input
								type="text" class="form-control" id="name" name="name" value="" />
							<input type="hidden" name="permission_id" id="permission_id"
								value="" />
						</div>
						<div id="err_permission"></div>
						<input type="button" class="btn btn-purple" name="edit_permission"
							id="edit_permission" value="Update" onclick="updatePermission()" />
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

            function updatePermission(){
                var objPermission = {};
                objPermission = {
                        id : $("#permission_id").val(),
                        name : $("#name").val()};
                $.post('<?php echo Yii::getAlias('@web').'/users/users/update-permission'; ?>',objPermission,function(response){
                    makeEmpty();
                	response = $.parseJSON(response);
                	if(response.hasOwnProperty('errors')){
                		if(undefined != response.errors.name && response.errors.name.length > 0){
                 		   $("#err_permission").html(response.errors.name);
                 		   }
                		return false;
                	}else{
                		$("#permission_message").html(response.message);
                        setTimeout(function(){location.reload()},1500);
                        return true;
                    	}
                    });
                return true;
                }
            
            function getPermission(permission_id){
                makeEmpty();
                var objInputs = {};
                objInputs = {
                		_csrf: '<?=Yii::$app->request->csrfToken?>',
                        permission_id : permission_id
                        };
                $.post('<?php echo Yii::getAlias('@web').'/users/users/get-permissions'; ?>',objInputs,function(response){
                	response = $.parseJSON(response);
                	if(response){
                		$("#name").val(response.name);
                		$("#permission_id").val(response.id);
                    	}
                    });
                		return true;
            }

            function makeEmpty(){
    			  $("#err_permission").empty();
    			  $("#permission_message").empty();
    			  return true;
        		  }
        </script>
