<?php $__env->startSection('htmlheader_title'); ?>
  <?php echo e(trans('adminlte_lang::message.login')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<body class="hold-transition lockscreen content-wrapper-login">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    <a href="<?php echo e(url('#')); ?>"><b>Sys</b>Gym</a>
  </div>

  <?php if( session('error') ): ?>
    <div class="alert alert-danger alert-dismissible" role="info">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong><i class="fa fa-close"></i></strong>
      
      <?php echo e(session('error')); ?>

    </div>
  <?php endif; ?>

  <!-- User name -->
  <div class="lockscreen-name"><?php echo e(\Auth::user()->name); ?></div>

  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    <!-- lockscreen image -->
    <div class="lockscreen-image">
      <img src="<?php echo e(asset(\Auth::user()->avatar)); ?>" alt="User Image">
    </div>
    <!-- /.lockscreen-image -->

    <!-- lockscreen credentials (contains the form) -->
    <form class="lockscreen-credentials" method="post" action="<?php echo e(url('/lockscreen')); ?>">
      <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
      <div class="input-group">
        <input type="password" name="password" id="password" class="form-control" placeholder="<?php echo e(trans('adminlte_lang::message.password')); ?>" required>

        <div class="input-group-btn">
          <button type="submit" class="btn"><i class="fa fa-arrow-right text-muted"></i></button>
        </div>
      </div>
    </form>
    <!-- /.lockscreen credentials -->


  </div>

  <!-- /.lockscreen-item -->
  <div class="help-block text-center">
    <?php echo e(trans('adminlte_lang::message.lockscreen_entrer_password')); ?>

  </div>
  <div class="text-center">
    <a href="<?php echo e(url('/login')); ?>"> <?php echo e(trans('adminlte_lang::message.lockscreen_sign_in')); ?></a>
  </div>
  <div class="lockscreen-footer text-center">
    Copyright &copy; <?php echo e(date('Y')); ?> <b><a href="<?php echo e(url('/')); ?>" class="text-black"><?php echo e(config('app.name')); ?></a></b><br>
    <?php echo e(trans('adminlte_lang::message.copyright')); ?>

  </div>
</div>
<!-- /.center -->
<?php echo $__env->make('layouts.partials.scripts_auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>

</body>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>