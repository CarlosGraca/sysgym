<?php $__env->startSection('htmlheader_title'); ?>
	<?php echo e(trans('adminlte_lang::message.new_permission')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
  <?php echo e(trans('adminlte_lang::message.app_name')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_description'); ?>
  <?php echo e(trans('adminlte_lang::message.new_permission')); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('main-content'); ?>

	<div class="row">
	    <div class="col-lg-12">
	        <?php echo Form::open(['route'=>'permissions.store', 'id'=>'permissions-form']); ?>

		        <div class="box box-default">
		            <div class="box-header with-border">
					  <h3 class="box-title">
						<a href="<?php echo e(url('permissions')); ?>" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.back')); ?>">
									 <i class="fa  fa-arrow-left"></i>
								</a>
					  </h3>

						<div class="pull-right box-tools">						
                            <button type="submit" class="btn btn-primary btn-sm" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.save')); ?>" ><i class="fa fa-save"></i></button>
						</div><!-- /. tools -->
		            </div><!-- /.box-header -->

		            <div class="box-body">
						
					  
		                 	<?php echo $__env->make('permissions.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
						
			  		</div>
	             </div>
	        <?php echo Form::close(); ?>

	    </div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>