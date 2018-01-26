
<aside class="left-panel">

	<!-- brand -->
	<div class="logo">
		<a href="<?php echo Yii::getAlias('@web').'/dashboard';?>"
			class="logo-expanded"> <i class="fa fa-film"></i> <span
			class="nav-label">L'Action Studios</span>
		</a>
	</div>
	<!-- / brand -->

	<!-- Navbar Start -->
	<nav class="navigation">
		<ul class="list-unstyled">
			<li class="  active"><a
				href="<?php echo Yii::getAlias('@web').'/dashboard';?>"><i
					class="fa fa-dashboard"></i> <span class="nav-label">Dashboard</span></a></li>

			<li class=""><a href="<?php echo Yii::getAlias('@web').'/slots';?>"><i
					class="fa fa-calendar" aria-hidden="true"></i><span
					class="nav-label">Slots</span></a></li>

			<li class=""><a href="#"><i class="fa fa-pie-chart"></i> <span
					class="nav-label">Reports</span></a></li>
			<li class="has-submenu"><a href="#"><i class="fa fa-bell"
					aria-hidden="true"></i><span class="nav-label">Notifications</span><span
					class="menu-arrow"></span></a>
				<ul class="list-unstyled">
					<li class=""><a
						href="<?php echo Yii::getAlias('@web').'/subjects';?>">Subjects<i
							class="fa fa-puzzle-piece" aria-hidden="true"></i></a></li>
					<li><a href="<?php echo Yii::getAlias('@web').'/templates';?>">Templets<i
							class="fa fa-desktop" aria-hidden="true"></i></a></li>

				</ul></li>
			<li class=""><a
				href="<?php echo Yii::getAlias('@web').'/create-user';?>"><i
					class="fa fa-users"></i> <span class="nav-label">Admin Users</span></a></li>


			<li class="has-submenu"><a href="#"><i class="fa fa-cogs"></i> <span
					class="nav-label">Settings</span><span class="menu-arrow"></span></a>
				<ul class="list-unstyled">
					<li><a href="<?php echo Yii::getAlias('@web').'/roles' ?>">Roles<i
							class="fa fa-briefcase" aria-hidden="true"></i></a></li>
					<li><a href="<?php echo Yii::getAlias('@web').'/permissions' ?>">Permissions<i
							class="fa fa-lock" aria-hidden="true"></i></a></li>
					<li><a
						href="<?php echo Yii::getAlias('@web').'/role-permissions';?>">Role
							Permissions<i class="fa fa-key" aria-hidden="true"></i>
					</a></li>
					<li><a href="<?php echo Yii::getAlias('@web').'/categories';?>">Categories<i
							class="fa fa-database" aria-hidden="true"></i></a></li>
					<li><a href="<?php echo Yii::getAlias('@web').'/sub-categories';?>">SubCategories<i
							class="fa fa-level-down" aria-hidden="true"></i></a></li>


				</ul></li>


		</ul>
	</nav>


</aside>
<!-- Aside Ends-->