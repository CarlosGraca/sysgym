<?php $__env->startSection('htmlheader_title'); ?>
	<?php echo e(trans('adminlte_lang::message.secure_agency')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
  <?php echo e(trans('adminlte_lang::message.app_name')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_description'); ?>
  <?php echo e(trans('adminlte_lang::message.secure_agency')); ?>

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
	              <h3 class="box-title"><?php echo e(trans('adminlte_lang::message.secure_agency_list')); ?></h3>
	              <div class="pull-left box-tools">
	                  <a href="<?php echo e(url('secure_agency/create')); ?>" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.new_secure_agency')); ?>">
	                       <i class="fa fa-plus"></i> <?php echo e(trans('adminlte_lang::message.new_secure_agency')); ?>

	                  </a>

	              </div><!-- /. tools -->
	            </div><!-- /.box-header -->

	            <div class="box-body">
	                <table id="table-secure_agency" class="table table-hover table-design">
		                <thead>
		                  <tr>
		                    
		                    <th class="col-md-4"><?php echo e(trans('adminlte_lang::message.name')); ?></th>
		                    <th class="col-md-2"><?php echo e(trans('adminlte_lang::message.email')); ?></th>
		                    <th class="col-md-2"><?php echo e(trans('adminlte_lang::message.contacts')); ?></th>
		                    <th class="col-md-3"><?php echo e(trans('adminlte_lang::message.address')); ?></th>
		                    <th class="col-md-1"></th>
		                  </tr>
		                </thead>
		                <tbody>
                          <?php $__currentLoopData = $secure_agency; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agency): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <tr class="bg-<?php echo e($status_color[$agency->status]); ?>">
                                    
                                    <td><?php echo e($agency->name); ?></td>
                                    <td><?php echo e($agency->email); ?></td>
                                    <td><?php echo e($agency->phone); ?> / <?php echo e($agency->fax); ?></td>
                                    <td><?php echo e($agency->address); ?>, <?php echo e($agency->city); ?>, <?php echo e($agency->island->name); ?></td>
                                    <td>
										<a href="<?php echo e(route('secure_agency.show',$agency->id)); ?>" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.show_details')); ?>" data-remote='false'><i class="fa fa-eye"></i>
										</a>

										<a href="<?php echo e(route('secure_agency.edit',$agency->id)); ?>" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.edit')); ?>" data-remote='false'><i class="fa fa-edit"></i>
										</a>

										<a href="#remove" data-toggle="modal" data-target="#confirmDelete" title="<?php echo e(trans('adminlte_lang::message.disable')); ?>" data-product_id="<?php echo e($agency->id); ?>" data-product_name="<?php echo e($agency->id); ?>">
											<i class="fa fa-user-times"></i>
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