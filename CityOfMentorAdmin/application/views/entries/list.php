<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<div class="crumbs">
	<ul id="breadcrumbs" class="breadcrumb">
		<li><i class="icon-home"></i> <a href="<?php echo base_url(); ?>"><?php echo $this->entry_model->get_label_value("home", $current_user_language); ?>
		</a>
		</li>
		<li class="current"><a href="<?php echo site_url("entries"); ?>"
			title=""><?php echo $this->entry_model->get_label_value("entries", $current_user_language); ?>
		</a>
		</li>
	</ul>

	<ul class="crumb-buttons">
		<?php if ( $this->entry_model->get_create("entries") ) { ?>
		<li><a href="<?php echo site_url("entries/new_entry"); ?>" title=""><i
				class="icon-plus"></i><span><?php echo $this->entry_model->get_label_value("new_entry", $current_user_language); ?>
			</span> </a>
		</li>
		<?php } ?>
	</ul>
</div>

<br />

<form action="<?php echo site_url("entries/search") ?>" method="post">

	<div class="col-md-3 pull-right">
		<div class="input-group">
			<input class="form-control" name="search_term" id="search_term"
				placeholder="<?php echo $this->entry_model->get_label_value("search_in_entries", $current_user_language); ?>" />
			<span class="input-group-btn">
				<button type="submit" class="btn btn-default" id="search"
					type="button"><?php echo $this->entry_model->get_label_value("search", $current_user_language); ?></button>
			</span>
		</div>
	</div>

</form>

<br />
<br />

<?php if ( $this->entry_model->get_read("auth_users") && ( $this->entry_model->get_see_others("auth_users") || $this->entry_model->get_see_all("auth_users") || $this->entry_model->get_create("auth_users") ) ) { ?>
<div class="row">
	<div class="form-group">
		<label class="col-md-3 align-right control-label"><?php echo $this->entry_model->get_label_value("select_entry_auth_user", $current_user_language); ?>
		</label>
		<div class="col-md-5">
			<select class="select2 select2-select-00 col-md-12 full-width-fix"
				id="select_auth_user">
				<option value="0">
					<?php echo $this->entry_model->get_label_value("select_entry_auth_user", $current_user_language); ?>
				</option>
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
if ( $entries->num_rows > 0 ) {
	?>
<div class="row">
	<div class="col-md-12">
		<div class="widget box">
			<div class="widget-header">
				<h4>
					<i class="icon-reorder icon-large">&nbsp;&nbsp;&nbsp;<?php echo $this->entry_model->get_label_value("entries", $current_user_language); ?>
					</i>
				</h4>

				<div class="toolbar no-padding">
					<div class="btn-group">
						<span class="btn btn-lg widget-collapse"><i
							class="icon-angle-down"></i> </span>
					</div>
				</div>

			</div>
			<div class="widget-content no-padding">
				<table class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
							<th><a hred=""><?php echo $this->entry_model->get_label_value("title", $current_user_language); ?>
							</a></th>
							<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
							<th><a hred=""><?php echo $this->entry_model->get_label_value("description", $current_user_language); ?>
							</a></th>
							<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
							<th><a hred=""><?php echo $this->entry_model->get_label_value("posted_date", $current_user_language); ?>
							</a></th>
							<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
							<th><a hred=""><?php echo $this->entry_model->get_label_value("from_date", $current_user_language); ?>
							</a></th>
							<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
							<th><a hred=""><?php echo $this->entry_model->get_label_value("to_date", $current_user_language); ?>
							</a></th>
							<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
							<th><a hred=""><?php echo $this->entry_model->get_label_value("cost", $current_user_language); ?>
							</a></th>
							<th width="100"><?php echo $this->entry_model->get_label_value("administration", $current_user_language); ?>
							</th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach ( $entries->result() as $row ) {
							?>
						<tr>
							<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
							<td><?php echo  character_limiter( $row->title,35); ?></td>
							<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
							<td><div style="height:30px;overflow:hidden;"><?php echo  character_limiter( $row->description,70); ?></div></td>
							<td><?php echo  character_limiter( $row->posted_date,35); ?></td>
							<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
							<td><?php echo  character_limiter( $row->from_date,35); ?></td>
							<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
							<td><?php echo  character_limiter( $row->to_date,35); ?></td>
							<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
							<td><?php echo  character_limiter( $row->cost,35); ?></td>
							<td width="120">
							<a
								href="<?php echo site_url("entries/edit_entry/page/$page/".$row->id); ?>"
								class="btn"><i class="icon-edit"></i> </a> <a
								href="<?php echo site_url("entries/delete_entry/page/$page/".$row->id); ?>"
								class="btn"><i class="icon-trash"></i> </a>
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

<ul
	class="pagination">
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



	echo "<li><a href='".site_url("entries/index/page/".$previous."/auth_user/".$auth_user."/")."'> &larr; ".$this->entry_model->get_label_value("prev", $current_user_language)." </a></li>";

	while ( $i <= $page_count ) {

		if ( $i == 1 ) {

			if ( $i == $page )

				echo "<li class='active'><a href='".site_url("entries/index/page/".$i."/auth_user/".$auth_user."/")."'>".$this->entry_model->get_label_value("first", $current_user_language)."</a></li>";

			else

				echo "<li><a href='".site_url("entries/index/page/".$i."/auth_user/".$auth_user."/")."'>".$this->entry_model->get_label_value("first", $current_user_language)."</a></li>";

		}



		if ( $i >= $page-5 && $i <= $page+5  && $i != 1 && $i != $page_count ) {

			if ( $i == $page )

				echo "<li class='active'><a href='".site_url("entries/index/page/".$i."/auth_user/".$auth_user."/")."'>{$i}</a></li>";

			else

				echo "<li><a href='".site_url("entries/index/page/".$i."/auth_user/".$auth_user."/")."'>{$i}</a></li>";

		}



		if ( $i == $page_count && $page_count != 1 ) {

			if ( $i == $page )

				echo "<li class='active'><a href='".site_url("entries/index/page/".$i."/auth_user/".$auth_user."/")."'>".$this->entry_model->get_label_value("last", $current_user_language)."</a></li>";

			else

				echo "<li><a href='".site_url("entries/index/page/".$i."/auth_user/".$auth_user."/")."'>".$this->entry_model->get_label_value("last", $current_user_language)."</a></li>";

		}

		$i++;

	}

	echo "<li><a href='".site_url("entries/index/page/".$next."/auth_user/".$auth_user."/")."'> ".$this->entry_model->get_label_value("next", $current_user_language)." &rarr; </a></li>";

	?>

</ul>
<br/>
<br/>
<br/>
<br/>
<?php
} else {
	echo '<br/><br/><div class="alert alert-warning"> <strong>'.$this->entry_model->get_label_value("no_record_warning", $current_user_language).'</strong><br/><br/>'.$this->entry_model->get_label_value("there_is_no_entries", $current_user_language) . '</div>';
}
?>
<script language='javascript'>		
		$("#select_auth_user").change(function(){
			var select_auth_user = $(this).val();
			window.location = "<?php echo site_url('entries/index/page/'.$page.'/auth_user/') ?>/"+select_auth_user+"/";
		});
		
</script>













