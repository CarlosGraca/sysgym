<?php $__env->startSection('htmlheader_title'); ?>
	<?php echo e(trans('adminlte_lang::message.update_payment')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
  <?php echo e(trans('adminlte_lang::message.app_name')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_description'); ?>
  <?php echo e(trans('adminlte_lang::message.update_payment')); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('main-content'); ?>

	<div class="row">
	    <div class="col-lg-12">
	        <div class="box box-default">
	            <div class="box-header with-border">
	              <h3 class="box-title">
	              	 <strong><?php echo e(trans('adminlte_lang::message.payments')); ?>: </strong><span><?php echo e($payment->matriculation->client->name); ?></span>
	              </h3>
	              <div class="pull-right box-tools">
						<a href="<?php echo e(url('payments')); ?>" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.back')); ?>">
							 <i class="fa  fa-arrow-left"></i>
						</a>

					  <a href="#" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.edit')); ?>" id="edit-payment-button" style="display: none;">
						  <i class="fa fa-edit"></i>
					  </a>

						<a href="#" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.save')); ?>" id="update-payment">
							 <i class="fa fa-save"></i>
						</a>
					</div><!-- /. tools -->
	            </div><!-- /.box-header -->
	            <div class="box-body">
					<?php echo Form::model($payment, ['method'=>'PATCH','route'=>['payments.update', $payment->id],'id'=>'payment-form','files'=>true]); ?>

						<?php echo $__env->make('payments.form', ['type'=>'update','payment'=>$payment], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
					<?php echo Form::close(); ?>

				</div>
	        </div>
	    </div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>