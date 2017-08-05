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
	              	 <strong><?php echo e(trans('adminlte_lang::message.system_user')); ?>: </strong><span><?php echo e(Auth::user()->name); ?></span>
	              </h3>
				<div class="pull-right box-tools">
						<a href="<?php echo e(\Illuminate\Support\Facades\URL::previous()); ?>" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.back')); ?>">
							 <i class="fa fa-arrow-left"></i>
						</a>

						<a href="#" data-url="<?php echo e(url('clients/create')); ?>" data-title="<?php echo e(trans('adminlte_lang::message.new_client')); ?>" class="btn btn-primary btn-sm"  data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.new_client')); ?>" id="client_add_popup">
							<i class="fa fa-user-plus"></i>
						</a>

						<a href="#" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.reset')); ?>" id="reset-matriculation">
							<i class="fa fa-repeat"></i>
						</a>

						<a href="#" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.save')); ?>" id="add-matriculation">
							 <i class="fa fa-save"></i>
						</a>

						<a href="#" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.public_matriculation')); ?>" id="publish-matriculation" data-key="" data-name="">
							<i class="fa fa-check"></i>
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