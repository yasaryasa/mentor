<header class="header navbar navbar-fixed-top" role="banner">
	<!-- Top Navigation Bar -->
	<div class="container">

		<!-- Only visible on smartphones, menu toggle -->
		<ul class="nav navbar-nav">
			<li class="nav-toggle">
			<a href="javascript:void(0);" title=""><i
					class="icon-reorder"></i>
			</a>
			</li>
		</ul>

		<!-- Logo -->
		<a class="navbar-brand" href="<?php echo base_url(); ?>"> <?php echo $this->$model->get_label_value("project_name", $current_user_language); ?>
		</a>
		<!-- /logo -->

		<!-- Sidebar Toggler -->
		<a href="#" class="toggle-sidebar bs-tooltip" data-placement="bottom"
			data-original-title="Left menu open/close"> <i class="icon-reorder"></i>
		</a>
		<!-- /Sidebar Toggler -->

		<!-- Top Left Menu -->
		<ul class="nav navbar-nav navbar-left hidden-xs hidden-sm">
			<li><a href="<?php echo base_url(); ?>"> <?php echo $this->$model->get_label_value("home", $current_user_language); ?>
			</a></li>
			<?php
			if ($top_groups) {
				foreach ($top_groups->result() as $top_group) {
					$have_right = $this->$model->get_group_right($top_group->module_group_id);
					if ( $have_right ) {
						echo '<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">' . $top_group->module_group_title . ' <i class="icon-caret-down small"></i> </a>';
						$top_items = $this->$model->get_menu_items($top_group->module_group_id);
						if ($top_items) {
							echo '<ul class="dropdown-menu">';
							foreach ($top_items->result() as $top_item) {
								if ($this->$model->get_show($top_item->menu_title))
									echo '<li><a href="' . site_url($top_item->menu_title) . '">' . $this->$model->get_label_value($top_item->menu_title, $current_user_language) . '</a></li>';
							}
							echo '</ul>';
						}
						echo '</li>';
					}
				}
			}
			?>
		</ul>
		<!-- /Top Left Menu -->

		<!-- Top Right Menu -->
		<ul class="nav navbar-nav navbar-right">
			<!-- User Login Dropdown -->
			<li class="dropdown user"><a href="#" class="dropdown-toggle"
				data-toggle="dropdown"> <!--<img alt="" src="assets/img/avatar1_small.jpg" />-->
					<i class="icon-male"></i> <span class="username"> <?php echo $this->session->userdata("admin_name_surname"); ?>
				</span> <i class="icon-caret-down small"></i>
			</a>
				<ul class="dropdown-menu">
					<li><a href="<?php echo site_url("auth_users/edit_auth_user/page/1/".$current_user_id);?>"><i class="icon-user"></i><?php echo $this->$model->get_label_value("my_profile", $current_user_language); ?></a></li>
					<li class="divider"></li>
					<li><a href="<?php echo site_url($this->uri->segment(1, DEFAULT_CONTROLLER) . "/logout"); ?>"><i class="icon-key"></i><?php echo $this->$model->get_label_value("logout", $current_user_language); ?></a></li>
				</ul>
			</li>
			<!-- /user login dropdown -->
		</ul>
		<!-- /Top Right Menu -->
	</div>
	<!-- /top navigation bar -->


</header>
<!-- /.header -->

<div id="container">
	<div id="sidebar" class="sidebar-fixed">
		<div id="sidebar-content">

			<!--=== Navigation ===-->
			<ul id="nav">

				<?php
				$module = $this->$model->get_module_by_name($this->uri->segment(1, DEFAULT_CONTROLLER));
				if ($left_groups) {
					foreach ($left_groups->result() as $left_group) {
						$have_right = $this->$model->get_group_right($left_group->module_group_id);
						if ($have_right) {
							if ($module && ($module->module_group_id == $left_group->module_group_id))
								echo '<li class="current open"><a href="javascript:void(0);">' . $left_group->module_group_title . '</a>';
							else
								echo '<li class="current open"><a href="javascript:void(0);">' . $left_group->module_group_title . '</a>';

							$left_items = $this->$model->get_menu_items($left_group->module_group_id);
							if ($left_items) {
								echo '<ul class="sub-menu">';
								foreach ($left_items->result() as $left_item) {
									if ($this->$model->get_show($left_item->menu_title)) {
										if ($this->uri->segment(1, DEFAULT_CONTROLLER) == $left_item->menu_title)
											echo '<li class="current"><a href="' . site_url($left_item->menu_title) . '">' . $this->$model->get_label_value($left_item->menu_title, $current_user_language) . '</a></li>';
										else
											echo '<li><a href="' . site_url($left_item->menu_title) . '">' . $this->$model->get_label_value($left_item->menu_title, $current_user_language) . '</a></li>';
									}
								}
								echo '</ul>';
							}
							echo '
							</li>';
						}
					}
				}
				?>

			</ul>

<!-- 			<div class="sidebar-widget align-center"> -->
<!-- 				<div class="btn-group" data-toggle="buttons" id="theme-switcher"> -->
<!-- 					<label class="btn active"> <input type="radio" -->
<!-- 						name="theme-switcher" data-theme="bright"><i class="icon-sun"></i> -->
<!-- 						Light -->
<!-- 					</label> <label class="btn"> <input type="radio" -->
<!-- 						name="theme-switcher" data-theme="dark"><i class="icon-moon"></i> -->
<!-- 						Dark -->
<!-- 					</label> -->
<!-- 				</div> -->
<!-- 			</div> -->
			<div class="sidebar-widget align-center">
			</div>
		</div>
		<div id="divider" class="resizeable"></div>
	</div>
	<!-- /Sidebar -->
	<div id="content">
		<div class="container">