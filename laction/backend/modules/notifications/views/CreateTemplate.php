

<link rel="stylesheet"
	href="<?php echo Yii::getAlias('@asset').'/ckeditor/css/samples.css'?>">
<script
	src="<?php echo Yii::getAlias('@asset').'/ckeditor/ckeditor.js'?>"></script>
<script
	src="<?php echo Yii::getAlias('@asset').'/ckeditor/js/sample.js'?>"></script>



<div class="wraper container-fluid">
	<div class="page-title" style="margin-top: -40px;">
		<h3 class="title">Role Permission</h3>
	</div>

	<!-- Tabs-style-1 -->
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">

				<div class="panel-body">
					<div class="col-lg-12">
						<a href="<?php echo Yii::getAlias('@web').'/templates'?>">
							<button type="button" class="btn btn-default m-b-5">List</button>
						</a> <a
							href="<?php echo Yii::getAlias('@web').'/create-template'?>">
							<button type="button" class="btn btn-primary m-b-5">Create</button>
						</a>
						<div class="tab-content">
							<div class="tab-pane active">
								<div id="page-wrapper">
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
                                                                                ?>
                                                                        <option
																			value="<?php echo $key; ?>"><?php echo $value; ?></option>        
                                                                                <?php
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
															<div class="form-group">
																<label class="col-md-4">From Email</label>
																<div class="col-md-6">
																	<input type="text" class="form-control"
																		name="from_email" id="from_email" value="" />
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
																	<input type="text" name="code" id="code"
																		class="form-control" value="" />
																</div>
																<div id="err_code"></div>
															</div>
															<!-- Template Code :: END -->
															<br /> <br />
															<!-- Template Name :: START -->
															<div class="form-group">
																<label class="col-md-4">Template Name</label>
																<div class="col-md-6">
																	<input type="text" name="name" id="name"
																		class="form-control" value="" />
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
																		placeholder="Enter Template Code"></textarea>
																</div>
															</div>
															<!-- SMS Template :: END -->
															<br> <br>
															<!-- Email Template :: START -->
															<div class="form-group grid-container grid-styl">
																<div class="adjoined-bottom">
																	<div class="">
																		<div class="grid-width-100" name="template">
																			<div id="editor"></div>
																		</div>
																	</div>
																</div>
															</div>
															<!-- Email Template :: END -->
															<br> <br>
															<!--Template Description :: START -->
															<div class="form-group">
																<label class="col-md-4">Description</label>
																<div class="col-md-6">
																	<textarea name="description" id="description" col="3"
																		rows="4" class="form-control"
																		placeholder="Template Description"></textarea>
																</div>
																<div id="err_description"></div>
															</div>
															<!--Template Description :: END -->
														</div>
														<!-- end div -->
													</div>
													<!-- end div -->
												</div>
											</div>
									
									</div>
									<div class="col-md-4 col-md-offset-4"
										style="margin-bottom: 50px;">
										<center>
											<input type="submit" name="submit" class="btn btn-primary"
												value="Create" />
										</center>
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
	alert($('#message_type').val());
		function enableTemplateSpace(message_type){
			message_type="email";
			  if(message_type == "sms"){
				  $("#cke_editor").hide();
			      $("#sms_template").show();
				  }else{
					  $("#sms_template").hide();
				      $("#cke_editor").show();
				      	  
					  }
			  return true;
			}
</script>