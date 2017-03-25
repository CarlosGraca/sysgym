<?php $__env->startSection('htmlheader_title'); ?>
	<?php echo e(trans('adminlte_lang::message.secure_comparticipation')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
  <?php echo e(trans('adminlte_lang::message.app_name')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_description'); ?>
  <?php echo e(trans('adminlte_lang::message.secure_comparticipation')); ?>

<?php $__env->stopSection(); ?>

<?php $Defaults = app('App\Http\Controllers\Defaults'); ?>
<?php
$status = [trans('adminlte_lang::message.deleted'),trans('adminlte_lang::message.active'),trans('adminlte_lang::message.expired')];
$status_color = ['danger','success','info'];
?>

<?php $__env->startSection('main-content'); ?>
	<div class="row">
	    <div class="col-lg-12">
	        <div class="box box-default">
	            <div class="box-header with-border">
	              <h3 class="box-title"></h3>
	              <div class="pull-left box-tools">
	                  <a href="<?php echo e(url('secure_comparticipation/create')); ?>" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.new_secure_comparticipation')); ?>">
	                       <i class="fa fa-plus"></i> <?php echo e(trans('adminlte_lang::message.new_secure_comparticipation')); ?>

	                  </a>

	              </div><!-- /. tools -->
	            </div><!-- /.box-header -->

	            <div class="box-body">
	                <table id="table-secure_comparticipation" class="table table-hover table-design">
		                <thead>
		                  <tr>
		                    
							<th class="col-md-3"><?php echo e(trans('adminlte_lang::message.secure_agency')); ?></th>
							<th class="col-md-1"><?php echo e(trans('adminlte_lang::message.code')); ?></th>
							<th class="col-md-3"><?php echo e(trans('adminlte_lang::message.consult_type')); ?></th>
							<th class="col-md-1"><?php echo e(trans('adminlte_lang::message.max_frequency')); ?></th>
							<th class="col-md-1"><?php echo e(trans('adminlte_lang::message.deadline')); ?></th>
							<th class="col-md-2"><?php echo e(trans('adminlte_lang::message.max_value')); ?></th>
		                    <th class="col-md-1"></th>
		                  </tr>
		                </thead>
		                <tbody>
                          <?php $__currentLoopData = $secure_comparticipation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comparticipation): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <tr data-key="<?php echo e($comparticipation->id); ?>" class="bg-<?php echo e($status_color[$comparticipation->status]); ?>">
									
									<td><?php echo e($comparticipation->secure_agency->name); ?></td>
									<td><?php echo e($comparticipation->code); ?></td>
									<td><?php echo e($comparticipation->procedure->name); ?></td>
									<td><?php echo e($comparticipation->max_frequency); ?></td>
									<td><?php echo e($comparticipation->deadline); ?></td>
                                    <td><?php echo e($Defaults->currency($comparticipation->max_value)); ?></td>
                                    <td>
										<a href="#disable" style="display: <?php echo e($comparticipation->status == 1 ? 'initial' : 'none'); ?>;" data-toggle="tooltip" id="disable-secure_comparticipation" title="<?php echo e(trans('adminlte_lang::message.disable')); ?>" data-key="<?php echo e($comparticipation->id); ?>" data-name="<?php echo e($comparticipation->name); ?>">
											<i class="fa fa-user-o"></i>
										</a>

										<a href="#enable" style="display: <?php echo e($comparticipation->status == 0 ? 'initial' : 'none'); ?>;" data-toggle="tooltip" id="enable-secure_comparticipation" title="<?php echo e(trans('adminlte_lang::message.enable')); ?>" data-key="<?php echo e($comparticipation->id); ?>" data-name="<?php echo e($comparticipation->name); ?>">
											<i class="fa fa-user"></i>
										</a>
										<a href="<?php echo e(route('secure_comparticipation.edit',$comparticipation->id)); ?>"  data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.edit')); ?>" id="update-secure_comparticipation">
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