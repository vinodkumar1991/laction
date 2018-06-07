<div role="tabpanel" class="tab-pane" id="user_social_tab">
    <div id="p_social_success"></div>
    <form class="form-horizontal" role="form" style="margin: 30px 0 0;">
        <div class="form-group">
            <label class="col-sm-2" for="p_fb_link">Facebook</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="p_fb_link" name="p_fb_link" maxlength="225" value="<?php echo $profile_details['fb_link']; ?>"/>
            </div>
            <span id="err_p_fb_link"></span>
        </div>
        <div class="form-group">
            <label class="col-sm-2" for="p_tw_link">Twitter</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="p_tw_link" name="p_tw_link" maxlength="225" value="<?php echo $profile_details['twitter_link']; ?>"/>
            </div>
            <span id="err_p_tw_link"></span>
        </div>
        <div class="form-group">
            <label class="col-sm-2" for="p_google_link">Google+</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="p_google_link" name="p_google_link" maxlength="225" value="<?php echo $profile_details['google_plus_link']; ?>"/>
            </div>
            <span id="err_p_google_link"></span>
        </div>
        <div class="form-group">
            <label class="col-sm-2" for="p_instagram_link">Instagram</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="p_instagram_link" name="p_instagram_link" maxlength="225" value="<?php echo $profile_details['instagram_link']; ?>"/>
            </div>
            <span id="err_p_instagram_link"></span>
        </div>
        <div class="form-group">
            <label class="col-sm-2" for="p_linkdin_link">Linkdin</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="p_linkdin_link" name="p_linkdin_link" maxlength="225" value="<?php echo $profile_details['linkedin_link']; ?>"/>
            </div>
            <span id="err_p_linkdin_link"></span>
        </div>
        <div class="form-group">
            <div class="col-sm-6">
                <input type="button" class="btn btn-info pull-right" name="btn_social_media" id="btn_social_media"  value="Update Links" onclick="updateLinks()"/>
            </div>
        </div>
    </form>
</div>


<script type="text/javascript">
    function updateLinks() {
        var links = {};
        links = {
            fb_link: $("#p_fb_link").val(),
            google_plus_link: $("#p_google_link").val(),
            instagram_link: $("#p_instagram_link").val(),
            linkedin_link: $("#p_linkdin_link").val(),
            twitter_link: $("#p_tw_link").val(),
            id: '<?php echo Yii::$app->session['customer_data']['customer_id']; ?>'
        };
        $.post('<?php echo Yii::getAlias('@fweb') . '/customers/customers/update-social-links'; ?>', links, function (response) {
            makeLinksEmpty();
            var response = $.parseJSON(response);
            if (response.hasOwnProperty('errors')) {
                //FB
                if (undefined != response.errors.fb_link && response.errors.fb_link.length > 0) {
                    $("#err_p_fb_link").html(response.errors.fb_link[0]);
                }
                //Google Plus
                if (undefined != response.errors.google_plus_link && response.errors.google_plus_link.length > 0) {
                    $("#err_p_google_link").html(response.errors.google_plus_link[0]);
                }
                //Instagram
                if (undefined != response.errors.instagram_link && response.errors.instagram_link.length > 0) {
                    $("#err_p_instagram_link").html(response.errors.instagram_link[0]);
                }
                //Linkedin
                if (undefined != response.errors.linkedin_link && response.errors.linkedin_link.length > 0) {
                    $("#err_p_linkdin_link").html(response.errors.linkedin_link[0]);
                }
                //Twitter
                if (undefined != response.errors.twitter_link && response.errors.twitter_link.length > 0) {
                    $("#err_p_tw_link").html(response.errors.twitter_link[0]);
                }
                return false;
            } else {
                $("#p_social_success").html(response.message);
                return true;
            }
        });

    }

    function makeLinksEmpty() {
        $("#err_p_fb_link").html("");
        $("#err_p_google_link").html("");
        $("#err_p_instagram_link").html("");
        $("#err_p_linkdin_link").html("");
        $("#err_p_tw_link").html("");
        return true;
    }
</script>