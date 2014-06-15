<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<div class="crumbs">
	<ul id="breadcrumbs" class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="<?php echo base_url(); ?>"><?php echo $this->gen_label_model->get_label_value("home", $current_user_language); ?></a>
		</li>
		<li class="current">
			<a href="<?php echo site_url("gen_labels"); ?>" title=""><?php echo $this->gen_label_model->get_label_value("gen_labels", $current_user_language); ?></a>
		</li>
		<li class="current">
			<a href="<?php echo site_url("gen_labels/new_gen_label"); ?>" title=""><?php echo $this->gen_label_model->get_label_value("new_gen_label", $current_user_language); ?></a>
		</li>
	</ul>

	<ul class="crumb-buttons">
		<li><a href="<?php echo site_url("gen_labels"); ?>" title=""><i class="icon-plus"></i><span><?php echo $this->gen_label_model->get_label_value("list_gen_labels", $current_user_language); ?></span></a>
		</li>
	</ul>
</div>
<br />


<div class="row">
	<!--=== Validation Example 1 ===-->
	<div class="col-md-12">
		<div class="widget box">
			<div class="widget-header">
				<h4><i class="icon-plus"></i><?php echo $this->gen_label_model->get_label_value("new_gen_label", $current_user_language); ?></h4>
			</div>
			<div class="widget-content">



				<form class="form-horizontal row-border" id="form_to_be_validated"   action="<?php echo site_url("gen_labels/create"); ?>" method="post">
					<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<div class="form-group">
	<label class="col-md-3 control-label" for="label_language_id"><?php echo $this->gen_label_model->get_label_value("label_language_id", $current_user_language); ?></label>
	<div class="col-md-5">
		<select id="label_language_id" class="select2 select2-select-00 col-md-12 full-width-fix " name="label_language_id">
			<option value=0><?php echo $this->gen_label_model->get_label_value("select_gen_languages_referenced", $current_user_language); ?></option>
			<?php
			if ( $gen_languages->num_rows > 0 ) {
				foreach ( $gen_languages->result() as $row ) {
					echo "<option value='".$row->language_id."'>".$row->language_title. "</option>";
				}
			}
			?>
		</select>
	</div>
</div><!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<div class="form-group">
	<label class="col-md-3 control-label"><?php echo $this->gen_label_model->get_label_value("label_name", $current_user_language); ?><span class="required">*</span></label>
	<div class="col-md-5">
		<input type="text" name="label_name" value="" class="form-control required"/>
	</div>
</div><!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<div class="form-group">
	<label class="col-md-3 control-label"><?php echo $this->gen_label_model->get_label_value("label_value", $current_user_language); ?><span class="required">*</span></label>
	<div class="col-md-5">
		<input type="text" name="label_value" value="" class="form-control required"/>
	</div>
</div>
					<div class="form-actions">
						<input id="action_button" type="submit" value="<?php echo $this->gen_label_model->get_label_value("save", $current_user_language); ?>" class="btn btn-primary pull-right" />
					</div>
				</form>
			</div>
		</div>
		<!-- /Validation Example 1 -->
	</div>
</div>