<?php $__env->startSection('htmlheader_title'); ?>
    <?php echo e(trans('adminlte_lang::message.update_system')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
    <?php echo e(trans('adminlte_lang::message.app_name')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_description'); ?>
    <?php echo e(trans('adminlte_lang::message.update_system')); ?>

<?php $__env->stopSection(); ?>
<?php $Defaults = app('App\Http\Controllers\Defaults'); ?>

<?php $__env->startSection('main-content'); ?>

    <div class="row">
        <div class="col-lg-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        <a href="<?php echo e(url('system')); ?>" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.back')); ?>">
                            <i class="fa  fa-arrow-left"></i> <?php echo e(trans('adminlte_lang::message.back')); ?>

                        </a>
                        <strong><?php echo e(trans('adminlte_lang::message.update_system')); ?> </strong><span><?php echo e($system->name); ?></span>
                    </h3>

                    <!-- /. tools -->

                    <div class="pull-right box-tools">

                        <a href="#!" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.save')); ?>" id="update-system">
                            <i class="fa fa-save"></i> <?php echo e(trans('adminlte_lang::message.save')); ?>

                        </a>
                        <a href="#!" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.edit')); ?>" id="edit-system-button" style="display: none;">
                            <i class="fa fa-edit"></i> <?php echo e(trans('adminlte_lang::message.edit')); ?>

                        </a>
                    </div><!-- /. tools -->
                </div><!-- /.box-header -->

                <div class="box-body">
                    <?php echo Form::model($system, ['method'=>'PATCH','route'=>['system.update', $system->id],'id'=>'system-form','files'=>true]); ?>

                         <?php echo $__env->make('system.form', ['type'=>'update','form'=>'system'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>


	
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>