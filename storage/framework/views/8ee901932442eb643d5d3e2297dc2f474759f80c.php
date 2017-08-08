<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="box box-primary">
        <div class="box-header with-border">
            <i class="fa fa-gears"></i>
            <h3 class="box-title"><?php echo e(trans('adminlte_lang::message.tools_bar')); ?></h3>

            
                
                
                
                
            
        </div>
        <div class="box-body">
            <!-- BUTTON ADD ON MODAL -->
            
            <!-- START BUTTON INLINE -->
            <a class="btn btn-app" href="<?php echo e(url('clients/create')); ?>" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.new_client')); ?>">
                <i class="fa fa-user-plus"></i> <?php echo e(trans('adminlte_lang::message.client')); ?>

            </a>
            

            <a class="btn btn-app" href="<?php echo e(url('employees/create')); ?>"  data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.new_employee')); ?>">
                <i class="fa fa-user-plus"></i> <?php echo e(trans('adminlte_lang::message.employee')); ?>

            </a>

            <a class="btn btn-app" href="<?php echo e(url('modalities')); ?>"  data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.modalities')); ?>">
                <i class="fa fa-gamepad"></i> <?php echo e(trans('adminlte_lang::message.modalities')); ?>

            </a>
            <!-- END -->
            

            <a class="btn btn-app" href="<?php echo e(url('matriculation/create')); ?>" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.matriculation')); ?>">
               <i class="fa fa-cube"> </i>  <?php echo e(trans('adminlte_lang::message.matriculation')); ?>

            </a>
            
            
            
            <a class="btn btn-app" href="<?php echo e(url('payments')); ?>"  data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.payments')); ?>">
                <i class="fa fa-money"></i>  <?php echo e(trans('adminlte_lang::message.payments')); ?>

            </a>
            

            
                
            
            

            <a class="btn btn-app" href="<?php echo e(url('users')); ?>"  data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.users')); ?>">
                <i class="fa fa-users"></i>  <?php echo e(trans('adminlte_lang::message.users')); ?>

            </a>

            <a class="btn btn-app" href="<?php echo e(url('system')); ?>"  data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.system')); ?>">
                <i class="fa fa-wrench"></i>  <?php echo e(trans('adminlte_lang::message.system')); ?>

            </a>
            
        </div>
        </div>
    </div>

</div>
