<?php $__env->startSection('htmlheader_title'); ?>
    <?php echo e(trans('adminlte_lang::message.agenda')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
    <?php echo e(trans('adminlte_lang::message.app_name')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_description'); ?>
    Agenda
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>

    <!-- /.box-body -->
    <div class="box box-primary">
        <div class="box-header with-border">
            <i class="fa fa-calendar"></i>
            <h3 class="box-title"><?php echo e(trans('adminlte_lang::message.consult_calendar')); ?></h3>

            <div class="box-tools">
                <div class="btn-group pull-right">
                    <a href="#" class="btn btn-primary btn-sm " data-toggle="tooltip" id="add-agenda" data-url="<?php echo e(url('consult_agenda/create')); ?>" title="<?php echo e(trans('adminlte_lang::message.consult_agenda')); ?>">
                        <i class="fa fa-calendar-plus-o"></i> <?php echo e(trans('adminlte_lang::message.consult_agenda')); ?>

                    </a>
            
                    <a href="<?php echo e(url('consult_agenda')); ?>" class="btn btn-primary btn-sm" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.consult_list')); ?>" style="display:none;">
                        <i class="fa fa-list"></i>
                    </a>

                </div>
            </div>
        </div>

        <div class="box-body">
            <!-- THE CALENDAR -->
            <div id="calendar" ></div>
        </div>
        <!-- /.box-body -->
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>