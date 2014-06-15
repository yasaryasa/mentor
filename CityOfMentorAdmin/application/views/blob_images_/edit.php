<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<div class="crumbs">
	<ul id="breadcrumbs" class="breadcrumb">
		<li><i class="icon-home"></i> <a href="<?php echo base_url(); ?>"><?php echo $this->blob_image_model->get_label_value("home", $current_user_language); ?>
		</a>
		</li>
		<li class="current"><a href="<?php echo site_url("blob_images"); ?>"
			title=""><?php echo $this->blob_image_model->get_label_value("blob_images", $current_user_language); ?>
		</a>
		</li>
		<li class="current"><a
			href="<?php echo site_url("blob_images/new_blob_image"); ?>" title=""><?php echo $this->blob_image_model->get_label_value("new_blob_image", $current_user_language); ?>
		</a>
		</li>
	</ul>

	<ul class="crumb-buttons">
		<li><a href="<?php echo site_url("blob_images"); ?>" title=""><i
				class="icon-plus"></i><span><?php echo $this->blob_image_model->get_label_value("list_blob_images", $current_user_language); ?>
			</span> </a>
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
					<i class="icon-plus"></i>
					<?php echo $this->blob_image_model->get_label_value("new_blob_image", $current_user_language); ?>
				</h4>
			</div>
			<div class="widget-content">



				<form class="form-horizontal row-border" id="form_to_be_validated"
					action="<?php echo site_url("blob_images/edit/page/$page/$id"); ?>"
					method="post">
					<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo $this->blob_image_model->get_label_value("name", $current_user_language); ?>
						</label>
						<div class="col-md-5">
							<input type="text" name="name"
								value="<?php echo $blob_image->name; ?>" class="form-control " />
						</div>
					</div>
					<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
					<?php
					if (empty($blob_image->data )) {
						?>
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo $this->blob_image_model->get_label_value("data", $current_user_language); ?>
						</label>
						<div class="col-md-7" id="data_block">
							<input type="file" name="data" id="file_upload_input_field" />
						</div>
					</div>
					<input type="hidden" value="" name="data" id="data" />

					<script language="javascript">
	if ($('#file_upload_input_field').length) {
		new AjaxUpload('file_upload_input_field', {
			action: '<?php echo site_url("blob_images/do_upload/"); ?>',
			autoSubmit: true,
			name: 'data',
			responseType: 'text/html',
			onSubmit: function(file, ext) {
				$('#data_block').html("<div class='well'><img src='<?php echo base_url(); ?>assets/img/ajax-loading-input.gif' /> &nbsp;<?php echo $this->blob_image_model->get_label_value('please_wait_loading', $current_user_language); ?></div>");
				this.disable();
				$("#action_button").attr("disabled", "disabled");
			},
			onComplete: function(file, response) {
				var tmp = response.split(".");
				if (tmp[1]) {
					$("#data_block").load("<?php echo site_url("blob_images/generate_crop/"); ?>/" + response);
					this.enable();
					$("#action_button").attr("disabled", "disabled");
				} else {
					alert(response);
					this.disable();
				}
			}
		});
	}

</script>

					<?php
					} else {
						?>

					<div class="form-group" id="file_upload_div">
						<label class="col-md-3 control-label"><?php echo $this->blob_image_model->get_label_value("data", $current_user_language); ?>
						</label>
						<div class="col-md-9" id="area">
							<div class="jc-demo-box">
								<a
									href="<?php echo site_url("blob_images/delete_image/page/$page/" . $blob_image->id); ?>"
									class="btn btn-danger pull-right" id="fin"
									style="margin-bottom: -40px;"> <i class="icon-trash"></i>
									&nbsp;<?php echo $this->blob_image_model->get_label_value("delete", $current_user_language); ?>
								</a> <img
									src="<?php echo site_url("blob_images/get_image/" . $blob_image->id ); ?>" />
							</div>
						</div>
					</div>

					<?php
					}
					?>
					<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
					<div class="form-group">
						<label class="col-md-3 control-label" for="input17"><?php echo $this->blob_image_model->get_label_value("entry_id", $current_user_language); ?>
						</label>
						<div class="col-md-5">
							<select id="entry_id"
								class="select2 select2-select-00 col-md-12 full-width-fix "
								name="entry_id">
								<option value=0>
									<?php echo $this->blob_image_model->get_label_value("select_entries_referenced", $current_user_language); ?>
								</option>
								<?php
								if ( $entries->num_rows > 0 ) {
									foreach ( $entries->result() as $row ) {
										if ( $row->id == $blob_image->entry_id ) {
											echo "<option selected='selected' value='".$row->id."'>".$row->title."</option>";
										} else {
											echo "<option value='".$row->id."'>".$row->title."</option>";
										}
									}
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-actions">
						<input id="action_button" type="submit"
							value="<?php echo $this->blob_image_model->get_label_value("save", $current_user_language); ?>"
							class="btn btn-primary pull-right" />
					</div>
				</form>
			</div>
		</div>
		<!-- /Validation Example 1 -->
	</div>
</div>
