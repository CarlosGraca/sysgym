<?php $__env->startSection('htmlheader_title'); ?>
	<?php echo e(trans('adminlte_lang::message.procedure_group')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
  <?php echo e(trans('adminlte_lang::message.app_name')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_description'); ?>
  <?php echo e(trans('adminlte_lang::message.procedure_group')); ?>

<?php $__env->stopSection(); ?>


<?php
$status = [trans('adminlte_lang::message.deleted'),trans('adminlte_lang::message.active'),trans('adminlte_lang::message.expired')];
$status_color = ['danger','success','info'];
?>


<?php $__env->startSection('main-content'); ?>
	<div class="row">
	    <div class="col-lg-12">
	        <div class="box box-default">
	            <div class="box-header with-border">
	              <h3 class="box-title"> <?php echo e(trans('adminlte_lang::message.list_procedure_group')); ?> </h3>
	              <div class="pull-left box-tools">
	                  <a href="<?php echo e(url('procedure_group/create')); ?>" data-url="<?php echo e(url('procedure_group/create')); ?>" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.new_procedure_group')); ?>" id="add-procedure_group-modal-older">
	                       <i class="fa fa-plus"></i> <?php echo e(trans('adminlte_lang::message.new_procedure_group')); ?>

	                  </a>

	              </div><!-- /. tools -->
	            </div><!-- /.box-header -->

	            <div class="box-body">
	                <table id="table-procedure_group" class="table table-hover table-design">
		                <thead>
		                  <tr>
		                    
		                    <th class="col-md-4"><?php echo e(trans('adminlte_lang::message.code')); ?></th>
		                    <th class="col-md-7"><?php echo e(trans('adminlte_lang::message.name')); ?></th>
		                    <th class="col-md-1"></th>
		                  </tr>
		                </thead>
		                <tbody class="procedure_group_table">
                          <?php $__currentLoopData = $procedure_group; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <tr data-key="<?php echo e($type->id); ?>" class="bg-<?php echo e($status_color[$type->status]); ?>">
                                    
                                    <td class="name text-center"><?php echo e($type->code); ?></td>
                                    <td class="price"><?php echo e($type->name); ?></td>
                                    <td class="text-center">
                                        <a href="#disable" style="display: <?php echo e($type->status == 1 ? 'initial' : 'none'); ?>;" data-toggle="tooltip" id="disable-procedure_group" title="<?php echo e(trans('adminlte_lang::message.disable')); ?>" data-key="<?php echo e($type->id); ?>" data-name="<?php echo e($type->name); ?>">
                                            <i class="fa fa-user-o"></i>
                                        </a>

                                        <a href="#enable" style="display: <?php echo e($type->status == 0 ? 'initial' : 'none'); ?>;" data-toggle="tooltip" id="enable-procedure_group" title="<?php echo e(trans('adminlte_lang::message.enable')); ?>" data-key="<?php echo e($type->id); ?>" data-name="<?php echo e($type->name); ?>">
                                            <i class="fa fa-user"></i>
                                        </a>
                                        <a href="<?php echo e(route('procedure_group.edit',$type->id)); ?>"  data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.edit')); ?>" id="update-procedure_group">
											<i class="fa fa-edit"></i>
										</a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
		                <tbody>
                    </table>
	            </div>
	        </div>
	    </div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>