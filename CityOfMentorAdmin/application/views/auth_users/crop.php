<!-- Bu Yazılım İmleç A.Ş. Tarafından Üretilmiştir: http://www.imleç.com.tr -->
<script type="text/javascript">

    jQuery(function($) {

        // Create variables (in this scope) to hold the API and image size
        var jcrop_api,
                boundx,
                boundy,
                // Grab some information about the preview pane
                $preview = $('#preview-pane'),
                $pcnt = $('#preview-pane .preview-container'),
                $pimg = $('#preview-pane .preview-container img'),
                xsize = $pcnt.width(),
                ysize = $pcnt.height();

        $('#image_will_be_croped').Jcrop({
            onChange: updatePreview,
            onSelect: updatePreview,
            aspectRatio: <?php echo $swidth; ?>/<?php echo $sheight; ?>,
            setSelect: [20, 20, <?php echo $swidth; ?>, <?php echo $sheight; ?>]
        }, function() {
            // Use the API to get the real image size
            var bounds = this.getBounds();
            boundx = bounds[0];
            boundy = bounds[1];
            // Store the API in the jcrop_api variable
            jcrop_api = this;

            // Move the preview into the jcrop container for css positioning
            $preview.appendTo(jcrop_api.ui.holder);
        });

        function updatePreview(c)
        {
            updateCoords(c);
            if (parseInt(c.w) > 0)
            {
                var rx = xsize / c.w;
                var ry = ysize / c.h;

                $pimg.css({
                    width: Math.round(rx * boundx) + 'px',
                    height: Math.round(ry * boundy) + 'px',
                    marginLeft: '-' + Math.round(rx * c.x) + 'px',
                    marginTop: '-' + Math.round(ry * c.y) + 'px'
                });
            }
        }
        ;

    });


    function updateCoords(c)
    {
        $('#x').val(c.x);
        $('#y').val(c.y);
        $('#w').val(c.w);
        $('#h').val(c.h);
    }
    ;

    function checkCoords()
    {
        if (parseInt($('#w').val()))
            return true;
        alert('Please select a crop region then press submit.');
        return false;
    }
    ;


</script>

<div id="cropped_file_result">
</div>

<div id="crop_area" class="jc-demo-box">
        <a class="btn btn-danger pull-right" id="make_crop_link" style="margin-right:-75px;"> <i class="icon-cut"></i> KIRP </a>
        <img src="<?php echo base_url().UPLOAD_DIR ."/".$current_user_role ."/".$current_user_id."/" .$file; ?>"  id="image_will_be_croped"/>
	</div>
<form>
	<input type="hidden" id="x" name="x" />
	<input type="hidden" id="y" name="y" />
	<input type="hidden" id="w" name="w" />
	<input type="hidden" id="h" name="h" />
	<input type="hidden" value="<?php echo $file; ?>" id="hidden_file_name" />
</form>
<script type="text/javascript">

    $("#cropped_file_result").hide();
    $("#make_crop_link").click(function() {
        $.ajax({
            type: "POST",
            url: "<?php echo site_url("auth_users/apply_crop") ?>",
            data: {x: $("#x").val(), y: $("#y").val(), w: $("#w").val(), h: $("#h").val(), file: $("#hidden_file_name").val(), current_w :$("#image_will_be_croped").width() },
            success: function(msg) {
            	$("#cropped_file_result").show();
                $("#user_profile_image").val(msg);
                $("#crop_area").hide();
                $("#cropped_file_result").html("<img src='<?php echo base_url().UPLOAD_DIR ."/".$current_user_role."/".$current_user_id."/";?>"+msg+"' />");
                $("#action_button").removeAttr("disabled");
            }
        });
    });
</script>