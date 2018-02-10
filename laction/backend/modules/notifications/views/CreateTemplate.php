<title><?php echo Yii::t('titles', 'laction.admin').Yii::t('titles', 'notifications.templates'); ?></title>
<link rel="stylesheet"
	href="<?php echo Yii::getAlias('@asset').'/ckeditor/css/samples.css'?>">
<script
	src="<?php echo Yii::getAlias('@asset').'/ckeditor/ckeditor.js'?>"></script>
<script
	src="<?php echo Yii::getAlias('@asset').'/ckeditor/js/sample.js'?>"></script>


<div class="wraper container-fluid">
	<div class="page-title">
		<h3 class="title"><?php echo Yii::t('breadcrumb','notifications.template_heading');?></h3>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a
				href="<?php echo Yii::getAlias('@web').'/dashboard'?>"><i
					class="fa fa-dashboard fa-fw"></i><?php echo Yii::t('breadcrumb','common.home');?></a></li>
			<li class="breadcrumb-item"><a
				href="<?php echo Yii::getAlias('@web').'/templates'?>"><?php echo Yii::t('breadcrumb','notifications.module_name');?></a></li>
			<li class="breadcrumb-item active"><a
				href="<?php echo Yii::getAlias('@web').'/create-template'?>"><?php echo Yii::t('breadcrumb','notifications.createtemplates');?></a></li>
		</ol>
	</div>

	<!-- Tabs-style-1 -->
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">

				<div class="panel-body">
					<div class="col-lg-12">
						<a href="<?php echo Yii::getAlias('@web').'/templates'?>">
							<button type="button" class="btn btn-default m-b-5">List</button>
						</a> 
						<?php
    
    if (Yii::$app->request->get('id')) {
        ?>
        <a
							href="<?php echo Yii::getAlias('@web').'/edit-template/'.Yii::$app->request->get('id'); ?>">
							<button type="button" class="btn btn-primary m-b-5">Edit</button>
						</a>
						<?php
    } else {
        ?><a
							href="<?php echo Yii::getAlias('@web').'/create-template'?>">
							<button type="button" class="btn btn-primary m-b-5">Create</button>
						</a>
						<?php
    }
    ?>
						
						<div class="tab-content">
							<div class="tab-pane active">
								<div id="page-wrapper">
									<div id="template_success_message"></div>
									<div class="container">
										<form name="template_form" class="myForm" action=""
											method="post">
											<div class="panel-body">
												<div class="row">
													<div class="col-md-10">
														<div class="col-md-12">
															<!-- Message Type :: START -->
															<div class="form-group">
																<label class="col-md-4">Message Type</label>
																<div class="col-md-6">
																	<select id="message_type" name="message_type"
																		class="form-control"
																		onchange="enableTemplateSpace(this.value)">
                                                                        <?php
                                                                        if (! empty($message_types)) {
                                                                            foreach ($message_types as $key => $value) {
                                                                                if (isset($template['message_type']) && ($template['message_type'] == $key)) {
                                                                                    ?>
                                                                                    <option
																			value="<?php echo $key; ?>" selected><?php echo $value; ?></option>
                                                                                    <?php
                                                                                } else {
                                                                                    ?>
                                                                                    <option
																			value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                                                                    <?php
                                                                                }
                                                                            }
                                                                            unset($message_types);
                                                                        }
                                                                        ?>
																	</select>
																</div>
																<div id="err_message_type"></div>
															</div>
															<!-- Message Type :: END -->
															<br> <br>
															<!-- From Email :: START -->
															<div class="form-group" id="sec_from_email">
																<label class="col-md-4">From Email</label>
																<div class="col-md-6">
																	<input type="text" class="form-control"
																		name="from_email" id="from_email"
																		value="<?php echo isset($template['from_email']) ? $template['from_email'] : NULL; ?>" />
																</div>
																<div id="err_from_email"></div>
															</div>
															<!-- From Email :: END -->
															<br /> <br />
															<!-- Subject :: START -->
															<div class="form-group">
																<label class="col-sm-4 control-label">Subject</label>
																<div class="col-sm-6">
																	<select class="form-control" name="senderid_id"
																		id="senderid_id">
																		<option value="">--Select Subject--</option>
																		<?php
                
                if (! empty($subjects)) {
                    foreach ($subjects as $arrSubject) {
                        if (isset($template['senderid_id']) && ($template['senderid_id'] == $arrSubject['sender_id'])) {
                            ?>
                         <option
																			value="<?php echo $arrSubject['sender_id']; ?>"
																			selected><?php echo $arrSubject['subject'].' ( '.$arrSubject['message_type'].' ) '; ?></option>
                         <?php
                        } else {
                            ?>
                         <option
																			value="<?php echo $arrSubject['sender_id']; ?>"><?php echo $arrSubject['subject'].' ( '.$arrSubject['message_type'].' ) '; ?></option>   
                        
                        
                        <?php
                        }
                    }
                    unset($subjects);
                }
                ?>
																	</select>
																</div>
																<div id="err_subject"></div>
															</div>
															<!-- Subject :: END -->
															<br /> <br />
															<!-- Template Code :: START -->
															<div class="form-group">
																<label class="col-md-4">Template Code</label>
																<div class="col-md-6">
																	<input type="text" name="code" id="code" maxlength="5"
																		class="form-control" autocomplete="off"
																		value="<?php echo isset($template['code']) ? $template['code'] : NULL; ?>" />
																</div>
																<div id="err_code"></div>
															</div>
															<!-- Template Code :: END -->
															<br /> <br />
															<!-- Template Name :: START -->
															<div class="form-group">
																<label class="col-md-4">Template Name</label>
																<div class="col-md-6">
																	<input type="text" name="name" id="name" maxlength="30"
																		class="form-control" autocomplete="off"
																		value="<?php echo isset($template['name']) ? $template['name'] : NULL; ?>" />
																</div>
																<div id="err_name"></div>
															</div>
															<!-- Template Name :: END -->
															<!-- SMS Template :: START -->
															<div class="form-group" id="sms_template">
																<label class="col-md-4">Template</label>
																<div class="col-md-6">
																	<textarea name="template" col="3" rows="4"
																		id="stemplate" class="form-control"
																		placeholder="Enter Template Code"><?php echo isset($template['template']) ? $template['template'] : NULL; ?></textarea>
																</div>
															</div>
															<!-- SMS Template :: END -->
															<br> <br>
															<!-- Email Template :: START -->
															<div class="form-group grid-container grid-styl">
																<div class="adjoined-bottom">
																	<div class="">
																		<div class="grid-width-100" name="template"
																			id="template">
																			<div id="editor"></div>
																		</div>
																	</div>
																</div>
															</div>
															<!-- Email Template :: END -->
															<div id="err_template"></div>
															<br> <br>
															<!--Template Description :: START -->
															<div class="form-group">
																<label class="col-md-4">Description</label>
																<div class="col-md-6">
																	<textarea name="description" id="description" col="3"
																		rows="4" class="form-control"
																		placeholder="Template Description" maxlength="1000"><?php echo isset($template['description']) ? $template['description'] : NULL; ?></textarea>
																</div>
																<div id="err_description"></div>
															</div>
															<!--Template Description :: END -->

															<!--Status :: START -->
															<div class="form-group">
<?php

if (isset($template['status'])) {
    ?>
    
															<label class="col-md-4">Status</label>
																<div class="col-md-6">
																	<select id="status" name="status" class="form-control">
																		<option value="">--Select Status--</option>
																		<?php
    
    if (! empty($statuses)) {
        foreach ($statuses as $key => $value) {
            if ($template['status'] == $key) {
                ?>
                														        <option
																			value="<?php echo $key; ?>" selected><?php echo $value;?></option>
                <?php
            } else {
                ?>
                														        <option
																			value="<?php echo $key; ?>"><?php echo $value;?></option>
                <?php
            }
        }
        unset($statuses);
    }
    ?>
																	</select>
																</div>
									
    
    
    <?php
} else {
    ?>
    <div class="col-md-6">
																	<input type="hidden" name="status" id="status"
																		value="active" />
																</div>
																
<?php
}
?>
																

	
															</div>
															<div id="err_status"></div>
															<!--Status :: END -->
														</div>
														<!-- end div -->
													</div>
													<!-- end div -->
												</div>
											</div>
									
									</div>
									<div class="col-md-4 col-md-offset-4"
										style="margin-bottom: 50px;">
										<?php
        
        if (isset($template['status'])) {
            ?>
										<input type="button" name="create_template"
											id="create_template" class="btn btn-primary" value="Update"
											onclick="createTemplate()" />
										<?php
        } else {
            ?>
										<input type="button" name="create_template"
											id="create_template" class="btn btn-primary" value="Create"
											onclick="createTemplate()" />
										<?php
        }
        ?>
										
									</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
	initSample(); //ckeditor related
	enableTemplateSpace($("#message_type").val());
		function enableTemplateSpace(message_type){
			  if(message_type == "sms"){
				  $("#sec_from_email").hide();
				  $("#cke_editor").hide();
			      $("#sms_template").show();
				  }else{
					  $("#sms_template").hide();
					  $("#sec_from_email").show();
				      $("#cke_editor").show();
				      	  
					  }
			  return true;
			}

		function createTemplate(){
			var template = '';
			if("sms" == $("#message_type").val()){
				template = $("#stemplate").val()
				}else{
					template = CKEDITOR.instances.editor.getData();
								}
			var objTemplate = {
					message_type : $("#message_type").val(),
					from_email : $("#from_email").val(),
							senderid_id : $("#senderid_id").val(),
							code : $("#code").val(),
							name : $("#name").val(),
							template : template,
									description : $("#description").val(),
									status : $("#status").val(),
									id : '<?php echo Yii::$app->request->get('id'); ?>'
					};
			$.post('<?php echo Yii::getAlias('@web').'/notifications/notification/save-template';?>',objTemplate,function(response){
				makeEmpty();
			    var response = $.parseJSON(response);
			    if(response.hasOwnProperty('errors')){
		            //Message Type
		      	  if(undefined != response.errors.message_type && response.errors.message_type.length > 0){
		      		   $("#err_message_type").html(response.errors.message_type);
		      		   }
		      	//From Email
		      	  if(undefined != response.errors.from_email && response.errors.from_email.length > 0){
		      		   $("#err_from_email").html(response.errors.from_email);
		      		   }
		      	//Subject
		      	  if(undefined != response.errors.senderid_id && response.errors.senderid_id.length > 0){
		      		   $("#err_subject").html(response.errors.senderid_id);
		      		   }
		      	//Template Code
		      	  if(undefined != response.errors.code && response.errors.code.length > 0){
		      		   $("#err_code").html(response.errors.code);
		      		   }
		      	//Template Name
	          	  if(undefined != response.errors.name && response.errors.name.length > 0){
	          		   $("#err_name").html(response.errors.name);
	          		   }
	          	//Template
	          	  if(undefined != response.errors.template && response.errors.template.length > 0){
	          		   $("#err_template").html(response.errors.template);
	          		   }
	          	//Template
	          	  if(undefined != response.errors.description && response.errors.description.length > 0){
	          		   $("#err_description").html(response.errors.description);
	          		   }
         		   //Status
	          	if(undefined != response.errors.status && response.errors.status.length > 0){
	          		   $("#err_status").html(response.errors.status);
	          		   }
		 		   return false;
		            }else{
		              $("#template_success_message").html(response.message);
		              if(undefined == response.is_updated){
		          			 makeFieldsEmpty();
		          		   }
		              return true;         
		                }
				});
			}

		function makeEmpty(){
			  $("#err_message_type").empty();
			  $("#err_from_email").empty();
			  $("#err_subject").empty();
			  $("#err_code").empty();
			  $("#err_name").empty();
			  $("#err_template").empty();
			  $("#err_description").empty();
			  $("#template_success_message").empty();
			  return true;
			  }

		  function makeFieldsEmpty(){
			  $("#message_type").val("sms");
			  $("#senderid_id").val("");
			  $("#from_email").val("");
			  $("#code").val("");
			  $("#name").val("");
			  $("#stemplate").val("");
			  CKEDITOR.instances.editor.setData('');
			  $("#description").val("");
			  return true;
			  }
</script>