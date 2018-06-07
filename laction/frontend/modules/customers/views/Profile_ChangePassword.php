<div role="tabpanel" class="tab-pane" id="user_password_tab">
    <form class="form-horizontal" role="form" style="margin: 30px 0 0;">
        <div class="form-group">
            <label class="col-sm-2" for="p_current_password">Current Password</label>
            <div class="col-sm-5">
                <input type="password" class="form-control" id="p_current_password" name="p_current_password"/>
            </div>
            <span id="err_p_current_password"></span>
        </div>
        <div class="form-group">
            <label class="col-sm-2" for="p_new_password">New Password</label>
            <div class="col-sm-5">
                <input type="password" class="form-control" id="p_new_password" name="p_new_password"/>
            </div>
            <span id="err_p_new_password"></span>
        </div>
        <div class="form-group">
            <label class="col-sm-2" for="p_confirm_password">Confirm Password</label>
            <div class="col-sm-5">
                <input type="password" class="form-control" id="p_confirm_password" name="p_confirm_password"/>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-6">
                <button type="submit" class="btn btn-info pull-right">Submit</button>
            </div>
        </div>
    </form>
</div>