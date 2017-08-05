<?php $__env->startSection('htmlheader_title'); ?>
    <?php echo e(trans('adminlte_lang::message.help')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
    <?php echo e(trans('adminlte_lang::message.app_name')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_description'); ?>
    Help Center
<?php $__env->stopSection(); ?>


<?php $__env->startSection('main-content'); ?>
    <div class="row">
        <div class="col-lg-12 col-md-offset-2">
            <form class='search-form col-lg-8' style="margin:0 auto;">
                <div class='input-group'>
                    <input type="text" name="search" class='form-control' placeholder="<?php echo e(trans('adminlte_lang::message.search')); ?>"/>
                    <div class="input-group-btn">
                        <button type="submit" name="submit" class="btn btn-warning btn-flat"><i class="fa fa-search"></i></button>
                    </div>
                </div><!-- /.input-group -->
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="box box-default" style="margin-top:25px; ">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-video-camera"></i> Video Tutorial</h3>
                </div>
                <div class="box-body">
                    <?php echo $__env->make('components.carousel_row', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>