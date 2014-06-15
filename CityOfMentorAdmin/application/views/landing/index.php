<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<div class="crumbs">
	<ul id="breadcrumbs" class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="<?php echo base_url(); ?>"><?php echo $this->landing_model->get_label_value("home", $current_user_language); ?>
		</a>
		</li>
	</ul>
</div>
<br />

<div class="row">
	<!--=== Validation Example 1 ===-->
	<div class="col-md-12">	
		<div class="row row-bg"> <!-- .row-bg -->
			<?php
			if ( $modules->num_rows() > 0 ) {
				foreach ( $modules->result() as $row ) {
					echo '
						
						<div class="col-sm-6 col-md-4">
							<div class="statbox widget box box-shadow">
								<div class="widget-content">
									<div class="visual cyan">
										<i class="icon-file-text-alt"></i>
									</div>
									<div class="value"><a href="'.site_url($row->role_capability_module_name).'">'.$this->landing_model->get_label_value($row->role_capability_module_name, $current_user_language).'</a></div>
								</div>
							</div>
						</div> 
						
						';
				} 
			}
			?>
		</div> <!-- /.row -->
	</div>
</div>
