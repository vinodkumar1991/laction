<title><?php echo Yii::t('titles', 'laction.admin').Yii::t('titles', 'notifications.templates'); ?></title>
<div class="wraper container-fluid">
	<div class="page-title">
		<h3 class="title"><?php echo Yii::t('breadcrumb','notifications.template_heading');?></h3>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a
				href="<?php echo Yii::getAlias('@web').'/dashboard'?>"><i
					class="fa fa-dashboard fa-fw"></i><?php echo Yii::t('breadcrumb','common.home');?></a></li>
			<li class="breadcrumb-item"><a
				href="<?php echo Yii::getAlias('@web').'/subjects'?>"><?php echo Yii::t('breadcrumb','notifications.module_name');?></a></li>
			<li class="breadcrumb-item active"><a
				href="<?php echo Yii::getAlias('@web').'/templates'?>"><?php echo Yii::t('breadcrumb','notifications.templates');?></a></li>
		</ol>
	</div>

	<!-- Tabs-style-1 -->
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">

				<div class="panel-body">

					<div class="col-lg-12">

						<a href="<?php echo Yii::getAlias('@web').'/templates'?>">
							<button type="button" class="btn btn-primary m-b-5">List</button>
						</a> <a
							href="<?php echo Yii::getAlias('@web').'/create-template'?>">
							<button type="button" class="btn btn-default m-b-5">Create</button>
						</a>
						<div class="tab-content">
							<div class="tab-pane active">
								<div>

									<table id="datatable"
										class="table table-striped table-bordered">
										<thead>
											<tr>
												<th>Message Type</th>
												<th>From Email</th>
												<th>Subject</th>
												<th>Template Code</th>
												<th>Template Name</th>
												<th>Template</th>
												<th>Template Description</th>
												<th>Status</th>
												<th>Actions</th>
											</tr>
										</thead>
										<tbody>
										<?php
        
        if (! empty($templates)) {
            foreach ($templates as $arrTemplate) {
                ?>
                <tr class="gradeX">
												<td><?php echo $arrTemplate['message_type'].' ( '.$arrTemplate['category_type'].' ) '; ?></td>
												<td><?php echo $arrTemplate['from_email']; ?></td>
												<td><?php echo $arrTemplate['subject']; ?></td>
												<td><?php echo $arrTemplate['code']; ?></td>
												<td><?php echo $arrTemplate['name']; ?></td>
												<td class="actions">
												<?php
                
                if ("email" == $arrTemplate['message_type']) {
                    ?>
													<button class="btn btn-primary" data-toggle="modal"
														data-target=".template_mode"
														onclick="setTemplate('<?php echo $arrTemplate['id']; ?>')">
														<i class="fa fa-picture-o" aria-hidden="true"></i>
													</button>
													<?php }else{?>
													<button class="btn btn-primary" data-toggle="modal"
														data-target=".sms"
														onclick="setTemplate('<?php echo $arrTemplate['id']; ?>')">
														<i class="fa fa-picture-o" aria-hidden="true"></i>
													</button>
													<?php }?>
												</td>
												<td><?php echo $arrTemplate['description']; ?></td>
												<td><?php echo $arrTemplate['status']; ?></td>
												<td class="actions">
													<button class="btn btn-primary" data-toggle="modal"
														data-target="#edit_template">
														<i class="fa fa-pencil"></i>
													</button>
												</td>
											</tr>
										    <?php
            }
            unset($templates);
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
</div>
<!-- SMS :: START -->
<div class="modal fade sms" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"></h4>
			</div>
			<div class="modal-body"></div>
		</div>

	</div>
</div>
<!-- SMS :: END -->

<div class="modal fade template_mode" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel" aria-hidden="true"
	style="display: none;"></div>
<script type="text/javascript">
            $(document).ready(function() {
                $('#datatable').dataTable();
                $('#datatable-keytable').DataTable( { keys: true } );
                $('#datatable-responsive').DataTable();
                $('#datatable-scroller').DataTable( { ajax: "assets/datatables/json/scroller-demo.json", deferRender: true, scrollY: 380, scrollCollapse: true, scroller: true } );
                var table = $('#datatable-fixed-header').DataTable( { fixedHeader: true } );
            } );
            TableManageButtons.init();

            function setTemplate(template_id){
                var objTemplate = {};
                objTemplate = {
                        template_id : template_id};
                $.post('<?php echo Yii::getAlias('@web').'/notifications/notification/get-template';?>',objTemplate,function(response){
                    var response = $.parseJSON(response);
                    if(response){

                    	if('email' == response.message_type){
                    		$(".template_mode").html(response.template);
                            }else{
                                $(".modal-title").html(response.name);
                            	$(".modal-body").html(response.template);
                                }
                        
                        }
                    });
                        return true;
            }
        </script>