<?php $__env->startSection('htmlheader_title'); ?>
	<?php echo e(trans('adminlte_lang::message.update_menu')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
  <?php echo e(trans('adminlte_lang::message.app_name')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_description'); ?>
  <?php echo e(trans('adminlte_lang::message.update_menu')); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('main-content'); ?>

	<div class="row">

	    <div class="col-lg-12">
	        <div class="box box-default">
	            <div class="box-header with-border">
	              <h3 class="box-title">

					  <a href="<?php echo e(url('menus')); ?>" class="btn btn-primary btn-sm" menu="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.back')); ?>">
						  <i class="fa  fa-arrow-left"></i> <?php echo e(trans('adminlte_lang::message.back')); ?>

					  </a>
	              	 <strong><?php echo e(trans('adminlte_lang::message.update_menu')); ?> </strong><span><?php echo e($menu->title); ?></span>
	              </h3>
					<div class="pull-right box-tools">

						<a href="#" class="btn btn-primary btn-sm" menu="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.save')); ?>" id="update-menu">
							<i class="fa fa-save"></i> <?php echo e(trans('adminlte_lang::message.save')); ?>

						</a>

						<a href="#!" class="btn btn-primary btn-sm" menu="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.edit')); ?>" id="edit-menu-button" style="display: none;">
							<i class="fa fa-edit"></i> <?php echo e(trans('adminlte_lang::message.edit')); ?>

						</a>
					</div><!-- /. tools -->
	            </div><!-- /.box-header -->
	            <div class="box-body">
					<?php echo Form::model($menu, ['method'=>'PATCH','route'=>['menus.update', $menu->id],'id'=>'menu-form','files'=>true]); ?>

						<?php echo $__env->make('menus.form', ['type'=>'update'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
					<?php echo Form::close(); ?>

				</div>
	        </div>

	    </div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>