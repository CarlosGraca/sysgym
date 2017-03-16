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

<?php $__env->startSection('main-content'); ?>
	<div class="row">
	    <div class="col-lg-12">
	        <div class="box box-default">
	            <div class="box-header with-border">
	              <h3 class="box-title"></h3>
	            </div><!-- /.box-header -->

	            <div class="box-body">
	                <table id="table-users" class="table table-bordered table-striped table-design">
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
                                <tr>
                                    
									<td><?php echo e($user->name); ?></td>
									<td><?php echo e($user->email); ?></td>
									<td> </td>
                                    <td>
                                        <a href="#" class="btn btn-xs btn-warning btn-flat" data-toggle="modal" data-target="#confirmDelete" data-toggle="tooltip" title="Delete" data-product_id="<?php echo e($user->id); ?>" data-product_name="<?php echo e($user->id); ?>">
                                            <i class="fa fa-user-times"></i>
                                        </a>

                                        <a href="#" data-url="<?php echo e(url('reset/password')); ?>/<?php echo e($user->id); ?>" class="btn btn-primary btn-xs" data-toggle="tooltip" title="Reset Password" id="user-reset-password">   <i class="fa fa-repeat"></i>
                                            </a>
									<!--
                                            <a href="<?php echo e(url('tests/pdf/')); ?>/<?php echo e($user->id); ?>" target="_blank" class="btn btn-primary btn-xs", data-toggle="tooltip" title="Pdf" ])>   <i class="fa fa-file-pdf-o"></i>
                                            </a>

                                        <a href="<?php echo e(route('users.edit',$user->id)); ?>" class="btn btn-primary btn-xs", data-toggle="tooltip" title="Email" data-remote='true'])>   <i class="fa fa-send"></i>
                                        </a>
                                            -->
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