<!-- Bu uygulama İmleç A.Ş. Tarafından Geliştirilmiştir. http://www.imlec.com.tr http://www.imleç.com.tr -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php echo $this->config->item('app_name'); ?></title>


        <!--=== CSS ===-->

        <!-- Bootstrap -->
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

        <!-- jQuery UI -->
        <!--<link href="<?php echo base_url(); ?>assets/plugins/jquery-ui/jquery-ui-1.10.2.custom.css" rel="stylesheet" type="text/css" />-->
        <!--[if lt IE 9]>
                <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/jquery-ui/jquery.ui.1.10.2.ie.css"/>
        <![endif]-->

        <!-- Theme -->
        <link href="<?php echo base_url(); ?>assets/css/main.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/plugins.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/responsive.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/icons.css" rel="stylesheet" type="text/css" />

        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/fontawesome/font-awesome.min.css" />
		<!--[if IE 7]>
				<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/fontawesome/font-awesome-ie7.min.css">
		<![endif]-->

		<!--[if IE 8]>
				<link href="<?php echo base_url(); ?>assets/css/ie8.css" rel="stylesheet" type="text/css" />
		<![endif]-->


		<!--=== JavaScript ===-->

		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/libs/jquery-1.10.2.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js"></script>

		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/libs/lodash.compat.min.js"></script>

		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
				<script src="<?php echo base_url(); ?>assets/js/libs/html5shiv.js"></script>
		<![endif]-->

		<!-- Smartphone Touch Events -->
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/touchpunch/jquery.ui.touch-punch.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/event.swipe/jquery.event.move.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/event.swipe/jquery.event.swipe.js"></script>

		<!-- General -->
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/libs/breakpoints.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/respond/respond.min.js"></script> <!-- Polyfill for min/max-width CSS3 Media Queries (only for IE8) -->

		<!-- Page specific plugins -->
		<!-- Charts -->
		<!--[if lt IE 9]>
				<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/flot/excanvas.min.js"></script>
		<![endif]-->
			
		<!-- Noty -->
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/noty/jquery.noty.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/noty/layouts/top.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/noty/themes/default.js"></script>

		<!-- Form Validation -->
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/validation/jquery.validate.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/validation/additional-methods.min.js"></script>

		<script>
			$(document).ready(function() {
				"use strict";
				App.init(); // Init layout and core plugins
				Plugins.init(); // Init all plugins
				FormComponents.init(); // Init all form-specific plugins
			});</script>

		<!-- Demo JS -->
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/custom.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/demo/ui_general.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/demo/form_validation.js"></script>

		

		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.Jcrop.css" type="text/css" />

    </head>
    <body>
			
			<style>
				body {
					padding-top: 50px;
					padding-bottom: 50px;
					background-color: #eee;
				}

				.form-signin {
					max-width: 400px;
					padding: 25px;
					margin: 0 auto;
					border: 1px solid #ccc;
					background-color: #fff;
				}
			</style>


			<div class="container">

				<form class="form-signin" action="<?php echo site_url("" . $class . "/do_login"); ?>" method="post">
					<?php if ($status != "bos") { ?>
					<div class="alert alert-danger">
						Invalid username or password!!!
					</div>
					<?php } ?>
					<img src="<?php echo base_url()."/assets/img/logo.png" ?>" />
					
					<h2 class="form-signin-heading"><center>Administrator Panel</center></h2>
					
					<div class="form-group">
						<!--<label for="password">Password:</label>-->
						<div class="input-icon">
							<i class="icon-user" style="font-size:24px;"></i>
							<input type="text" name="user" class="form-control input-lg" placeholder="Username" required autofocus="autofocus" data-rule-required="true" data-msg-required="Please enter your username." />
						</div>
					</div>
					
					<div class="form-group">
						<!--<label for="password">Password:</label>-->
						<div class="input-icon">
							<i class="icon-lock" style="font-size:28px;"></i>
							<input type="password" name="pass" class="form-control input-lg" placeholder="Password" required data-rule-required="true" data-msg-required="Please enter your password." />
						</div>
					</div>
					
					<button class="btn btn-lg btn-info btn-block" type="submit">Login &nbsp;<i class="icon-angle-right"></i></button>
					<br><p class="pull-right"><a target="_blank" href="http://www.cityofmentor.com">City of Mentor</a></p>
				</form>
				

		</div>
    </body>
</html>
