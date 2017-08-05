<?php $__env->startSection('htmlheader_title'); ?>
	<?php echo e(trans('adminlte_lang::message.employees')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
  <?php echo e(trans('adminlte_lang::message.app_name')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_description'); ?>
  <?php echo e(trans('adminlte_lang::message.employees')); ?>

<?php $__env->stopSection(); ?>

<?php $EmployeeController = app('App\Http\Controllers\EmployeeController'); ?>
<?php
$status = [trans('adminlte_lang::message.deleted'),trans('adminlte_lang::message.active'),trans('adminlte_lang::message.expired')];
$status_color = ['danger','success','info'];
?>


<?php $__env->startSection('main-content'); ?>
	<div class="row">
	    <div class="col-lg-12">
	        <div class="box box-default">
	            <div class="box-header with-border">
	              <h3 class="box-title"> <?php echo e(trans('adminlte_lang::message.employees_list')); ?></h3>
	              <div class="pull-left box-tools">
                        <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('add_employee')): ?>
                          <a href="<?php echo e(url('employees/create')); ?>" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.new_employee')); ?>">
                               <i class="fa fa-plus"></i> <?php echo e(trans('adminlte_lang::message.new_employee')); ?>

                          </a>
                        <?php endif; ?>
	              </div><!-- /. tools -->
	            </div><!-- /.box-header -->

	            <div class="box-body">
	                <table id="table-employee" class="table table-hover table-design">
		                <thead>
		                  <tr>
		                    
						  	<th class="col-md-2"><?php echo e(trans('adminlte_lang::message.category')); ?></th>
						  	<th class="col-md-2"><?php echo e(trans('adminlte_lang::message.name')); ?></th>
						  	<th class="col-md-2"><?php echo e(trans('adminlte_lang::message.email')); ?></th>
		                    <th class="col-md-2"><?php echo e(trans('adminlte_lang::message.contacts')); ?></th>
                            <th class="col-md-1"><?php echo e(trans('adminlte_lang::message.genre')); ?></th>
		                    <th class="col-md-2"><?php echo e(trans('adminlte_lang::message.address')); ?></th>
		                    <th class="col-md-1"></th>
		                  </tr>
		                </thead>
		                <tbody>
                          <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <tr class="bg-<?php echo e($status_color[$employee->status]); ?>">
									<td><?php echo e($employee->category->name); ?></td>
									<td><a href="#show" data-url="<?php echo e(route('employees.show',$employee->id)); ?>" id="people_show_popup" data-title="<?php echo e(trans('adminlte_lang::message.employee_details')); ?>"><?php echo e($employee->name); ?></a> </td>
									<td><?php echo e($employee->email); ?></td>
                                    <td><?php echo e($employee->mobile); ?> / <?php echo e($employee->phone); ?></td>
                                    <td><?php echo e(trans('adminlte_lang::message.'.$employee->genre)); ?></td>
                                    <td><?php echo e($employee->address); ?></td>
                                    <td>
										<?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('view_employee')): ?>
											<a href="<?php echo e(route('employees.show',$employee->id)); ?>"  data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.show_details')); ?>">
												<i class="fa fa-eye"></i>
											</a>
										<?php endif; ?>

										<?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('edit_employee')): ?>
											<a href="<?php echo e(route('employees.edit',$employee->id)); ?>"  data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.edit')); ?>" id="edit-employee" >
												<i class="fa fa-edit"></i>
                                            </a>
										<?php endif; ?>

                                        <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('build_user_employee')): ?>
                                            <?php if(!$EmployeeController->UserAccountExist($employee->id)): ?>
                                                <a href="#" data-url="<?php echo e(url('build')); ?>/<?php echo e($employee->id); ?>"  data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.build_user')); ?>" id="user-build"  >   <i class="fa fa-gears"></i>
                                                </a>
                                            <?php endif; ?>
                                        <?php endif; ?>

                                        <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('disable_employee')): ?>
                                            <a href="#disable" style="display: <?php echo e($employee->status == 1 ? 'initial' :'none'); ?>;" data-toggle="tooltip" id="disable-employee" title="<?php echo e(trans('adminlte_lang::message.disable')); ?>" data-key="<?php echo e($employee->id); ?>" data-name="<?php echo e($employee->name); ?>">
                                                <i class="fa fa-user-o"></i>
                                            </a>
                                        <?php endif; ?>

                                        <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('enable_employee')): ?>
                                            <a href="#enable" style="display: <?php echo e($employee->status == 0 ? 'initial' :'none'); ?>;" data-toggle="tooltip" id="enable-employee" title="<?php echo e(trans('adminlte_lang::message.enable')); ?>" data-key="<?php echo e($employee->id); ?>" data-name="<?php echo e($employee->name); ?>">
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