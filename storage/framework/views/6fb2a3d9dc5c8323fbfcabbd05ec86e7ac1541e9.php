<?php $system = \App\System::all()->first(); ?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en" class="report">

    <?php $__env->startSection('htmlheader'); ?>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <?php echo $__env->make('layouts.partials.htmlheader', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <style>
            .content-wrapper-login {
                background: url('<?php echo e(asset( $system->background_image )); ?>') no-repeat center center fixed;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
            }
        </style>
    <?php echo $__env->yieldSection(); ?>

    <body class="layout-boxed content-wrapper-login">
        <!-- Main content -->
        <div class="container">
            <!-- Portfolio Item Heading -->


            <!-- /.row -->
            <!-- Your Page Content Here -->

            <?php echo $__env->yieldContent('main-content'); ?>

        </div><!-- /.content -->

        <div class="loader" style="display:none; position:fixed; right:0; bottom:0; top: 0;">
            <img src="<?php echo e(asset('img/gears.gif')); ?>" />
        </div>

    <?php $__env->startSection('scripts'); ?>
        <?php echo $__env->make('layouts.partials.scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->yieldSection(); ?>
    </body>
</html>
