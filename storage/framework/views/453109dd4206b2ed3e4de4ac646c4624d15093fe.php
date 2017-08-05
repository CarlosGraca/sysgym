<?php $__env->startSection('htmlheader_title'); ?>
	<?php echo e(trans('adminlte_lang::message.update_client')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
  <?php echo e(trans('adminlte_lang::message.app_name')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_description'); ?>
  <?php echo e(trans('adminlte_lang::message.update_client')); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('main-content'); ?>

	<div class="row">
	    <div class="col-lg-12">
	        <div class="box box-default">
	            <div class="box-header with-border">
	              <h3 class="box-title">
	              	 <strong><?php echo e(trans('adminlte_lang::message.client')); ?>: </strong><span><?php echo e($client->name); ?></span>
	              </h3>
                    <div class="pull-right box-tools">
                            <a href="<?php echo e(url('clients')); ?>" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.back')); ?>">
                                 <i class="fa  fa-arrow-left"></i>
                            </a>

                            <a href="<?php echo e(route('clients.show',$client->id)); ?>" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.show_details')); ?>")>
                                <i class="fa fa-eye"></i>
                            </a>

                            <a href="#!edit" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.edit')); ?>" id="edit-client-button" style="display: none;">
                                <i class="fa fa-edit"></i>
                            </a>

                            <a href="#!save" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.save')); ?>" id="edit-client">
                                 <i class="fa fa-save"></i>
                            </a>
                    </div><!-- /. tools -->
	            </div><!-- /.box-header -->
	            <div class="box-body">
					<?php echo Form::model($client, ['method'=>'PATCH','route'=>['clients.update', $client->id],'id'=>'client-form','files'=>true]); ?>

						<?php echo $__env->make('clients.form', ['type'=>'update','client'=>$client], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
					<?php echo Form::close(); ?>

				</div>
	        </div>
	    </div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>