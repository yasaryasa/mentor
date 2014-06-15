<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<div class="crumbs">
	<ul id="breadcrumbs" class="breadcrumb">
		<li><i class="icon-home"></i> <a href="<?php echo base_url(); ?>"><?php echo $this->notification_model->get_label_value("home", $current_user_language); ?>
		</a>
		</li>
		<li class="current"><a href="<?php echo site_url("notifications"); ?>"
			title="">Notifications
		</a>
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
					<i class="icon-plus"></i>Send Notification</h4>
			</div>
			<div class="widget-content">
				<form class="form-horizontal row-border" id="form_to_be_validated"
					action="<?php echo site_url("notifications/send"); ?>" method="post">
					<div class="form-group">
						<label class="col-md-8 control-label"><?php if ($count == 0) echo 'No entries have been added lately to be notified.';
						else echo 'There are '.$count.' new entries. Would you like to send notifications about them?';?>
						</label>
					</div>
					<div class="form-actions">
						<input id="action_button" type="submit"
							value="Send Notification" <?php if ($count == 0) echo 'disabled';?>
							class="btn btn-primary pull-right" />
					</div>
				</form>
			</div>
		</div>
		<!-- /Validation Example 1 -->
	</div>
</div>