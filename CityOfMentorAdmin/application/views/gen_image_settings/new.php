<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<div class="crumbs">
	<ul id="breadcrumbs" class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="<?php echo base_url(); ?>"><?php echo $this->gen_image_setting_model->get_label_value("home", $current_user_language); ?></a>
		</li>
		<li class="current">
			<a href="<?php echo site_url("gen_image_settings"); ?>" title=""><?php echo $this->gen_image_setting_model->get_label_value("gen_image_settings", $current_user_language); ?></a>
		</li>
		<li class="current">
			<a href="<?php echo site_url("gen_image_settings/new_gen_image_setting"); ?>" title=""><?php echo $this->gen_image_setting_model->get_label_value("new_gen_image_setting", $current_user_language); ?></a>
		</li>
	</ul>

	<ul class="crumb-buttons">
		<li><a href="<?php echo site_url("gen_image_settings"); ?>" title=""><i class="icon-plus"></i><span><?php echo $this->gen_image_setting_model->get_label_value("list_gen_image_settings", $current_user_language); ?></span></a>
		</li>
	</ul>
</div>
<br />


<div class="row">
	<!--=== Validation Example 1 ===-->
	<div class="col-md-12">
		<div class="widget box">
			<div class="widget-header">
				<h4><i class="icon-plus"></i><?php echo $this->gen_image_setting_model->get_label_value("new_gen_image_setting", $current_user_language); ?></h4>
			</div>
			<div class="widget-content">



				<form class="form-horizontal row-border" id="form_to_be_validated"   action="<?php echo site_url("gen_image_settings/create"); ?>" method="post">
					<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<div class="form-group">
	<label class="col-md-3 control-label" for="setting_module_name"><?php echo $this->gen_image_setting_model->get_label_value("setting_module_name", $current_user_language); ?><span class="required">*</span></label>
	<div class="col-md-5">
		<select id="setting_module_name" class="select2 select2-select-00 col-md-12 full-width-fix required" name="setting_module_name">
			<option value=0><?php echo $this->gen_image_setting_model->get_label_value("select_gen_modules_referenced", $current_user_language); ?></option>
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
	<label class="col-md-3 control-label" for="setting_type_id"><?php echo $this->gen_image_setting_model->get_label_value("setting_type_id", $current_user_language); ?><span class="required">*</span></label>
	<div class="col-md-5">
		<select id="setting_type_id" class="select2 select2-select-00 col-md-12 full-width-fix required" name="setting_type_id">
			<option value=0><?php echo $this->gen_image_setting_model->get_label_value("select_gen_image_setting_types_referenced", $current_user_language); ?></option>
			<?php
			if ( $gen_image_setting_types->num_rows > 0 ) {
				foreach ( $gen_image_setting_types->result() as $row ) {
					echo "<option value='".$row->type_id."'>".$row->type_title. "</option>";
				}
			}
			?>
		</select>
	</div>
</div><!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<div class="form-group">
	<label class="col-md-3 control-label"><?php echo $this->gen_image_setting_model->get_label_value("setting_image_width", $current_user_language); ?></label>
	<div class="col-md-5">
		<input type="text" name="setting_image_width" value="" class="form-control "/>
	</div>
</div><!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<div class="form-group">
	<label class="col-md-3 control-label"><?php echo $this->gen_image_setting_model->get_label_value("setting_image_height", $current_user_language); ?></label>
	<div class="col-md-5">
		<input type="text" name="setting_image_height" value="" class="form-control "/>
	</div>
</div>
					<div class="form-actions">
						<input id="action_button" type="submit" value="<?php echo $this->gen_image_setting_model->get_label_value("save", $current_user_language); ?>" class="btn btn-primary pull-right" />
					</div>
				</form>
			</div>
		</div>
		<!-- /Validation Example 1 -->
	</div>
</div>