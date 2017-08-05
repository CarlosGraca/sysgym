<?php $__env->startSection('htmlheader_title'); ?>
	<?php echo e(trans('adminlte_lang::message.roles')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
  <?php echo e(trans('adminlte_lang::message.app_name')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_description'); ?>
  <?php echo e(trans('adminlte_lang::message.roles')); ?>

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
	              <h3 class="box-title"><?php echo e(trans('adminlte_lang::message.role_list')); ?></h3>
	              <div class="pull-left box-tools">
					  <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('add_role')): ?>
						  <a href="<?php echo e(url('roles/create')); ?>" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.new_role')); ?>">
							   <i class="fa fa-plus"></i> <?php echo e(trans('adminlte_lang::message.new_role')); ?>

						  </a>
					  <?php endif; ?>

	              </div><!-- /. tools -->
	            </div><!-- /.box-header -->

	            <div class="box-body">
	                <table id="table-roles" class="table table-hover table-design">
		                <thead>
		                  <tr>
		                    
		                    <th class="col-md-3"><?php echo e(trans('adminlte_lang::message.name')); ?></th>
		                    <th class="col-md-8"><?php echo e(trans('adminlte_lang::message.description')); ?></th>
		                    <th class="col-md-1"></th>
		                  </tr>
		                </thead>
		                <tbody class="roles_table">
                          <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
							  <tr data-key="<?php echo e($role->id); ?>" class="bg-<?php echo e($status_color[$role->status]); ?>">
							  
                                    <td class="name"><?php echo e($role->name); ?></td>
                                    <td class="price"><?php echo e($role->label); ?></td>
                                    <td>
										<?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('view_role')): ?>
											<a href="<?php echo e(route('roles.show',$role->id)); ?>"  data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.view')); ?>">
												<i class="fa fa-eye"></i>
											</a>
										<?php endif; ?>

										<?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('edit_role')): ?>
											<a href="<?php echo e(route('roles.edit',$role->id)); ?>"  data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.edit')); ?>" id="edit-role">
												<i class="fa fa-edit"></i>
											</a>
										<?php endif; ?>

										<?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('disable_role')): ?>
										<a href="#disable" style="display: <?php echo e($role->status == 1 ? 'initial' : 'none'); ?>;" data-toggle="tooltip" id="disable-role" title="<?php echo e(trans('adminlte_lang::message.disable')); ?>" data-key="<?php echo e($role->id); ?>" data-name="<?php echo e($role->name); ?>">
											<i class="fa fa-user-o"></i>
										</a>
										<?php endif; ?>

										<?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('enable_role')): ?>
										<a href="#enable" style="display: <?php echo e($role->status == 0 ? 'initial' : 'none'); ?>;" data-toggle="tooltip" id="enable-role" title="<?php echo e(trans('adminlte_lang::message.enable')); ?>" data-key="<?php echo e($role->id); ?>" data-name="<?php echo e($role->name); ?>">
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