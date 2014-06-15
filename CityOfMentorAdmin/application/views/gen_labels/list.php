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
	</ul>

	<ul class="crumb-buttons">
		<?php if ( $this->gen_label_model->get_create("gen_labels") ) { ?><li><a href="<?php echo site_url("gen_labels/new_gen_label"); ?>" title=""><i class="icon-plus"></i><span><?php echo $this->gen_label_model->get_label_value("new_gen_label", $current_user_language); ?></span></a>
			</li>
		<?php } ?>
	</ul>
</div>

<br />

<form action="<?php echo site_url("gen_labels/search") ?>" method="post">

	<div class="col-md-3 pull-right">
		<div class="input-group">
			<input class="form-control" name="search_term" id="search_term"  placeholder="<?php echo $this->gen_label_model->get_label_value("search_in_gen_labels", $current_user_language); ?>" />
			<span class="input-group-btn">
				<button type="submit" class="btn btn-default" id="search" type="button">Ara</button>
			</span>
		</div>
	</div>

</form>

<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<?php if ( $this->gen_label_model->get_read("gen_languages") && ( $this->gen_label_model->get_see_others("gen_languages") || $this->gen_label_model->get_see_all("gen_languages") || $this->gen_label_model->get_create("gen_languages") ) ) { ?>
	<div class="row">
		<div class="form-group">
			<label class="col-md-3 align-right control-label"><?php echo $this->gen_label_model->get_label_value("select_gen_label_gen_language", $current_user_language); ?></label>
			<div class="col-md-5">
				<select class="select2 select2-select-00 col-md-12 full-width-fix" id="select_gen_language">
					<option value="0"><?php echo $this->gen_label_model->get_label_value("select_gen_label_gen_language", $current_user_language); ?></option>
					<?php
					if ( $gen_languages->num_rows > 0 ) {
						foreach ( $gen_languages->result() as $row ) {
							if ( $row->language_id == $gen_language )
								echo "<option selected='selected' value='".$row->language_id."'>".$row->language_title . "</option>"; 
							else
								echo "<option value='".$row->language_id."'>".$row->language_title. "</option>";
						}
					}
					?>
				</select>
			</div>
		</div>
	</div>
<?php } ?><!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<?php if ( $this->gen_label_model->get_read("auth_users") && ( $this->gen_label_model->get_see_others("auth_users") || $this->gen_label_model->get_see_all("auth_users") || $this->gen_label_model->get_create("auth_users") ) ) { ?>
	<div class="row">
		<div class="form-group">
			<label class="col-md-3 align-right control-label"><?php echo $this->gen_label_model->get_label_value("select_gen_label_auth_user", $current_user_language); ?></label>
			<div class="col-md-5">
				<select class="select2 select2-select-00 col-md-12 full-width-fix" id="select_auth_user">
					<option value="0"><?php echo $this->gen_label_model->get_label_value("select_gen_label_auth_user", $current_user_language); ?></option>
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
if ( $gen_labels->num_rows > 0 ) {
?>
<div class="row">
	<div class="col-md-12">
		<div class="widget box">
			<div class="widget-header">
				<h4><i class="icon-reorder icon-large">&nbsp;&nbsp;&nbsp;<?php echo $this->gen_label_model->get_label_value("gen_labels", $current_user_language); ?></i></h4>

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
<th><a hred=""><?php echo $this->gen_label_model->get_label_value("label_id", $current_user_language); ?></a></th>
						<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<?php if ( $this->gen_label_model->get_read("gen_languages") && ( $this->gen_label_model->get_see_others("gen_languages") ||  $this->gen_label_model->get_see_all("gen_languages")  ||  $this->gen_label_model->get_create("gen_languages") )  ) { ?>
<th><a hred=""><?php echo $this->gen_label_model->get_label_value("label_language_id", $current_user_language); ?></a></th>
<?php } ?>
						<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<th><a hred=""><?php echo $this->gen_label_model->get_label_value("label_name", $current_user_language); ?></a></th>
						<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<th><a hred=""><?php echo $this->gen_label_model->get_label_value("label_value", $current_user_language); ?></a></th>
						<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<?php if ( $this->gen_label_model->get_read("auth_users") && ( $this->gen_label_model->get_see_others("auth_users") ||  $this->gen_label_model->get_see_all("auth_users")  ||  $this->gen_label_model->get_create("auth_users") )  ) { ?>
<th><a hred=""><?php echo $this->gen_label_model->get_label_value("gen_label_owner", $current_user_language); ?></a></th>
<?php } ?>
						
							<th width="100"><?php echo $this->gen_label_model->get_label_value("administration", $current_user_language); ?></th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach ( $gen_labels->result() as $row ) {
						?>
						<tr>
							<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<td><?php echo  character_limiter( $row->label_id,35); ?></td><!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<?php if ( $this->gen_label_model->get_read("gen_languages") && ( $this->gen_label_model->get_see_others("gen_languages") ||  $this->gen_label_model->get_see_all("gen_languages")  ||  $this->gen_label_model->get_create("gen_languages") )  ) { ?>
<td><?php echo $row->language_title_referenced; ?></td>
<?php } ?>				<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<td><?php echo  character_limiter( $row->label_name,35); ?></td><!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<td><?php echo  character_limiter( $row->label_value,35); ?></td><!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<?php if ( $this->gen_label_model->get_read("auth_users") && ( $this->gen_label_model->get_see_others("auth_users") ||  $this->gen_label_model->get_see_all("auth_users")  ||  $this->gen_label_model->get_create("auth_users") )  ) { ?>
<td><?php echo $row->user_name_referenced; ?></td>
<?php } ?>				
							<td width="100">
								<a href="<?php echo site_url("gen_labels/edit_gen_label/page/$page/".$row->label_id); ?>" class="btn"><i class="icon-edit"></i></a>
								<a href="<?php echo site_url("gen_labels/delete_gen_label/page/$page/".$row->label_id); ?>" class="btn"><i class="icon-trash"></i></a>
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

<ul class="pagination">
	<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
		<?php
		$page_count = ceil($total_count/10);
		$i = 1 ;
		$tree_dot_before = false;
		$tree_dot_after = false;$next = $page +1;
		$previous = $page-1;
		
		if ( $page == 1 )
			$previous = $page_count;
		if ( $page == $page_count )
			$next = 1;
		
		echo "<li><a href='".site_url("gen_labels/index/page/".$previous."/gen_language/".$gen_language."/auth_user/".$auth_user."/")."'> &larr; önceki </a></li>";
		while ( $i <= $page_count ) {
			if ( $i == 1 ) {
				if ( $i == $page )
					echo "<li class='active'><a href='".site_url("gen_labels/index/page/".$i."/gen_language/".$gen_language."/auth_user/".$auth_user."/")."'>ilk</a></li>";
				else
					echo "<li><a href='".site_url("gen_labels/index/page/".$i."/gen_language/".$gen_language."/auth_user/".$auth_user."/")."'>ilk</a></li>";
			}

			if ( $i >= $page-5 && $i <= $page+5  && $i != 1 && $i != $page_count ) {
				if ( $i == $page )
					echo "<li class='active'><a href='".site_url("gen_labels/index/page/".$i."/gen_language/".$gen_language."/auth_user/".$auth_user."/")."'>{$i}</a></li>";
				else
					echo "<li><a href='".site_url("gen_labels/index/page/".$i."/gen_language/".$gen_language."/auth_user/".$auth_user."/")."'>{$i}</a></li>";
			}

			if ( $i == $page_count && $page_count != 1 ) {
				if ( $i == $page )
					echo "<li class='active'><a href='".site_url("gen_labels/index/page/".$i."/gen_language/".$gen_language."/auth_user/".$auth_user."/")."'>son</a></li>";
				else
					echo "<li><a href='".site_url("gen_labels/index/page/".$i."/gen_language/".$gen_language."/auth_user/".$auth_user."/")."'>son</a></li>";
			}
			$i++;
		}
		echo "<li><a href='".site_url("gen_labels/index/page/".$next."/gen_language/".$gen_language."/auth_user/".$auth_user."/")."'> sonraki &rarr; </a></li>";
		?>

</ul>
<?php
} else {
	echo '<div class="alert alert-warning"> <strong>'.$this->gen_label_model->get_label_value("no_record_warning", $current_user_language).'</strong>'.$this->gen_label_model->get_label_value("there_is_no_gen_labels", $current_user_language) . '</div>';
}
?>
<script language='javascript'>		
		$("#select_gen_language").change(function(){
			var select_gen_language = $(this).val();
			window.location = "<?php echo site_url('gen_labels/index/page/'.$page.'/gen_language/') ?>/"+select_gen_language+"/auth_user/<?php echo $auth_user;?>/";
		});
		
		
		$("#select_auth_user").change(function(){
			var select_auth_user = $(this).val();
			window.location = "<?php echo site_url('gen_labels/index/page/'.$page.'/gen_language/'.$gen_language.'/auth_user/') ?>/"+select_auth_user+"/";
		});
		
</script>













