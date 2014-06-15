<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<div class="crumbs">
	<ul id="breadcrumbs" class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="<?php echo base_url(); ?>"><?php echo $this->auth_role_model->get_label_value("home", $current_user_language); ?></a>
		</li>
		<li class="current">
			<a href="<?php echo site_url("auth_roles"); ?>" title=""><?php echo $this->auth_role_model->get_label_value("auth_roles", $current_user_language); ?></a>
		</li>
		<li class="current">
			<a href="<?php echo site_url("auth_roles/new_auth_role"); ?>" title=""><?php echo $this->auth_role_model->get_label_value("new_auth_role", $current_user_language); ?></a>
		</li>
	</ul>

	<ul class="crumb-buttons">
		<li><a href="<?php echo site_url("auth_roles"); ?>" title=""><i class="icon-plus"></i><span><?php echo $this->auth_role_model->get_label_value("list_auth_roles", $current_user_language); ?></span></a>
		</li>
	</ul>
</div>
<br />


<div class="row">
	<!--=== Validation Example 1 ===-->
	<div class="col-md-12">
		<div class="widget box">
			<div class="widget-header">
				<h4><i class="icon-plus"></i><?php echo $this->auth_role_model->get_label_value("new_auth_role", $current_user_language); ?></h4>
			</div>
			<div class="widget-content">



				<form class="form-horizontal row-border" id="form_to_be_validated"   action="<?php echo site_url("auth_roles/create"); ?>" method="post">
					<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<div class="form-group">
	<label class="col-md-3 control-label" for="role_parent"><?php echo $this->auth_role_model->get_label_value("role_parent", $current_user_language); ?></label>
	<div class="col-md-5">
		<select id="role_parent" class="select2 select2-select-00 col-md-12 full-width-fix " name="role_parent">
			<option value=0><?php echo $this->auth_role_model->get_label_value("select_auth_roles_referenced", $current_user_language); ?></option>
			<?php
			if ( $auth_roles->num_rows > 0 ) {
				foreach ( $auth_roles->result() as $row ) {
					echo "<option value='".$row->role_id."'>".$row->role_title. "</option>";
				}
			}
			?>
		</select>
	</div>
</div><!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<div class="form-group">
	<label class="col-md-3 control-label"><?php echo $this->auth_role_model->get_label_value("role_title", $current_user_language); ?><span class="required">*</span></label>
	<div class="col-md-5">
		<input type="text" name="role_title" value="" class="form-control required"/>
	</div>
</div><!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<div class="form-group">
	<label class="col-md-3 control-label"><?php echo $this->auth_role_model->get_label_value("role_description", $current_user_language); ?><span class="required">*</span></label>
	<div class="col-md-5">
		<input type="text" name="role_description" value="" class="form-control required"/>
	</div>
</div><!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<div class="form-group">
	<label class="col-md-3 control-label"><?php echo $this->auth_role_model->get_label_value("role_level", $current_user_language); ?><span class="required">*</span></label>
	<div class="col-md-5">
		<input type="text" name="role_level" value="" class="form-control required"/>
	</div>
</div>
					<div class="form-actions">
						<input id="action_button" type="submit" value="<?php echo $this->auth_role_model->get_label_value("save", $current_user_language); ?>" class="btn btn-primary pull-right" />
					</div>
				</form>
			</div>
		</div>
		<!-- /Validation Example 1 -->
	</div>
</div>