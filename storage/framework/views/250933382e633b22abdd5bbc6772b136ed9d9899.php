<div id='alert-box' class="alert alert-danger"
    
    <?php echo $errors->any() ? '' : "style='display: none'"; ?>

    >
    <b>Ops...</b>
    <ul>
        <?php if($errors->any()): ?>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        <?php endif; ?>
    </ul>
</div>

<?php if(Session::has('flash_message')): ?>
    <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <?php echo e(Session::get('flash_message')); ?>

    </div>
<?php elseif(Session::has('flash_message_error')): ?>
    <div id='alert-box' class="alert alert-danger">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <b>Ops...</b>
        Incorrect current password
        
    </div>
<?php endif; ?>