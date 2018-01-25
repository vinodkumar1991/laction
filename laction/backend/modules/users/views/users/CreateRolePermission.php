<title><?php echo Yii::t('titles', 'laction.admin').Yii::t('titles', 'settings.role_permissions'); ?></title>
<div class="wraper container-fluid">
	<div class="page-title">
		<h3 class="title"><?php echo Yii::t('titles','settings.create_role_permissions');?></h3>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a
				href="<?php echo Yii::getAlias('@web').'/dashboard'?>"><i
					class="fa fa-dashboard"></i><?php echo Yii::t('breadcrumb','common.home');?></a></li>
			<li class="breadcrumb-item"><a
				href="<?php echo Yii::getAlias('@web').'/roles'?>"><?php echo Yii::t('breadcrumb','settings.module_name');?></a></li>
			<li class="breadcrumb-item active"><a
				href="<?php echo Yii::getAlias('@web').'/create-role-permissions'?>"><?php echo Yii::t('breadcrumb','settings.create_role_permissions');?></a></li>
		</ol>
	</div>

	<!-- Tabs-style-1 -->
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">

				<div class="panel-body">

					<a href="<?php echo Yii::getAlias('@web').'/role-permissions'?>">
						<button type="button" class="btn btn-default m-b-5">List</button>
					</a> <a
						href="<?php echo Yii::getAlias('@web').'/create-role-permissions'?>">
						<button type="button" class="btn btn-primary m-b-5">Create</button>
					</a>
					<div class="tab-content">

						<form method="post" action="">
							<div class="row">

								<div class="col-lg-12">
									<div class="tabs-vertical-env">
										<div id="wrap">
											<select class="form-control" name="role" id="role">
												<option value="">--Select Role--</option>
                                            <?php
                                            
                                            if (! empty($roles)) {
                                                foreach ($roles as $arrRole) {
                                                    if (isset($fields['role']) && ($fields['role'] == $arrRole['name'])) {
                                                        ?>
                                                     <option
													value="<?php echo $arrRole['name']; ?>" selected><?php echo $arrRole['name']; ?></option>
                                                     <?php
                                                    } else {
                                                        ?>
                                                    <option
													value="<?php echo $arrRole['name']; ?>"><?php echo $arrRole['name']; ?></option>
                                                <?php
                                                    }
                                                }
                                                unset($roles);
                                            }
                                            ?>
										</select>
										</div>
										<div><?php echo isset($errors['role'][0]) ? $errors['role'][0] : NULL;?></div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-5">
									<select name="permission_parent[]" id="undo_redo"
										class="form-control" size="13" multiple="multiple">
									<?php
        
        if (! empty($permissions)) {
            foreach ($permissions as $arrPermission) {
                if (isset($fields['permission']) && ! in_array($arrPermission['name'], $fields['permission'])) {
                    ?>
                <option value="<?php echo $arrPermission['name']; ?>"><?php echo $arrPermission['name']; ?></option>
                <?php
                } else if (! isset($fields['permission'])) {
                    ?>
                    <option
											value="<?php echo $arrPermission['name']; ?>"><?php echo $arrPermission['name']; ?></option>
										<?php
                }
            }
            unset($permissions);
        }
        ?>
									

								</select>
								</div>

								<div class="col-xs-2">
									<button type="button" id="undo_redo_undo"
										class="btn btn-primary btn-block">undo</button>
									<button type="button" id="undo_redo_rightAll"
										class="btn btn-default btn-block">
										<i class="fa fa-angle-double-right"></i>
									</button>
									<button type="button" id="undo_redo_rightSelected"
										class="btn btn-default btn-block">
										<i class="fa fa-angle-right"></i>
									</button>
									<button type="button" id="undo_redo_leftSelected"
										class="btn btn-default btn-block">
										<i class="fa fa-angle-left"></i>
									</button>
									<button type="button" id="undo_redo_leftAll"
										class="btn btn-default btn-block">
										<i class="fa fa-angle-double-left"></i>
									</button>
									<button type="button" id="undo_redo_redo"
										class="btn btn-warning btn-block">redo</button>
								</div>

								<div class="col-xs-5">
									<select name="permission[]" id="undo_redo_to"
										class="form-control" size="13" multiple="multiple">
										<?php
        if (isset($fields['permission']) && ! empty($fields['permission'])) {
            foreach ($fields['permission'] as $key => $value) {
                ?>
                <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
                <?php
            }
        }
        ?>
										</select>
								</div>
								<div><?php echo isset($errors['permission'][0]) ? $errors['permission'][0] : NULL;?></div>
								<input type="hidden" name="status" id="status" value="active" />
							</div>
							<br>
							<div class="row">
								<input type="submit" class="btn btn-primary m-b-5"
									name="create_role_permission" id="create_role_permission"
									value="Create" />
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- This is for Multiselect plugin Link-->
<script type="text/javascript"
	src="<?php echo Yii::getAlias('@asset').'/roles-css/dist/js/multiselect.min.js'?>"></script>
<script type="text/javascript">
$(document).ready(function() {
    // make code pretty
    window.prettyPrint && prettyPrint();

    $('#undo_redo').multiselect();
});
</script>
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