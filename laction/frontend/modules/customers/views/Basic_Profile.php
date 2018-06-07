
<div role="tabpanel" class="tab-pane active" id="user_profile_tab">
    <form class="form-horizontal" role="form" style="margin: 30px 0 0;">
        <div id="p_change_success"></div>
        <div class="form-group">
            <label class="col-sm-2" for="p_email">Email</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="p_email" name="p_email"
                       value="<?php echo isset($profile_details['email']) ? $profile_details['email'] : null; ?>" />
            </div>
            <span id="err_p_email"></span>
        </div>
        <div class="form-group">
            <label class="col-sm-2" for="p_age">Age</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="p_age" name="p_age"
                       value="<?php echo isset($profile_details['age']) ? $profile_details['age'] : null; ?>" maxlength="3"/>
            </div>
            <span id="err_p_age"></span>
        </div>
        <div class="form-group">
            <label class="col-sm-2" for="p_city">City</label>
            <div class="col-sm-5">
                <select class="form-control" id="p_city" name="p_city">
                    <option value="">--Select City--</option>
                    <?php
                    if (!empty($cities)) {
                        foreach ($cities as $arrCity) {
                            if ($profile_details['city'] == $arrCity['city_id']) {
                                ?>
                                <option value="<?php echo $arrCity['city_id']; ?>" selected="true"><?php echo $arrCity['city_name']; ?></option>
                                <?php
                            } else {
                                ?>       
                                <option value="<?php echo $arrCity['city_id']; ?>"><?php echo $arrCity['city_name']; ?></option>
                                <?php
                            }
                        }
                    }
                    ?>
                </select>
            </div>
            <span id="err_p_city"></span>
        </div>
        <div class="form-group">
            <label class="col-sm-2" for="p_city">Category</label>
            <div class="col-sm-5">
                <select class="form-control" id="p_category" name="p_category">
                    <option value="">--Select Category--</option>
                    <?php
                    if (!empty($categories)) {
                        foreach ($categories as $arrCategory) {
                            if ($arrCategory['category_id'] == $profile_details['category_id']) {
                                ?>
                                <option value="<?php echo $arrCategory['category_id']; ?>" selected="true"><?php echo $arrCategory['name']; ?></option>
                                <?php
                            } else {
                                ?>
                                <option value="<?php echo $arrCategory['category_id']; ?>"><?php echo $arrCategory['name']; ?></option>
                                <?php
                            }
                        }
                    }
                    ?>
                </select>
            </div>
            <span id="err_p_category"></span>
        </div>
        <div class="form-group">
            <label class="col-sm-2" for="p_gender">Gender</label>
            <div class="col-sm-5">
                <label class="radio-inline"> <input type="radio" name="p_gender"
                                                    id="p_male" value="male"/>Male
                </label> <label class="radio-inline"> <input type="radio"
                                                             name="p_gender" id="p_female" value="female"/>Female
                </label>
            </div>
            <span id="err_p_gender"></span>
        </div>
        <div class="form-group">
            <label class="col-sm-2" for="p_language">Languages Known As</label>
            <div class="col-sm-5">
                <select class="form-control" multiple id="p_language"
                        name="p_language">
                    <option value="">--Select Languages--</option>
                    <?php
                    if (!empty($languages)) {
                        foreach ($languages as $key => $value) {
                            ?>
                            <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                            <?php
                        }
                    }
                    ?>
                </select>
            </div>
            <span id="err_p_language"></span>
        </div>
        <div class="form-group">
            <label class="col-sm-2" for="p_height">Height</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="p_height"
                       name="p_height" value="<?php echo isset($profile_details['height']) ? $profile_details['height'] : null; ?>" maxlength="6"/>
            </div>
            <span id="err_p_height"></span>
        </div>
        <div class="form-group">
            <label class="col-sm-2" for="p_biography">Biography</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="p_biography" name="p_biography"
                          style="height: 250px;"><?php echo isset($profile_details['biography']) ? $profile_details['biography'] : null; ?></textarea>
            </div>
            <span id="err_p_biography"></span>
        </div>
        <div class="form-group">
            <div class="col-sm-6">
                <button type="button" class="btn btn-info pull-right"
                        id="update_profile" name="update_profile" onclick="updateProfile()">Update</button>
            </div>
        </div>
    </form>
</div>


<script type="text/javascript">
    setProfile();
    function updateProfile() {
        var objInput = {};
        objInput = {
            email: $("#p_email").val(),
            age: $("#p_age").val(),
            city: $("#p_city").val(),
            category_id: $("#p_category").val(),
            gender: $('input:radio[name=p_gender]:checked').val(),
            languages: $("#p_language").val(),
            height: $("#p_height").val(),
            biography: $("#p_biography").val(),
            id: '<?php echo Yii::$app->session['customer_data']['customer_id']; ?>'
        };

        $.post('<?php echo Yii::getAlias('@fweb') . '/customers/customers/update-profile'; ?>', objInput, function (response) {
            makeBEmpty();
            var response = $.parseJSON(response);
            if (response.hasOwnProperty('errors')) {
                //Email
                if (undefined != response.errors.email && response.errors.email.length > 0) {
                    $("#err_p_email").html(response.errors.email[0]);
                }
                //Age
                if (undefined != response.errors.age && response.errors.age.length > 0) {
                    $("#err_p_age").html(response.errors.age[0]);
                }
                //City
                if (undefined != response.errors.city && response.errors.city.length > 0) {
                    $("#err_p_city").html(response.errors.city[0]);
                }
                //Category
                if (undefined != response.errors.category_id && response.errors.category_id.length > 0) {
                    $("#err_p_category").html(response.errors.category_id[0]);
                }
                //Gender
                if (undefined != response.errors.gender && response.errors.gender.length > 0) {
                    $("#err_p_gender").html(response.errors.gender[0]);
                }
                //Languages
                if (undefined != response.errors.languages && response.errors.languages.length > 0) {
                    $("#err_p_language").html(response.errors.languages[0]);
                }
                //Height
                if (undefined != response.errors.height && response.errors.height.length > 0) {
                    $("#err_p_height").html(response.errors.height[0]);
                }
                //Biography
                if (undefined != response.errors.biography && response.errors.biography.length > 0) {
                    $("#err_p_biography").html(response.errors.biography[0]);
                }
                return false;
            } else {
                $("#p_change_success").html(response.message);
                return true;
            }
        });
    }

    function setProfile() {
        var languages = '<?php echo $profile_details['languages']; ?>';
        console.log(languages);
        var gender = '<?php echo $profile_details['gender']; ?>';
        if ('male' == gender) {
            $('#p_male').attr('checked', true)
        }
        if ('female' == gender) {
            $('#p_female').attr('checked', true)
        }
        return true;
    }

    function makeBEmpty() {
        $("#err_p_email").html("");
        $("#err_p_age").html("");
        $("#err_p_city").html("");
        $("#err_p_category").html("");
        $("#err_p_gender").html("");
        $("#err_p_language").html("");
        $("#err_p_height").html("");
        $("#err_p_biography").html("");
        $("#p_change_success").html("");
        return true;
    }

</script>