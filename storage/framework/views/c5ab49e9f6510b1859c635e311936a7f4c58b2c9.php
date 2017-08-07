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

					  
						  <a href="<?php echo e(url('roles/create')); ?>" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.new_role')); ?>">
							   <i class="fa fa-plus"></i> <?php echo e(trans('adminlte_lang::message.new_role')); ?>

						  </a>
					  

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
							  <tr data-key="<?php echo e($role->id); ?>">
							  
                                    <td><?php echo e($role->display_name); ?></td>
                                    <td><?php echo e($role->description); ?></td>

                                    <td>
										
											<a href="<?php echo e(route('roles.show',$role->id)); ?>"  data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.view')); ?>">
												<i class="fa fa-eye"></i>
											</a>
										


											<a href="<?php echo e(route('roles.edit',$role->id)); ?>"  data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.edit')); ?>" id="edit-role">
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