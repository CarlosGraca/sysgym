<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="<?php echo e(\Auth::guest() ? config('app.locale') : \Auth::user()->branch->system->lang); ?>" class="report">

    <?php $__env->startSection('htmlheader'); ?>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <?php echo $__env->make('layouts.partials.htmlheader', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <!-- Normalize or reset CSS with your favorite library -->
        <link rel="stylesheet" href="<?php echo e(asset('/plugins/normalize/css/normalize.css')); ?>">

        <!-- Load paper.css for happy printing -->
        <link rel="stylesheet" href="<?php echo e(asset('/plugins/paper/css/paper.css')); ?>">

        <style>
            .content-wrapper-login {
                background: url('<?php echo e(asset( \Auth::user()->branch->system->background_image )); ?>') no-repeat center center fixed;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
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

        <section class="invoice col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-right text-center" style="position:fixed; bottom: 0; right: 0; border-radius: 5px;">
            <div class="no-print">
                
                
                
                
                
                    <a href="#" id="close-page" onclick="window.close();" class="btn btn-default" style="margin-right: 5px;"  data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.close')); ?>" ><i class="fa fa-close"></i> <?php echo e(trans('adminlte_lang::message.close')); ?></a>
                    <a href="#" id="print-page" onclick="window.print();" class="btn btn-default" style="margin-right: 5px;"  data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.print')); ?>" ><i class="fa fa-print"></i> <?php echo e(trans('adminlte_lang::message.print')); ?></a>
                    <a href="#" id="btn-download" type='invoice' class="btn btn-default" style="margin-right: 5px;"  data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.download')); ?>" ><i class="fa fa-cloud-download"></i> <?php echo e(trans('adminlte_lang::message.download')); ?></a>
                    <a href="#" id="btn-email" class="btn btn-default" style="margin-right: 5px;"  data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.email')); ?>" ><i class="fa fa-envelope"></i> <?php echo e(trans('adminlte_lang::message.email')); ?></a>
                
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
