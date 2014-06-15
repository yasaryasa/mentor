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
	</ul>

	<ul class="crumb-buttons">
		<?php if ( $this->gen_image_setting_model->get_create("gen_image_settings") ) { ?><li><a href="<?php echo site_url("gen_image_settings/new_gen_image_setting"); ?>" title=""><i class="icon-plus"></i><span><?php echo $this->gen_image_setting_model->get_label_value("new_gen_image_setting", $current_user_language); ?></span></a>
			</li>
		<?php } ?>
	</ul>
</div>

<br />

<form action="<?php echo site_url("gen_image_settings/search") ?>" method="post">

	<div class="col-md-3 pull-right">
		<div class="input-group">
			<?php 
			if(!empty($search_term)) {
			?>
			<input class="form-control" name="search_term" value="<?php echo $search_term; ?>" id="search_term"/>
			<?php
			} else {
			?>
			<input class="form-control" name="search_term" id="search_term" placeholder="<?php echo $this->gen_image_setting_model->get_label_value("search_in_gen_image_settings", $current_user_language); ?>" />
			<?php
			}
			?>
			<span class="input-group-btn">
				<button type="submit" class="btn btn-default" id="search" type="button">Ara</button>
			</span>
		</div>
	</div>

</form>

<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<?php if ( $this->gen_image_setting_model->get_read("gen_modules") && ( $this->gen_image_setting_model->get_see_others("gen_modules") || $this->gen_image_setting_model->get_see_all("gen_modules") || $this->gen_image_setting_model->get_create("gen_modules") ) ) { ?>
	<div class="row">
		<div class="form-group">
			<label class="col-md-3 align-right control-label"><?php echo $this->gen_image_setting_model->get_label_value("select_gen_image_setting_gen_module", $current_user_language); ?></label>
			<div class="col-md-5">
				<select class="select2 select2-select-00 col-md-12 full-width-fix" id="select_gen_module">
					<option value="0"><?php echo $this->gen_image_setting_model->get_label_value("select_gen_image_setting_gen_module", $current_user_language); ?></option>
					<?php
					if ( $gen_modules->num_rows > 0 ) {
						foreach ( $gen_modules->result() as $row ) {
							if ( $row->module_title == $gen_module )
								echo "<option selected='selected' value='".$row->module_title."'>".$row->module_title . "</option>"; 
							else
								echo "<option value='".$row->module_title."'>".$row->module_title. "</option>";
						}
					}
					?>
				</select>
			</div>
		</div>
	</div>
<?php } ?><!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<?php if ( $this->gen_image_setting_model->get_read("gen_image_setting_types") && ( $this->gen_image_setting_model->get_see_others("gen_image_setting_types") || $this->gen_image_setting_model->get_see_all("gen_image_setting_types") || $this->gen_image_setting_model->get_create("gen_image_setting_types") ) ) { ?>
	<div class="row">
		<div class="form-group">
			<label class="col-md-3 align-right control-label"><?php echo $this->gen_image_setting_model->get_label_value("select_gen_image_setting_gen_image_setting_type", $current_user_language); ?></label>
			<div class="col-md-5">
				<select class="select2 select2-select-00 col-md-12 full-width-fix" id="select_gen_image_setting_type">
					<option value="0"><?php echo $this->gen_image_setting_model->get_label_value("select_gen_image_setting_gen_image_setting_type", $current_user_language); ?></option>
					<?php
					if ( $gen_image_setting_types->num_rows > 0 ) {
						foreach ( $gen_image_setting_types->result() as $row ) {
							if ( $row->type_id == $gen_image_setting_type )
								echo "<option selected='selected' value='".$row->type_id."'>".$row->type_title . "</option>"; 
							else
								echo "<option value='".$row->type_id."'>".$row->type_title. "</option>";
						}
					}
					?>
				</select>
			</div>
		</div>
	</div>
<?php } ?><!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<?php if ( $this->gen_image_setting_model->get_read("auth_users") && ( $this->gen_image_setting_model->get_see_others("auth_users") || $this->gen_image_setting_model->get_see_all("auth_users") || $this->gen_image_setting_model->get_create("auth_users") ) ) { ?>
	<div class="row">
		<div class="form-group">
			<label class="col-md-3 align-right control-label"><?php echo $this->gen_image_setting_model->get_label_value("select_gen_image_setting_auth_user", $current_user_language); ?></label>
			<div class="col-md-5">
				<select class="select2 select2-select-00 col-md-12 full-width-fix" id="select_auth_user">
					<option value="0"><?php echo $this->gen_image_setting_model->get_label_value("select_gen_image_setting_auth_user", $current_user_language); ?></option>
					<?php
					if ( $auth_users->num_rows > 0 ) {
						foreach ( $auth_users->result() as $row ) {
							if ( $row->user_id == $auth_user )
								echo "<option selected='selected' value='".$row->user_id."'>".$row->user_name . "</option>"; 
							else
								echo "<option value='".$row->user_id."'>".$row->user_name. "</option>";
						}
					}
					?>
				</select>
			</div>
		</div>
	</div>
<?php } ?>

<br />
<?php
if ( $gen_image_settings->num_rows > 0 ) {
?>
<div class="row">
	<div class="col-md-12">
		<div class="widget box">
			<div class="widget-header">
				<h4><i class="icon-reorder icon-large">&nbsp;&nbsp;&nbsp;<?php echo $this->gen_image_setting_model->get_label_value("gen_image_settings", $current_user_language); ?></i></h4>

				<div class="toolbar no-padding">
					<div class="btn-group">
						<span class="btn btn-lg widget-collapse"><i class="icon-angle-down"></i></span>
					</div>
				</div>

			</div>
			<div class="widget-content no-padding">
				<table class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<th><a hred=""><?php echo $this->gen_image_setting_model->get_label_value("setting_id", $current_user_language); ?></a></th>
						<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<?php if ( $this->gen_image_setting_model->get_read("gen_modules") && ( $this->gen_image_setting_model->get_see_others("gen_modules") ||  $this->gen_image_setting_model->get_see_all("gen_modules")  ||  $this->gen_image_setting_model->get_create("gen_modules") )  ) { ?>
<th><a hred=""><?php echo $this->gen_image_setting_model->get_label_value("setting_module_name", $current_user_language); ?></a></th>
<?php } ?>
						<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<?php if ( $this->gen_image_setting_model->get_read("gen_image_setting_types") && ( $this->gen_image_setting_model->get_see_others("gen_image_setting_types") ||  $this->gen_image_setting_model->get_see_all("gen_image_setting_types")  ||  $this->gen_image_setting_model->get_create("gen_image_setting_types") )  ) { ?>
<th><a hred=""><?php echo $this->gen_image_setting_model->get_label_value("setting_type_id", $current_user_language); ?></a></th>
<?php } ?>
						<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<th><a hred=""><?php echo $this->gen_image_setting_model->get_label_value("setting_image_width", $current_user_language); ?></a></th>
						<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<th><a hred=""><?php echo $this->gen_image_setting_model->get_label_value("setting_image_height", $current_user_language); ?></a></th>
						<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<?php if ( $this->gen_image_setting_model->get_read("auth_users") && ( $this->gen_image_setting_model->get_see_others("auth_users") ||  $this->gen_image_setting_model->get_see_all("auth_users")  ||  $this->gen_image_setting_model->get_create("auth_users") )  ) { ?>
<th><a hred=""><?php echo $this->gen_image_setting_model->get_label_value("gen_image_setting_owner", $current_user_language); ?></a></th>
<?php } ?>
						
							<th width="90"><?php echo $this->gen_image_setting_model->get_label_value("administration", $current_user_language); ?></th>
						</tr>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach ( $gen_image_settings->result() as $row ) {
						?>
						<tr>
							<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<td><?php echo  character_limiter( $row->setting_id,35); ?></td><!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<?php if ( $this->gen_image_setting_model->get_read("gen_modules") && ( $this->gen_image_setting_model->get_see_others("gen_modules") ||  $this->gen_image_setting_model->get_see_all("gen_modules")  ||  $this->gen_image_setting_model->get_create("gen_modules") )  ) { ?>
<td><?php echo $row->module_title_referenced; ?></td>
<?php } ?>				<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<?php if ( $this->gen_image_setting_model->get_read("gen_image_setting_types") && ( $this->gen_image_setting_model->get_see_others("gen_image_setting_types") ||  $this->gen_image_setting_model->get_see_all("gen_image_setting_types")  ||  $this->gen_image_setting_model->get_create("gen_image_setting_types") )  ) { ?>
<td><?php echo $row->type_title_referenced; ?></td>
<?php } ?>				<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<td><?php echo  character_limiter( $row->setting_image_width,35); ?></td><!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<td><?php echo  character_limiter( $row->setting_image_height,35); ?></td><!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<?php if ( $this->gen_image_setting_model->get_read("auth_users") && ( $this->gen_image_setting_model->get_see_others("auth_users") ||  $this->gen_image_setting_model->get_see_all("auth_users")  ||  $this->gen_image_setting_model->get_create("auth_users") )  ) { ?>
<td><?php echo $row->user_name_referenced; ?></td>
<?php } ?>				
							<td width="90">
								<a href="<?php echo site_url("gen_image_settings/edit_gen_image_setting/page/$page/".$row->setting_id); ?>" class="btn"><i class="icon-edit"></i></a>
								<a href="<?php echo site_url("gen_image_settings/delete_gen_image_setting/page/$page/".$row->setting_id); ?>" class="btn"><i class="icon-trash"></i></a>
							</td>
						</tr>
						<?php
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<?php
} else {
	echo $this->gen_image_setting_model->get_label_value("there_is_no_gen_image_settings_item_with_term", $current_user_language);
}
?>
<script language='javascript'>		
		$("#select_gen_module").change(function(){
			var select_gen_module = $(this).val();
			window.location = "<?php echo site_url('gen_image_settings/index/page/'.$page.'/gen_module/') ?>/"+select_gen_module+"/gen_image_setting_type/<?php echo $gen_image_setting_type;?>/auth_user/<?php echo $auth_user;?>/";
		});
		
		
		$("#select_gen_image_setting_type").change(function(){
			var select_gen_image_setting_type = $(this).val();
			window.location = "<?php echo site_url('gen_image_settings/index/page/'.$page.'/gen_module/'.$gen_module.'/gen_image_setting_type/') ?>/"+select_gen_image_setting_type+"/auth_user/<?php echo $auth_user;?>/";
		});
		
		
		$("#select_auth_user").change(function(){
			var select_auth_user = $(this).val();
			window.location = "<?php echo site_url('gen_image_settings/index/page/'.$page.'/gen_module/'.$gen_module.'/gen_image_setting_type/'.$gen_image_setting_type.'/auth_user/') ?>/"+select_auth_user+"/";
		});
		
</script>













