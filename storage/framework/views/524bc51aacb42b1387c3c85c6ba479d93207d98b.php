<?php 
	//$system = \App\System::all()->first(); 
?>
<!DOCTYPE html>
<html>

<?php echo $__env->make('layouts.partials.htmlheader', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<style>
    .content-wrapper-login {
        background: url('<?php echo e(asset( 'img/background.jpg' )); ?>') no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }
</style>

<?php echo $__env->yieldContent('content'); ?>

</html>