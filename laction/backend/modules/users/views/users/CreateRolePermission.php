<div class="wraper container-fluid">
	<div class="page-title">
		<h3 class="title">Role Permission</h3>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a
				href="<?php echo Yii::getAlias('@web').'/dashboard'?>"><i
					class="fa fa-dashboard"></i> Home</a></li>
			<li class="breadcrumb-item"><a
				href="<?php echo Yii::getAlias('@web').'/role-permissions'?>">Settings</a></li>
			<li class="breadcrumb-item active"><a
				href="<?php echo Yii::getAlias('@web').'/role-permissions'?>">CreateRolePermissions</a></li>
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


						<div class="row">
							<div class="col-lg-12">
								<div class="tabs-vertical-env">
									<div id="wrap">
										<select class="form-control" name="role">
											<option value="one">--Select Role--</option>
											<option value="two">Admin</option>
										</select>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-5">
								<select name="permission[]" id="undo_redo" class="form-control"
									size="13" multiple="multiple">
									<option value="1">Slots</option>
									<option value="2">Reports</option>
									<option value="3">Notifications</option>
									<option value="4">Settings</option>

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
								<select name="to[]" id="undo_redo_to" class="form-control"
									size="13" multiple="multiple"></select>
							</div>
						</div>
						<br>
						<div class="row">
							<button type="button" class="btn btn-primary m-b-5">Create</button>
						</div>

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