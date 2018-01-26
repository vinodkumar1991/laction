<title><?php echo Yii::t('titles', 'laction.admin').Yii::t('titles', 'notifications.subjects'); ?></title>
<div class="wraper container-fluid">
	<div class="page-title">
		<h3 class="title"><?php echo Yii::t('breadcrumb','notifications.subject_heading');?></h3>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a
				href="<?php echo Yii::getAlias('@web').'/dashboard'?>"><i
					class="fa fa-dashboard"></i><?php echo Yii::t('breadcrumb','common.home');?></a></li>
			<li class="breadcrumb-item"><a
				href="<?php echo Yii::getAlias('@web').'/subjects'?>"><?php echo Yii::t('breadcrumb','notifications.module_name');?></a></li>
			<li class="breadcrumb-item active"><a
				href="<?php echo Yii::getAlias('@web').'/subjects'?>"><?php echo Yii::t('breadcrumb','notifications.subjects');?></a></li>
		</ol>
	</div>

	<button class="btn btn-primary add-more" type="button"
		data-toggle="modal" data-target="#subject-close-modal">
		<i class="glyphicon glyphicon-plus"></i> Add Subject
	</button>
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
											<th>Message Type</th>
											<th>Category Type</th>
											<th>Subject</th>
											<th>Route Number</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
									<?php
        if (! empty($subjects)) {
            foreach ($subjects as $arrSubject) {
                ?>
                <tr>

											<td><?php echo $arrSubject['message_type']; ?></td>
											<td><?php echo $arrSubject['category_type']; ?></td>
											<td><?php echo $arrSubject['subject']; ?></td>
											<td><?php echo $arrSubject['route']; ?></td>
											<td><?php echo $arrSubject['status']; ?></td>
											<td class="actions">
												<button class="btn btn-primary" data-toggle="modal"
													data-target="#con-close-modal"
													onclick="setSubject(<?php echo $arrSubject['sender_id']; ?>)">
													<i class="fa fa-pencil"></i>
												</button>
											</td>
										</tr>
                <?php
            }
            unset($subjects);
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
				<h4 class="modal-title">Edit Subject</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div id="edit_subject_message"></div>
					<form role="form" class="p-20" method="post" action="">
						<!-- Message Type :: START -->
						<div class="form-group">
							<label for="messagetype">Message Type</label> <select
								class="form-control" id="edit_message_type"
								name="edit_message_type">
								<option value="">--Select Message Type--</option>
								<?php
        
        if (! empty($message_types)) {
            foreach ($message_types as $key => $value) {
                ?>
                <option value="<?php echo $key; ?>"><?php echo $value;?></option>
                <?php
            }
        }
        ?>
							</select>
						</div>
						<div id="err_edit_message_type"></div>
						<!-- Message Type :: END -->
						<!-- Category Type :: START -->
						<div class="form-group">
							<label for="categorytype">Category Type</label> <select
								class="form-control" id="edit_category_type"
								name="edit_category_type">
								<option value="">--Select Category Type--</option>
								<?php
        
        if (! empty($category_types)) {
            foreach ($category_types as $key => $value) {
                ?>
                <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                <?php
            }
        }
        ?>
							</select>
						</div>
						<div id="err_edit_category_type"></div>
						<!-- Category Type :: END -->
						<!-- Subject :: START -->
						<div class="form-group">
							<label for="subject">Subject</label> <input type="text"
								class="form-control" id="edit_subject" name="edit_subject"
								value="" />
						</div>
						<div id="err_edit_subject"></div>
						<!-- Subject :: END -->
						<!-- Status :: START -->
						<div class="form-group">
							<label for="status">Status</label> <select class="form-control"
								id="edit_status" name="edit_status">
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
							</select> <input type='hidden' name='edit_sender_id'
								id='edit_sender_id' value='' />
						</div>
						<div id="err_status"></div>
						<!-- Status :: END -->
						<!-- Button :: START -->
						<input type="button" class="btn btn-purple" name="edit_subject"
							id="edit_subject" value="Update" onclick="editSubject()" />
						<!-- Button :: END -->
					</form>
				</div>
			</div>

		</div>
	</div>
</div>

<div id="subject-close-modal" class="modal fade" tabindex="-1"
	role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
	style="display: none;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"
					aria-hidden="true">×</button>
				<h4 class="modal-title">Add Subject</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div id="subject_message"></div>
					<form role="form" class="p-20" method="post" action="">
						<!-- Message Type :: START -->
						<div class="form-group">
							<label for="messagetype">Message Type</label> <select
								class="form-control" id="message_type" name="message_type">
								<option value="">--Select Message Type--</option>
								<?php
        
        if (! empty($message_types)) {
            foreach ($message_types as $key => $value) {
                ?>
                <option value="<?php echo $key; ?>"><?php echo $value;?></option>
                <?php
            }
            unset($message_types);
        }
        ?>
							</select>
						</div>
						<div id="err_message_type"></div>
						<!-- Message Type :: END -->
						<!-- Category Type :: START -->
						<div class="form-group">
							<label for="categorytype">Category Type</label> <select
								class="form-control" id="category_type" name="category_type">
								<option value="">--Select Category Type--</option>
								<?php
        
        if (! empty($category_types)) {
            foreach ($category_types as $key => $value) {
                ?>
                <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                <?php
            }
            unset($category_types);
        }
        ?>
							</select>
						</div>
						<div id="err_category_type"></div>
						<!-- Category Type :: END -->
						<!-- Subject :: START -->
						<div class="form-group">
							<label for="subject">Subject</label> <input type="text"
								class="form-control" id="subject" name="subject" value=""
								placeholder="Enter subject name" /> <input type="hidden"
								name="status" id="status" value="active" />
						</div>
						<div id="err_subject"></div>
						<!-- Subject :: END -->
						<!-- Button :: START -->
						<input type="button" class="btn btn-purple" name="create_subject"
							id="create_subject" value="Create" onclick="createSubject()" />
						<!-- Button :: END -->
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

            function createSubject(){
                var objSubject = {};
                objSubject = {
                     message_type : $("#message_type").val(),
                     category_type : $("#category_type").val(),
                     subject : $("#subject").val(),
                     status : $("#status").val()
                        };
                $.post('<?php echo Yii::getAlias('@web').'/notifications/notification/create-sender-id';?>',objSubject,function(response){
                	makeEmpty();
                	var response = $.parseJSON(response);
                    if(response.hasOwnProperty('errors')){
                        //Message Type
                  	  if(undefined != response.errors.message_type && response.errors.message_type.length > 0){
                  		   $("#err_message_type").html(response.errors.message_type);
                  		   }
                  	//Category Type
                  	  if(undefined != response.errors.category_type && response.errors.category_type.length > 0){
                  		   $("#err_category_type").html(response.errors.category_type);
                  		   }
                  	//Subject
                  	  if(undefined != response.errors.subject && response.errors.subject.length > 0){
                  		   $("#err_subject").html(response.errors.subject);
                  		   }
             		   return false;
                        }else{
                            makeFieldsEmpty();
                          $("#subject_message").html(response.message);
                          setTimeout(function(){location.reload()},1500);
                          return true;         
                            }
                    });
                }

            function makeEmpty(){
  			  $("#err_message_type").empty();
  			  $("#err_category_type").empty();
  			  $("#err_subject").empty();
  			  $("#subject_message").empty();
  			  return true;
      		  }

  		  function makeFieldsEmpty(){
  			  $("#message_type").val("");
  			  $("#category_type").val("");
  			  $("#subject").val("");
  			  return true;
      		  }


  		  function setSubject(sender_id){
  			makeEditEmpty();
  	  		  var objSubject = {};
  	  		  objSubject = {
                   sender_id : sender_id
  	    	  		  };
  	  		  $.post('<?php echo Yii::getAlias('@web').'/notifications/notification/get-subjects'; ?>',objSubject,function(response){
  	  			response = $.parseJSON(response);
             	if(response){
                    $("#edit_message_type").val(response.message_type);
                    $("#edit_category_type").val(response.category_type);
                    $("#edit_subject").val(response.subject);
                    $("#edit_status").val(response.status);
                    $("#edit_sender_id").val(response.sender_id);
                 	}
             	  	  	  		  });
	  	  		  return true;
  	  		  }

  		  function editSubject(){
  			var objSubject = {};
            objSubject = {
                 message_type : $("#edit_message_type").val(),
                 category_type : $("#edit_category_type").val(),
                 subject : $("#edit_subject").val(),
                 status : $("#edit_status").val(),
                 id : $('#edit_sender_id').val(),
                    };
            $.post('<?php echo Yii::getAlias('@web').'/notifications/notification/create-sender-id';?>',objSubject,function(response){
            	makeEditEmpty();
            	var response = $.parseJSON(response);
                if(response.hasOwnProperty('errors')){
                    //Message Type
              	  if(undefined != response.errors.message_type && response.errors.message_type.length > 0){
              		   $("#err_edit_message_type").html(response.errors.message_type);
              		   }
              	//Category Type
              	  if(undefined != response.errors.category_type && response.errors.category_type.length > 0){
              		   $("#err_edit_category_type").html(response.errors.category_type);
              		   }
              	//Subject
              	  if(undefined != response.errors.subject && response.errors.subject.length > 0){
              		   $("#err_edit_subject").html(response.errors.subject);
              		   }
              	//Status
              	  if(undefined != response.errors.status && response.errors.status.length > 0){
              		   $("#err_edit_status").html(response.errors.status);
              		   }
         		   return false;
                    }else{
                      $("#edit_subject_message").html(response.message);
                      setTimeout(function(){location.reload()},1500);
                      return true;         
                        }
                });
  	  		  }
         
  		function makeEditEmpty(){
			  $("#err_edit_message_type").empty();
			  $("#err_edit_category_type").empty();
			  $("#err_edit_subject").empty();
			  $("#err_edit_status").empty();
			  $("#edit_subject_message").empty();
			  return true;
    		  }
        </script>
