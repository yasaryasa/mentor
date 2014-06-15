<!-- Bu uygulama İmleç A.Ş. Tarafından Geliştirilmiştir. http://www.imlec.com.tr http://www.imleç.com.tr -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Administrator Panel</title>


        <!--=== CSS ===-->

        <!-- Bootstrap -->
        <link href="<?php echo base_url(); ?>/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

        <!-- jQuery UI -->
        <!--<link href="<?php echo base_url(); ?>/assets/plugins/jquery-ui/jquery-ui-1.10.2.custom.css" rel="stylesheet" type="text/css" />-->
        <!--[if lt IE 9]>
                <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/plugins/jquery-ui/jquery.ui.1.10.2.ie.css"/>
        <![endif]-->

        <!-- Theme -->
        <link href="<?php echo base_url(); ?>/assets/css/main.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>/assets/css/plugins.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>/assets/css/responsive.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>/assets/css/icons.css" rel="stylesheet" type="text/css" />

        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/fontawesome/font-awesome.min.css">
            <!--[if IE 7]>
                    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/fontawesome/font-awesome-ie7.min.css">
            <![endif]-->

            <!--[if IE 8]>
                    <link href="<?php echo base_url(); ?>/assets/css/ie8.css" rel="stylesheet" type="text/css" />
            <![endif]-->


            <!--=== JavaScript ===-->

            <script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/libs/jquery-1.10.2.min.js"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js"></script>

            <script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/bootstrap.min.js"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/libs/lodash.compat.min.js"></script>

            <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
            <!--[if lt IE 9]>
                    <script src="<?php echo base_url(); ?>/assets/js/libs/html5shiv.js"></script>
            <![endif]-->

            <!-- Smartphone Touch Events -->
            <script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/touchpunch/jquery.ui.touch-punch.min.js"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/event.swipe/jquery.event.move.js"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/event.swipe/jquery.event.swipe.js"></script>

            <!-- General -->
            <script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/libs/breakpoints.js"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/respond/respond.min.js"></script> <!-- Polyfill for min/max-width CSS3 Media Queries (only for IE8) -->
            <script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/cookie/jquery.cookie.min.js"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/slimscroll/jquery.slimscroll.horizontal.min.js"></script>

            <!-- Page specific plugins -->
            <!-- Charts -->
            <!--[if lt IE 9]>
                    <script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/flot/excanvas.min.js"></script>
            <![endif]-->
            <script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/sparkline/jquery.sparkline.min.js"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/flot/jquery.flot.min.js"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/flot/jquery.flot.tooltip.min.js"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/flot/jquery.flot.resize.min.js"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/flot/jquery.flot.time.min.js"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/flot/jquery.flot.growraf.min.js"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/easy-pie-chart/jquery.easy-pie-chart.min.js"></script>

            <script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/daterangepicker/moment.min.js"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/daterangepicker/daterangepicker.js"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/blockui/jquery.blockUI.min.js"></script>

            <script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/fullcalendar/fullcalendar.min.js"></script>

            <!-- Noty -->
            <script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/noty/jquery.noty.js"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/noty/layouts/top.js"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/noty/themes/default.js"></script>

            <!-- Forms -->
            <script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/typeahead/typeahead.min.js"></script> <!-- AutoComplete -->
            <script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/autosize/jquery.autosize.min.js"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/inputlimiter/jquery.inputlimiter.min.js"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/uniform/jquery.uniform.min.js"></script> <!-- Styled radio and checkboxes -->
            <script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/tagsinput/jquery.tagsinput.min.js"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/select2/select2.min.js"></script> <!-- Styled select boxes -->
            <script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/fileinput/fileinput.js"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/duallistbox/jquery.duallistbox.min.js"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/bootstrap-inputmask/jquery.inputmask.min.js"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/bootstrap-wysihtml5/wysihtml5.min.js"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.min.js"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/bootstrap-multiselect/bootstrap-multiselect.min.js"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/bootstrap-switch/bootstrap-switch.min.js"></script>

            <!-- Form Validation -->
            <script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/validation/jquery.validate.js"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/validation/additional-methods.min.js"></script>

            <!-- App -->
            <script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/app.js"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/plugins.js"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/plugins.form-components.js"></script>

            <!-- DataTables -->
            <script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/datatables/tabletools/TableTools.min.js"></script> <!-- optional -->
            <script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/datatables/colvis/ColVis.min.js"></script> <!-- optional -->
            <script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/datatables/columnfilter/jquery.dataTables.columnFilter.js"></script> <!-- optional -->
            <script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/datatables/DT_bootstrap.js"></script>

            <!-- Charts -->
            <script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/sparkline/jquery.sparkline.min.js"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/daterangepicker/moment.min.js"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/daterangepicker/daterangepicker.js"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/blockui/jquery.blockUI.min.js"></script>

            <!-- Pickers -->

            <script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/pickadate/picker.js"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/pickadate/picker.date.js"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/pickadate/picker.time.js"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/bootstrap-colorpicker/bootstrap-colorpicker.min.js"></script>

            <script>
                $(document).ready(function() {
                    "use strict";
                    App.init(); // Init layout and core plugins
                    Plugins.init(); // Init all plugins
                    FormComponents.init(); // Init all form-specific plugins
                });</script>

            <!-- Demo JS -->
            <script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/custom.js"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/demo/ui_general.js"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/demo/form_validation.js"></script>

            <script src="<?php echo base_url(); ?>/assets/js/ajaxupload.js" language="javascript" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>/assets/js/jquery.Jcrop.js"></script>

            <script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/tinymce/tinymce.min.js"></script>
            <script type="text/javascript">
                $("#target_modal").modal();
                tinymce.init({
                    language: "tr",
                    menu: {
                        file: {title: 'File', items: 'newdocument print'},
                        edit: {title: 'Edit', items: 'cut copy paste | selectall'},
                        view: {title: 'View', items: 'preview code'},
                        format: {title: 'Style', items: 'bold italic underline strikethrough superscript subscript | formats | removeformat'},
                        table: {title: 'Table', items: 'inserttable'},
                        tools: {title: 'Tools', items: 'insertdatetime charmap'}
                    },
                    custom_undo_redo_levels: 20,
                    relative_urls: false,
                    statusbar: false,
                    selector: "textarea#editor",
                    plugins: [
                        "advlist autolink lists link image charmap print preview anchor",
                        "searchreplace visualblocks code fullscreen",
                        "insertdatetime media table contextmenu paste"
                    ],
                    toolbar: "insertfile undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | my_image",
                    setup: function(editor) {
                        editor.addButton('my_image', {
                            text: '',
                            icon: 'mce-ico mce-i-image',
                            tooltip: 'Dosya Seçiniz',
                            onclick: function() {
                                $("#modal_main_div").show();
                                $.ajax({
                                    url: "<?php echo site_url($this->uri->segment(1) . "/get_file_list"); ?>",
                                    success: function(msg) {
                                        $("#target_modal").html(msg);
                                        $("#target_modal a").click(function() {
                                            $("#target_modal").html("");
                                            $("#modal_main_div").hide();
                                            var link = $(this).attr("rel");
                                            var title = $(this).attr("name");
                                            var type = $(this).attr("type");
                                            if (type == "image") {
                                                editor.insertContent('<img src="<?php echo base_url(); ?>' + link + '" />');
                                            } else if (type == "application") {
                                                editor.insertContent('<a href="<?php echo base_url(); ?>' + link + '">' + title + '</a>');
                                            }
                                        });
                                    }
                                });
                            }
                        });
                    }

                });
            </script>


            <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/jquery.Jcrop.css" type="text/css" />

    </head>
    <body>
        <?php
        echo $main_menu;
        echo $content;
        ?>
        </div></div>
    </body>
</html>