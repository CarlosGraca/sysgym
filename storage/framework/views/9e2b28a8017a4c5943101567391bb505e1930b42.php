<?php $__env->startSection('htmlheader_title'); ?>
    <?php echo e(trans('adminlte_lang::message.dashboard')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
    <?php echo e(trans('adminlte_lang::message.app_name')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_description'); ?>
    <?php echo e(trans('adminlte_lang::message.dashboard')); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('main-content'); ?>
    <style>
        .info-box-number{
            font-size: 30px;
        }
    </style>

    <div class="row">

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-users"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text"><?php echo e(trans('adminlte_lang::message.clients_active')); ?></span>
                    <span class="info-box-number"><?php echo e($total_a); ?></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-users"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text"><?php echo e(trans('adminlte_lang::message.clients_inactive')); ?></span>
                    <span class="info-box-number"><?php echo e($total_i); ?></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-gamepad"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text"><?php echo e(trans('adminlte_lang::message.modalities')); ?></span>
                    <span class="info-box-number"><?php echo e($total_m); ?></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-cube"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text"><?php echo e(trans('adminlte_lang::message.matriculation')); ?></span>
                    <span class="info-box-number"> <?php echo e($total_mt); ?></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-money"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text"><?php echo e(trans('adminlte_lang::message.payments')); ?></span>
                    <span class="info-box-number"> <?php echo e($total_p); ?></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

        
            
                

                
                    
                    
                
                
            
            
        
    </div>

    
        
            
            
                
                    
                    
                    
                        
                            
                            
                        
                    
                
                
                    
                        
                    
                
                
                

                
            
            
        
    

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>