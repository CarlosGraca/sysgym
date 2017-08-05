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
					 	<strong><?php echo e(trans('adminlte_lang::message.matriculation')); ?> <?php echo e(trans('adminlte_lang::message.of')); ?>: </strong><span><?php echo e($matriculation->client->name); ?></span>
				  	</h3>

					<div class="pull-right box-tools">
						<a href="<?php echo e(url('matriculation')); ?>" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.back')); ?>">
							 <i class="fa  fa-arrow-left"></i>
						</a>
						<?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('view_matriculation')): ?>
						<a href="<?php echo e(route('matriculation.show',$matriculation->id)); ?>" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.view')); ?>">
							<i class="fa  fa-eye"></i>
						</a>
						<?php endif; ?>
						<?php if($matriculation->status == 1): ?>
							
							<a href="#" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.save')); ?>" id="update-matriculation">
								 <i class="fa fa-save"></i>
							</a>
							
							
							<a href="#" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.edit')); ?>" id="edit-matriculation-button" style="display: none;">
								<i class="fa fa-edit"></i>
							</a>
							
							<?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('publish_matriculation')): ?>
							<a href="#" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.publish_matriculation')); ?>" id="publish-matriculation" data-key="<?php echo e($matriculation->id); ?>" data-name="<?php echo e(trans('adminlte_lang::message.of').' '.$matriculation->client->name); ?>">
								<i class="fa fa-check"></i>
							</a>
							<?php endif; ?>
						<?php endif; ?>

						
							
							
								
							
							
							
							
								
							
							
						

					</div><!-- /. tools -->
	            </div><!-- /.box-header -->
	            <div class="box-body">
					<?php echo Form::model($matriculation, ['method'=>'PATCH','route'=>['matriculation.update', $matriculation->id],'id'=>'matriculation-form','files'=>true]); ?>

						<?php echo $__env->make('matriculation.form', ['type'=>'update','matriculation'=>$matriculation], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
					<?php echo Form::close(); ?>

				</div>
	        </div>
	    </div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>