<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="box box-success">
        <div class="box-header with-border">
            <i class="fa fa-gears"></i>
            <h3 class="box-title"><?php echo e(trans('adminlte_lang::message.tools_bar')); ?></h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                </button>
            </div>
        </div>
        <div class="box-body">
            <!-- BUTTON ADD ON MODAL -->
            <!--
                <a class="btn btn-app" data-url="<?php echo e(url('clients')); ?>" id="client_add_popup" data-toggle="modal">
                    <i class="fa fa-user-plus"></i> <?php echo e(trans('adminlte_lang::message.client')); ?>

                </a>
                <a class="btn btn-app" data-url="<?php echo e(url('employees/create')); ?>" id="tool_bar_button_employee" data-toggle="modal">
                    <i class="fa fa-user-plus"></i> <?php echo e(trans('adminlte_lang::message.employee')); ?>

                </a>
            -->
            <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('add_client')): ?>
            <!-- START BUTTON INLINE -->
            <a class="btn btn-app" href="<?php echo e(url('clients/create')); ?>" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.new_client')); ?>">
                <i class="fa fa-user-plus"></i> <?php echo e(trans('adminlte_lang::message.client')); ?>

            </a>
            <?php endif; ?>
            <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('add_employee')): ?>
            <a class="btn btn-app" href="<?php echo e(url('employees/create')); ?>"  data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.new_employee')); ?>">
                <i class="fa fa-user-plus"></i> <?php echo e(trans('adminlte_lang::message.employee')); ?>

            </a>
            <!-- END -->
            <?php endif; ?>
            <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('view_agenda_page')): ?>
                <?php if(\Auth::user()->branch_id != 0): ?>
                    <a class="btn btn-app" href="<?php echo e(url('agenda')); ?>">
                        <i class="fa fa-calendar"></i> <?php echo e(trans('adminlte_lang::message.agenda')); ?>

                    </a>
                <?php endif; ?>
            <?php endif; ?>
            <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('view_consult_page')): ?>
            <a class="btn btn-app" href="<?php echo e(url('consult/create')); ?>">
                <i class="fa fa-stethoscope"></i> <?php echo e(trans('adminlte_lang::message.consult')); ?>

            </a>
            <?php endif; ?>
            <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('view_matriculation_page')): ?>
            <a class="btn btn-app" href="<?php echo e(url('matriculation')); ?>">
               <i class="fa fa-file-o"> </i>  <?php echo e(trans('adminlte_lang::message.matriculation')); ?>

            </a>
            <?php endif; ?>
            
            <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('view_payment_page')): ?>
            <a class="btn btn-app" href="<?php echo e(url('payments')); ?>">
                <i class="fa fa-money"></i>  <?php echo e(trans('adminlte_lang::message.payments')); ?>

            </a>
            <?php endif; ?>
            <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('view_cashier_page')): ?>
            <a class="btn btn-app">
                <i class="fa"><img src="<?php echo e(asset('img/icon/caixa-20.png')); ?>"></i>  <?php echo e(trans('adminlte_lang::message.cashier')); ?>

            </a>
            <?php endif; ?>
            <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('view_system_page')): ?>
            <a class="btn btn-app" href="<?php echo e(url('system')); ?>">
                <i class="fa fa-wrench"></i>  <?php echo e(trans('adminlte_lang::message.system')); ?>

            </a>
            <?php endif; ?>

        </div>
        </div>
    </div>

</div>
