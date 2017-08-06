<!-- Main Footer -->
<footer class="main-footer"
        
    
    
    
    

>
    <!-- To the right -->
    <span>
        &copy <?php echo e(date('Y')); ?> - <a href="<?php echo e(url('/')); ?>"><?php echo e(trans('adminlte_lang::message.app_name')); ?></a> - <?php echo e(trans('adminlte_lang::message.copyright')); ?>

    </span>
    <span class="pull-right hidden-xs">
        <?php echo e(trans('adminlte_lang::message.version')); ?>:  <?php echo e(config('app.version')); ?>

    </span>
</footer>