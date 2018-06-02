<?php echo $this->render('Videos_Header'); ?>

<div class="main-wrap">
	<div class="section section-padding video-list-section gray-bg">
		<div class="container">
			<div class="row">
				<div class="show-listing">
				<?php
    
    if (! empty($videos)) {
        foreach ($videos as $arrVideo) {
            ?>
            
					<div class="col-md-3 col-sm-4 col-xs-6">
						<div class="video-item">
							<div class="thumb-wrap">
								<img
									src="<?php echo Yii::getAlias('@video_images').'/'.$arrVideo['file_image']; ?>"
									alt="" />
								<div class="thumb-hover">
									<a class="play-video"
										href="<?php echo $arrVideo['file_link']; ?>"><i
										class="fa fa-play"></i></a>
								</div>
							</div>
							<div class="video-details">
								<h4 class="video-title">
									<a href="#"><?php echo $arrVideo['file_name']; ?></a>
								</h4>
							</div>
						</div>
					</div>
					<?php
        }
    }
    ?>
				</div>
			</div>
		</div>
	</div>
</div>
