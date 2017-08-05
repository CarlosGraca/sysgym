<?php
    $system = \App\System::all()->first();
    $defaults = new App\Http\Controllers\Defaults();
//    $weeks = $defaults->getOldWeeks();
//    $today = \Carbon\Carbon::now()->addHours($system->timezone);
//    $workTime = null;
//    $WT = [];
//    if (\Auth::user() != null){
//        $workTime = \App\Schedule::select( \DB::raw("min(start_time) start, max(end_time) end") )->where(['branch_id'=>\Auth::user()->branch_id,'status'=>1])->first();
//
//    //week_day,'monday','tuesday','wednesday','thursday','friday','saturday','sunday'
//    $WT = \App\Schedule::select( \DB::raw("
//            CASE
//              WHEN schedules.week_day = 'sunday' THEN CONCAT('[',0,']')
//              WHEN schedules.week_day = 'monday' THEN CONCAT('[',1,']')
//              WHEN schedules.week_day = 'tuesday' THEN CONCAT('[',2,']')
//              WHEN schedules.week_day = 'wednesday' THEN CONCAT('[',3,']')
//              WHEN schedules.week_day = 'thursday' THEN CONCAT('[',4,']')
//              WHEN schedules.week_day = 'friday' THEN CONCAT('[',5,']')
//              WHEN schedules.week_day = 'saturday' THEN CONCAT('[',6,']')
//            END as dow,
//            schedules.start_time as start,
//            schedules.end_time as end
//             ") )->where(['branch_id'=>\Auth::user()->branch_id,'status'=>'1'])->get();
//    }
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


<!-- SCRIPT IN DEVELOPMENT MODE -->

<script type="text/javascript">
    var localName = '<?php echo e($system->lang); ?>';


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

//      $('#select2').select2();
//    $('#branch').select2();
//    $('#employee_id').select2();
//    $('#doctor').select2();
//    $('#matriculation_procedure_id').select2();

    var _select_html = "<select name='status'>" +
            "<option value selected>SELECT OPTION</option>" +
            "<option value='0'>Inactive</option>" +
            "<option value='1'>Active</option>" +
            "</select>";

    $('.table-design').DataTable({
//        dom: 'Bfrtip',
//        "buttons": [
//            'copy', 'excel', 'pdf'
//        ],
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

    var can_add_agenda = false;
    var can_edit_agenda = false;
    var can_view_agenda = false;
    var can_reagenda_agenda = false;
    var can_cancel_agenda = false;
    var can_confirm_agenda = false;

    <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('add_agenda')): ?>
    can_add_agenda = true;
    <?php endif; ?>
    <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('edit_agenda')): ?>
    can_edit_agenda = true;
    <?php endif; ?>
    <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('view_agenda')): ?>
    can_view_agenda = true;
    <?php endif; ?>
    <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('reagenda_agenda')): ?>
    can_reagenda_agenda = true;
    <?php endif; ?>
    <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('cancel_agenda')): ?>
    can_cancel_agenda = true;
    <?php endif; ?>
    <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('confirm_agenda')): ?>
    can_confirm_agenda = true;
    <?php endif; ?>

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
    var _edit_consult_text = '<?php echo e(trans('adminlte_lang::message.update_consult_agenda')); ?>';
    var _details_consult_text = '<?php echo e(trans('adminlte_lang::message.details_consult_agenda')); ?>';
    var _add_consult_text = '<?php echo e(trans('adminlte_lang::message.new_consult_agenda')); ?>';
    var _disable_text = '<?php echo e(trans('adminlte_lang::message.disable')); ?>';


    
    
    
    

    
        
        
        
        
        
        
        
        
        
        
        
        
    

    
        
        
        
        
        
        
        
        
        
        
        
    

    
        
        
        
        
        
        
        
        
        
        
        
    

    
        
        
        
        
        
        
    

    
        
        
        
        
        
        
    

    
    
    

    var timezone = '<?php echo $system->timezone; ?>';

    function update() {
        var time = moment().tz(timezone).format('- DD/MM/YYYY HH:mm:ss');
        $('#clock').html(time);
    }
    $(function () {
        setInterval(update, 1000);
    });

    
//    var _businessHours = $.parseJSON(_str);

</script>

<script src="<?php echo e(asset('/js/search.js')); ?>" type="text/javascript"></script>

<script src="<?php echo e(asset('/js/clients.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('/js/users.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('/js/company.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('/js/branches.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('/js/employees.js')); ?>" type="text/javascript"></script>


<script src="<?php echo e(asset('/js/defaults.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('/js/category.js')); ?>" type="text/javascript"></script>




<script src="<?php echo e(asset('/js/system.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('/js/matriculation.js')); ?>" type="text/javascript"></script>

<script src="<?php echo e(asset('/js/files.js')); ?>" type="text/javascript"></script>



<script src="<?php echo e(asset('/js/modalities.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('/js/payments.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('/js/roles.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('/js/permissions.js')); ?>" type="text/javascript"></script>


