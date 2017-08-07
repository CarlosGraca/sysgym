<?php $__env->startSection('htmlheader_title'); ?>
	<?php echo e(trans('adminlte_lang::message.new_matriculation')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
  <?php echo e(trans('adminlte_lang::message.app_name')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_description'); ?>
  <?php echo e(trans('adminlte_lang::message.new_matriculation')); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('main-content'); ?>

	<div class="row">
	    <div class="col-lg-12">
	        <div class="box box-default">
	            <div class="box-header with-border">
	              <h3 class="box-title">
					  <a href="<?php echo e(\Illuminate\Support\Facades\URL::previous()); ?>" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.back')); ?>">
						  <i class="fa fa-arrow-left"></i> <?php echo e(trans('adminlte_lang::message.back')); ?>

					  </a>
	              	 <span><?php echo e(trans('adminlte_lang::message.new_matriculation')); ?></span>
	              </h3>
				<div class="pull-right box-tools">
					
						
					
					<a href="#" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.save')); ?>" id="add-matriculation">
						 <i class="fa fa-save"></i> <?php echo e(trans('adminlte_lang::message.save')); ?>

					</a>

					<a href="#" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.reset')); ?>" id="next-step">
						 <?php echo e(trans('adminlte_lang::message.next')); ?> <i class="fa fa-arrow-right"></i>
					</a>

				</div><!-- /. tools -->

	            </div><!-- /.box-header -->

	            <div class="box-body">
					<?php echo Form::open(['route'=>'matriculation.store', 'id'=>'matriculation-form','files'=>true]); ?>

	                 	<?php echo $__env->make('matriculation.form', ['type'=>'create'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
					<?php echo Form::close(); ?>

				</div>
	        </div>
	    </div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>