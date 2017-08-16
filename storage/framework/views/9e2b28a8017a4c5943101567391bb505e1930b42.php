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

    

    
    <?php echo $__env->make('dashboard.payments', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    
        
            
            
                
                    
                    
                    
                        
                            
                            
                        
                    
                
                
                    
                        
                    
                
                
                

                
            
            
        
    

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>