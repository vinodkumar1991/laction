
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
					class="zmdi zmdi-view-dashboard"></i> <span class="nav-label">Dashboard</span></a></li>

			<li class=""><a href="<?php echo Yii::getAlias('@web').'/slots';?>"><i
					class="fa fa-pie-chart"></i> <span class="nav-label">Slots</span></a></li>
			<li class=""><a
				href="<?php echo Yii::getAlias('@web').'/create-user';?>"><i
					class="fa fa-users"></i> <span class="nav-label">Admin Users</span></a></li>

			<li class=""><a href="#"><i class="fa fa-pie-chart"></i> <span
					class="nav-label">Reports</span></a></li>
			<li class="has-submenu"><a href="#"><i class="fa fa-bell"></i><span
					class="nav-label">Notifications</span><span class="menu-arrow"></span></a>
				<ul class="list-unstyled">
					<li class=""><a
						href="<?php echo Yii::getAlias('@web').'/subjects';?>">Subjects</a></li>
					<li><a href="<?php echo Yii::getAlias('@web').'/templates';?>">Templets</a></li>

				</ul></li>
			<li class="has-submenu"><a href="#"><i class="fa fa-cogs"></i> <span
					class="nav-label">Settings</span><span class="menu-arrow"></span></a>
				<ul class="list-unstyled">
					<li><a href="<?php echo Yii::getAlias('@web').'/roles' ?>">Roles</a></li>
					<li><a href="<?php echo Yii::getAlias('@web').'/permissions' ?>">Permissions</a></li>
					<li><a
						href="<?php echo Yii::getAlias('@web').'/role-permissions';?>">Role
							Permissions</a></li>
					<li><a href="<?php echo Yii::getAlias('@web').'/categories';?>">Categories</a></li>
					<li><a href="<?php echo Yii::getAlias('@web').'/sub-categories';?>">SubCategories</a></li>


				</ul></li>


		</ul>
	</nav>


</aside>
<!-- Aside Ends-->