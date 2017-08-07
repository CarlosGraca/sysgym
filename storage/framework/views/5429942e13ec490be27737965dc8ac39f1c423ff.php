<?php $__env->startSection('htmlheader_title'); ?>
	<?php echo e(trans('adminlte_lang::message.backups')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
  <?php echo e(trans('adminlte_lang::message.app_name')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_description'); ?>
  <?php echo e(trans('adminlte_lang::message.backups')); ?>

<?php $__env->stopSection(); ?>

<?php
//$status = [trans('adminlte_lang::message.deleted'),trans('adminlte_lang::message.active'),trans('adminlte_lang::message.expired')];
//$status_color = ['danger','success','info'];
?>
<?php $__env->startSection('main-content'); ?>
	<div class="row">
	    <div class="col-lg-12">
	        <div class="box box-default">
	            <div class="box-header with-border">
	              <h3 class="box-title"><?php echo e(trans('adminlte_lang::message.backup_list')); ?></h3>
	              <div class="pull-left box-tools">

                    
                      <a href="#create-backup" id="create-backup" data-url="<?php echo e(url('backups/create')); ?>" class="btn btn-primary btn-sm" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.create_backup')); ?>">
                           <i class="fa fa-cloud"></i> <?php echo e(trans('adminlte_lang::message.create_backup')); ?>

                      </a>
                    

                      <a href="#upload-backup" id="upload-backup" data-url="<?php echo e(url('backups/upload/popup')); ?>" class="btn btn-primary btn-sm" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.upload_backup')); ?>" data-title="<?php echo e(trans('adminlte_lang::message.upload_backup')); ?>">
                          <i class="fa fa-cloud-upload"></i> <?php echo e(trans('adminlte_lang::message.upload_backup')); ?>

                      </a>
                    

	              </div><!-- /. tools -->
	            </div><!-- /.box-header -->

	            <div class="box-body" id="backup-list">
                    <?php echo $__env->make('backup.list',['type'=>'index'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	            </div>
	        </div>
	    </div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>