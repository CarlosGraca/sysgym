<div class="input-group input-group-sm" id="field-<?php echo e($name); ?>">
  <?php echo Form::text($name, $value, ['class'=>'form-control','id'=>$name]); ?>

  <span class="input-group-btn">
      <button type="button" class="btn btn-default btn-flat" id="save-<?php echo e($name); ?>"><i class="fa fa-save"></i></button>
  </span>
</div>
<div class="loader-<?php echo e($name); ?>" style="display:none; text-align:center;">
  <img src="<?php echo e(asset('img/gears_32x32.gif')); ?>" />
</div>
