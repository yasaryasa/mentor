<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<div class="crumbs">
	<ul id="breadcrumbs" class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="<?php echo base_url(); ?>"><?php echo $this->auth_user_log_model->get_label_value("home", $current_user_language); ?></a>
		</li>
		<li class="current">
			<a href="<?php echo site_url("auth_user_logs"); ?>" title=""><?php echo $this->auth_user_log_model->get_label_value("auth_user_logs", $current_user_language); ?></a>
		</li>
	</ul>

	<ul class="crumb-buttons">
		<?php if ( $this->auth_user_log_model->get_create("auth_user_logs") ) { ?><li><a href="<?php echo site_url("auth_user_logs/new_auth_user_log"); ?>" title=""><i class="icon-plus"></i><span><?php echo $this->auth_user_log_model->get_label_value("new_auth_user_log", $current_user_language); ?></span></a>
			</li>
		<?php } ?>
	</ul>
</div>

<br />

<form action="<?php echo site_url("auth_user_logs/search") ?>" method="post">

	<div class="col-md-3 pull-right">
		<div class="input-group">
			<input class="form-control" name="search_term" id="search_term"  placeholder="<?php echo $this->auth_user_log_model->get_label_value("search_in_auth_user_logs", $current_user_language); ?>" />
			<span class="input-group-btn">
				<button type="submit" class="btn btn-default" id="search" type="button">Ara</button>
			</span>
		</div>
	</div>

</form>

<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<?php if ( $this->auth_user_log_model->get_read("auth_users") && ( $this->auth_user_log_model->get_see_others("auth_users") || $this->auth_user_log_model->get_see_all("auth_users") || $this->auth_user_log_model->get_create("auth_users") ) ) { ?>
	<div class="row">
		<div class="form-group">
			<label class="col-md-3 align-right control-label"><?php echo $this->auth_user_log_model->get_label_value("select_auth_user_log_auth_user", $current_user_language); ?></label>
			<div class="col-md-5">
				<select class="select2 select2-select-00 col-md-12 full-width-fix" id="select_auth_user">
					<option value="0"><?php echo $this->auth_user_log_model->get_label_value("select_auth_user_log_auth_user", $current_user_language); ?></option>
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
if ( $auth_user_logs->num_rows > 0 ) {
?>
<div class="row">
	<div class="col-md-12">
		<div class="widget box">
			<div class="widget-header">
				<h4><i class="icon-reorder icon-large">&nbsp;&nbsp;&nbsp;<?php echo $this->auth_user_log_model->get_label_value("auth_user_logs", $current_user_language); ?></i></h4>

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
<th><a hred=""><?php echo $this->auth_user_log_model->get_label_value("user_log_id", $current_user_language); ?></a></th>
						<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<th><a hred=""><?php echo $this->auth_user_log_model->get_label_value("user_log_ip_address", $current_user_language); ?></a></th>
						<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<th><a hred=""><?php echo $this->auth_user_log_model->get_label_value("user_log_activity", $current_user_language); ?></a></th>
						<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<th><a hred=""><?php echo $this->auth_user_log_model->get_label_value("user_log_user_agent", $current_user_language); ?></a></th>
						<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<th><a hred=""><?php echo $this->auth_user_log_model->get_label_value("user_log_time", $current_user_language); ?></a></th>
						<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<?php if ( $this->auth_user_log_model->get_read("auth_users") && ( $this->auth_user_log_model->get_see_others("auth_users") ||  $this->auth_user_log_model->get_see_all("auth_users")  ||  $this->auth_user_log_model->get_create("auth_users") )  ) { ?>
<th><a hred=""><?php echo $this->auth_user_log_model->get_label_value("auth_user_log_owner", $current_user_language); ?></a></th>
<?php } ?>
						
							<th width="100"><?php echo $this->auth_user_log_model->get_label_value("administration", $current_user_language); ?></th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach ( $auth_user_logs->result() as $row ) {
						?>
						<tr>
							<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<td><?php echo  character_limiter( $row->user_log_id,35); ?></td><!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<td><?php echo  character_limiter( $row->user_log_ip_address,35); ?></td><!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<td><?php echo  character_limiter( $row->user_log_activity,35); ?></td><!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<td><?php echo  character_limiter( $row->user_log_user_agent,35); ?></td><!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<td><?php echo  character_limiter( $row->user_log_time,35); ?></td><!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<?php if ( $this->auth_user_log_model->get_read("auth_users") && ( $this->auth_user_log_model->get_see_others("auth_users") ||  $this->auth_user_log_model->get_see_all("auth_users")  ||  $this->auth_user_log_model->get_create("auth_users") )  ) { ?>
<td><?php echo $row->user_name_referenced; ?></td>
<?php } ?>				
							<td width="100">
								<a href="<?php echo site_url("auth_user_logs/edit_auth_user_log/page/$page/".$row->user_log_id); ?>" class="btn"><i class="icon-edit"></i></a>
								<a href="<?php echo site_url("auth_user_logs/delete_auth_user_log/page/$page/".$row->user_log_id); ?>" class="btn"><i class="icon-trash"></i></a>
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
		
		echo "<li><a href='".site_url("auth_user_logs/index/page/".$previous."/auth_user/".$auth_user."/")."'> &larr; önceki </a></li>";
		while ( $i <= $page_count ) {
			if ( $i == 1 ) {
				if ( $i == $page )
					echo "<li class='active'><a href='".site_url("auth_user_logs/index/page/".$i."/auth_user/".$auth_user."/")."'>ilk</a></li>";
				else
					echo "<li><a href='".site_url("auth_user_logs/index/page/".$i."/auth_user/".$auth_user."/")."'>ilk</a></li>";
			}

			if ( $i >= $page-5 && $i <= $page+5  && $i != 1 && $i != $page_count ) {
				if ( $i == $page )
					echo "<li class='active'><a href='".site_url("auth_user_logs/index/page/".$i."/auth_user/".$auth_user."/")."'>{$i}</a></li>";
				else
					echo "<li><a href='".site_url("auth_user_logs/index/page/".$i."/auth_user/".$auth_user."/")."'>{$i}</a></li>";
			}

			if ( $i == $page_count && $page_count != 1 ) {
				if ( $i == $page )
					echo "<li class='active'><a href='".site_url("auth_user_logs/index/page/".$i."/auth_user/".$auth_user."/")."'>son</a></li>";
				else
					echo "<li><a href='".site_url("auth_user_logs/index/page/".$i."/auth_user/".$auth_user."/")."'>son</a></li>";
			}
			$i++;
		}
		echo "<li><a href='".site_url("auth_user_logs/index/page/".$next."/auth_user/".$auth_user."/")."'> sonraki &rarr; </a></li>";
		?>

</ul>
<?php
} else {
	echo '<div class="alert alert-warning"> <strong>'.$this->auth_user_log_model->get_label_value("no_record_warning", $current_user_language).'</strong>'.$this->auth_user_log_model->get_label_value("there_is_no_auth_user_logs", $current_user_language) . '</div>';
}
?>
<script language='javascript'>		
		$("#select_auth_user").change(function(){
			var select_auth_user = $(this).val();
			window.location = "<?php echo site_url('auth_user_logs/index/page/'.$page.'/auth_user/') ?>/"+select_auth_user+"/";
		});
		
</script>













