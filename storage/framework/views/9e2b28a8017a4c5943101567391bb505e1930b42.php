<?php $__env->startSection('htmlheader_title'); ?>
    <?php echo e(trans('adminlte_lang::message.dashboard')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
    <?php echo e(trans('adminlte_lang::message.app_name')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_description'); ?>
    <?php echo e(trans('adminlte_lang::message.dashboard')); ?>

<?php $__env->stopSection(); ?>

<?php $Defaults = app('App\Http\Controllers\Defaults'); ?>

<?php $__env->startSection('main-content'); ?>
    <style>
        .info-box-number{
            font-size: 30px;
        }
    </style>

    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li >
                 <a href="#clients" data-toggle="tab"><i class="fa fa-users"></i> <?php echo e(trans('adminlte_lang::message.clients')); ?></a>
            </li>
            <li class="active">
                <a href="#payments" data-toggle="tab"><i class="fa fa-money"></i> <?php echo e(trans('adminlte_lang::message.payments')); ?></a>
            </li>
        </ul>
        <div class="tab-content">
            <!-- profile -->
            <div class="tab-pane " id="clients">
               <?php echo $__env->make('dashboard.clients', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
            </div>
             <!-- Reset Password -->
            <div class="tab-pane active" id="payments">
               <?php echo $__env->make('dashboard.payments', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
        </div>
    </div>

 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>