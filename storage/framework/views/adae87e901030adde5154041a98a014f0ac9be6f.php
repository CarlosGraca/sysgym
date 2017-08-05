<div class="input-group input-group-sm" id="field-<?php echo e($name); ?>">
    <?php if($type == 'text'): ?>
        <?php echo Form::text($name, $value, ['class'=>'form-control','id'=>$name,'placeholder'=>$placeholder]); ?>

    <?php elseif($type == 'number'): ?>
        <?php echo Form::number($name, $value, ['class'=>'form-control','id'=>$name,'placeholder'=>$placeholder]); ?>

    <?php elseif($type == 'email'): ?>
        <?php echo Form::email($name, $value, ['class'=>'form-control','id'=>$name]); ?>

    <?php elseif($type == 'select'): ?>
        <?php echo Form::select($name, $value, $selected , ['class'=>'form-control','id'=>$name,'placeholder'=>$placeholder]); ?>

    <?php endif; ?>
    <span class="input-group-btn">
          <button type="button" class="btn btn-default btn-flat" id="save-<?php echo e($name); ?>" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.save')); ?>"><i class="fa fa-save"></i></button>
    </span>
</div>

<div class="loader-<?php echo e($name); ?>" style="display:none; text-align:center;">
    <img src="<?php echo e(asset('img/gears_32x32.gif')); ?>" />
</div>