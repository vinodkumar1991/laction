<!DOCTYPE html>
<html lang="en">
<head>
<link rel="shortcut icon"
	href="<?php echo Yii::getAlias('@asset').'/img/favicon_1.ico';?>" />

<title>L'Action Studios | Admin</title>

<!-- Bootstrap core CSS -->
<link
	href="<?php echo Yii::getAlias('@asset').'/css/bootstrap.min.css'; ?>"
	rel="stylesheet" />
<link
	href="<?php echo Yii::getAlias('@asset').'/css/bootstrap-reset.css'; ?>"
	rel="stylesheet" />

<!--Icon-fonts css-->
<link
	href="<?php echo Yii::getAlias('@asset').'/font-awesome/css/font-awesome.css'; ?>"
	rel="stylesheet" />

<!-- Custom styles for this template -->
<link href="<?php echo Yii::getAlias('@asset').'/css/style.css';?>"
	rel="stylesheet" />
<link href="<?php echo Yii::getAlias('@asset').'/css/helper.css';?>"
	rel="stylesheet" />


<script src="<?php echo Yii::getAlias('@asset').'/js/jquery.js'?>"></script>
</head>

<body class="bg-login">
	<div class="container">
		<div class="card card-container">
			<a href="<?php echo Yii::getAlias('@web'); ?>"><img id="profile-img"
				class="profile-img-card"
				src="<?php echo Yii::getAlias('@asset').'/img/avatar_2x.png';?>" /></a>
			<p id="profile-name" class="profile-name-card"></p>
			<div class="success_span1" id="otp_success_message"></div>
			<form method="post" action="">
				<input type="text" name="phone" id="phone" value="" maxlength="10"
					autocomplete="off" placeholder="Phone Number" class="form-control" />
				<div class="err_span" id="err_phone"></div>

				<input type="button" name="send_otp" id="send_otp"
					class="btn btn-lg btn-primary btn-block btn-signin marg-top"
					value="Get OTP" /> <br />
				<div class="success_span1" id="password_success_update"></div>
				<input type="text" name="otp" id="otp"
					class="form-control  marg-top" placeholder="OTP" value=""
					maxlength="6" />
				<div class="err_span" id="err_otp"></div>

				<input type="password" name="newpassword" placeholder="New Password"
					class="form-control marg-top" id="newpassword" value=""
					maxlength="6" />
				<div class="err_span" id="err_newpassword"></div>

				<input type="password" name="confirmpassword"
					placeholder="Confirm Password" class="form-control marg-top"
					id="confirmpassword" value="" maxlength="6" />
				<div class="err_span" id="err_confirmpassword"></div>
				<input type="hidden" name="usr_id" id="usr_id" value="" /> <input
					type="button" name="btn_save_password" id="btn_save_password"
					class="btn btn-lg btn-primary btn-block btn-signin marg-top"
					value="Change Password" />
			</form>

		</div>
	</div>
</body>
<script type="text/javascript">
makeHide();
  function makeHide(){
	  $("#otp").hide();
	  $("#newpassword").hide();
	  $("#confirmpassword").hide();
	  $("#btn_save_password").hide();
	  return true;
	  }

  $("#send_otp").on("click",function(){
	  var objPhone = {};
	  objPhone = {
			  phone : $("#phone").val(),
			  status : 'active'
			  };

	     var isValid = validateFields(objPhone);
	     if(1 == isValid){
	    	 $.post('<?php echo Yii::getAlias('@web').'/users/users/generate-otp';?>',objPhone,function(response){
				  makeEmpty();
				  var response = $.parseJSON(response);
			        if(response.hasOwnProperty('errors')){
			            //Phone
			      	  if(undefined != response.errors.phone && response.errors.phone.length > 0){
			      		   $("#err_phone").html(response.errors.phone);
			      		   }
			 		   return false;
			            }else{
				            makeFieldsEmpty();
				            makeActiveOther();
				            $("#usr_id").val(response.user_id);
			              $("#otp_success_message").html(response.message);
			              return true;         
			                }
				  });
		     }else{
		    	 $("#err_phone").html("Phone number is required");
		    	 return false;
		     }
		  
	  });

	function makeFieldsEmpty(){
           $("#phone").val("");
           $("#otp").val("");
  		 $("#newpassword").val("");
  		  $("#confirmpassword").val("");
           return true;
		}

	function makeEmpty(){
		$("#err_phone").empty();
		$("#err_otp").empty();
		$("#err_newpassword").empty();
		$("#err_confirmpassword").empty();
		return true;
		}

	function validateFields(objPhone){
		var result = 0;
		if(undefined != objPhone.phone && objPhone.phone.length > 0){
			result = 1;
		}
     return result;
		}
	function makeActiveOther(){
		 $("#phone").hide();
		 $("#send_otp").hide();
		 $("#otp_success_message").hide();
		 $("#otp").show();
		 $("#newpassword").show();
		  $("#confirmpassword").show();
		  $("#btn_save_password").show();
		  return true;
	}

	$("#btn_save_password").on("click",function(){
              var objPassword = {};
              objPassword = {
                      id : $("#usr_id").val(),
                      otp : $("#otp").val(),
                      newpassword : $("#newpassword").val(),
                      confirmpassword : $("#confirmpassword").val()
                      };
              $.post('<?php echo Yii::getAlias('@web').'/users/users/update-password';?>',objPassword,function(response){
            	  makeEmpty();
            	  var response = $.parseJSON(response);
			        if(response.hasOwnProperty('errors')){
			            //OTP
			      	  if(undefined != response.errors.otp && response.errors.otp.length > 0){
			      		   $("#err_otp").html(response.errors.otp);
			      		   }
			      	//New Password
			      	  if(undefined != response.errors.newpassword && response.errors.newpassword.length > 0){
			      		  $("#err_newpassword").html(response.errors.newpassword);
			      		  }
			      	//Confirm Password
			      	  if(undefined != response.errors.confirmpassword && response.errors.confirmpassword.length > 0){
			      		  $("#err_confirmpassword").html(response.errors.confirmpassword);
			      		  }
			 		   return false;
			            }else{
				            makeFieldsEmpty();
				            makeActiveOther();
				            $("#password_success_update").html(response.message);
				            setTimeout(function(){window.location="<?php echo Yii::getAlias('@web').'/login';?>";},2000);
			              return true;         
			                }
                          
                            });
		});
</script>