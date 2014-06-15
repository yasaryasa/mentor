<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<div class="crumbs">
	<ul id="breadcrumbs" class="breadcrumb">
		<li><i class="icon-home"></i> <a href="<?php echo base_url(); ?>"><?php echo $this->image_model->get_label_value("home", $current_user_language); ?></a>
		</li>
		<li class="current"><a href="<?php echo site_url("images"); ?>"
			title=""><?php echo $this->image_model->get_label_value("images", $current_user_language); ?></a>
		</li>
		<li class="current"><a
			href="<?php echo site_url("images/new_image"); ?>" title=""><?php echo $this->image_model->get_label_value("new_image", $current_user_language); ?></a>
		</li>
	</ul>

	<ul class="crumb-buttons">
		<li><a href="<?php echo site_url("images"); ?>" title=""><i
				class="icon-plus"></i><span><?php echo $this->image_model->get_label_value("list_images", $current_user_language); ?></span></a>
		</li>
	</ul>
</div>
<br />


<div class="row">
	<!--=== Validation Example 1 ===-->
	<div class="col-md-12">
		<div class="widget box">
			<div class="widget-header">
				<h4>
					<i class="icon-plus"></i><?php echo $this->image_model->get_label_value("new_image", $current_user_language); ?></h4>
			</div>
			<div class="widget-content">



				<form class="form-horizontal row-border" id="form_to_be_validated"
					action="<?php echo site_url("images/create"); ?>" method="post">
					<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo $this->image_model->get_label_value("name", $current_user_language); ?></label>
						<div class="col-md-5">
							<input type="text" name="name" value="" class="form-control " />
						</div>
					</div>
					<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo $this->image_model->get_label_value("path", $current_user_language); ?></label>
						<div class="col-md-5">
							<input type="text" name="path" value="" class="form-control " />
						</div>
					</div>
					<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
					<div class="form-group">
						<label class="col-md-3 control-label" for="entry_id"><?php echo $this->image_model->get_label_value("entry_id", $current_user_language); ?></label>
						<div class="col-md-5">
							<select id="entry_id"
								class="select2 select2-select-00 col-md-12 full-width-fix "
								name="entry_id">
								<option value=0><?php echo $this->image_model->get_label_value("select_entries_referenced", $current_user_language); ?></option>
			<?php
			if ($entries->num_rows > 0) {
				foreach ( $entries->result () as $row ) {
					echo "<option value='" . $row->id . "'>" . $row->title . "</option>";
				}
			}
			?>
		</select>
						</div>
					</div>
					<div class="form-actions">
						<input id="action_button" type="submit"
							value="<?php echo $this->image_model->get_label_value("save", $current_user_language); ?>"
							class="btn btn-primary pull-right" />
					</div>
				</form>
			</div>
		</div>
		<!-- /Validation Example 1 -->
	</div>
</div>