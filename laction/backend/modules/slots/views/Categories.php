<div class="wraper container-fluid">
	<div class="page-title">
		<h3 class="title">Categories</h3>
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
											<th>Name</th>
											<th>Status</th>
											<th>Actions</th>

										</tr>
									</thead>


									<tbody>
									<?php
        if (! empty($categories)) {
            foreach ($categories as $arrCategory) {
                ?>
                <tr>
											<td><?php echo $arrCategory['name']; ?></td>
											<td><?php echo $arrCategory['status']; ?></td>
											<td class="actions">
												<button class="btn btn-primary" data-toggle="modal"
													data-target="#edit-close-modal"
													onclick="setCategory(<?php echo $arrCategory['category_id']; ?>)">
													<i class="fa fa-pencil"></i>
												</button>
											</td>
										</tr>
                <?php
            }
            unset($categories);
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
				<h4 class="modal-title">Create Category</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div id="category_success_message"></div>
					<form action="" method="post" role="form" class="p-20">
						<!-- Name :: START -->
						<div class="form-group">
							<label for="categoryname">Name * </label> <input type="text"
								class="form-control" name="name" id="name"
								placeholder="Enter category name" autocomplete="off" />
						</div>
						<div id="err_name"></div>
						<!-- Name :: END -->
						<!-- Status :: START -->
						<div class="form-group">
							<input type="hidden" id="status" name="status" value="active" />
						</div>
						<!-- Status :: END -->
						<input type="button" class="btn btn-purple" name="create_category"
							id="create_category" value="Create" onclick="createCategory()" />
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
				<h4 class="modal-title">Edit Category</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div id="edit_category_success_message"></div>
					<form action="" method="post" role="form" class="p-20">
						<!-- Name :: START -->
						<div class="form-group">
							<label for="categoryname">Name * </label> <input type="text"
								class="form-control" name="edit_name" id="edit_name" value=""
								autocomplete="off" />
						</div>
						<div id="edit_err_name"></div>
						<!-- Name :: END -->
						<!-- Status :: START -->
						<div class="form-group">
							<select class="form-control" name="edit_status" id="edit_status">
								<option value="">--Select Status--</option>
								<?php
        
        if (! empty($statuses)) {
            foreach ($statuses as $key => $value) {
                ?>
                <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
               <?php
            }
            unset($statuses);
        }
        ?>
							</select> <input type='hidden' name='edit_category_id'
								id='edit_category_id' value='' />
						</div>
						<div id="edit_err_status"></div>
						<!-- Status :: END -->
						<input type="button" class="btn btn-purple" name="update_category"
							id="update_category" value="Update" onclick="editCategory()" />
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

<script>
function createCategory(){
	var objCategory = {};
	objCategory = {
			name : $("#name").val(),
           status : $("#status").val(),
           _csrf: '<?=Yii::$app->request->csrfToken?>',
     };
    $.post('<?php echo Yii::getAlias('@web').'/slots/slots/create-category'; ?>',objCategory,function(response){
    	makeEmpty();
    	var response = $.parseJSON(response);
        if(response.hasOwnProperty('errors')){
            //Category Name
      	  if(undefined != response.errors.name && response.errors.name.length > 0){
      		   $("#err_name").html(response.errors.name);
      		   }
 		   return false;
            }else{
            	makeFieldsEmpty();
              $("#category_success_message").html(response.message);
              setTimeout(function(){location.reload()},1500);
              return true;         
                }
        });

}

function makeEmpty(){
	  $("#err_name").empty();
	  $("#category_success_message").empty();
	  return true;
	  }

  function makeFieldsEmpty(){
	  $("#name").val("");
	  return true;
	  }

  function makeEditEmpty(){
	  $("#edit_err_name").empty();
	  $("#edit_err_status").empty();
	  $("#edit_category_success_message").empty();
	  return true;
	  }


  function editCategory(){
		var objCategory = {};
		objCategory = {
				name : $("#edit_name").val(),
	           status : $("#edit_status").val(),
	           _csrf: '<?=Yii::$app->request->csrfToken?>',
	           id : $('#edit_category_id').val(),
	     };
	    $.post('<?php echo Yii::getAlias('@web').'/slots/slots/create-category'; ?>',objCategory,function(response){
            makeEditEmpty();
	    	var response = $.parseJSON(response);
	        if(response.hasOwnProperty('errors')){
	            //Category Name
	      	  if(undefined != response.errors.name && response.errors.name.length > 0){
	      		   $("#edit_err_name").html(response.errors.name);
	      		   }
	      	//Status
          	  if(undefined != response.errors.status && response.errors.status.length > 0){
          		   $("#edit_err_status").html(response.errors.status);
          		   }
	 		   return false;
	            }else{
	              $("#edit_category_success_message").html(response.message);
	              setTimeout(function(){location.reload()},1500);
	              return true;         
	                }
	        });
	}
  function setCategory(category_id){
		makeEditEmpty();
  		  var objCategory = {};
  		objCategory = {
             category_id : category_id
    	  		  };
  		  $.post('<?php echo Yii::getAlias('@web').'/slots/slots/get-categories'; ?>',objCategory,function(response){
  			response = $.parseJSON(response);
       	if(response){
              $("#edit_name").val(response.name);
              $("#edit_status").val(response.status);
              $("#edit_category_id").val(response.category_id);
           	}
       	  	  	  		  });
	  		  return true;
  		  }
</script>