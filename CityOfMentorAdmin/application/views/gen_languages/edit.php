<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<div class="crumbs">
	<ul id="breadcrumbs" class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="<?php echo base_url(); ?>"><?php echo $this->gen_language_model->get_label_value("home", $current_user_language); ?></a>
		</li>
		<li class="current">
			<a href="<?php echo site_url("gen_languages"); ?>" title=""><?php echo $this->gen_language_model->get_label_value("gen_languages", $current_user_language); ?></a>
		</li>
		<li class="current">
			<a href="<?php echo site_url("gen_languages/new_gen_language"); ?>" title=""><?php echo $this->gen_language_model->get_label_value("new_gen_language", $current_user_language); ?></a>
		</li>
	</ul>

	<ul class="crumb-buttons">
		<li><a href="<?php echo site_url("gen_languages"); ?>" title=""><i class="icon-plus"></i><span><?php echo $this->gen_language_model->get_label_value("list_gen_languages", $current_user_language); ?></span></a>
		</li>
	</ul>
</div>
<br />


<div class="row">
	<!--=== Validation Example 1 ===-->
	<div class="col-md-12">
		<div class="widget box">
			<div class="widget-header">
				<h4><i class="icon-plus"></i><?php echo $this->gen_language_model->get_label_value("new_gen_language", $current_user_language); ?></h4>
			</div>
			<div class="widget-content">



				<form class="form-horizontal row-border" id="form_to_be_validated"   action="<?php echo site_url("gen_languages/edit/page/$page/$id"); ?>" method="post">
					<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<div class="form-group">
	<label class="col-md-3 control-label"><?php echo $this->gen_language_model->get_label_value("language_title", $current_user_language); ?><span class="required">*</span></label>
	<div class="col-md-5">
		<input type="text" name="language_title" value="<?php echo $gen_language->language_title; ?>" class="form-control required"/>
	</div>
</div><!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<div class="form-group">
	<label class="col-md-3 control-label"><?php echo $this->gen_language_model->get_label_value("language_short", $current_user_language); ?></label>
	<div class="col-md-5">
		<input type="text" name="language_short" value="<?php echo $gen_language->language_short; ?>" class="form-control "/>
	</div>
</div>
<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<div class="form-group">
	<label class="col-md-3 control-label"><?php echo $this->gen_language_model->get_label_value("language_created", $current_user_language); ?></label>
	<div class="col-md-5">
		<input type="text" name="language_created" value="<?php echo $gen_language->language_created; ?>" class="form-control datepicker " data-mask="99-99-9999"/>
	</div>
</div>
<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<div class="form-group">
	<label class="col-md-3 control-label"><?php echo $this->gen_language_model->get_label_value("language_modified", $current_user_language); ?></label>
	<div class="col-md-5">
		<input type="text" name="language_modified" value="<?php echo $gen_language->language_modified; ?>" class="form-control datepicker " data-mask="99-99-9999"/>
	</div>
</div>
					<div class="form-actions">
						<input id="action_button" type="submit" value="<?php echo $this->gen_language_model->get_label_value("save", $current_user_language); ?>" class="btn btn-primary pull-right" />
					</div>
				</form>
			</div>
		</div>
		<!-- /Validation Example 1 -->
	</div>
</div>