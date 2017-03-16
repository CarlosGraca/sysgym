@yield('main-content')


<!-- SELECT2 PLUGIN -->
<script src="{{ asset('/plugins/select2/select2.full.min.js')}}" type="text/javascript"></script>

<!-- TOASTR PLUGIN -->
<script src="{{asset('/plugins/toastr/toastr.js')}}" type="text/javascript"></script>

<script src="{{ asset('/plugins/jQueryUI/jquery-ui.min.js') }}" type="text/javascript" ></script>

<!-- SCRIPT IN DEVELOPMENT MODE -->
<script src="{{ asset('/js/patients.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/users.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/branches.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/employees.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/document.js')}}" type="text/javascript"></script>
<script src="{{ asset('/js/email.js')}}" type="text/javascript"></script>
<script src="{{ asset('/js/defaults.js')}}" type="text/javascript"></script>
<script src="{{ asset('/js/category.js')}}" type="text/javascript"></script>
<script src="{{ asset('/js/secure_agency.js')}}" type="text/javascript"></script>
<script src="{{ asset('/js/consult_type.js')}}" type="text/javascript"></script>
<script src="{{ asset('/js/consult_agenda.js')}}" type="text/javascript"></script>
<script src="{{ asset('/js/system.js')}}" type="text/javascript"></script>

<script type="text/javascript">
    $(":file").filestyle({
        input: true,
        icon: true,
        buttonName: "btn-primary",
        buttonText: "",
        iconName: "fa fa-camera",
        badge: false,
        placeholder: '{{ trans('adminlte_lang::message.browser_avatar') }}',
    });

    var token = $('meta[name="csrf_token"]').attr('content');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': token
        }
    });

    $('#consult_patient').select2();
    $('#consult_type').select2();
    $('#doctor').select2();
</script>