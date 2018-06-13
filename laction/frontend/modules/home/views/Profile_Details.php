
<!-- Page Header -->
<div class="page-header single-celebrity-header profile">
    <div class="page-header-overlay">
        <div class="container">
            <h2 class="page-title"><?php echo $customers['fullname']; ?></h2>
        </div>
    </div>
</div>
<!-- Page Header End -->

<div class="main-wrap">
    <div class="section section-padding celebrity-single-section gray-bg">
        <div class="container">
            <div class="celebrity-single">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="content-wrap">
                            <div class="celebrity-thumb">
                                <img src="<?php
                                echo!empty($customers['image']) ? Yii::getAlias('@f_images') . '/profiles/' . $customers['image'] : Yii::getAlias('@f_images') . '/profiles/default.png';
                                ?>" alt="Actress Pic"/>
                            </div>
                            <div class="celebrity-details">
                                <div class="single-section">
                                    <h3 class="celebrity-name"><?php echo $customers['fullname']; ?></h3>
                                    <p class="celebrity-profession"><?php echo $customers['category_name']; ?></p>
                                    <div class="celebrity-infos">
                                        <p class="birthdate"><label>Age : </label><?php echo $customers['age']; ?></p>
                                        <p class="residence"><label>City : </label><?php echo $customers['city_name']; ?></p>
                                        <p class="gender"><label>Gender : </label><?php echo $customers['gender']; ?></p>
                                        <p class="language"><label>Language : </label><?php echo $customers['languages']; ?></p>
                                        <p class="height"><label>Height : </label><?php echo $customers['height']; ?></p>
                                    </div>
                                    <div class="share-on">
                                        <label>Share: </label>
                                        <div class="share-social">
                                            <!--Please maintain same order only-->
                                            <a href="<?php echo $customers['fb_link']; ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                            <a href="<?php echo $customers['google_plus_link']; ?>" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                            <a href="<?php echo $customers['instagram_link']; ?>" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                            <a href="<?php echo $customers['linkedin_link']; ?>" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                            <a href="<?php echo $customers['twitter_link']; ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-section bio-entry">
                                    <h3 class="single-section-title">Biography</h3>
                                    <div class="section-content">
                                        <p><?php echo $customers['biography']; ?></p>
                                    </div>
                                </div>
                                <div class="single-section">
                                    <h3 class="single-section-title">Photo Gallery</h3>
                                    <div class="section-content">
                                        <div id="single-gallery-1" class="owl-carousel single-gallery-slider">
                                            <img class="img-responsive" src="images/slider/single-4.png" alt="Single Slider Image">
                                            <img class="img-responsive" src="images/slider/single-5.png" alt="Single Slider Image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>