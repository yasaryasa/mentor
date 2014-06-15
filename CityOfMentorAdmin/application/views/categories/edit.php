
<div class="crumbs">
	<ul id="breadcrumbs" class="breadcrumb">
		<li><i class="icon-home"></i> <a href="<?php echo base_url(); ?>"><?php echo $this->category_model->get_label_value("home", $current_user_language); ?>
		</a>
		</li>
		<li class="current"><a href="<?php echo site_url("categories"); ?>"
			title=""><?php echo $this->category_model->get_label_value("categories", $current_user_language); ?>
		</a>
		</li>
		<li class="current"><a
			href="<?php echo site_url("categories/new_category"); ?>" title=""><?php echo $this->category_model->get_label_value("new_category", $current_user_language); ?>
		</a>
		</li>
	</ul>

	<ul class="crumb-buttons">
		<li><a href="<?php echo site_url("categories"); ?>" title=""><i
				class="icon-plus"></i><span><?php echo $this->category_model->get_label_value("list_categories", $current_user_language); ?>
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
					<?php echo $this->category_model->get_label_value("new_category", $current_user_language); ?>
				</h4>
			</div>
			<div class="widget-content">
				<form class="form-horizontal row-border" id="form_to_be_validated"
					action="<?php echo site_url("categories/edit/page/$page/$id"); ?>"
					method="post">
					
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo $this->category_model->get_label_value("category_key", $current_user_language); ?>
						<span class="required">*</span></label>
						<div class="col-md-5">
							<input type="text" name="category_key"
								value="<?php echo $category->category_key; ?>"
								class="form-control required" />
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo $this->category_model->get_label_value("category_title", $current_user_language); ?>
						<span class="required">*</span></label>
						<div class="col-md-5">
							<input type="text" name="category_title"
								value="<?php echo $category->category_title; ?>"
								class="form-control required" />
						</div>
					</div>
					<?php
					
					if ($current_user_level == 0) {
						echo '<div class="form-group">
								<label class="col-md-3 control-label">'.$this->category_model->get_label_value("category_deletable", $current_user_language).' 
								</label>
								<div class="col-md-5">
									<select name="deletable">
								     <option value="0" '.($category->deletable == 0 ? 'selected="selected"' : '').'>No</option>
								     <option value="1" '.($category->deletable == 1 ? 'selected="selected"' : '').'>Yes</option>
								    </select>
								</div>
							  </div>';
					}
					?>
					<div class="form-actions">
						<input id="action_button" type="submit"
							value="<?php echo $this->category_model->get_label_value("save", $current_user_language); ?>"
							class="btn btn-primary pull-right" />
					</div>
				</form>
			</div>
		</div>
		<!-- /Validation Example 1 -->
	</div>
</div>
