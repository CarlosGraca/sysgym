<?php $__env->startSection('htmlheader_title'); ?>
	<?php echo e(trans('adminlte_lang::message.update_procedure_group')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
  <?php echo e(trans('adminlte_lang::message.app_name')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_description'); ?>
  <?php echo e(trans('adminlte_lang::message.update_procedure_group')); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('main-content'); ?>

	<div class="row">
	    <div class="col-lg-12">
	        <div class="box box-default">
	            <div class="box-header with-border">
				  	<h3 class="box-title">
					 	<strong><?php echo e(trans('adminlte_lang::message.procedure_group')); ?>: </strong><span><?php echo e($procedure_group->name); ?></span>
				  	</h3>

					<div class="pull-right box-tools">
						<a href="<?php echo e(url('procedure_group')); ?>" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.back')); ?>">
							 <i class="fa  fa-arrow-left"></i>
						</a>

						<a href="#" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="Save" id="edit-procedure_group">
							 <i class="fa fa-save"></i>
						</a>

						<a href="#!" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.edit')); ?>" id="edit-procedure_group-button" style="display: none;">
							<i class="fa fa-edit"></i>
						</a>
					</div><!-- /. tools -->
	            </div><!-- /.box-header -->
	            <div class="box-body">
					<?php echo Form::model($procedure_group, ['method'=>'PATCH','route'=>['procedure_group.update', $procedure_group->id],'id'=>'procedure_group-form','files'=>true]); ?>

						<?php echo $__env->make('procedure_group.form', ['type'=>'update','procedure_group'=>$procedure_group], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
					<?php echo Form::close(); ?>

				</div>
	        </div>
	    </div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>