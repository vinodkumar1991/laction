<div role="tabpanel" class="tab-pane" id="user_password_tab">
    <div id="p_password_success"></div>
    <form class="form-horizontal" role="form" style="margin: 30px 0 0;">
        <div class="form-group">
            <label class="col-sm-2" for="p_current_password">Current Password</label>
            <div class="col-sm-5">
                <input type="password" class="form-control" id="p_current_password" name="p_current_password" maxlength="25"/>
            </div>
            <span id="err_p_current_password"></span>
        </div>
        <div class="form-group">
            <label class="col-sm-2" for="p_new_password">New Password</label>
            <div class="col-sm-5">
                <input type="password" class="form-control" id="p_new_password" name="p_new_password" maxlength="25"/>
            </div>
            <span id="err_p_new_password"></span>
        </div>
        <div class="form-group">
            <label class="col-sm-2" for="p_confirm_password">Confirm Password</label>
            <div class="col-sm-5">
                <input type="password" class="form-control" id="p_confirm_password" name="p_confirm_password" maxlength="25"/>
            </div>
            <span id="err_p_confirm_password"></span>
        </div>
        <div class="form-group">
            <div class="col-sm-6">
                <input type="button" class="btn btn-info pull-right" name="btn_change_password" id="btn_change_password" onclick="updateAccountPassword()" value="Change Password"/>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript">
    function updateAccountPassword() {
        var objPassword = {};
        objPassword = {
            id: '<?php echo Yii::$app->session['customer_data']['customer_id']; ?>',
            current_password: $("#p_current_password").val(),
            new_password: $("#p_new_password").val(),
            confirm_password: $("#p_confirm_password").val()
        };

        $.post('<?php echo Yii::getAlias('@fweb') . '/customers/customers/profile-change-password'; ?>', objPassword, function (response) {
            makeProfileEmpty();
            var response = $.parseJSON(response);
            if (response.hasOwnProperty('errors')) {
                //Current Password
                if (undefined != response.errors.current_password && response.errors.current_password.length > 0) {
                    $("#err_p_current_password").html(response.errors.current_password[0]);
                }
                //New Password
                if (undefined != response.errors.new_password && response.errors.new_password.length > 0) {
                    $("#err_p_new_password").html(response.errors.new_password[0]);
                }
                //Confirm Password
                if (undefined != response.errors.confirm_password && response.errors.confirm_password.length > 0) {
                    $("#err_p_confirm_password").html(response.errors.confirm_password[0]);
                }
                return false;
            } else {
                makeProfileFieldsEmpty();
                $("#p_password_success").html(response.message);
                return true;
            }
        });
    }

    function makeProfileEmpty() {
        $("#p_password_success").html("");
        $("#err_p_current_password").html("");
        $("#err_p_new_password").html("");
        $("#err_p_confirm_password").html("");
        return true;
    }


    function makeProfileFieldsEmpty() {
        $("#p_current_password").val("");
        $("#p_new_password").val("");
        $("#p_confirm_password").val("");
        return true;
    }

</script>