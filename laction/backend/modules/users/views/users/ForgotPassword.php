<script src="<?php echo Yii::getAlias('@asset').'/js/jquery.js'?>"></script>
<div id="otp_success_message"></div>
<form method="post" action="">
	Phone Number : <input type="text" name="phone" id="phone" value=""
		maxlength="10" autocomplete="off" />
	<div id="err_phone"></div>

	<input type="button" name="send_otp" id="send_otp" value="Get OTP" /> <br />
	<div id="password_success_update"></div>
	OTP : <input type="text" name="otp" id="otp" value="" maxlength="6" />
	<div id="err_otp"></div>

	New Password : <input type="password" name="newpassword"
		id="newpassword" value="" maxlength="6" />
	<div id="err_newpassword"></div>

	Confirm Password : <input type="password" name="confirmpassword"
		id="confirmpassword" value="" maxlength="6" />
	<div id="err_confirmpassword"></div>
	<input type="hidden" name="usr_id" id="usr_id" value="" /> <input
		type="button" name="btn_save_password" id="btn_save_password"
		value="Change Password" />
</form>

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
