<?php
    $system = \App\System::all()->first();
    $defaults = new App\Http\Controllers\Defaults();
    $weeks = $defaults->getOldWeeks();
    $today = \Carbon\Carbon::now()->addHours($system->timezone);
    $workTime = null;
    $WT = [];
    if (\Auth::user() != null){
        $workTime = \App\Schedule::select( \DB::raw("min(start_time) start, max(end_time) end") )->where(['branch_id'=>\Auth::user()->logged_branch,'status'=>1])->first();

    //week_day,'monday','tuesday','wednesday','thursday','friday','saturday','sunday'
    $WT = \App\Schedule::select( \DB::raw("
            CASE
              WHEN schedules.week_day = 'sunday' THEN CONCAT('[',0,']')
              WHEN schedules.week_day = 'monday' THEN CONCAT('[',1,']')
              WHEN schedules.week_day = 'tuesday' THEN CONCAT('[',2,']')
              WHEN schedules.week_day = 'wednesday' THEN CONCAT('[',3,']')
              WHEN schedules.week_day = 'thursday' THEN CONCAT('[',4,']')
              WHEN schedules.week_day = 'friday' THEN CONCAT('[',5,']')
              WHEN schedules.week_day = 'saturday' THEN CONCAT('[',6,']')
            END as dow,
            schedules.start_time as start,
            schedules.end_time as end
             ") )->where(['branch_id'=>\Auth::user()->logged_branch,'status'=>'1'])->get();
    }
?>

<!-- REQUIRED JS SCRIPTS -->

<!-- JQUERY 2.1.4 -->
<script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}" type="text/javascript"></script>

{{--<script src="{{ asset('/plugins/jQuery/jquery.min.js') }}" type="text/javascript"></script>--}}

<!-- BOOTSTRAP 3.3.2 JS -->
<script src="{{ asset('/js/bootstrap.min.js') }}" type="text/javascript"></script>

<!-- AdminLTE APP -->
<script src="{{ asset('/js/app.min.js') }}" type="text/javascript"></script>

<!-- TOASTR PLUGIN -->
<script src="{{asset('/plugins/toastr/toastr.js')}}" type="text/javascript"></script>


<!-- SELECT2 PLUGIN -->
<script src="{{ asset('/plugins/select2/select2.full.min.js')}}" type="text/javascript"></script>

<!-- DATA TABLES PLUGIN -->
<script src="{{ asset('/plugins/datatables/jquery.dataTables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/datatables/dataTables.bootstrap.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('/plugins/datatables/extensions/ColVis/js/dataTables.colVis.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js') }}" type="text/javascript"></script>

<!-- DATE RANGE PICKER PLUGIN -->
<script src="{{ asset('/plugins/moment.js/moment-with-locales.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/moment.js/moment-timezone-with-data.min.js') }}" type="text/javascript"></script>


<script src="{{ asset('/plugins/daterangepicker/daterangepicker.js') }}" type="text/javascript"></script>

<!-- DATE PICKER PLUGIN -->
<script src="{{ asset('/plugins/datepicker/bootstrap-datepicker.js') }}" type="text/javascript"></script>

<!-- CHART GRAPHICS PLUGIN-->
<script src="{{ asset('/plugins/chartjs/Chart.min.js') }}" type="text/javascript"></script>


<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->
<!-- PDF EXPORT PLUGINS -->
<script src="{{ asset('/plugins/rails/rails.js')}}" type="text/javascript" ></script>
<script src="{{ asset('/plugins/jspdf/jspdf.min.js') }}" type="text/javascript" ></script>
<script src="{{ asset('/plugins/jspdf/jspdf.debug.js') }}" type="text/javascript" ></script>
<script src="{{ asset('/plugins/html2canvas/dist/html2canvas.js')}}" type="text/javascript" ></script>

<script src="{{ asset('/js/bootstrap-filestyle.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/jQueryUI/jquery-ui.min.js') }}" type="text/javascript" ></script>

<!-- FULLCALENDAR PLUGIN -->
<script src="{{asset('/plugins/fullcalendar/fullcalendar.min.js')}}" type="text/javascript"></script>
{{--<script src="{{asset('/plugins/fullcalendar/locale-all.js')}}" type="text/javascript"></script>--}}
<!-- MOMENT-->
{{--<script src="{{asset('/plugins/fullcalendar/moment.min.js')}}" type="text/javascript"></script>--}}


<!-- WIZARD PLUGIN -->
<script src="{{asset('/plugins/wizard/jquery.bootstrap.wizard.min.js')}}" type="text/javascript"></script>

<!-- JQUERY VALIDATION PLUGIN -->
<script src="{{asset('/plugins/jquery-validation/dist/jquery.validate.min.js')}}" type="text/javascript"></script>

<!-- JQUERY CONTEXT MENU PLUGIN -->
<script src="{{asset('/plugins/jquery-contextmenu/dist/jquery.contextMenu.min.js')}}" type="text/javascript"></script>

{{-- VALIDATOR--}}
    {{--<script src="{{ asset('/js/validator.min.js') }}" type="text/javascript"></script>--}}


<!-- SLIMSCROLL PLUGIN -->
<script src="{{asset('/plugins/slimScroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>

<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>

<!-- InputMask -->
<script src="{{ asset('/plugins/input-mask/jquery.inputmask.js') }}"></script>
<script src="{{ asset('/plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
<script src="{{ asset('/plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>

{{--BOOTBOX PLUGIN--}}
<script src="{{ asset('/js/bootbox.js') }}" type="text/javascript"></script>

{{--CROPPIE PLUGIN--}}
<script src="{{ asset('/plugins/croppie/js/croppie.js') }}"></script>


<!-- SCRIPT IN DEVELOPMENT MODE -->

<script type="text/javascript">
    var localName = '{{$system->lang }}';


    $(":file").filestyle({
        input: true,
        icon: true,
        buttonName: "btn-primary",
        buttonText: "",
        iconName: "fa fa-folder-open",
        badge: false,
        placeholder: '{{ trans('adminlte_lang::message.browser_avatar') }}',
    });

    var token = $('meta[name="csrf_token"]').attr('content');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': token
        }
    });

    $('#category').select2();
    $('#branch').select2();
    $('#employee_id').select2();
    $('#doctor').select2();
//    $('#budget_procedure_id').select2();

    var _select_html = "<select name='status'>" +
            "<option value selected>SELECT OPTION</option>" +
            "<option value='0'>Inactive</option>" +
            "<option value='1'>Active</option>" +
            "</select>";

    $('.table-design').DataTable({
        // "dom": 'lCfrtip',
        "colVis": {
            "buttonText": "Columns",
            "overlayFade": 0,
            "align": "right"
        },
        "language": {
            "lengthMenu": '_MENU_ {{  trans('adminlte_lang::message.entries_per_page') }} ',
            "search": '{{  trans('adminlte_lang::message.search') }}',
            "paginate": {
                "previous": '<i class="fa fa-angle-left"></i>',
                "next": '<i class="fa fa-angle-right"></i>'
            },
            "emptyTable": "{{  trans('adminlte_lang::message.no_data_available') }}",
        }
    });

    $("#compose-textarea").wysihtml5();

    $('.slimscroll').slimScroll();
    $('.menu').slimScroll({
        height: 100
    });


    var _file_url = '{{ url('files') }}';

    //LANGUAGE TRANSLATE
    var _copy_text = '{{ trans('adminlte_lang::message.copy') }}';
    var _confirm_alert_text = '{{ trans('adminlte_lang::message.are_sure') }}';
    var _edit_text = '{{  trans('adminlte_lang::message.edit') }}';
    var _remove_text = '{{  trans('adminlte_lang::message.remove') }}';
    var _required_field_text = '{{  trans('adminlte_lang::message.required_field') }}';
    var _view_text = '{{ trans('adminlte_lang::message.view') }}';
    var _preview_text = '{{ trans('adminlte_lang::message.preview') }}';
    var _download_text = '{{ trans('adminlte_lang::message.download') }}';
    var _yes_text = '{{ trans('adminlte_lang::message.yes') }}';
    var _no_text = '{{ trans('adminlte_lang::message.not') }}';
    var _edit_consult_text = '{{ trans('adminlte_lang::message.update_consult_agenda') }}';
    var _details_consult_text = '{{ trans('adminlte_lang::message.details_consult_agenda') }}';
    var _add_consult_text = '{{ trans('adminlte_lang::message.new_consult_agenda') }}';
    var _disable_text = '{{ trans('adminlte_lang::message.disable') }}';


    var _today = '{{ trans('adminlte_lang::message.today') }}';
    var _week = '{{ trans('adminlte_lang::message.week') }}';
    var _day = '{{ trans('adminlte_lang::message.day') }}';
    var _month = '{{ trans('adminlte_lang::message.month') }}';

    var months = {
        'January':'{{ trans('adminlte_lang::message.january') }}',
        'February':'{{ trans('adminlte_lang::message.february') }}',
        'March':'{{ trans('adminlte_lang::message.march') }}',
        'April':'{{ trans('adminlte_lang::message.april') }}',
        'May':'{{ trans('adminlte_lang::message.may') }}',
        'June':'{{ trans('adminlte_lang::message.june') }}',
        'July':'{{ trans('adminlte_lang::message.july') }}',
        'August':'{{ trans('adminlte_lang::message.august') }}',
        'September':'{{ trans('adminlte_lang::message.september') }}',
        'October':'{{ trans('adminlte_lang::message.october') }}',
        'November':'{{ trans('adminlte_lang::message.november') }}',
        'December':'{{ trans('adminlte_lang::message.december') }}'
    };

    var _monthNames = ['{{ trans('adminlte_lang::message.january') }}',
        '{{ trans('adminlte_lang::message.february') }}',
        '{{ trans('adminlte_lang::message.march') }}',
        '{{ trans('adminlte_lang::message.april') }}',
        '{{ trans('adminlte_lang::message.may') }}',
        '{{ trans('adminlte_lang::message.june') }}',
        '{{ trans('adminlte_lang::message.july') }}',
        '{{ trans('adminlte_lang::message.august') }}',
        '{{ trans('adminlte_lang::message.september') }}',
        '{{ trans('adminlte_lang::message.october') }}',
        '{{ trans('adminlte_lang::message.november') }}',
        '{{ trans('adminlte_lang::message.december') }}'
    ];

    var _monthNamesShort = ['{{ trans('adminlte_lang::message.jan') }}',
        '{{ trans('adminlte_lang::message.feb') }}',
        '{{ trans('adminlte_lang::message.mar') }}',
        '{{ trans('adminlte_lang::message.apr') }}',
        '{{ trans('adminlte_lang::message.may') }}',
        '{{ trans('adminlte_lang::message.jun') }}',
        '{{ trans('adminlte_lang::message.jul') }}',
        '{{ trans('adminlte_lang::message.aug') }}',
        '{{ trans('adminlte_lang::message.sep') }}',
        '{{ trans('adminlte_lang::message.oct') }}',
        '{{ trans('adminlte_lang::message.nov') }}',
        '{{ trans('adminlte_lang::message.dec') }}'
    ];

    var _dayNames = ['{{ trans('adminlte_lang::message.sunday') }}',
        '{{ trans('adminlte_lang::message.monday') }}',
        '{{ trans('adminlte_lang::message.tuesday') }}',
        '{{ trans('adminlte_lang::message.thursday') }}',
        '{{ trans('adminlte_lang::message.wednesday') }}',
        '{{ trans('adminlte_lang::message.friday') }}',
        '{{ trans('adminlte_lang::message.saturday') }}'
    ];

    var _dayNamesShort = ['{{ trans('adminlte_lang::message.sun') }}',
        '{{ trans('adminlte_lang::message.mon') }}',
        '{{ trans('adminlte_lang::message.tue') }}',
        '{{ trans('adminlte_lang::message.thu') }}',
        '{{ trans('adminlte_lang::message.wed') }}',
        '{{ trans('adminlte_lang::message.fri') }}',
        '{{ trans('adminlte_lang::message.sat') }}'
    ];

    //BRANCH WORK TIME
    var _min_time = '{{ $workTime != null ?  $workTime->start : '09:00:00'}}';
    var _max_time = '{{ $workTime  != null ?  $workTime->end : '18:00:00' }}';

    var timezone = '{!! $system->timezone !!}';

    function update() {
        var time = moment().tz(timezone).format('- DD-MM-YYYY HH:mm:ss');
        $('#clock').html(time);
    }
    $(function () {
        setInterval(update, 1000);
    });

    var _str = '{!! json_encode($WT, true) !!}';
    var _businessHours = $.parseJSON(_str);

</script>

<script src="{{ asset('/js/search.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/dashboard_graphic.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/patients.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/users.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/company.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/branches.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/employees.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/document.js')}}" type="text/javascript"></script>
<script src="{{ asset('/js/email.js')}}" type="text/javascript"></script>
<script src="{{ asset('/js/defaults.js')}}" type="text/javascript"></script>
<script src="{{ asset('/js/category.js')}}" type="text/javascript"></script>
<script src="{{ asset('/js/secure_agency.js')}}" type="text/javascript"></script>
<script src="{{ asset('/js/secure_comparticipation.js')}}" type="text/javascript"></script>
<script src="{{ asset('/js/consult_type.js')}}" type="text/javascript"></script>
<script src="{{ asset('/js/consult_agenda.js')}}" type="text/javascript"></script>
<script src="{{ asset('/js/system.js')}}" type="text/javascript"></script>
<script src="{{ asset('/js/budget.js')}}" type="text/javascript"></script>
<script src="{{ asset('/js/license.js')}}" type="text/javascript"></script>
<script src="{{ asset('/js/files.js')}}" type="text/javascript"></script>
<script src="{{ asset('/js/consult.js')}}" type="text/javascript"></script>
<script src="{{ asset('/js/procedure_group.js')}}" type="text/javascript"></script>
<script src="{{ asset('/js/procedure.js')}}" type="text/javascript"></script>
<script src="{{ asset('/js/teeth.js')}}" type="text/javascript"></script>


