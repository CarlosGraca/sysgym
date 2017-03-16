<?php echo $__env->yieldContent('main-content'); ?>


<!-- SELECT2 PLUGIN -->
<script src="<?php echo e(asset('/plugins/select2/select2.full.min.js')); ?>" type="text/javascript"></script>

<!-- TOASTR PLUGIN -->
<script src="<?php echo e(asset('/plugins/toastr/toastr.js')); ?>" type="text/javascript"></script>

<script src="<?php echo e(asset('/plugins/jQueryUI/jquery-ui.min.js')); ?>" type="text/javascript" ></script>

<!-- SCRIPT IN DEVELOPMENT MODE -->
<script src="<?php echo e(asset('/js/patients.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('/js/users.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('/js/branches.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('/js/employees.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('/js/document.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('/js/email.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('/js/defaults.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('/js/category.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('/js/secure_agency.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('/js/consult_type.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('/js/consult_agenda.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('/js/system.js')); ?>" type="text/javascript"></script>

<script type="text/javascript">
    $(":file").filestyle({
        input: true,
        icon: true,
        buttonName: "btn-primary",
        buttonText: "",
        iconName: "fa fa-camera",
        badge: false,
        placeholder: '<?php echo e(trans('adminlte_lang::message.browser_avatar')); ?>',
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