<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<div class="crumbs">
	<ul id="breadcrumbs" class="breadcrumb">
		<li><i class="icon-home"></i> <a href="<?php echo base_url(); ?>"><?php echo $this->entry_model->get_label_value("home", $current_user_language); ?>
		</a></li>
		<li class="current"><a href="<?php echo site_url("entries"); ?>"
			title=""><?php echo $this->entry_model->get_label_value("entries", $current_user_language); ?>
		</a></li>
		<li class="current"><a
			href="<?php echo site_url("entries/new_entry"); ?>" title=""><?php echo $this->entry_model->get_label_value("new_entry", $current_user_language); ?>
		</a></li>
	</ul>

	<ul class="crumb-buttons">
		<li><a href="<?php echo site_url("entries"); ?>" title=""><i
				class="icon-plus"></i><span><?php echo $this->entry_model->get_label_value("list_entries", $current_user_language); ?>
			</span> </a></li>
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
					<?php echo $this->entry_model->get_label_value("new_entry", $current_user_language); ?>
				</h4>
			</div>
			<div class="widget-content">



				<form class="form-horizontal row-border" id="form_to_be_validated"
					action="<?php echo site_url("entries/create"); ?>" method="post">
					<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo $this->entry_model->get_label_value("title", $current_user_language); ?>
							<span class="required">*</span> </label>
						<div class="col-md-5">
							<input type="text" name="title" value=""
								class="form-control required" />
						</div>
					</div>
					<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
					<div class="form-group">
						<label class="col-md-3 control-label"><?php  echo $this->entry_model->get_label_value("description", $current_user_language); ?>
						</label>
						<div class="col-md-5">
							<textarea name="description" class="form-control wysiwyg"
								rows="15"></textarea>
							</textarea>
						</div>
					</div>
					<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo $this->entry_model->get_label_value("email", $current_user_language); ?>
						</label>
						<div class="col-md-5">
							<input type="text" name="email" value="" class="form-control " />
						</div>
					</div>
					<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo $this->entry_model->get_label_value("phone_number", $current_user_language); ?>
						</label>
						<div class="col-md-5">
							<input type="text" name="phone_number" value=""
								class="form-control " />
						</div>
					</div>
					<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo $this->entry_model->get_label_value("website", $current_user_language); ?>
						</label>
						<div class="col-md-5">
							<input type="text" name="website" value="" class="form-control " />
						</div>
					</div>
					<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo $this->entry_model->get_label_value("map_title", $current_user_language); ?>
						</label>
						<div class="col-md-5">
							<input type="text" name="map_title" value=""
								class="form-control " />
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"> Choose a point on the map </label>
						<div class="col-md-5" id="map-canvas"></div>
					</div>
					<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo $this->entry_model->get_label_value("map_lat", $current_user_language); ?>
						</label>
						<div class="col-md-5">
							<input type="text" name="map_lat" id="map_lat" value=""
								class="form-control " />
						</div>
					</div>
					<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo $this->entry_model->get_label_value("map_long", $current_user_language); ?>
						</label>
						<div class="col-md-5">
							<input type="text" name="map_long" id="map_long" value=""
								class="form-control " />
						</div>
					</div>
					<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo $this->entry_model->get_label_value("facebook_link", $current_user_language); ?>
						</label>
						<div class="col-md-5">
							<input type="text" name="facebook_link" value=""
								class="form-control " />
						</div>
					</div>
					<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo $this->entry_model->get_label_value("twitter_link", $current_user_language); ?>
						</label>
						<div class="col-md-5">
							<input type="text" name="twitter_link" value=""
								class="form-control " />
						</div>
					</div>
					<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo $this->entry_model->get_label_value("posted_date", $current_user_language); ?>
						</label>
						<div class="col-md-5">
							<input type="text" name="posted_date" readonly
								value="<?php echo date("d-m-Y");?>" class="form-control" /> 
								<input
								type="text" name="posted_time" readonly
								value="<?php echo date("H:i:s");?>" class="form-control" />
						</div>
					</div>
					<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo $this->entry_model->get_label_value("from_date", $current_user_language); ?>
						</label>
						<div class="col-md-5">
							<input type="text" name="from_date" value=""
								class="form-control datepicker " data-mask="99-99-9999" />
							<div id="datetimepicker3">
								<input class="form-control add-on" name="from_time" data-mask="99:99:99"
									data-format="hh:mm:ss" type="text" />
							</div>
						</div>
					</div>
					<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo $this->entry_model->get_label_value("to_date", $current_user_language); ?>
						</label>
						<div class="col-md-5">
							<input type="text" name="to_date" value=""
								class="form-control datepicker " data-mask="99-99-9999" />
							<div id="datetimepicker4">
								<input class="form-control add-on" name="to_time" data-mask="99:99:99"
									data-format="hh:mm:ss" type="text" />
							</div>
						</div>
					</div>
					<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo $this->entry_model->get_label_value("cost", $current_user_language); ?>
						</label>
						<div class="col-md-5">
							<input type="text" name="cost" value="" class="form-control " />
						</div>
					</div>
					<div class="form-actions">
						<input id="action_button" type="submit"
							value="<?php echo $this->entry_model->get_label_value("save", $current_user_language); ?>"
							class="btn btn-primary pull-right" />
					</div>
				</form>
			</div>
		</div>
		<!-- /Validation Example 1 -->
	</div>
</div>

<link
	href="<?php echo base_url(); ?>/assets/css/bootstrap-datetimepicker.min.css"
	rel="stylesheet" type="text/css" />
<script
	type="text/javascript"
	src="<?php echo base_url(); ?>/assets/js/bootstrap-datetimepicker.min.js"></script>

<script type="text/javascript">
  $(function() {
    $('#datetimepicker3').datetimepicker({
      pickDate: false
    });
  });
  $(function() {
    $('#datetimepicker4').datetimepicker({
      pickDate: false
    });
  });
</script>	
	
<style>
#map-canvas {
	height: 400px;
	width: 500px;
}
</style>
<script
	src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>

<script>
var stockholm = new google.maps.LatLng(40.70233399427129, -74.19708688476567);
var parliament = new google.maps.LatLng(40.70233399427129, -74.19708688476567);
var marker;
var map;

function initialize() {
  var mapOptions = {
    zoom: 7,
    zoomControl:true,
    mapTypeControl:true,
    scaleControl:true,
    center: stockholm
  };

  map = new google.maps.Map(document.getElementById('map-canvas'),
          mapOptions);

  marker = new google.maps.Marker({
    map:map,
    draggable:true,
    animation: google.maps.Animation.DROP,
    position: parliament
  });
  google.maps.event.addListener(marker, 'click', toggleBounce);
  
  // Register Custom "dragend" Event
	google.maps.event.addListener(marker, 'dragend', function() {
		
		// Get the Current position, where the pointer was dropped
		var point = marker.getPosition();
		// Center the map at given point
		map.panTo(point);
		// Update the textbox
		document.getElementById("map_lat").value = point.lat(); 
		document.getElementById("map_long").value = point.lng(); 
	});
}

function toggleBounce() {

  if (marker.getAnimation() != null) {
    marker.setAnimation(null);
  } else {
    marker.setAnimation(google.maps.Animation.BOUNCE);
  }
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>

