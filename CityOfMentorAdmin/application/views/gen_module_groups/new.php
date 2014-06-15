<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<div class="crumbs">
	<ul id="breadcrumbs" class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="<?php echo base_url(); ?>"><?php echo $this->gen_module_group_model->get_label_value("home", $current_user_language); ?></a>
		</li>
		<li class="current">
			<a href="<?php echo site_url("gen_module_groups"); ?>" title=""><?php echo $this->gen_module_group_model->get_label_value("gen_module_groups", $current_user_language); ?></a>
		</li>
		<li class="current">
			<a href="<?php echo site_url("gen_module_groups/new_gen_module_group"); ?>" title=""><?php echo $this->gen_module_group_model->get_label_value("new_gen_module_group", $current_user_language); ?></a>
		</li>
	</ul>

	<ul class="crumb-buttons">
		<li><a href="<?php echo site_url("gen_module_groups"); ?>" title=""><i class="icon-plus"></i><span><?php echo $this->gen_module_group_model->get_label_value("list_gen_module_groups", $current_user_language); ?></span></a>
		</li>
	</ul>
</div>
<br />


<div class="row">
	<!--=== Validation Example 1 ===-->
	<div class="col-md-12">
		<div class="widget box">
			<div class="widget-header">
				<h4><i class="icon-plus"></i><?php echo $this->gen_module_group_model->get_label_value("new_gen_module_group", $current_user_language); ?></h4>
			</div>
			<div class="widget-content">



				<form class="form-horizontal row-border" id="form_to_be_validated"   action="<?php echo site_url("gen_module_groups/create"); ?>" method="post">
					<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<div class="form-group">
	<label class="col-md-3 control-label"><?php echo $this->gen_module_group_model->get_label_value("module_group_title", $current_user_language); ?><span class="required">*</span></label>
	<div class="col-md-5">
		<input type="text" name="module_group_title" value="" class="form-control required"/>
	</div>
</div><!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<div class="form-group">
	<label class="col-md-3 control-label"><?php echo $this->gen_module_group_model->get_label_value("module_group_order", $current_user_language); ?><span class="required">*</span></label>
	<div class="col-md-5">
		<input type="text" name="module_group_order" value="" class="form-control required"/>
	</div>
</div><!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<div class="form-group">
	<label class="col-md-3 control-label" for="module_group_position"><?php echo $this->gen_module_group_model->get_label_value("module_group_position", $current_user_language); ?><span class="required">*</span></label>
	<div class="col-md-5">
		<select id="module_group_position" class="select2 select2-select-00 col-md-12 full-width-fix required" name="module_group_position">
			<option value=0><?php echo $this->gen_module_group_model->get_label_value("select_gen_module_positions_referenced", $current_user_language); ?></option>
			<?php
			if ( $gen_module_positions->num_rows > 0 ) {
				foreach ( $gen_module_positions->result() as $row ) {
					echo "<option value='".$row->module_position_id."'>".$row->module_position_title. "</option>";
				}
			}
			?>
		</select>
	</div>
</div>
					<div class="form-actions">
						<input id="action_button" type="submit" value="<?php echo $this->gen_module_group_model->get_label_value("save", $current_user_language); ?>" class="btn btn-primary pull-right" />
					</div>
				</form>
			</div>
		</div>
		<!-- /Validation Example 1 -->
	</div>
</div>