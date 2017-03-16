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


<?php $__env->startSection('main-content'); ?>
	<div class="row">
	    <div class="col-lg-12">
	        <div class="box box-default">
	            <div class="box-header with-border">
	              <h3 class="box-title"> <?php echo e(trans('adminlte_lang::message.employees_list')); ?></h3>
	              <div class="pull-left box-tools">
	                  <a href="<?php echo e(url('employees/create')); ?>" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.new_employee')); ?>">
	                       <i class="fa fa-plus"></i> <?php echo e(trans('adminlte_lang::message.new_employee')); ?>

	                  </a>

	              </div><!-- /. tools -->
	            </div><!-- /.box-header -->

	            <div class="box-body">
	                <table id="table-employee" class="table table-bordered table-striped table-design">
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
                                <tr>
                                    
									<td><?php echo e($employee->category->name); ?></td>
									<td><?php echo e($employee->name); ?></td>
                                    <td><?php echo e($employee->email); ?></td>
                                    <td><?php echo e($employee->mobile); ?> / <?php echo e($employee->phone); ?></td>
                                    <td><?php echo e(trans('adminlte_lang::message.'.$employee->genre)); ?></td>
                                    <td><?php echo e($employee->address); ?></td>
                                    <td>
										<a href="<?php echo e(route('employees.show',$employee->id)); ?>"  data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.show_details')); ?>" data-remote='false'])><i class="fa fa-eye"></i>
										</a>

										<a href="<?php echo e(route('employees.edit',$employee->id)); ?>"  data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.edit')); ?>" >   <i class="fa fa-edit"></i>
                                            </a>
										<?php if(!$EmployeeController->UserAccountExist($employee->id)): ?>
											<a href="#" data-url="<?php echo e(url('build')); ?>/<?php echo e($employee->id); ?>"  data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.build_user')); ?>" id="user-build"  >   <i class="fa fa-gears"></i>
											</a>
										<?php endif; ?>

										<a href="#" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.disable')); ?>" data-product_id="<?php echo e($employee->id); ?>" data-product_name="<?php echo e($employee->id); ?>">
											<i class="fa fa-user-times"></i>
										</a>

                                        <!--
                                            <a href="<?php echo e(url('tests/pdf/')); ?>/<?php echo e($employee->id); ?>" target="_blank" class="btn btn-primary btn-xs", data-toggle="tooltip" title="Pdf" ])>   <i class="fa fa-file-pdf-o"></i>
                                            </a>

                                        <a href="<?php echo e(route('employees.edit',$employee->id)); ?>" class="btn btn-primary btn-xs", data-toggle="tooltip" title="Email" data-remote='true'])>   <i class="fa fa-send"></i>
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