<?php
    $system = \App\Models\System::where(['branch_id'=>\Auth::user()->branch_id,'tenant_id'=>\Auth::user()->tenant_id])->first();
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

<!-- First, include the Webcam.js JavaScript Library -->
<script type="text/javascript" src="{{ asset('plugins/webcam/webcam.min.js') }}"></script>

<!-- SCRIPT IN DEVELOPMENT MODE -->

<script type="text/javascript">
    {{--var localName = '{{ count($system) > 0 ? $system->lang : config('app.locale') }}';--}}


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


    $('.table-design').DataTable({
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

    $('#select-2').select2();

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
    var _disable_text = '{{ trans('adminlte_lang::message.disable') }}';

    var timezone = '{!! count($system) > 0 ? $system->timezone : config('app.timezone') !!}';

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

<script src="{{ asset('/js/search.js') }}" type="text/javascript"></script>
{{--<script src="{{ asset('/js/dashboard_graphic.js') }}" type="text/javascript"></script>--}}
<script src="{{ asset('/js/clients.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/users.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/company.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/branches.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/employees.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/defaults.js')}}" type="text/javascript"></script>
<script src="{{ asset('/js/employees_category.js')}}" type="text/javascript"></script>
<script src="{{ asset('/js/system.js')}}" type="text/javascript"></script>
<script src="{{ asset('/js/matriculation.js')}}" type="text/javascript"></script>
{{--<script src="{{ asset('/js/license.js')}}" type="text/javascript"></script>--}}
<script src="{{ asset('/js/files.js')}}" type="text/javascript"></script>
<script src="{{ asset('/js/modalities.js')}}" type="text/javascript"></script>
<script src="{{ asset('/js/payments.js')}}" type="text/javascript"></script>
<script src="{{ asset('/js/roles.js')}}" type="text/javascript"></script>
{{-- <script src="{{ asset('/js/permissions.js')}}" type="text/javascript"></script> --}}
<script src="{{ asset('/js/menus.js')}}" type="text/javascript"></script>
<script src="{{ asset('/js/backups.js')}}" type="text/javascript"></script>
<script src="{{ asset('/js/accounts.js')}}" type="text/javascript"></script>


