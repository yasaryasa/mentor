<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<div class="crumbs">
    <ul id="breadcrumbs" class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="<?php echo base_url(); ?>"><?php echo $this->$model->get_label_value("home", $current_user_language); ?></a>
        </li>
    </ul>
</div>

<br />

<div class="row">
	<div class="col-md-12">
		<div class="widget box">
			<div class="widget-header">
				<h4>
					<i class="icon-reorder icon-large">&nbsp;&nbsp;&nbsp;
						<?php echo $this->$model->get_label_value("restricted_page", $current_user_language); ?>
					</i>
				</h4>
			</div>
			<div class="widget-content">
				<?php echo '<div class="alert alert-danger fade in">' . $this->$model->get_label_value("dont_have_right_to_" . $access_type, $current_user_language) . '</div>'; ?>
			</div>
		</div>
	</div>
</div>












