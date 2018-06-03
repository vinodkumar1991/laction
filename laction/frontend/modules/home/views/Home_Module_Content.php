<div class="section section-padding video-list-section bg-sect">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="news-list">
					<div class="">
						<div class="row">

							<div class="col-md-6 col-xs-12 left-bx">
								<div class="news-content">

									<h2 class="heads-text-ar">
										<a href="javascript:void(0)" class="heads-text-ar">About
											L'Action</a>
									</h2>
									<p>Aliquam rhoncus risus nibh, sed laoreet lacus auctor mollis.
										Sed sed laoreet lorem, eget aliquam magna. Vivamus finibus
										diam</p>
									<a class="news-link-btn-home" href="javascript:void(0)">Read
										More</a>
								</div>
							</div>
							<div class="col-md-6 col-xs-12 right-bx">
								<div class="news-content">

									<h2 class="text-right">
										<a href="javascript:void(0)" class="heads-text-ar">For Booking</a>
									</h2>
									<p class="text-right">Aliquam rhoncus risus nibh, sed laoreet
										lacus auctor mollis. Sed sed laoreet lorem, eget aliquam
										magna. Vivamus finibus diam</p>
									<div class="widget-inner">
										<div class="tags-home">
											<a
												href="<?php echo Yii::getAlias('@fweb').'/booking?booking_type=audit'; ?>"
												class="tag-home" target="_blank">Audition Booking</a> <a
												href="<?php echo Yii::getAlias('@fweb').'/booking?booking_type=preview'; ?>"
												class="tag-home1" target="_blank">Preview Booking</a>

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

<!-- Upcoming Movie Section -->
<div
	class="section section-padding bg-image upcomming-section text-white">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="section-header">
					<h2 class="section-title">L'Action Works</h2>
				</div>
			</div>
		</div>
		<div class="row">
		  <?php
    
    if (isset($home_videos[0]) && ! empty($home_videos[0])) {
        ?>   
    
			<div class="col-md-9">
				<div class="upcomming-featured">
					<img class="img-responsive"
						src="<?php echo  Yii::getAlias('@video_images').'/'.$home_videos[0]['file_image']; ?>"
						alt="Upcomming Featured"> <a class="play-video"
						href="<?php echo $home_videos[0]['file_link']; ?>"><i
						class="fa fa-play"></i></a>
					<div class="upcomming-details">
						<h4 class="video-title">
							<a href="javascript:void(0)"><?php echo $home_videos[0]['file_name']; ?></a>
						</h4>
						<p class="video-release-on"><?php echo $home_videos[0]['release_on']; ?></p>
					</div>
				</div>
			</div>
			<?php
    }
    unset($home_videos[0]);
    ?>
			<div class="col-md-3 col-xs-12 sm-top-30">
			<?php

if (! empty($home_videos)) {
    foreach ($home_videos as $arrHomeVideo) {
        ?>
			        
				<div class="upcomming-item">
					<img class="img-responsive"
						src="<?php echo Yii::getAlias('@video_images').'/'.$arrHomeVideo['file_image']; ?>"
						alt="Upcomming featured" />
					<div class="upcomming-details">
						<h4 class="video-title">
							<a href="javascript:void(0)"><?php echo $arrHomeVideo['file_name']; ?></a>
						</h4>
						<p class="video-release-on"><?php echo $arrHomeVideo['release_on']; ?></p>
					</div>
					<div class="upcomming-hover">
						<a class="play-video"
							href="<?php echo $arrHomeVideo['file_link']; ?>"><i
							class="fa fa-play"></i></a>
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