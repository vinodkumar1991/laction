<div class="wraper container-fluid">
	<div class="page-title">
		<h3 class="title">Sub Categories</h3>
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
											<th>Category Name</th>
											<th>Name</th>
											<th>Status</th>
											<th>Actions</th>

										</tr>
									</thead>


									<tbody>
									<?php
        if (! empty($subcategories)) {
            foreach ($subcategories as $arrSubCategory) {
                ?>
                <tr>
											<td><?php echo $arrSubCategory['category_name']; ?></td>
											<td><?php echo $arrSubCategory['name']; ?></td>
											<td><?php echo $arrSubCategory['status']; ?></td>
											<td class="actions">
												<button class="btn btn-primary" data-toggle="modal"
													data-target="#edit-close-modal"
													onclick="setSubCategory(<?php echo $arrSubCategory['sub_category_id']; ?>)">
													<i class="fa fa-pencil"></i>
												</button>
											</td>
										</tr>
                <?php
            }
            unset($subcategories);
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
				<h4 class="modal-title">Create Sub Category</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div id="sub_category_success_message"></div>
					<form action="" method="post" role="form" class="p-20">
						<!-- Category Name :: START -->
						<div class="form-group">
							<label for="categoryname">Category Name * </label> <select
								class="form-control" id="category_name" name="cattegory_name">
								<option value="">--Select Category Name--</option>
								<?php
        
        if (! empty($categories)) {
            foreach ($categories as $arrCategory) {
                ?>
                <option value="<?php echo $arrCategory['name']; ?>"><?php echo $arrCategory['name']; ?></option>
                <?php
            }
        }
        ?>
							</select>
						</div>
						<div id="err_category_name"></div>
						<!-- Category Name :: END -->
						<!-- Name :: START -->
						<div class="form-group">
							<label for="subcategoryname">Sub Category Name * </label> <input
								type="text" class="form-control" name="name" id="name"
								placeholder="Enter sub category name" autocomplete="off" />
						</div>
						<div id="err_name"></div>
						<!-- Name :: END -->
						<!-- Status :: START -->
						<div class="form-group">
							<input type="hidden" id="status" name="status" value="active" />
						</div>
						<!-- Status :: END -->
						<input type="button" class="btn btn-purple"
							name="create_sub_category" id="create_sub_category"
							value="Create" onclick="createSubCategory()" />
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
						<!-- Category Name :: START -->
						<div class="form-group">
							<label for="categoryname">Category Name * </label> <select
								class="form-control" id="edit_category_name"
								name="edit_cattegory_name">
								<option value="">--Select Category Name--</option>
								<?php
        
        if (! empty($categories)) {
            foreach ($categories as $arrCategory) {
                ?>
                <option value="<?php echo $arrCategory['name']; ?>"><?php echo $arrCategory['name']; ?></option>
                <?php
            }
            unset($categories);
        }
        ?>
							</select>
						</div>
						<div id="edit_err_category_name"></div>
						<!-- Category Name :: END -->
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
							<label for="categoryname">Status * </label> <select
								class="form-control" name="edit_status" id="edit_status">
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
							</select> <input type='hidden' name='edit_sub_category_id'
								id='edit_sub_category_id' value='' />
						</div>
						<div id="edit_err_status"></div>
						<!-- Status :: END -->
						<input type="button" class="btn btn-purple"
							name="update_sub_category" id="update_sub_category"
							value="Update" onclick="editSubCategory()" />
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
function createSubCategory(){
	var objCategory = {};
	objCategory = {
			category_name : $("#category_name").val(),
			name : $("#name").val(),
           status : $("#status").val(),
           _csrf: '<?=Yii::$app->request->csrfToken?>',
     };
    $.post('<?php echo Yii::getAlias('@web').'/slots/slots/create-sub-category'; ?>',objCategory,function(response){
    	makeEmpty();
    	var response = $.parseJSON(response);
        if(response.hasOwnProperty('errors')){
        	//Category Name
        	  if(undefined != response.errors.category_name && response.errors.category_name.length > 0){
        		   $("#err_category_name").html(response.errors.category_name);
        		   }
            //Sub Category Name
      	  if(undefined != response.errors.name && response.errors.name.length > 0){
      		   $("#err_name").html(response.errors.name);
      		   }
 		   return false;
            }else{
            	makeFieldsEmpty();
              $("#sub_category_success_message").html(response.message);
              setTimeout(function(){location.reload()},1500);
              return true;         
                }
        });
}

function makeEmpty(){
	$("#err_category_name").empty();
	  $("#err_name").empty();
	  $("#sub_category_success_message").empty();
	  return true;
	  }

  function makeFieldsEmpty(){
	  $("#category_name").val("");
	  $("#name").val("");
	  return true;
	  }

  function makeEditEmpty(){
	  $("#edit_err_category_name").empty();
	  $("#edit_err_name").empty();
	  $("#edit_err_status").empty();
	  $("#edit_sub_category_success_message").empty();
	  return true;
	  }


  function editSubCategory(){
		var objSubCategory = {};
		objSubCategory = {
				category_name : $("#edit_category_name").val(),
				name : $("#edit_name").val(),
	           status : $("#edit_status").val(),
	           _csrf: '<?=Yii::$app->request->csrfToken?>',
	           id : $('#edit_sub_category_id').val(),
	     };
	    $.post('<?php echo Yii::getAlias('@web').'/slots/slots/create-sub-category'; ?>',objSubCategory,function(response){
            makeEditEmpty();
	    	var response = $.parseJSON(response);
	        if(response.hasOwnProperty('errors')){
	        	//Category Name
		      	  if(undefined != response.errors.category_name && response.errors.category_name.length > 0){
		      		   $("#edit_err_category_name").html(response.errors.category_name);
		      		   }
	            //Sub Category Name
	      	  if(undefined != response.errors.name && response.errors.name.length > 0){
	      		   $("#edit_err_name").html(response.errors.name);
	      		   }
	      	//Status
          	  if(undefined != response.errors.status && response.errors.status.length > 0){
          		   $("#edit_err_status").html(response.errors.status);
          		   }
	 		   return false;
	            }else{
	              $("#edit_sub_category_success_message").html(response.message);
	              setTimeout(function(){location.reload()},1500);
	              return true;         
	                }
	        });
	}
  function setSubCategory(sub_category_id){
		makeEditEmpty();
  		  var objSubCategory = {};
  		objSubCategory = {
             sub_category_id : sub_category_id
    	  		  };
  		  $.post('<?php echo Yii::getAlias('@web').'/slots/slots/get-sub-categories'; ?>',objSubCategory,function(response){
  			response = $.parseJSON(response);
       	if(response){
              $("#edit_category_name").val(response.category_name);
              $("#edit_name").val(response.name);
              $("#edit_status").val(response.status);
              $("#edit_sub_category_id").val(response.sub_category_id);
           	}
       	  	  	  		  });
	  		  return true;
  		  }
</script>