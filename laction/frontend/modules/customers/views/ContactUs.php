<?php echo $this->render('Contact_Us_Banner'); ?>
<div class="main-wrap">
	<div class="section section-padding video-list-section gray-bg">
		<div class="container">


			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<div class="contact-left text-center">
					<div class="col-sm-6 col-xs-6 first-box contact-left-boxes">
						<h1>
							<span class="glyphicon glyphicon-earphone"></span>
						</h1>
						<h3>Phone</h3>
						<p><?php echo Yii::$app->params['contact_details']['phone']; ?></p>
						<br>
					</div>
					<div class="col-sm-6 col-xs-6 second-box  contact-left-boxes">
						<h1>
							<span class="glyphicon glyphicon-home"></span>
						</h1>
						<h3>Location</h3>
						<p><?php echo Yii::$app->params['contact_details']['address']; ?></p>
						<br>
					</div>
					<div class="col-sm-6 col-xs-6 third-box contact-left-boxes">
						<h1>
							<span class="glyphicon glyphicon-send"></span>
						</h1>
						<h3>E-mail</h3>
						<p><?php echo Yii::$app->params['contact_details']['email']; ?></p>
						<br>
					</div>
					<div class="col-sm-6 col-xs-6 fourth-box contact-left-boxes">
						<h1>
							<span class="glyphicon glyphicon-link"></span>
						</h1>
						<h3>Web</h3>
						<p><?php echo Yii::$app->params['contact_details']['website']; ?></p>
						<br>
					</div>

				</div>


			</div>
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<div class="contact-right">
					<h4>Write Your Message</h4>
					<h4 id="c_success_message"></h4>
					<form action="" class="contact-form" method="post">

						<div class="form-group">
							<input type="text" class="form-control contct-inpt"
								id="c_fullname" name="c_fullname" placeholder="Fullname"
								maxlength="100" autocomplete="off" /> <span id="err_c_fullname"></span>
						</div>


						<div class="form-group form_left">
							<input type="text" class="form-control contct-inpt" id="c_email"
								name="c_email" placeholder="Email" maxlength="40"
								autocomplete="off" /> <span id="err_c_email"></span>
						</div>

						<div class="form-group">
							<input type="text" class="form-control contct-inpt" id="c_phone"
								name="c_phone"
								onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57"
								maxlength="10" placeholder="Phone" autocomplete="off" /> <span
								id="err_c_phone"></span>
						</div>
						<div class="form-group">
							<textarea class="form-control textarea-contact contct-textarea"
								rows="5" id="c_query" name="c_query"
								placeholder="Enter your query" maxlength="62000"
								autocomplete="off"></textarea>
							<span id="err_c_query"></span>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
							<div class="row">
								<div class="form-group form_left">
									<input type="button" class="contact-submit" id="submit_query"
										name="submit_query" onclick="submitQuery()" value="Submit" />
								</div>
							</div>
						</div>
					</form>
				</div>

			</div>
     <?php echo $this->render('Contact_Route_Map'); ?>
            </div>
	</div>
</div>

<script type="text/javascript">
function submitQuery(){
	var objInput = {};
	objInput = {
        fullname : $("#c_fullname").val(),
        email : $("#c_email").val(),
        phone : $("#c_phone").val(),
        description : $("#c_query").val(),
        status : 'not solved'
			};
	$.post('<?php echo Yii::getAlias('@fweb').'/customers/customers/save-query'; ?>',objInput,function(response){
		makeCEmpty();
		 var response = $.parseJSON(response);
	        if(response.hasOwnProperty('errors')){
	      	//Fullname
	      	  if(undefined != response.errors.fullname && response.errors.fullname.length > 0){
	      		   $("#err_c_fullname").html(response.errors.fullname[0]);
	      		   }
	      	//Email
	      	  if(undefined != response.errors.email && response.errors.email.length > 0){
	      		   $("#err_c_email").html(response.errors.email[0]);
	      		   }
	      	//Phone
	      	  if(undefined != response.errors.phone && response.errors.phone.length > 0){
	      		   $("#err_c_phone").html(response.errors.phone[0]);
	      		   }
	      	//Query
	      	  if(undefined != response.errors.description && response.errors.description.length > 0){
	      		   $("#err_c_query").html(response.errors.description[0]);
	      		   }
	 		   return false;
	            }else{
	            	makeCFieldsEmpty();
	               $("#c_success_message").html(response.message);
	               return true;         
	                }
		});
}

function makeCEmpty(){
	$("#err_c_fullname").html("");
    $("#err_c_email").html("");
    $("#err_c_phone").html("");
    $("#err_c_query").html("");
    $("#c_success_message").html("");
	return true;
}

function makeCFieldsEmpty(){
    $("#c_fullname").val("");
    $("#c_email").val("");
    $("#c_phone").val("");
    $("#c_query").val("");
	return true;
}
</script>