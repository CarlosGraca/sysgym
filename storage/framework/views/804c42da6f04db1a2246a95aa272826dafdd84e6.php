<?php
    $system = \App\Models\System::where(['branch_id'=>\Auth::user()->branch_id,'tenant_id'=>\Auth::user()->tenant_id])->first();
?>

<!-- REQUIRED JS SCRIPTS -->

<!-- JQUERY 2.1.4 -->
<script src="<?php echo e(asset('/plugins/jQuery/jQuery-2.1.4.min.js')); ?>" type="text/javascript"></script>



<!-- BOOTSTRAP 3.3.2 JS -->
<script src="<?php echo e(asset('/js/bootstrap.min.js')); ?>" type="text/javascript"></script>

<!-- AdminLTE APP -->
<script src="<?php echo e(asset('/js/app.min.js')); ?>" type="text/javascript"></script>

<!-- TOASTR PLUGIN -->
<script src="<?php echo e(asset('/plugins/toastr/toastr.js')); ?>" type="text/javascript"></script>


<!-- SELECT2 PLUGIN -->
<script src="<?php echo e(asset('/plugins/select2/select2.full.min.js')); ?>" type="text/javascript"></script>

<!-- DATA TABLES PLUGIN -->
<script src="<?php echo e(asset('/plugins/datatables/jquery.dataTables.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('/plugins/datatables/dataTables.bootstrap.min.js')); ?>" type="text/javascript"></script>

<script src="<?php echo e(asset('/plugins/datatables/extensions/ColVis/js/dataTables.colVis.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js')); ?>" type="text/javascript"></script>

<!-- DATE RANGE PICKER PLUGIN -->
<script src="<?php echo e(asset('/plugins/moment.js/moment-with-locales.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('/plugins/moment.js/moment-timezone-with-data.min.js')); ?>" type="text/javascript"></script>


<script src="<?php echo e(asset('/plugins/daterangepicker/daterangepicker.js')); ?>" type="text/javascript"></script>

<!-- DATE PICKER PLUGIN -->
<script src="<?php echo e(asset('/plugins/datepicker/bootstrap-datepicker.js')); ?>" type="text/javascript"></script>

<!-- CHART GRAPHICS PLUGIN-->
<script src="<?php echo e(asset('/plugins/chartjs/Chart.min.js')); ?>" type="text/javascript"></script>


<script src="<?php echo e(asset('/js/jquery.colorbox.js')); ?>" type="text/javascript"></script>


<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->
<!-- PDF EXPORT PLUGINS -->
<script src="<?php echo e(asset('/plugins/rails/rails.js')); ?>" type="text/javascript" ></script>
<script src="<?php echo e(asset('/plugins/jspdf/jspdf.min.js')); ?>" type="text/javascript" ></script>
<script src="<?php echo e(asset('/plugins/jspdf/jspdf.debug.js')); ?>" type="text/javascript" ></script>
<script src="<?php echo e(asset('/plugins/html2canvas/dist/html2canvas.js')); ?>" type="text/javascript" ></script>

<script src="<?php echo e(asset('/js/bootstrap-filestyle.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('/plugins/jQueryUI/jquery-ui.min.js')); ?>" type="text/javascript" ></script>

<!-- FULLCALENDAR PLUGIN -->
<script src="<?php echo e(asset('/plugins/fullcalendar/fullcalendar.min.js')); ?>" type="text/javascript"></script>

<!-- MOMENT-->



<!-- WIZARD PLUGIN -->
<script src="<?php echo e(asset('/plugins/wizard/jquery.bootstrap.wizard.min.js')); ?>" type="text/javascript"></script>

<!-- JQUERY VALIDATION PLUGIN -->
<script src="<?php echo e(asset('/plugins/jquery-validation/dist/jquery.validate.min.js')); ?>" type="text/javascript"></script>

<!-- JQUERY CONTEXT MENU PLUGIN -->
<script src="<?php echo e(asset('/plugins/jquery-contextmenu/dist/jquery.contextMenu.min.js')); ?>" type="text/javascript"></script>


    


<!-- SLIMSCROLL PLUGIN -->
<script src="<?php echo e(asset('/plugins/slimScroll/jquery.slimscroll.min.js')); ?>" type="text/javascript"></script>

<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo e(asset('/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')); ?>"></script>

<!-- InputMask -->
<script src="<?php echo e(asset('/plugins/input-mask/jquery.inputmask.js')); ?>"></script>
<script src="<?php echo e(asset('/plugins/input-mask/jquery.inputmask.date.extensions.js')); ?>"></script>
<script src="<?php echo e(asset('/plugins/input-mask/jquery.inputmask.extensions.js')); ?>"></script>


<script src="<?php echo e(asset('/js/bootbox.js')); ?>" type="text/javascript"></script>


<script src="<?php echo e(asset('/plugins/croppie/js/croppie.js')); ?>"></script>

<!-- First, include the Webcam.js JavaScript Library -->
<script type="text/javascript" src="<?php echo e(asset('plugins/webcam/webcam.min.js')); ?>"></script>

<!-- SCRIPT IN DEVELOPMENT MODE -->

<script type="text/javascript">
    


    $(":file").filestyle({
        input: true,
        icon: true,
        buttonName: "btn-primary",
        buttonText: "",
        iconName: "fa fa-folder-open",
        badge: false,
        placeholder: '<?php echo e(trans('adminlte_lang::message.browser_avatar')); ?>',
    });

    var token = $('meta[name="csrf_token"]').attr('content');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': token
        }
    });


    $('.table-design').DataTable({
        "colVis": {
            "buttonText": "Columns",
            "overlayFade": 0,
            "align": "right"
        },
        "language": {
            "lengthMenu": '_MENU_ <?php echo e(trans('adminlte_lang::message.entries_per_page')); ?> ',
            "search": '<?php echo e(trans('adminlte_lang::message.search')); ?>',
            "paginate": {
                "previous": '<i class="fa fa-angle-left"></i>',
                "next": '<i class="fa fa-angle-right"></i>'
            },
            "emptyTable": "<?php echo e(trans('adminlte_lang::message.no_data_available')); ?>",
        }
    });

    $("#compose-textarea").wysihtml5();

    $('.slimscroll').slimScroll();
    $('.menu').slimScroll({
        height: 100
    });

    $('#select-2').select2();

    var _file_url = '<?php echo e(url('files')); ?>';

    //LANGUAGE TRANSLATE
    var _copy_text = '<?php echo e(trans('adminlte_lang::message.copy')); ?>';
    var _confirm_alert_text = '<?php echo e(trans('adminlte_lang::message.are_sure')); ?>';
    var _edit_text = '<?php echo e(trans('adminlte_lang::message.edit')); ?>';
    var _remove_text = '<?php echo e(trans('adminlte_lang::message.remove')); ?>';
    var _required_field_text = '<?php echo e(trans('adminlte_lang::message.required_field')); ?>';
    var _view_text = '<?php echo e(trans('adminlte_lang::message.view')); ?>';
    var _preview_text = '<?php echo e(trans('adminlte_lang::message.preview')); ?>';
    var _download_text = '<?php echo e(trans('adminlte_lang::message.download')); ?>';
    var _yes_text = '<?php echo e(trans('adminlte_lang::message.yes')); ?>';
    var _no_text = '<?php echo e(trans('adminlte_lang::message.not')); ?>';
    var _disable_text = '<?php echo e(trans('adminlte_lang::message.disable')); ?>';

    var timezone = '<?php echo count($system) > 0 ? $system->timezone : config('app.timezone'); ?>';

    function update() {
        var time = moment().tz(timezone).format('- DD/MM/YYYY HH:mm:ss');
        $('#clock').html(time);
    }
    $(function () {
        setInterval(update, 1000);
    });

    $(function () {
        var pressedCtrl = false;
        $(document).keyup(function (e) {
            if(e.which == 18)
                pressedCtrl=false;
        })

        $(document).keydown(function (e) {
            if(e.which == 18)
                pressedCtrl = true;

            if(e.which == 76 && pressedCtrl == true) {
                //Aqui vai o código e chamadas de funções para o ctrl+l
                // CTRL + L pressionados
                window.location= "/lockscreen";
            }

            if(e.which == 69 && pressedCtrl == true)
            //Aqui vai o código e chamadas de funções para o ctrl+l
            // CTRL + E pressionados
                window.location= "/logout";
        });
    });

</script>

<script src="<?php echo e(asset('/js/search.js')); ?>" type="text/javascript"></script>

<script src="<?php echo e(asset('/js/clients.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('/js/users.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('/js/company.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('/js/branches.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('/js/employees.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('/js/defaults.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('/js/employees_category.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('/js/system.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('/js/matriculation.js')); ?>" type="text/javascript"></script>

<script src="<?php echo e(asset('/js/files.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('/js/modalities.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('/js/payments.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('/js/roles.js')); ?>" type="text/javascript"></script>
 <script src="<?php echo e(asset('/js/document.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('/js/menus.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('/js/backups.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('/js/accounts.js')); ?>" type="text/javascript"></script>


