<section class="booking-bg audition-section-open" id="audition-bk">
    <div class="container-fluid">
        <div class="container">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 booking-bg-mid">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 pull-right">
                        <form class="">
                            <div class="panel panel-primary book-prim">
                                <div class="panel-heading book-heading">Schedule an Audition
                                    Booking</div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div id="audition_success"></div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Fullname</label> <input
                                                    type="text" class="form-control  book-form" name="fullname"
                                                    id="fullname" value="" />
                                            </div>
                                            <span id="err_fullname"></span>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Email</label> <input
                                                    type="text" class="form-control  book-form" name="email"
                                                    id="email" value="" />
                                            </div>
                                            <span id="err_email"></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Phone</label> <input
                                                    type="text" class="form-control  book-form" name="phone"
                                                    id="phone" value="" />
                                            </div>
                                            <span id="err_phone"></span>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Gender</label> <select
                                                    class="form-control  book-form" name="gender" id="gender">
                                                    <option value="">--Select Gender--</option>
                                                    <?php
                                                    if (!empty($genders)) {
                                                        foreach ($genders as $key => $value) {
                                                            if (isset($customer_details['gender']) && ($customer_details['gender'] == $key)) {
                                                                ?>
                                                                <option value="<?php echo $key; ?>" selected="true"><?php echo $value; ?></option>
                                                                <?php
                                                            } else {
                                                                ?>  
                                                                <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                                                <?php
                                                            }
                                                        }
                                                    }
                                                    ?>								</select>
                                            </div>
                                            <span id="err_gender"></span>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Age</label> <input type="text"
                                                                                                class="form-control  book-form" name="age" id="age"
                                                                                                value="<?php echo isset($customer_details['age']) ? $customer_details['age'] : null; ?>" maxlength="3" />
                                            </div>
                                            <span id="err_age"></span>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Category</label> <select
                                                    class="form-control  book-form" name="category"
                                                    id="category" onchange="getSubCategories(this.value)">
                                                    <option value="">--Select A Category--</option>
                                                    <?php
                                                    if (!empty($categories)) {
                                                        foreach ($categories as $arrCategory) {
                                                            if (isset($customer_details['category_name']) && ($customer_details['category_name'] == $arrCategory['name'])) {
                                                                ?>
                                                                <option value="<?php echo $arrCategory['name']; ?>" selected="true"><?php echo $arrCategory['name']; ?></option>
                                                                <?php
                                                            } else {
                                                                ?>       

                                                                <option value="<?php echo $arrCategory['name']; ?>"><?php echo $arrCategory['name']; ?></option>
                                                                <?php
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <span id="err_category"></span>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Sub Category</label> <select
                                                    class="form-control  book-form" name="sub_category"
                                                    id="sub_category">
                                                    <option value="">--Select Sub Category--</option>
                                                </select>
                                            </div>
                                            <span id="err_sub_category"></span>
                                        </div>
                                        <div class='col-md-6'>
                                            <div class="form-group">
                                                <label class="control-label">Date</label>
                                                <div class="dateContainer">
                                                    <div class="input-group date" id="datetimePicker">
                                                        <input type="text" class="form-control  book-form"
                                                               name="a_event_date" id="a_event_date"
                                                               oninput="getASlots(this.value)" /> <span
                                                               class="input-group-addon"><span
                                                                class="glyphicon glyphicon-calendar"></span></span>
                                                    </div>
                                                </div>
                                                <span id="err_a_event_date"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Time</label>
                                                <!-- class="slot_timings" -->
                                                <select
                                                    style="width: 400px;" 
                                                    name="a_slot_time[]" id="a_slot_time" multiple>
                                                </select>
                                            </div>
                                            <span id="err_a_slot_time"></span>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="checkbox">
                                                    <label> <input type="checkbox" name="aagree" id="aagree"
                                                                   value="agree" />I Agree with the terms and conditions
                                                    </label>
                                                </div>
                                            </div>
                                            <span id="err_a_agree"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-2 col-sm-12 col-xs-12">
                                        <input type="button" class="date-time-btm" value="Book"
                                               onclick="bookAudition()" />
                                    </div>
                                    <!--<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
<button type="submit" class="date-time-close preview-close" > Close</button>
</div>-->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <button type="submit" class="date-time-close preview-close">
                    <i class="fa fa-close"></i>
                </button>
            </div>
        </div>

    </div>
</section>



<script type="text/javascript">
    autoPopulate();
    function autoPopulate() {
        $("#fullname").val("<?php echo Yii::$app->session['customer_data']['fullname']; ?>");
        $('#fullname').prop('readonly', true);
        $("#email").val("<?php echo Yii::$app->session['customer_data']['email']; ?>");
        $('#email').prop('readonly', true);
        $("#phone").val("<?php echo Yii::$app->session['customer_data']['phone']; ?>");
        $('#phone').prop('readonly', true);
        return true;
    }
    function bookAudition() {
        var objAudition = {};
        objAudition = {
            category_type: 'audition',
            booking_type: 'dummyorder',
            fullname: $("#fullname").val(),
            email: $("#email").val(),
            phone: $("#phone").val(),
            gender: $("#gender").val(),
            age: $("#age").val(),
            category: $("#category").val(),
            sub_category_id: $("#sub_category").val(),
            event_date: $("#a_event_date").val(),
            slot_time: $("#a_slot_time").val(),
            agree: $('#aagree').is(":checked")
        };
        $.post('<?php echo Yii::getAlias('@fweb') . '/booking/booking/book-audition'; ?>', objAudition, function (response) {
            makeAEmpty();
            var response = $.parseJSON(response);
            if (response.hasOwnProperty('errors')) {
                //Gender
                if (undefined != response.errors.gender && response.errors.gender.length > 0) {
                    $("#err_gender").html(response.errors.gender[0]);
                }
                //Age
                if (undefined != response.errors.age && response.errors.age.length > 0) {
                    $("#err_age").html(response.errors.age[0]);
                }
                //Category
                if (undefined != response.errors.category && response.errors.category.length > 0) {
                    $("#err_category").html(response.errors.category[0]);
                }
                //Sub Category
                if (undefined != response.errors.sub_category_id && response.errors.sub_category_id.length > 0) {
                    $("#err_sub_category").html(response.errors.sub_category_id[0]);
                }
                //Event Date
                if (undefined != response.errors.event_date && response.errors.event_date.length > 0) {
                    $("#err_a_event_date").html(response.errors.event_date[0]);
                }
                //Slot
                if (undefined != response.errors.from_time && response.errors.from_time.length > 0) {
                    $("#err_a_slot_time").html('Slot is required');
                }
                //Agree
                if (undefined != response.errors.agree && response.errors.agree.length > 0) {
                    $("#err_a_agree").html(response.errors.agree[0]);
                }
                return false;
            } else {
                makeAFieldsEmpty();
                $("#audition_success").html(response.message);
                return true;
            }
        });
        return true;
    }

    function getSubCategories(category) {
        var objCategory = {};
        objCategory = {
            category: category};
        $.post('<?php echo Yii::getAlias('@fweb') . '/booking/booking/sub-categories'; ?>', objCategory, function (response) {
            $("#sub_category").html("");
            $("#sub_category").html(response);
        });
        return true;
    }

    function getASlots(event_date) {
        var objEventDate = {};
        objEventDate = {
            event_date: event_date,
            category_type: 'audition'
        };
        $.post('<?php echo Yii::getAlias('@fweb') . '/booking/booking/slots'; ?>', objEventDate, function (response) {
            $("#a_slot_time").html("");
            $("#a_slot_time").html(response);
        });
        return true;
    }

    function makeAEmpty() {
        $("#err_gender").html("");
        $("#err_age").html("");
        $("#err_category").html("");
        $("#err_sub_category").html("");
        $("#err_a_event_date").html("");
        $("#err_a_slot_time").html("");
        $("#err_a_agree").html("");
        $("#audition_success").html("");
        return true;
    }

    function makeAFieldsEmpty() {
        $("#gender").val("");
        $("#age").val("");
        $("#category").val("");
        $("#sub_category").val("");
        $("#a_event_date").val("");
        $("#a_slot_time").html("");
        $('#aagree').prop("checked", false);
        return true;
    }

</script>