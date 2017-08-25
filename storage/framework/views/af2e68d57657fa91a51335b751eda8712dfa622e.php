<?php $__env->startSection('htmlheader_title'); ?>
	<?php echo e(trans('adminlte_lang::message.permissions')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
  <?php echo e(trans('adminlte_lang::message.app_name')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_description'); ?>
  <?php echo e(trans('adminlte_lang::message.permissions')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
	<div class="row">
	    <div class="col-lg-12">
	        <div class="box box-primary">
	            <div class="box-header with-border">
	              <h3 class="box-title"><?php echo e(trans('adminlte_lang::message.permission_list')); ?></h3>
	              <div class="pull-left box-tools">
	                  <a href="<?php echo e(url('permissions/create')); ?>" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.new_permission')); ?>">
	                       <i class="fa fa-plus"></i> <?php echo e(trans('adminlte_lang::message.new_permission')); ?>

	                  </a>

	              </div><!-- /. tools -->
	            </div><!-- /.box-header -->

	            <div class="box-body">
	                <table id="table-permissions" class="table-design display" cellspacing="0" width="100%">
		                <thead>
		                  <tr>
		                    
		                    <th class=""><?php echo e(trans('adminlte_lang::message.title')); ?></th>
		                    <th class=""><?php echo e(trans('adminlte_lang::message.type')); ?></th>
		                    <th class=""><?php echo e(trans('adminlte_lang::message.role')); ?></th>
		                    <th class=""></th>
		                  </tr>
		                </thead>
		                <tbody class="permissions_table">
                          <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
							  <?php if($permission->tenant_menu->tenant_id === \Auth::user()->tenant_id ): ?>
                                <tr data-key="<?php echo e($permission->id); ?>">
                                    
                                    <td><?php echo e($permission->tenant_menu->menus->title); ?></td>
                                    <td><?php echo e($permission->type); ?></td>
                                    <td><?php echo e($permission->role->display_name); ?></td>
                                    <td>
										<a href="#disable" style="display: <?php echo e($permission->status == 1 ? 'initial' : 'none'); ?>;" data-toggle="tooltip" id="disable-permission" title="<?php echo e(trans('adminlte_lang::message.disable')); ?>" data-key="<?php echo e($permission->id); ?>" data-name="<?php echo e($permission->name); ?>">
											<i class="fa fa-user-o"></i>
										</a>

										<a href="#enable" style="display: <?php echo e($permission->status == 0 ? 'initial' : 'none'); ?>;" data-toggle="tooltip" id="enable-permission" title="<?php echo e(trans('adminlte_lang::message.enable')); ?>" data-key="<?php echo e($permission->id); ?>" data-name="<?php echo e($permission->name); ?>">
											<i class="fa fa-user"></i>
										</a>
										<a href="<?php echo e(route('permissions.edit',$permission->id)); ?>"  data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.edit')); ?>">
											<i class="fa fa-edit"></i>
										</a>
                                    </td>
                                </tr>
							  <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
		                <tbody>
                    </table>
	            </div>
	        </div>
	    </div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>