<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<div class="crumbs">
	<ul id="breadcrumbs" class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="<?php echo base_url(); ?>"><?php echo $this->auth_user_log_model->get_label_value("home", $current_user_language); ?></a>
		</li>
		<li class="current">
			<a href="<?php echo site_url("auth_user_logs"); ?>" title=""><?php echo $this->auth_user_log_model->get_label_value("auth_user_logs", $current_user_language); ?></a>
		</li>
		<li class="current">
			<a href="<?php echo site_url("auth_user_logs/new_auth_user_log"); ?>" title=""><?php echo $this->auth_user_log_model->get_label_value("new_auth_user_log", $current_user_language); ?></a>
		</li>
	</ul>

	<ul class="crumb-buttons">
		<li><a href="<?php echo site_url("auth_user_logs"); ?>" title=""><i class="icon-plus"></i><span><?php echo $this->auth_user_log_model->get_label_value("list_auth_user_logs", $current_user_language); ?></span></a>
		</li>
	</ul>
</div>
<br />


<div class="row">
	<!--=== Validation Example 1 ===-->
	<div class="col-md-12">
		<div class="widget box">
			<div class="widget-header">
				<h4><i class="icon-plus"></i><?php echo $this->auth_user_log_model->get_label_value("new_auth_user_log", $current_user_language); ?></h4>
			</div>
			<div class="widget-content">



				<form class="form-horizontal row-border" id="form_to_be_validated"   action="<?php echo site_url("auth_user_logs/edit/page/$page/$id"); ?>" method="post">
					<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<div class="form-group">
	<label class="col-md-3 control-label"><?php echo $this->auth_user_log_model->get_label_value("user_log_ip_address", $current_user_language); ?><span class="required">*</span></label>
	<div class="col-md-5">
		<input type="text" name="user_log_ip_address" value="<?php echo $auth_user_log->user_log_ip_address; ?>" class="form-control required"/>
	</div>
</div><!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<div class="form-group">
	<label class="col-md-3 control-label"><?php  echo $this->auth_user_log_model->get_label_value("user_log_activity", $current_user_language); ?></label>
	<div class="col-md-5">
		<textarea name="user_log_activity" class="form-control wysiwyg" rows="15"><?php echo $auth_user_log->user_log_activity; ?></textarea></textarea>
	</div>
</div><!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<div class="form-group">
	<label class="col-md-3 control-label"><?php echo $this->auth_user_log_model->get_label_value("user_log_user_agent", $current_user_language); ?><span class="required">*</span></label>
	<div class="col-md-5">
		<input type="text" name="user_log_user_agent" value="<?php echo $auth_user_log->user_log_user_agent; ?>" class="form-control required"/>
	</div>
</div>
<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<div class="form-group">
	<label class="col-md-3 control-label"><?php echo $this->auth_user_log_model->get_label_value("user_log_time", $current_user_language); ?><span class="required">*</span></label>
	<div class="col-md-5">
		<input type="text" name="user_log_time" value="<?php echo $auth_user_log->user_log_time; ?>" class="form-control datepicker required" data-mask="99-99-9999"/>
	</div>
</div>
					<div class="form-actions">
						<input id="action_button" type="submit" value="<?php echo $this->auth_user_log_model->get_label_value("save", $current_user_language); ?>" class="btn btn-primary pull-right" />
					</div>
				</form>
			</div>
		</div>
		<!-- /Validation Example 1 -->
	</div>
</div>