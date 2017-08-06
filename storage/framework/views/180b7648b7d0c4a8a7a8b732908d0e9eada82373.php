<?php $__env->startSection('htmlheader_title'); ?>
    <?php echo e(trans('adminlte_lang::message.pagenotfound')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
    <?php echo e(trans('adminlte_lang::message.404error')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('$contentheader_description'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>

<div class="row" style="margin-top: 25px; ">
    <div class="col-lg-12">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <img  src="<?php echo e(url('/img/clinic/logo.png')); ?>" class="img-circle" alt="Cinque Terre"
                          style="float: left; width: 30px; height: 30px; margin: 5px 10px 0 0;">
                    <a href="<?php echo e(url('/')); ?>" style="float:right; margin: 10px 0;">
                        <?php echo e(config('app.name')); ?>

                    </a>
                </h3>
            </div>
            <div class="box-body">
                <div class="error-page">
                    <h2 class="headline text-yellow"> 404</h2>
                    <div class="error-content">
                        <h3><i class="fa fa-warning text-yellow"></i> Oops! <?php echo e(trans('adminlte_lang::message.pagenotfound')); ?>.</h3>
                        <p>
                            <?php echo e(trans('adminlte_lang::message.notfindpage')); ?>

                            <?php echo e(trans('adminlte_lang::message.mainwhile')); ?> <a href='<?php echo e(url('/home')); ?>'><?php echo e(trans('adminlte_lang::message.returndashboard')); ?></a> <?php echo e(trans('adminlte_lang::message.usingsearch')); ?>

                        </p>
                        <form class='search-form'>
                            <div class='input-group'>
                                <input type="text" name="search" class='form-control' placeholder="<?php echo e(trans('adminlte_lang::message.search')); ?>"/>
                                <div class="input-group-btn">
                                    <button type="submit" name="submit" class="btn btn-warning btn-flat"><i class="fa fa-search"></i></button>
                                </div>
                            </div><!-- /.input-group -->
                        </form>
                    </div><!-- /.error-content -->
                </div><!-- /.error-page -->

            </div>
            <div class="box-footer">
                 <span>
                    &copy <?php echo e(date('Y')); ?> - <a href="<?php echo e(url('/')); ?>"><?php echo e(trans('adminlte_lang::message.app_name')); ?></a> - <?php echo e(trans('adminlte_lang::message.copyright')); ?>

                </span>
                <span class="pull-right hidden-xs">
                    <?php echo e(trans('adminlte_lang::message.version')); ?>:  <?php echo e(config('app.version')); ?>

                </span>
            </div>

        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>