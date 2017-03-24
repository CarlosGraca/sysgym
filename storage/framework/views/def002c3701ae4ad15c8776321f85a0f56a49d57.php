<?php $__env->startSection('htmlheader_title'); ?>
	<?php echo e(trans('adminlte_lang::message.users')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
  <?php echo e(trans('adminlte_lang::message.app_name')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_description'); ?>
  <?php echo e(trans('adminlte_lang::message.users')); ?>

<?php $__env->stopSection(); ?>

<?php $CategoryController = app('App\Http\Controllers\CategoryController'); ?>
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
	            </div><!-- /.box-header -->

	            <div class="box-body">
	                <table id="table-users" class="table table-hover table-design">
		                <thead>
		                  <tr>
		                    
							  <th class="col-md-4"><?php echo e(trans('adminlte_lang::message.name')); ?></th>
							  <th class="col-md-4"><?php echo e(trans('adminlte_lang::message.email')); ?></th>
							  <th class="col-md-3"><?php echo e(trans('adminlte_lang::message.role')); ?></th>
		                    <th class="col-md-1"></th>
		                  </tr>
		                </thead>
		                <tbody>
                          <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <tr class="bg-<?php echo e($status_color[$user->status]); ?> ">
                                    
									<td><?php echo e($user->name); ?></td>
									<td><?php echo e($user->email); ?></td>
									<td> </td>
                                    <td>
										<a href="#disable" style="display: <?php echo e($user->status == 1 ? 'initial' :'none'); ?>;" data-toggle="tooltip" id="disable-user" title="<?php echo e(trans('adminlte_lang::message.disable')); ?>" data-key="<?php echo e($user->id); ?>" data-name="<?php echo e($user->name); ?>">
											<i class="fa fa-user-o"></i>
										</a>

										<a href="#enable" style="display: <?php echo e($user->status == 0 ? 'initial' :'none'); ?>;" data-toggle="tooltip" id="enable-user" title="<?php echo e(trans('adminlte_lang::message.enable')); ?>" data-key="<?php echo e($user->id); ?>" data-name="<?php echo e($user->name); ?>">
											<i class="fa fa-user"></i>
										</a>

                                        <a href="#" data-url="<?php echo e(url('reset/password')); ?>/<?php echo e($user->id); ?>" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.reset_password')); ?>" id="user-reset-password">
                                            <i class="fa fa-repeat"></i>
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