<?php $__env->startSection('htmlheader_title'); ?>
	<?php echo e(trans('adminlte_lang::message.update_secure_comparticipation')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
  <?php echo e(trans('adminlte_lang::message.app_name')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_description'); ?>
  <?php echo e(trans('adminlte_lang::message.update_secure_comparticipation')); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('main-content'); ?>

	<div class="row">
	    <div class="col-lg-12">
	        <div class="box box-default">
	            <div class="box-header with-border">
	              <h3 class="box-title">
	              	 <strong><?php echo e(trans('adminlte_lang::message.secure_comparticipation')); ?>: </strong><span><?php echo e($secure_comparticipation->procedure->name); ?></span>
	              </h3>

					<div class="pull-right box-tools">
							<a href="<?php echo e(url('secure_comparticipation')); ?>" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.back')); ?>">
								 <i class="fa  fa-arrow-left"></i>
							</a>

							<a href="#" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="Save" id="edit-secure_comparticipation">
								 <i class="fa fa-save"></i>
							</a>
					</div><!-- /. tools -->
	            </div><!-- /.box-header -->
	            <div class="box-body">
					<?php echo Form::model($secure_comparticipation, ['method'=>'PATCH','route'=>['secure_comparticipation.update', $secure_comparticipation->id],'id'=>'secure_comparticipation-form','files'=>true]); ?>

						<?php echo $__env->make('secure_comparticipation.form', ['type'=>'update','secure_comparticipation'=>$secure_comparticipation], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
					<?php echo Form::close(); ?>

				</div>
	        </div>
	    </div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>