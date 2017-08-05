<?php $__env->startSection('htmlheader_title'); ?>
	<?php echo e(trans('adminlte_lang::message.branches')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
  <?php echo e(trans('adminlte_lang::message.app_name')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_description'); ?>
  <?php echo e(trans('adminlte_lang::message.branches')); ?>

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
	              <h3 class="box-title"></h3>
	              <div class="pull-left box-tools">
					  <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('add_branch')): ?>
						  <a href="<?php echo e(url('branches/create')); ?>" class="btn btn-primary btn-sm" branch="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.new_branch')); ?>">
							   <i class="fa fa-plus"></i> <?php echo e(trans('adminlte_lang::message.new_branch')); ?>

						  </a>
					  <?php endif; ?>
	              </div><!-- /. tools -->
	            </div><!-- /.box-header -->

	            <div class="box-body">
	                <table id="table-branches" class="table table-hover table-design">
		                <thead>
		                  <tr>
		                    
		                    <th class="col-md-3"><?php echo e(trans('adminlte_lang::message.name')); ?></th>
		                    <th class="col-md-3"><?php echo e(trans('adminlte_lang::message.email')); ?></th>
		                    <th class="col-md-2"><?php echo e(trans('adminlte_lang::message.contacts')); ?></th>
		                    <th class="col-md-3"><?php echo e(trans('adminlte_lang::message.address')); ?></th>
		                    <th class="col-md-1"></th>
		                  </tr>
		                </thead>
		                <tbody>
                          <?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $branch): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <tr class="bg-<?php echo e($status_color[$branch->status]); ?>">
                                    
                                    <td><?php echo e($branch->name); ?></td>
                                    <td><?php echo e($branch->email); ?></td>
                                    <td><?php echo e($branch->phone); ?> / <?php echo e($branch->fax); ?></td>
                                    <td><?php echo e($branch->address); ?>, <?php echo e($branch->city); ?>, <?php echo e($branch->island->name); ?></td>
                                    <td>
										<?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('view_branch')): ?>
										<a href="<?php echo e(route('branches.show',$branch->id)); ?>" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.show_details')); ?>">
											<i class="fa fa-eye"></i>
										</a>
										<?php endif; ?>

										<?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('edit_branch')): ?>
											<a href="<?php echo e(route('branches.edit',$branch->id)); ?>"  data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.edit')); ?>" id="edit-branch">
												<i class="fa fa-edit"></i>
											</a>
										<?php endif; ?>										
										<?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('disable_branch')): ?>
										<a href="#disable" style="display: <?php echo e($branch->status == 1 ? 'initial' : 'none'); ?>;" data-toggle="tooltip" id="disable-branch" title="<?php echo e(trans('adminlte_lang::message.disable')); ?>" data-key="<?php echo e($branch->id); ?>" data-name="<?php echo e($branch->name); ?>">
											<i class="fa fa-user-o"></i>
										</a>
										<?php endif; ?>

										<?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('enable_branch')): ?>
										<a href="#enable" style="display: <?php echo e($branch->status == 0 ? 'initial' : 'none'); ?>;" data-toggle="tooltip" id="enable-branch" title="<?php echo e(trans('adminlte_lang::message.enable')); ?>" data-key="<?php echo e($branch->id); ?>" data-name="<?php echo e($branch->name); ?>">
											<i class="fa fa-user"></i>
										</a>
										<?php endif; ?>
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