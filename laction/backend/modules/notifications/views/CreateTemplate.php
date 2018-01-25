

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

										<form name="myForm" class="myForm" action="#" method="POST"
											enctype="multipart/form-data">

											<div class="panel-body">
												<div class="row">
													<div class="col-md-10">
														<div class="col-md-12">
															<div class="form-group">
																<label class="col-md-4">Message Type</label>
																<div class="col-md-6">
																	<select id="ddlPassport" name="dd1"
																		class="form-control">
																		<option value="">--Select Type--</option>
																		<option value="Sms">Sms</option>
																		<option value="Email">Email</option>
																	</select>
																</div>
															</div>
															<br> <br>
															<div class="form-group" id="dvsms">
																<label class="col-md-4">SMS Template</label>
																<div class="col-md-6">
																	<textarea name="sms" col="3" rows="4"
																		class="form-control" placeholder="Type Message..."></textarea>
																</div>
															</div>
															<br> <br>
															<div class="form-group grid-container grid-styl">
																<div class="adjoined-bottom">
																	<div class="">


																		<div class="grid-width-100" name="sendemail">

																			<div id="editor"></div>
																		</div>
																	</div>
																</div>
															</div>
															<div class="form-group">
																<label class="col-sm-4 control-label">Sender Id</label>
																<div class="col-sm-6">
																	<select class="form-control">
																		<option>--Select Id--</option>
																		<option>1</option>
																		<option>2</option>
																		<option>3</option>
																		<option>4</option>
																		<option>5</option>
																	</select>

																</div>
															</div>
															<br> <br>
															<div class="form-group">
																<label class="col-md-4">Code</label>
																<div class="col-md-6">
																	<input type="text" name="code" class="form-control">
																</div>
															</div>
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
	initSample();
   $(function () {
            $("#ddlPassport").change(function () {
                if ($(this).val() == "Sms") {
                    $("#dvsms").show();
                } else {
                    $("#dvsms").hide();
                }
                if ($(this).val() == "Email"){
                        $("#cke_editor").show();

                }else{
                        $("#cke_editor").hide();
                }
            });
        });
  
</script>