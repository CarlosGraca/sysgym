<?php $__env->startSection('htmlheader_title'); ?>
	Dominio
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
  <?php echo e(trans('adminlte_lang::message.app_name')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_description'); ?>
  Novo
<?php $__env->stopSection(); ?>


<?php $__env->startSection('main-content'); ?>
    
	<div class="row">
	    <div class="col-lg-12">
	        <div class="box box-default">
	            <div class="box-header with-border">
	              <h3 class="box-title">
	              	 
	              </h3>
	              
				  <div class="pull-right box-tools">
							<a href="<?php echo e(url('domains')); ?>" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="Voltar">
								 <i class="fa  fa-arrow-left"></i>
							</a>
					</div><!-- /. tools -->
	            </div><!-- /.box-header -->

	            <div class="box-body">
	                <?php echo Form::open(['route'=>'domains.store', 'id'=>'domains-form','files'=>true]); ?>

	                    <?php echo e(csrf_field()); ?>

					    <?php echo $__env->make('domains.form', array('submitButtonText'=>'Gravar'), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
					<?php echo Form::close(); ?>

	            </div>
	        </div>
	    </div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>