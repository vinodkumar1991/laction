<div class="page-header profile">
    <div class="page-header-overlay">
        <div class="container">
            <h2 class="page-title">Profile</h2>
        </div>
    </div>
</div>
<div class="main-wrap">
    <div class="section section-padding celebrity-list-section gray-bg">
        <div class="container">
            <div class="row search-profile">
                <form class="navbar-form navbar-left">
                    <select name="ps_category_type" id="ps_category_type">
                        <option value="">--Select Category--</option>
                        <?php
                        if (!empty($categories)) {
                            foreach ($categories as $arrCategory) {
                                if (isset($inputs['category']) && ($inputs['category'] == $arrCategory['category_id'])) {
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
                    <input type="search" name="search_value" id="search_value" value="<?php echo isset($inputs['search_value']) ? $inputs['search_value'] : null; ?>"/>
                    <button type="button" class="btn btn-default" onclick="getProfiles()"/><i class="fa fa-search"></i></button>
                </form>
            </div>
            <div class="row">
                <div class="celebrity-list">
                    <?php
                    if (!empty($customers)) {
                        foreach ($customers as $arrCustomer) {
                            ?>
                            <div class="col-md-3 col-sm-4 col-xs-6">
                                <div class="celebrity-item">
                                    <div class="thumb-wrap">
                                        <img src="<?php
                                        echo!empty($arrCustomer['image']) ? Yii::getAlias('@f_images') . '/profiles/' . $arrCustomer['image'] : Yii::getAlias('@f_images') . '/profiles/default.png';
                                        ?>" alt="Celebrity Thumb">
                                        <div class="thumb-hover">
                                            <a class="celebrity-link" href="<?php echo Yii::getAlias('@fweb') . '/home/home/profile-details?customer_id=' . $arrCustomer['customer_id']; ?>" target="_blank"></a>
                                        </div>
                                    </div>
                                    <div class="celebrity-details">
                                        <h4 class="celebrity-name"><a href="<?php echo Yii::getAlias('@fweb') . '/home/home/profile-details?customer_id=' . $arrCustomer['customer_id']; ?>" target="_blank"><?php echo $arrCustomer['fullname']; ?></a></h4>
                                        <p class="celebrity-profession"><?php echo $arrCustomer['category_name']; ?></p>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        echo 'No results are found';
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function getProfiles() {
        var category = search_value = '';
        category = $("#ps_category_type").val();
        search_value = $("#search_value").val();
        var profile_link = '<?php echo Yii::getAlias('@fweb') . '/profiles'; ?>';
        profile_link = profile_link + '?category=' + category + '&search_value=' + search_value;
        window.location.href = profile_link;
        return true;
    }
</script>