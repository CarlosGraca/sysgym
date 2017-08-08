<?php $__env->startSection('htmlheader_title'); ?>
	<?php echo e(trans('adminlte_lang::message.update_matriculation')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
  <?php echo e(trans('adminlte_lang::message.app_name')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_description'); ?>
  <?php echo e(trans('adminlte_lang::message.update_matriculation')); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('main-content'); ?>

	<div class="row">
	    <div class="col-lg-12">
	        <div class="box box-default">
	            <div class="box-header with-border">
				  	<h3 class="box-title">
						<a href="<?php echo e(url('matriculation')); ?>" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.back')); ?>">
							<i class="fa  fa-arrow-left"></i> <?php echo e(trans('adminlte_lang::message.back')); ?>

						</a>
					 	<strong><?php echo e(trans('adminlte_lang::message.matriculation')); ?> <?php echo e(trans('adminlte_lang::message.of')); ?> </strong><span><?php echo e($matriculation->client->name); ?></span>
				  	</h3>

					<div class="pull-right box-tools">
						
						<a href="<?php echo e(route('matriculation.show',$matriculation->id)); ?>" class="btn btn-primary btn-sm" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.view')); ?>">
							<i class="fa  fa-eye"></i> <?php echo e(trans('adminlte_lang::message.view')); ?>

						</a>
						<a href="#" class="btn btn-primary btn-sm" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.save')); ?>" id="update-matriculation">
							 <i class="fa fa-save"></i> <?php echo e(trans('adminlte_lang::message.save')); ?>

						</a>
						<a href="#" class="btn btn-primary btn-sm" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.edit')); ?>" id="edit-matriculation-button" style="display: none;">
							<i class="fa fa-edit"></i> <?php echo e(trans('adminlte_lang::message.edit')); ?>

						</a>
					</div><!-- /. tools -->
	            </div><!-- /.box-header -->
	            <div class="box-body">
					<?php echo Form::model($matriculation, ['method'=>'PATCH','route'=>['matriculation.update', $matriculation->id],'id'=>'matriculation-form','files'=>true]); ?>

						<?php echo $__env->make('matriculation.form_edit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
					<?php echo Form::close(); ?>

				</div>
	        </div>
	    </div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>