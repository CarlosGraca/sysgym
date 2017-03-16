<?php $__env->startSection('htmlheader_title'); ?>
	<?php echo e(trans('adminlte_lang::message.new_patient')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
  <?php echo e(trans('adminlte_lang::message.app_name')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_description'); ?>
  <?php echo e(trans('adminlte_lang::message.new_patient')); ?>

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
                    <a href="<?php echo e(url('campaign_messages')); ?>" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="Voltar">
                         <i class="fa  fa-arrow-left"></i>
                    </a>

                    <a href="#" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="Save" id="add-campaign_message">
                         <i class="fa fa-save"></i>
                    </a>
                </div><!-- /. tools -->
			</div><!-- /.box-header -->
		</div>
	</div>
</div>

<div class="row">
	<div class="box-body">
		<?php echo Form::open(['route'=>'campaign_messages.store', 'id'=>'category-form','files'=>true]); ?>

		<?php echo $__env->make('campaign_messages.form', ['type'=>'create'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php echo Form::close(); ?>

	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>