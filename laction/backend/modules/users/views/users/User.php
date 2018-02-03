<div class="wraper container-fluid">
	<div class="page-title">
		<h3 class="title">Admin Users</h3>
	</div>


	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">

				<div class="panel-body">
					<div class="row">
						<div class="col-sm-6">
							<div class="m-b-30">
								<!--   <button id="addToTable" class="btn btn-primary waves-effect waves-light">Add <i class="fa fa-plus"></i></button>-->
								<button class="btn btn-primary" data-toggle="modal"
									data-target="#con-close-modal">
									Add <i class="fa fa-plus"></i>
								</button>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">


								<table id="datatable" class="table table-striped table-bordered">
									<thead>
										<tr>
											<th>Role</th>
											<th>Full Name</th>
											<th>Phone</th>
											<th>Email</th>
											<th>Image</th>
											<th>Status</th>
											<th>Actions</th>

										</tr>
									</thead>


									<tbody>
									<?php
        if (! empty($users)) {
            foreach ($users as $arrUser) {
                ?>
                <tr>
											<td><?php echo $arrUser['role_name']; ?></td>
											<td><?php echo $arrUser['fullname']; ?></td>
											<td><?php echo $arrUser['phone']; ?></td>
											<td><?php echo $arrUser['email']; ?></td>
											<td></td>
											<td><?php echo $arrUser['status']; ?></td>
											<td class="actions">
												<button class="btn btn-primary" data-toggle="modal"
													data-target="#edit-close-modal"
													onclick="setUser(<?php echo $arrUser['user_id']; ?>)">
													<i class="fa fa-pencil"></i>
												</button>
											</td>
										</tr>
                <?php
            }
            unset($users);
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
					<div id="user_success_message"></div>
					<form action="" method="post" role="form" class="p-20">
						<!-- Fullname :: START -->
						<div class="form-group">
							<label for="fullname">Full Name * </label> <input type="text"
								class="form-control" name="fullname" id="fullname"
								placeholder="Enter full name" autocomplete="off" />
						</div>
						<div id="err_fullname"></div>
						<!-- Fullname :: END -->
						<!-- Role :: START -->
						<div class="form-group">
							<label for="role">Role *</label><select class="form-control"
								name="role_id" id="role_id">
								<option value="">--Select A Role--</option>
								<?php
        if (! empty($roles)) {
            foreach ($roles as $arrRole) {
                ?>
                <option
									value="<?php echo $arrRole['id'].'-'.$arrRole['name'];?>"><?php echo $arrRole['name']; ?></option>
                <?php
            }
        }
        ?>
							</select>
						</div>
						<div id="err_role_id"></div>
						<!-- Role :: END -->
						<!-- Phone :: START -->
						<div class="form-group">
							<label for="phone">Phone * </label> <input type="text"
								class="form-control" id="phone" name="phone"
								placeholder="Enter phone number" autocomplete="off" />
						</div>
						<div id="err_phone"></div>
						<!-- Phone :: END -->
						<!-- Email :: START -->
						<div class="form-group">
							<label for="email">Email</label> <input type="text"
								class="form-control" id="email" name="email"
								placeholder="Enter email address" autocomplete="off" />
						</div>
						<div id="err_email"></div>
						<!-- Email :: END -->
						<!-- Status :: START -->
						<div class="form-group">
							<!-- 							<label for="status">Status</label>  -->
							<input type="hidden" id="status" name="status" value="active" />
						</div>
						<!-- 						<div id="err_status"></div> -->
						<!-- Status :: END -->
						<input type="button" class="btn btn-purple" name="create_user"
							id="create_user" value="Create" onclick="createUser()" />
					</form>
				</div>
			</div>

		</div>
	</div>
</div>

<div id="edit-close-modal" class="modal fade" tabindex="-1"
	role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
	style="display: none;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"
					aria-hidden="true">×</button>
				<h4 class="modal-title">Edit User</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div id="edit_user_success_message"></div>
					<form action="" method="post" role="form" class="p-20">
						<!-- Fullname :: START -->
						<div class="form-group">
							<label for="fullname">Full Name * </label> <input type="text"
								class="form-control" name="edit_fullname" id="edit_fullname"
								value="" autocomplete="off" />
						</div>
						<div id="edit_err_fullname"></div>
						<!-- Fullname :: END -->
						<!-- Role :: START -->
						<div class="form-group">
							<label for="role">Role *</label><select class="form-control"
								name="edit_role_id" id="edit_role_id">
								<option value="">--Select A Role--</option>
								<?php
        if (! empty($roles)) {
            foreach ($roles as $arrRole) {
                ?>
                <option
									value="<?php echo $arrRole['id'].'-'.$arrRole['name'];?>"><?php echo $arrRole['name']; ?></option>
                <?php
            }
            unset($roles);
        }
        ?>
							</select>
						</div>
						<div id="edit_err_role_id"></div>
						<!-- Role :: END -->
						<!-- Phone :: START -->
						<div class="form-group">
							<label for="phone">Phone * </label> <input type="text"
								class="form-control" id="edit_phone" name="edit_phone" value=""
								autocomplete="off" />
						</div>
						<div id="edit_err_phone"></div>
						<!-- Phone :: END -->
						<!-- Email :: START -->
						<div class="form-group">
							<label for="email">Email</label> <input type="text"
								class="form-control" id="edit_email" name="edit_email" value=""
								autocomplete="off" />
						</div>
						<div id="edit_err_email"></div>
						<!-- Email :: END -->
						<!-- Status :: START -->
						<div class="form-group">
							<label for="status">Status *</label> <select class="form-control"
								id="edit_status" name="edit_status">
								<option value="">--Select Status--</option>
								<?php
        
        if (! empty($statuses)) {
            foreach ($statuses as $key => $value) {
                ?>
                <option value="<?php echo $key;?>"><?php echo $value;?></option>
                <?php
            }
            unset($statuses);
        }
        ?>
							</select> <input type='hidden' name='edit_user_id'
								id='edit_user_id' value='' />
						</div>
						<div id="edit_err_status"></div>
						<!-- Status :: END -->
						<input type="button" class="btn btn-purple" name="edit_user"
							id="edit_user" value="Update" onclick="editUser()" />
					</form>
				</div>
			</div>

		</div>
	</div>
</div>
<script src="<?php echo Yii::getAlias('@asset').'/js/fileinput.js'?>"></script>
<script>
$("#input-image-2").fileinput({
    uploadUrl: "/site/image-upload",
    allowedFileExtensions: ["jpg", "png", "gif"],
    maxImageHeight: 150,
    maxFileCount: 1,
    resizeImage: true
}).on('filepreupload', function() {
    $('#kv-success-box').html('');
}).on('fileuploaded', function(event, data) {
    $('#kv-success-box').append(data.response.link);
    $('#kv-success-modal').modal('show');
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

<script>
function createUser(){
	var objUser = {};
	objUser = {
			fullname : $("#fullname").val(),
			role_id : $("#role_id").val(),
			email : $("#email").val(),
            phone : $("#phone").val(),
           status : $("#status").val(),
           _csrf: '<?=Yii::$app->request->csrfToken?>',
     };
    $.post('<?php echo Yii::getAlias('@web').'/users/users/create-user'; ?>',objUser,function(response){
    	makeEmpty();
    	var response = $.parseJSON(response);
        if(response.hasOwnProperty('errors')){
            //Fullname
      	  if(undefined != response.errors.fullname && response.errors.fullname.length > 0){
      		   $("#err_fullname").html(response.errors.fullname);
      		   }
      	//Role
      	  if(undefined != response.errors.role_id && response.errors.role_id.length > 0){
      		   $("#err_role_id").html(response.errors.role_id);
      		   }
      	//Phone
      	  if(undefined != response.errors.phone && response.errors.phone.length > 0){
      		   $("#err_phone").html(response.errors.phone);
      		   }
      	//Email
      	  if(undefined != response.errors.email && response.errors.email.length > 0){
      		   $("#err_email").html(response.errors.email);
      		   }
 		   return false;
            }else{
            	makeFieldsEmpty();
              $("#user_success_message").html(response.message);
              setTimeout(function(){location.reload()},1500);
              return true;         
                }
        });

}

function makeEmpty(){
	  $("#err_fullname").empty();
	  $("#err_role_id").empty();
	  $("#err_phone").empty();
	  $("#err_email").empty();
	  $("#user_success_message").empty();
	  return true;
	  }

  function makeFieldsEmpty(){
	  $("#fullname").val("");
	  $("#role_id").val("");
	  $("#phone").val("");
	  $("#email").val("");
	  return true;
	  }

  function makeEditEmpty(){
	  $("#edit_err_fullname").empty();
	  $("#edit_err_role_id").empty();
	  $("#edit_err_phone").empty();
	  $("#edit_err_email").empty();
	  $("#edit_err_status").empty();
	  $("#edit_user_success_message").empty();
	  return true;
	  }


  function editUser(){
		var objUser = {};
		objUser = {
				fullname : $("#edit_fullname").val(),
				role_id : $("#edit_role_id").val(),
				email : $("#edit_email").val(),
	            phone : $("#edit_phone").val(),
	           status : $("#edit_status").val(),
	           _csrf: '<?=Yii::$app->request->csrfToken?>',
	           id : $('#edit_user_id').val(),
	     };
	    $.post('<?php echo Yii::getAlias('@web').'/users/users/create-user'; ?>',objUser,function(response){
            makeEditEmpty();
	    	var response = $.parseJSON(response);
	        if(response.hasOwnProperty('errors')){
	            //Fullname
	      	  if(undefined != response.errors.fullname && response.errors.fullname.length > 0){
	      		   $("#edit_err_fullname").html(response.errors.fullname);
	      		   }
	      	//Role
	      	  if(undefined != response.errors.role_id && response.errors.role_id.length > 0){
	      		   $("#edit_err_role_id").html(response.errors.role_id);
	      		   }
	      	//Phone
	      	  if(undefined != response.errors.phone && response.errors.phone.length > 0){
	      		   $("#edit_err_phone").html(response.errors.phone);
	      		   }
	      	//Email
	      	  if(undefined != response.errors.email && response.errors.email.length > 0){
	      		   $("#edit_err_email").html(response.errors.email);
	      		   }
	      	//Status
          	  if(undefined != response.errors.status && response.errors.status.length > 0){
          		   $("#edit_err_status").html(response.errors.status);
          		   }
	 		   return false;
	            }else{
	              $("#edit_user_success_message").html(response.message);
	              setTimeout(function(){location.reload()},1500);
	              return true;         
	                }
	        });

	}
  function setUser(user_id){
		makeEditEmpty();
  		  var objUser = {};
  		  objUser = {
             user_id : user_id
    	  		  };
  		  $.post('<?php echo Yii::getAlias('@web').'/users/users/get-users'; ?>',objUser,function(response){
  			response = $.parseJSON(response);
       	if(response){
              $("#edit_fullname").val(response.fullname);
              $("#edit_role_id").val(response.role_id+'-'+response.role_name);
              $("#edit_phone").val(response.phone);
              $("#edit_email").val(response.email);
              $("#edit_status").val(response.status);
              $("#edit_user_id").val(response.user_id);
           	}
       	  	  	  		  });
	  		  return true;
  		  }
</script>