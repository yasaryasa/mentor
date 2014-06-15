<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<div class="crumbs">
	<ul id="breadcrumbs" class="breadcrumb">
		<li><i class="icon-home"></i> <a href="<?php echo base_url(); ?>"><?php echo $this->category_entry_model->get_label_value("home", $current_user_language); ?>
		</a>
		</li>
		<li class="current"><a
			href="<?php echo site_url("category_entries"); ?>" title=""><?php echo $this->category_entry_model->get_label_value("category_entries", $current_user_language); ?>
		</a>
		</li>
	</ul>

	<ul class="crumb-buttons">
		<?php if ( $this->category_entry_model->get_create("category_entries") ) { ?>
		<li><a
			href="<?php echo site_url("category_entries/new_category_entry"); ?>"
			title=""><i class="icon-plus"></i><span><?php echo $this->category_entry_model->get_label_value("new_category_entry", $current_user_language); ?>
			</span> </a>
		</li>
		<?php } ?>
	</ul>
</div>

<br />

<form action="<?php echo site_url("category_entries/search") ?>"
	method="post">

	<div class="col-md-3 pull-right">
		<div class="input-group">
			<input class="form-control" name="search_term" id="search_term"
				placeholder="<?php echo $this->category_entry_model->get_label_value("search_in_category_entries", $current_user_language); ?>" />
			<span class="input-group-btn">
				<button type="submit" class="btn btn-default" id="search"
					type="button"><?php echo $this->category_entry_model->get_label_value("search", $current_user_language); ?></button>
			</span>
		</div>
	</div>

</form>


<?php if ( $this->category_entry_model->get_read("entries") && ( $this->category_entry_model->get_see_others("entries") || $this->category_entry_model->get_see_all("entries") || $this->category_entry_model->get_create("entries") ) ) { ?>
<div class="row">
	<div class="form-group">
		<label class="col-md-3 align-right control-label"><?php echo $this->category_entry_model->get_label_value("select_category_entry_entry", $current_user_language); ?>
		</label>
		<div class="col-md-5">
			<select class="select2 select2-select-00 col-md-12 full-width-fix"
				id="select_entry">
				<option value="0">
					<?php echo $this->category_entry_model->get_label_value("select_category_entry_entry", $current_user_language); ?>
				</option>
				<?php
				if ( $entries->num_rows > 0 ) {
					foreach ( $entries->result() as $row ) {
						if ( $row->id == $entry )
							echo "<option selected='selected' value='".$row->id."'>".$row->title . "</option>";
						else
							echo "<option value='".$row->id."'>".$row->title. "</option>";
					}
				}
				?>
			</select>
		</div>
	</div>
</div>
<?php } ?>
<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<?php if ( $this->category_entry_model->get_read("categories") && ( $this->category_entry_model->get_see_others("categories") || $this->category_entry_model->get_see_all("categories") || $this->category_entry_model->get_create("categories") ) ) { ?>
<div class="row">
	<div class="form-group">
		<label class="col-md-3 align-right control-label"><?php echo $this->category_entry_model->get_label_value("select_category_entry_category", $current_user_language); ?>
		</label>
		<div class="col-md-5">
			<select class="select2 select2-select-00 col-md-12 full-width-fix"
				id="select_category">
				<option value="0">
					<?php echo $this->category_entry_model->get_label_value("select_category_entry_category", $current_user_language); ?>
				</option>
				<?php
				if ( $categories->num_rows > 0 ) {
					foreach ( $categories->result() as $row ) {
						if ( $row->id == $category )
							echo "<option selected='selected' value='".$row->id."'>".$row->category_title . "</option>";
						else
							echo "<option value='".$row->id."'>".$row->category_title. "</option>";
					}
				}
				?>
			</select>
		</div>
	</div>
</div>
<?php } ?>
<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<?php if ( $this->category_entry_model->get_read("auth_users") && ( $this->category_entry_model->get_see_others("auth_users") || $this->category_entry_model->get_see_all("auth_users") || $this->category_entry_model->get_create("auth_users") ) ) { ?>
<div class="row">
	<div class="form-group">
		<label class="col-md-3 align-right control-label"><?php echo $this->category_entry_model->get_label_value("select_category_entry_auth_user", $current_user_language); ?>
		</label>
		<div class="col-md-5">
			<select class="select2 select2-select-00 col-md-12 full-width-fix"
				id="select_auth_user">
				<option value="0">
					<?php echo $this->category_entry_model->get_label_value("select_category_entry_auth_user", $current_user_language); ?>
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
if ( $category_entries->num_rows > 0 ) {
	?>
<div class="row">
	<div class="col-md-12">
		<div class="widget box">
			<div class="widget-header">
				<h4>
					<i class="icon-reorder icon-large">&nbsp;&nbsp;&nbsp;<?php echo $this->category_entry_model->get_label_value("category_entries", $current_user_language); ?>
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
							<?php if ( $this->category_entry_model->get_read("entries") && ( $this->category_entry_model->get_see_others("entries") ||  $this->category_entry_model->get_see_all("entries")  ||  $this->category_entry_model->get_create("entries") )  ) { ?>
							<th><a hred=""><?php echo $this->category_entry_model->get_label_value("entry_id", $current_user_language); ?>
							</a></th>
							<?php } ?>
							<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
							<?php if ( $this->category_entry_model->get_read("categories") && ( $this->category_entry_model->get_see_others("categories") ||  $this->category_entry_model->get_see_all("categories")  ||  $this->category_entry_model->get_create("categories") )  ) { ?>
							<th><a hred=""><?php echo $this->category_entry_model->get_label_value("category_id", $current_user_language); ?>
							</a></th>
							<?php } ?>
							<th width="100"><?php echo $this->category_entry_model->get_label_value("administration", $current_user_language); ?>
							</th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach ( $category_entries->result() as $row ) {
							?>
						<tr>
							<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
							<?php if ( $this->category_entry_model->get_read("entries") && ( $this->category_entry_model->get_see_others("entries") ||  $this->category_entry_model->get_see_all("entries")  ||  $this->category_entry_model->get_create("entries") )  ) { ?>
							<td><?php echo $row->title_referenced; ?></td>
							<?php } ?>
							<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
							<?php if ( $this->category_entry_model->get_read("categories") && ( $this->category_entry_model->get_see_others("categories") ||  $this->category_entry_model->get_see_all("categories")  ||  $this->category_entry_model->get_create("categories") )  ) { ?>
							<td><?php echo $row->category_title_referenced; ?></td>
							<?php } ?>
							<td width="100"><a
								href="<?php echo site_url("category_entries/edit_category_entry/page/$page/".$row->id); ?>"
								class="btn"><i class="icon-edit"></i> </a> <a
								href="<?php echo site_url("category_entries/delete_category_entry/page/$page/".$row->id); ?>"
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



	echo "<li><a href='".site_url("category_entries/index/page/".$previous."/entry/".$entry."/category/".$category."/auth_user/".$auth_user."/")."'> &larr; ".$this->category_entry_model->get_label_value("prev", $current_user_language)." </a></li>";

	while ( $i <= $page_count ) {

		if ( $i == 1 ) {

			if ( $i == $page )

				echo "<li class='active'><a href='".site_url("category_entries/index/page/".$i."/entry/".$entry."/category/".$category."/auth_user/".$auth_user."/")."'>".$this->category_entry_model->get_label_value("first", $current_user_language)."</a></li>";

			else

				echo "<li><a href='".site_url("category_entries/index/page/".$i."/entry/".$entry."/category/".$category."/auth_user/".$auth_user."/")."'>".$this->category_entry_model->get_label_value("first", $current_user_language)."</a></li>";

		}



		if ( $i >= $page-5 && $i <= $page+5  && $i != 1 && $i != $page_count ) {

			if ( $i == $page )

				echo "<li class='active'><a href='".site_url("category_entries/index/page/".$i."/entry/".$entry."/category/".$category."/auth_user/".$auth_user."/")."'>{$i}</a></li>";

			else

				echo "<li><a href='".site_url("category_entries/index/page/".$i."/entry/".$entry."/category/".$category."/auth_user/".$auth_user."/")."'>{$i}</a></li>";

		}



		if ( $i == $page_count && $page_count != 1 ) {

			if ( $i == $page )

				echo "<li class='active'><a href='".site_url("category_entries/index/page/".$i."/entry/".$entry."/category/".$category."/auth_user/".$auth_user."/")."'>".$this->category_entry_model->get_label_value("last", $current_user_language)."</a></li>";

			else

				echo "<li><a href='".site_url("category_entries/index/page/".$i."/entry/".$entry."/category/".$category."/auth_user/".$auth_user."/")."'>".$this->category_entry_model->get_label_value("last", $current_user_language)."</a></li>";

		}

		$i++;

	}

	echo "<li><a href='".site_url("category_entries/index/page/".$next."/entry/".$entry."/category/".$category."/auth_user/".$auth_user."/")."'> ".$this->category_entry_model->get_label_value("next", $current_user_language)." &rarr; </a></li>";

	?>

</ul>
<br/>
<br/>
<br/>
<br/>
<?php
} else {
	echo '<br/><br/><div class="alert alert-warning"> <strong>'.$this->category_entry_model->get_label_value("no_record_warning", $current_user_language).'</strong><br/><br/>'.$this->category_entry_model->get_label_value("there_is_no_category_entries", $current_user_language) . '</div>';
}
?>
<script language='javascript'>		
		$("#select_entry").change(function(){
			var select_entry = $(this).val();
			window.location = "<?php echo site_url('category_entries/index/page/'.$page.'/entry/') ?>/"+select_entry+"/category/<?php echo $category;?>/auth_user/<?php echo $auth_user;?>/";
		});
		
		
		$("#select_category").change(function(){
			var select_category = $(this).val();
			window.location = "<?php echo site_url('category_entries/index/page/'.$page.'/entry/'.$entry.'/category/') ?>/"+select_category+"/auth_user/<?php echo $auth_user;?>/";
		});
		
		
		$("#select_auth_user").change(function(){
			var select_auth_user = $(this).val();
			window.location = "<?php echo site_url('category_entries/index/page/'.$page.'/entry/'.$entry.'/category/'.$category.'/auth_user/') ?>/"+select_auth_user+"/";
		});
		
</script>













