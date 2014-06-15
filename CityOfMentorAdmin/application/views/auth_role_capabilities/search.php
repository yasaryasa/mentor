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
	</ul>

	<ul class="crumb-buttons">
		<?php if ( $this->auth_role_capability_model->get_create("auth_role_capabilities") ) { ?><li><a href="<?php echo site_url("auth_role_capabilities/new_auth_role_capability"); ?>" title=""><i class="icon-plus"></i><span><?php echo $this->auth_role_capability_model->get_label_value("new_auth_role_capability", $current_user_language); ?></span></a>
			</li>
		<?php } ?>
	</ul>
</div>

<br />

<form action="<?php echo site_url("auth_role_capabilities/search") ?>" method="post">

	<div class="col-md-3 pull-right">
		<div class="input-group">
			<?php 
			if(!empty($search_term)) {
			?>
			<input class="form-control" name="search_term" value="<?php echo $search_term; ?>" id="search_term"/>
			<?php
			} else {
			?>
			<input class="form-control" name="search_term" id="search_term" placeholder="<?php echo $this->auth_role_capability_model->get_label_value("search_in_auth_role_capabilities", $current_user_language); ?>" />
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
<?php if ( $this->auth_role_capability_model->get_read("auth_roles") && ( $this->auth_role_capability_model->get_see_others("auth_roles") || $this->auth_role_capability_model->get_see_all("auth_roles") || $this->auth_role_capability_model->get_create("auth_roles") ) ) { ?>
	<div class="row">
		<div class="form-group">
			<label class="col-md-3 align-right control-label"><?php echo $this->auth_role_capability_model->get_label_value("select_auth_role_capability_auth_role", $current_user_language); ?></label>
			<div class="col-md-5">
				<select class="select2 select2-select-00 col-md-12 full-width-fix" id="select_auth_role">
					<option value="0"><?php echo $this->auth_role_capability_model->get_label_value("select_auth_role_capability_auth_role", $current_user_language); ?></option>
					<?php
					if ( $auth_roles->num_rows > 0 ) {
						foreach ( $auth_roles->result() as $row ) {
							if ( $row->role_id == $auth_role )
								echo "<option selected='selected' value='".$row->role_id."'>".$row->role_title . "</option>"; 
							else
								echo "<option value='".$row->role_id."'>".$row->role_title. "</option>";
						}
					}
					?>
				</select>
			</div>
		</div>
	</div>
<?php } ?><!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<?php if ( $this->auth_role_capability_model->get_read("gen_modules") && ( $this->auth_role_capability_model->get_see_others("gen_modules") || $this->auth_role_capability_model->get_see_all("gen_modules") || $this->auth_role_capability_model->get_create("gen_modules") ) ) { ?>
	<div class="row">
		<div class="form-group">
			<label class="col-md-3 align-right control-label"><?php echo $this->auth_role_capability_model->get_label_value("select_auth_role_capability_gen_module", $current_user_language); ?></label>
			<div class="col-md-5">
				<select class="select2 select2-select-00 col-md-12 full-width-fix" id="select_gen_module">
					<option value="0"><?php echo $this->auth_role_capability_model->get_label_value("select_auth_role_capability_gen_module", $current_user_language); ?></option>
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
<?php if ( $this->auth_role_capability_model->get_read("auth_users") && ( $this->auth_role_capability_model->get_see_others("auth_users") || $this->auth_role_capability_model->get_see_all("auth_users") || $this->auth_role_capability_model->get_create("auth_users") ) ) { ?>
	<div class="row">
		<div class="form-group">
			<label class="col-md-3 align-right control-label"><?php echo $this->auth_role_capability_model->get_label_value("select_auth_role_capability_auth_user", $current_user_language); ?></label>
			<div class="col-md-5">
				<select class="select2 select2-select-00 col-md-12 full-width-fix" id="select_auth_user">
					<option value="0"><?php echo $this->auth_role_capability_model->get_label_value("select_auth_role_capability_auth_user", $current_user_language); ?></option>
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
if ( $auth_role_capabilities->num_rows > 0 ) {
?>
<div class="row">
	<div class="col-md-12">
		<div class="widget box">
			<div class="widget-header">
				<h4><i class="icon-reorder icon-large">&nbsp;&nbsp;&nbsp;<?php echo $this->auth_role_capability_model->get_label_value("auth_role_capabilities", $current_user_language); ?></i></h4>

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
<th><a hred=""><?php echo $this->auth_role_capability_model->get_label_value("role_capability_id", $current_user_language); ?></a></th>
						<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<?php if ( $this->auth_role_capability_model->get_read("auth_roles") && ( $this->auth_role_capability_model->get_see_others("auth_roles") ||  $this->auth_role_capability_model->get_see_all("auth_roles")  ||  $this->auth_role_capability_model->get_create("auth_roles") )  ) { ?>
<th><a hred=""><?php echo $this->auth_role_capability_model->get_label_value("role_capability_role_id", $current_user_language); ?></a></th>
<?php } ?>
						<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<?php if ( $this->auth_role_capability_model->get_read("gen_modules") && ( $this->auth_role_capability_model->get_see_others("gen_modules") ||  $this->auth_role_capability_model->get_see_all("gen_modules")  ||  $this->auth_role_capability_model->get_create("gen_modules") )  ) { ?>
<th><a hred=""><?php echo $this->auth_role_capability_model->get_label_value("role_capability_module_name", $current_user_language); ?></a></th>
<?php } ?>
						<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<th><a hred=""><?php echo $this->auth_role_capability_model->get_label_value("role_capability_see_all", $current_user_language); ?></a></th>
						<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<th><a hred=""><?php echo $this->auth_role_capability_model->get_label_value("role_capability_see_others", $current_user_language); ?></a></th>
						<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<th><a hred=""><?php echo $this->auth_role_capability_model->get_label_value("role_capability_show", $current_user_language); ?></a></th>
						<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<th><a hred=""><?php echo $this->auth_role_capability_model->get_label_value("role_capability_create", $current_user_language); ?></a></th>
						<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<th><a hred=""><?php echo $this->auth_role_capability_model->get_label_value("role_capability_read", $current_user_language); ?></a></th>
						<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<th><a hred=""><?php echo $this->auth_role_capability_model->get_label_value("role_capability_update", $current_user_language); ?></a></th>
						<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<th><a hred=""><?php echo $this->auth_role_capability_model->get_label_value("role_capability_delete", $current_user_language); ?></a></th>
						<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<?php if ( $this->auth_role_capability_model->get_read("auth_users") && ( $this->auth_role_capability_model->get_see_others("auth_users") ||  $this->auth_role_capability_model->get_see_all("auth_users")  ||  $this->auth_role_capability_model->get_create("auth_users") )  ) { ?>
<th><a hred=""><?php echo $this->auth_role_capability_model->get_label_value("auth_role_capability_owner", $current_user_language); ?></a></th>
<?php } ?>
						
							<th width="90"><?php echo $this->auth_role_capability_model->get_label_value("administration", $current_user_language); ?></th>
						</tr>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach ( $auth_role_capabilities->result() as $row ) {
						?>
						<tr>
							<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<td><?php echo  character_limiter( $row->role_capability_id,35); ?></td><!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<?php if ( $this->auth_role_capability_model->get_read("auth_roles") && ( $this->auth_role_capability_model->get_see_others("auth_roles") ||  $this->auth_role_capability_model->get_see_all("auth_roles")  ||  $this->auth_role_capability_model->get_create("auth_roles") )  ) { ?>
<td><?php echo $row->role_title_referenced; ?></td>
<?php } ?>				<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<?php if ( $this->auth_role_capability_model->get_read("gen_modules") && ( $this->auth_role_capability_model->get_see_others("gen_modules") ||  $this->auth_role_capability_model->get_see_all("gen_modules")  ||  $this->auth_role_capability_model->get_create("gen_modules") )  ) { ?>
<td><?php echo $row->module_title_referenced; ?></td>
<?php } ?>				<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<td><?php echo  character_limiter( $row->role_capability_see_all,35); ?></td><!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<td><?php echo  character_limiter( $row->role_capability_see_others,35); ?></td><!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<td><?php echo  character_limiter( $row->role_capability_show,35); ?></td><!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<td><?php echo  character_limiter( $row->role_capability_create,35); ?></td><!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<td><?php echo  character_limiter( $row->role_capability_read,35); ?></td><!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<td><?php echo  character_limiter( $row->role_capability_update,35); ?></td><!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<td><?php echo  character_limiter( $row->role_capability_delete,35); ?></td><!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<?php if ( $this->auth_role_capability_model->get_read("auth_users") && ( $this->auth_role_capability_model->get_see_others("auth_users") ||  $this->auth_role_capability_model->get_see_all("auth_users")  ||  $this->auth_role_capability_model->get_create("auth_users") )  ) { ?>
<td><?php echo $row->user_name_referenced; ?></td>
<?php } ?>				
							<td width="90">
								<a href="<?php echo site_url("auth_role_capabilities/edit_auth_role_capability/page/$page/".$row->role_capability_id); ?>" class="btn"><i class="icon-edit"></i></a>
								<a href="<?php echo site_url("auth_role_capabilities/delete_auth_role_capability/page/$page/".$row->role_capability_id); ?>" class="btn"><i class="icon-trash"></i></a>
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
	echo $this->auth_role_capability_model->get_label_value("there_is_no_auth_role_capabilities_item_with_term", $current_user_language);
}
?>
<script language='javascript'>		
		$("#select_auth_role").change(function(){
			var select_auth_role = $(this).val();
			window.location = "<?php echo site_url('auth_role_capabilities/index/page/'.$page.'/auth_role/') ?>/"+select_auth_role+"/gen_module/<?php echo $gen_module;?>/auth_user/<?php echo $auth_user;?>/";
		});
		
		
		$("#select_gen_module").change(function(){
			var select_gen_module = $(this).val();
			window.location = "<?php echo site_url('auth_role_capabilities/index/page/'.$page.'/auth_role/'.$auth_role.'/gen_module/') ?>/"+select_gen_module+"/auth_user/<?php echo $auth_user;?>/";
		});
		
		
		$("#select_auth_user").change(function(){
			var select_auth_user = $(this).val();
			window.location = "<?php echo site_url('auth_role_capabilities/index/page/'.$page.'/auth_role/'.$auth_role.'/gen_module/'.$gen_module.'/auth_user/') ?>/"+select_auth_user+"/";
		});
		
</script>













