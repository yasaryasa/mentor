<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<div class="crumbs">
	<ul id="breadcrumbs" class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="<?php echo base_url(); ?>"><?php echo $this->gen_module_model->get_label_value("home", $current_user_language); ?></a>
		</li>
		<li class="current">
			<a href="<?php echo site_url("gen_modules"); ?>" title=""><?php echo $this->gen_module_model->get_label_value("gen_modules", $current_user_language); ?></a>
		</li>
		<li class="current">
			<a href="<?php echo site_url("gen_modules/new_gen_module"); ?>" title=""><?php echo $this->gen_module_model->get_label_value("new_gen_module", $current_user_language); ?></a>
		</li>
	</ul>

	<ul class="crumb-buttons">
		<li><a href="<?php echo site_url("gen_modules"); ?>" title=""><i class="icon-plus"></i><span><?php echo $this->gen_module_model->get_label_value("list_gen_modules", $current_user_language); ?></span></a>
		</li>
	</ul>
</div>
<br />


<div class="row">
	<!--=== Validation Example 1 ===-->
	<div class="col-md-12">
		<div class="widget box">
			<div class="widget-header">
				<h4><i class="icon-plus"></i><?php echo $this->gen_module_model->get_label_value("new_gen_module", $current_user_language); ?></h4>
			</div>
			<div class="widget-content">



				<form class="form-horizontal row-border" id="form_to_be_validated"   action="<?php echo site_url("gen_modules/edit/page/$page/$id"); ?>" method="post">
					<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<div class="form-group">
	<label class="col-md-3 control-label"><?php echo $this->gen_module_model->get_label_value("module_title", $current_user_language); ?></label>
	<div class="col-md-5">
		<input type="text" name="module_title" value="<?php echo $gen_module->module_title; ?>" class="form-control "/>
	</div>
</div><!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<div class="form-group">
	<label class="col-md-3 control-label"><?php echo $this->gen_module_model->get_label_value("module_order", $current_user_language); ?></label>
	<div class="col-md-5">
		<input type="text" name="module_order" value="<?php echo $gen_module->module_order; ?>" class="form-control "/>
	</div>
</div><!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<div class="form-group">
	<label class="col-md-3 control-label" for="input17"><?php echo $this->gen_module_model->get_label_value("module_group_id", $current_user_language); ?><span class="required">*</span></label>
	<div class="col-md-5">
		<select id="module_group_id" class="select2 select2-select-00 col-md-12 full-width-fix required" name="module_group_id">
			<option value=0><?php echo $this->gen_module_model->get_label_value("select_gen_module_groups_referenced", $current_user_language); ?></option>
			<?php
			if ( $gen_module_groups->num_rows > 0 ) {
				foreach ( $gen_module_groups->result() as $row ) {
				if ( $row->module_group_id == $gen_module->module_group_id ) {
					echo "<option selected='selected' value='".$row->module_group_id."'>".$row->module_group_title."</option>";
				} else {
					echo "<option value='".$row->module_group_id."'>".$row->module_group_title."</option>";
				}
			}
		}
		?>
	</select>
	</div>
</div>
					<div class="form-actions">
						<input id="action_button" type="submit" value="<?php echo $this->gen_module_model->get_label_value("save", $current_user_language); ?>" class="btn btn-primary pull-right" />
					</div>
				</form>
			</div>
		</div>
		<!-- /Validation Example 1 -->
	</div>
</div>