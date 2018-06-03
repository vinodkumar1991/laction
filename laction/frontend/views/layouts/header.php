<!-- Main Header -->
<nav class="navbar navbar-default">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed"
				data-toggle="collapse" data-target="#main-nav-collapse"
				aria-expanded="false">
				<span class="sr-only">Toggle navigation</span> <span
					class="icon-bar"></span> <span class="icon-bar"></span> <span
					class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?php echo Yii::getAlias('@fweb'); ?>">
				<img src="<?php echo Yii::getAlias('@fimg').'/template/logo.png';?>"
				alt="Laction Studios" />
			</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="main-nav-collapse">

			<ul class="nav navbar-nav navbar-right">
				<li><a href="<?php echo Yii::getAlias('@fweb').'/home';?>" class=""
					id="menu_home">Home</a></li>
				<li><a href="<?php echo Yii::getAlias('@fweb').'/booking';?>"
					class="" id="menu_booking">Booking</a></li>
				<li><a href="<?php echo Yii::getAlias('@fweb').'/videos'; ?>"
					class="" id="menu_videos">Videos</a></li>
				<li><a href="<?php echo Yii::getAlias('@fweb').'/profiles'; ?>"
					class="" id="menu_profile">Profile</a></li>
				<li><a href="<?php echo Yii::getAlias('@fweb').'/contact-us';?>"
					class="" id="menu_contact">Contact Us</a></li>
					<?php
    if (Yii::$app->session['customer_data']['customer_id']) {
        ?>
        <li><a href="<?php echo Yii::getAlias('@fweb').'/profile'; ?>"><i
						class="fa fa-user"></i></a></li>
        <?php
    }
    ?>
				
			</ul>
		</div>
	</div>
</nav>
<!-- Main Header End -->
<script type="text/javascript">
makeActiveMenu();
   function makeActiveMenu(){
	   var str_header_menu = '<?php echo $action_name; ?>';
	   switch(str_header_menu) {
	    case 'booking':
	    	$('#menu_booking').addClass("active-laction");
	        break;
	    case 'videos':
	    	$('#menu_videos').addClass("active-laction");
	        break;
	    case 'profiles':
	    	$('#menu_profile').addClass("active-laction");
	        break;
	    case 'contact-us':
	    	$('#menu_contact').addClass("active-laction");
	        break;
	     default:
	    	$('#menu_home').addClass("active-laction");
	}
   }  
</script>