<?php $__env->startSection('htmlheader_title'); ?>
	<?php echo e(trans('adminlte_lang::message.category')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
  <?php echo e(trans('adminlte_lang::message.app_name')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_description'); ?>
  <?php echo e(trans('adminlte_lang::message.category')); ?>

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
	              <h3 class="box-title"><?php echo e(trans('adminlte_lang::message.category_list')); ?></h3>
	              <div class="pull-left box-tools">
					  <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('add_employee_category')): ?>
						  <a href="<?php echo e(url('category/create')); ?>" class="btn btn-primary btn-sm" category="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.new_category')); ?>">
							   <i class="fa fa-plus"></i> <?php echo e(trans('adminlte_lang::message.new_category')); ?>

						  </a>
					  <?php endif; ?>

	              </div><!-- /. tools -->
	            </div><!-- /.box-header -->

	            <div class="box-body">
	                <table id="table-category" class="table table-hover table-design">
		                <thead>
		                  <tr>
		                    
		                    <th class="col-md-8"><?php echo e(trans('adminlte_lang::message.name')); ?></th>
		                    <th class="col-md-2"><?php echo e(trans('adminlte_lang::message.salary_base')); ?></th>
		                    <th class="col-md-1"></th>
		                  </tr>
		                </thead>
		                <tbody>
                          <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
							  <tr data-key="<?php echo e($category->id); ?>" class="bg-<?php echo e($status_color[$category->status]); ?>">
								  
                                    <td><?php echo e($category->name); ?></td>
                                    <td><?php echo e($Defaults->currency($category->salary_base)); ?></td>
                                    <td>
										<?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('view_employee_category')): ?>
										<a href="<?php echo e(route('category.show',$category->id)); ?>"  data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.view')); ?>">
											<i class="fa fa-eye"></i>
										</a>
										<?php endif; ?>

										<?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('edit_employee_category')): ?>
										<a href="<?php echo e(route('category.edit',$category->id)); ?>"  data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.edit')); ?>">
											<i class="fa fa-edit"></i>
										</a>
										<?php endif; ?>

										<?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('disable_employee_category')): ?>
										<a href="#disable" style="display: <?php echo e($category->status == 1 ? 'initial' : 'none'); ?>;" data-toggle="tooltip" id="disable-category" title="<?php echo e(trans('adminlte_lang::message.disable')); ?>" data-key="<?php echo e($category->id); ?>" data-name="<?php echo e($category->name); ?>">
											<i class="fa fa-user-o"></i>
										</a>
										<?php endif; ?>

										<?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('enable_employee_category')): ?>
										<a href="#enable" style="display: <?php echo e($category->status == 0 ? 'initial' : 'none'); ?>;" data-toggle="tooltip" id="enable-category" title="<?php echo e(trans('adminlte_lang::message.enable')); ?>" data-key="<?php echo e($category->id); ?>" data-name="<?php echo e($category->name); ?>">
											<i class="fa fa-user"></i>
										</a>
										<?php endif; ?>
									</td>
                                        
                                            
                                        
                                        
                                            
                                        
                                            
                                            

                                        
                                        
                                            
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