<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<div class="crumbs">
	<ul id="breadcrumbs" class="breadcrumb">
		<li><i class="icon-home"></i> <a href="<?php echo base_url(); ?>"><?php echo $this->auth_user_model->get_label_value("home", $current_user_language); ?>
		</a>
		</li>
		<li class="current"><a href="<?php echo site_url("auth_users"); ?>"
			title=""><?php echo $this->auth_user_model->get_label_value("auth_users", $current_user_language); ?>
		</a>
		</li>
		<li class="current"><a
			href="<?php echo site_url("auth_users/new_auth_user"); ?>" title=""><?php echo $this->auth_user_model->get_label_value("new_auth_user", $current_user_language); ?>
		</a>
		</li>
	</ul>

	<ul class="crumb-buttons">
		<li><a href="<?php echo site_url("auth_users"); ?>" title=""><i
				class="icon-plus"></i><span><?php echo $this->auth_user_model->get_label_value("list_auth_users", $current_user_language); ?>
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
					<?php echo $this->auth_user_model->get_label_value("new_auth_user", $current_user_language); ?>
				</h4>
			</div>
			<div class="widget-content">



				<form class="form-horizontal row-border" id="form_to_be_validated"
					action="<?php echo site_url("auth_users/edit/page/$page/$id"); ?>"
					method="post">
					<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
					<div class="form-group">
						<label class="col-md-3 control-label" for="input17"><?php echo $this->auth_user_model->get_label_value("user_role_id", $current_user_language); ?><span
							class="required">*</span> </label>
						<div class="col-md-5">
							<select id="user_role_id"
								class="select2 select2-select-00 col-md-12 full-width-fix required"
								name="user_role_id">
								<option value=0>
									<?php echo $this->auth_user_model->get_label_value("select_auth_roles_referenced", $current_user_language); ?>
								</option>
								<?php
								if ( $auth_roles->num_rows > 0 ) {
									foreach ( $auth_roles->result() as $row ) {
										if ( $row->role_id == $auth_user->user_role_id ) {
											echo "<option selected='selected' value='".$row->role_id."'>".$row->role_title."</option>";
										} else {
											echo "<option value='".$row->role_id."'>".$row->role_title."</option>";
										}
									}
								}
								?>
							</select>
						</div>
					</div>
					<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo $this->auth_user_model->get_label_value("user_language_id", $current_user_language); ?>
						</label>
						<div class="col-md-5">
							<input type="text" name="user_language_id"
								value="<?php echo $auth_user->user_language_id; ?>"
								class="form-control " />
						</div>
					</div>
					<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo $this->auth_user_model->get_label_value("user_name", $current_user_language); ?><span
							class="required">*</span> </label>
						<div class="col-md-5">
							<input type="text" name="user_name"
								value="<?php echo $auth_user->user_name; ?>"
								class="form-control required" />
						</div>
					</div>
					<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo $this->auth_user_model->get_label_value("user_surname", $current_user_language); ?><span
							class="required">*</span> </label>
						<div class="col-md-5">
							<input type="text" name="user_surname"
								value="<?php echo $auth_user->user_surname; ?>"
								class="form-control required" />
						</div>
					</div>
					<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo $this->auth_user_model->get_label_value("user_username", $current_user_language); ?><span
							class="required">*</span> </label>
						<div class="col-md-5">
							<input type="text" name="user_username"
								value="<?php echo $auth_user->user_username; ?>"
								class="form-control required" />
						</div>
					</div>
					<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo $this->auth_user_model->get_label_value("user_password", $current_user_language); ?><span
							class="required">*</span> </label>
						<div class="col-md-5">
							<input type="text" name="user_password"
								value="<?php echo $auth_user->user_password; ?>"
								class="form-control required" />
						</div>
					</div>
					<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo $this->auth_user_model->get_label_value("user_email", $current_user_language); ?><span
							class="required">*</span> </label>
						<div class="col-md-5">
							<input type="text" name="user_email"
								value="<?php echo $auth_user->user_email; ?>"
								class="form-control required" />
						</div>
					</div>
					<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo $this->auth_user_model->get_label_value("user_registered", $current_user_language); ?><span
							class="required">*</span> </label>
						<div class="col-md-5">
							<input type="text" name="user_registered"
								value="<?php echo $auth_user->user_registered; ?>"
								class="form-control datepicker required" data-mask="99-99-9999" />
						</div>
					</div>
					<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
					<?php
					if (empty($auth_user->user_profile_image )) {
						?>
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo $this->auth_user_model->get_label_value("user_profile_image", $current_user_language); ?>
						</label>
						<div class="col-md-7" id="user_profile_image_block">
							<input type="file" name="user_profile_image"
								id="file_upload_input_field" />
						</div>
					</div>
					<input type="hidden" value="" name="user_profile_image"
						id="user_profile_image" />

					<script language="javascript">
	if ($('#file_upload_input_field').length) {
		new AjaxUpload('file_upload_input_field', {
			action: '<?php echo site_url("auth_users/do_upload/"); ?>',
			autoSubmit: true,
			name: 'user_profile_image',
			responseType: 'text/html',
			onSubmit: function(file, ext) {
				$('#user_profile_image_block').html("<div class='well'><img src='<?php echo base_url(); ?>assets/img/ajax-loading-input.gif' /> &nbsp;<?php echo $this->auth_user_model->get_label_value('please_wait_loading', $current_user_language); ?></div>");
				this.disable();
				$("#action_button").attr("disabled", "disabled");
			},
			onComplete: function(file, response) {
				var tmp = response.split(".");
				if (tmp[1]) {
					$("#user_profile_image_block").load("<?php echo site_url("auth_users/generate_crop/"); ?>/" + response);
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
						<label class="col-md-3 control-label"><?php echo $this->auth_user_model->get_label_value("user_profile_image", $current_user_language); ?>
						</label>
						<div class="col-md-9" id="area">
							<div class="jc-demo-box">
								<a
									href="<?php echo site_url("auth_users/delete_image/page/$page/" . $auth_user->user_id); ?>"
									class="btn btn-danger pull-right" id="fin"
									style="margin-bottom: -40px;"> <i class="icon-trash"></i>
									&nbsp;<?php echo $this->auth_user_model->get_label_value("delete", $current_user_language); ?>
								</a> <img
									src="<?php echo site_url("auth_users/get_image/" . $auth_user->user_id ); ?>" />
							</div>
						</div>
					</div>

					<?php
}
?>
					<div class="form-actions">
						<input id="action_button" type="submit"
							value="<?php echo $this->auth_user_model->get_label_value("save", $current_user_language); ?>"
							class="btn btn-primary pull-right" />
					</div>
				</form>
			</div>
		</div>
		<!-- /Validation Example 1 -->
	</div>
</div>
