<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<div class="crumbs">
	<ul id="breadcrumbs" class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="<?php echo base_url(); ?>"><?php echo $this->auth_role_capability_model->get_label_value("home", $current_user_language); ?></a>
		</li>
		<li class="current">
			<a href="<?php echo site_url("auth_role_capabilities"); ?>" title=""><?php echo $this->auth_role_capability_model->get_label_value("auth_role_capabilities", $current_user_language); ?></a>
		</li>
		<li class="current">
			<a href="<?php echo site_url("auth_role_capabilities/new_auth_role_capability"); ?>" title=""><?php echo $this->auth_role_capability_model->get_label_value("new_auth_role_capability", $current_user_language); ?></a>
		</li>
	</ul>

	<ul class="crumb-buttons">
		<li><a href="<?php echo site_url("auth_role_capabilities"); ?>" title=""><i class="icon-plus"></i><span><?php echo $this->auth_role_capability_model->get_label_value("list_auth_role_capabilities", $current_user_language); ?></span></a>
		</li>
	</ul>
</div>
<br />


<div class="row">
	<!--=== Validation Example 1 ===-->
	<div class="col-md-12">
		<div class="widget box">
			<div class="widget-header">
				<h4><i class="icon-plus"></i><?php echo $this->auth_role_capability_model->get_label_value("new_auth_role_capability", $current_user_language); ?></h4>
			</div>
			<div class="widget-content">



				<form class="form-horizontal row-border" id="form_to_be_validated"   action="<?php echo site_url("auth_role_capabilities/create"); ?>" method="post">
					<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<div class="form-group">
	<label class="col-md-3 control-label" for="role_capability_role_id"><?php echo $this->auth_role_capability_model->get_label_value("role_capability_role_id", $current_user_language); ?><span class="required">*</span></label>
	<div class="col-md-5">
		<select id="role_capability_role_id" class="select2 select2-select-00 col-md-12 full-width-fix required" name="role_capability_role_id">
			<option value=0><?php echo $this->auth_role_capability_model->get_label_value("select_auth_roles_referenced", $current_user_language); ?></option>
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
	<label class="col-md-3 control-label" for="role_capability_module_name"><?php echo $this->auth_role_capability_model->get_label_value("role_capability_module_name", $current_user_language); ?><span class="required">*</span></label>
	<div class="col-md-5">
		<select id="role_capability_module_name" class="select2 select2-select-00 col-md-12 full-width-fix required" name="role_capability_module_name">
			<option value=0><?php echo $this->auth_role_capability_model->get_label_value("select_gen_modules_referenced", $current_user_language); ?></option>
			<?php
			if ( $gen_modules->num_rows > 0 ) {
				foreach ( $gen_modules->result() as $row ) {
					echo "<option value='".$row->module_title."'>".$row->module_title. "</option>";
				}
			}
			?>
		</select>
	</div>
</div><!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<div class="form-group">
	<label class="col-md-3 control-label"><?php echo $this->auth_role_capability_model->get_label_value("role_capability_see_all", $current_user_language); ?></label>
	<div class="col-md-5">
		<input type="text" name="role_capability_see_all" value="" class="form-control "/>
	</div>
</div><!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<div class="form-group">
	<label class="col-md-3 control-label"><?php echo $this->auth_role_capability_model->get_label_value("role_capability_see_others", $current_user_language); ?></label>
	<div class="col-md-5">
		<input type="text" name="role_capability_see_others" value="" class="form-control "/>
	</div>
</div><!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<div class="form-group">
	<label class="col-md-3 control-label"><?php echo $this->auth_role_capability_model->get_label_value("role_capability_show", $current_user_language); ?></label>
	<div class="col-md-5">
		<input type="text" name="role_capability_show" value="" class="form-control "/>
	</div>
</div><!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<div class="form-group">
	<label class="col-md-3 control-label"><?php echo $this->auth_role_capability_model->get_label_value("role_capability_create", $current_user_language); ?></label>
	<div class="col-md-5">
		<input type="text" name="role_capability_create" value="" class="form-control "/>
	</div>
</div><!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<div class="form-group">
	<label class="col-md-3 control-label"><?php echo $this->auth_role_capability_model->get_label_value("role_capability_read", $current_user_language); ?></label>
	<div class="col-md-5">
		<input type="text" name="role_capability_read" value="" class="form-control "/>
	</div>
</div><!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<div class="form-group">
	<label class="col-md-3 control-label"><?php echo $this->auth_role_capability_model->get_label_value("role_capability_update", $current_user_language); ?></label>
	<div class="col-md-5">
		<input type="text" name="role_capability_update" value="" class="form-control "/>
	</div>
</div><!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<div class="form-group">
	<label class="col-md-3 control-label"><?php echo $this->auth_role_capability_model->get_label_value("role_capability_delete", $current_user_language); ?></label>
	<div class="col-md-5">
		<input type="text" name="role_capability_delete" value="" class="form-control "/>
	</div>
</div>
					<div class="form-actions">
						<input id="action_button" type="submit" value="<?php echo $this->auth_role_capability_model->get_label_value("save", $current_user_language); ?>" class="btn btn-primary pull-right" />
					</div>
				</form>
			</div>
		</div>
		<!-- /Validation Example 1 -->
	</div>
</div>