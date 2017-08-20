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
                /*background: url('<?php echo e(asset( \Auth::user()->branch->system->background_image )); ?>') no-repeat center center fixed;*/
                 background: white;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
            }
            .layout-boxed {
                 background: white;
            }
        </style>
    <?php echo $__env->yieldSection(); ?>

    <body class="layout-boxed content-wrapper-login  <?php echo $__env->yieldContent('invoice-body-class',''); ?>">
        <!-- Main content -->
        
            <!-- Portfolio Item Heading -->

            <!-- /.row -->
            <!-- Your Page Content Here -->



        <section class="invoice no-border no-padding" style="background-color: rgba(110,255,110,0);">
                <?php echo $__env->yieldContent('main-content'); ?>
                
        </section>



        <section class="invoice col-lg-3 col-md-3 col-sm-3 col-xs-12 pull-right text-center" style="position:fixed; top: 0; right: -25px; border-radius: 5px;background: transparent;border: 0;">
            <div class="no-print">
                
                
                
                
                
                    
                    <a href="#" id="print-page" onclick="window.print();" class="btn btn-default btn-sm" style="margin-right: 5px;"><i class="fa fa-print"></i> Print</a>
                    <a href="#" id="btn-download" type='invoice' class="btn btn-default btn-sm" style="margin-right: 5px;"><i class="fa fa-cloud-download"></i> Download</a>
                    <a href="#" id="btn-email" class="btn btn-default btn-sm" style="margin-right: 5px;"><i class="fa fa-envelope"></i> Email</a>
                
            </div>
        </section>
            
                
                        
                            
                        
                    
                            
                        
                
            
        

        <div class="loader" style="display:none; position:fixed; right:0; bottom:0; top: 0;">
            <img src="<?php echo e(asset('img/gears.gif')); ?>" />
        </div>

    <?php $__env->startSection('scripts'); ?>
        <?php echo $__env->make('layouts.partials.scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->yieldSection(); ?>
    </body>
</html>
