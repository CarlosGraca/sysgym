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

            <section class="invoice">
                <div class="row no-print">
                    <div class="col-xs-6 pull-left">
                        <img  src="<?php echo e(url('/img/clinic/logo.png')); ?>" class="img-circle" alt="Cinque Terre" style="float: left; width: 30px; height: 30px; margin-right: 10px;  margin-top: -2px;">
                        <h4><?php echo e(\Auth::user()->branch->company->name); ?> - Report</h4>
                    </div>
                    <div class="col-xs-6 pull-right">
                        <a href="#" id="close-page" onclick="window.close();" class="btn btn-default pull-right"><i class="fa fa-close"></i> Close</a>
                        <a href="#" id="print-page" onclick="window.print();" class="btn btn-default pull-right" style="margin-right: 5px;"><i class="fa fa-print"></i> Print</a>
                        <!--
                            <a href="#" id="btn-download" type='tests' class="btn btn-default pull-right" style="margin-right: 5px;"><i class="fa fa-cloud-download"></i> Download</a>
                        -->
                        <a href="#" id="btn-email" class="btn btn-default pull-right" style="margin-right: 5px;"><i class="fa fa-envelope"></i> Email</a>
                    </div>
                </div>
            </section>

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
