<?php $__env->startSection('htmlheader_title'); ?>
	<?php echo e(trans('adminlte_lang::message.license')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
  <?php echo e(trans('adminlte_lang::message.app_name')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_description'); ?>
  <?php echo e(trans('adminlte_lang::message.license')); ?>

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
	              <h3 class="box-title"></h3>
	              <div class="pull-left box-tools">
	                  <a href="<?php echo e(url('license/create')); ?>" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.new_license')); ?>">
	                       <i class="fa fa-plus"></i>
	                  </a>

	              </div><!-- /. tools -->
	            </div><!-- /.box-header -->

	            <div class="box-body">
	                <table id="table-license" class="table table-hover table-design">
		                <thead>
		                  <tr>
		                    
		                    <th class="col-md-4"><?php echo e(trans('adminlte_lang::message.license_to')); ?></th>
							<th class="col-md-4"><?php echo e(trans('adminlte_lang::message.product_key')); ?></th>
							<th class="col-md-2"><?php echo e(trans('adminlte_lang::message.deadline')); ?></th>
							<th class="col-md-1"><?php echo e(trans('adminlte_lang::message.status')); ?></th>
		                    <th class="col-md-1"></th>
		                  </tr>
		                </thead>
		                <tbody>
                          <?php $__currentLoopData = $license; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <tr class="bg-<?php echo e($status_color[$key->status]); ?>">
                                    
                                    <td><?php echo e($key->license_to); ?></td>
									<td><?php echo e($key->product_key); ?></td>
									<td><?php echo e(\Carbon\Carbon::createFromFormat('Y-m-d', $key->deadline)->format('d-m-Y')); ?></td>
									<td style="text-align: center;"> <span class="label label-<?php echo e($status_color[$key->status]); ?>"> <?php echo e($status[$key->status]); ?> </span></td>
									<td>
                                        <button type="button" class="btn btn-xs btn-warning btn-flat" data-toggle="modal" data-target="#confirmDelete" data-toggle="tooltip" title="Delete" data-product_id="<?php echo e($key->id); ?>" data-product_name="<?php echo e($key->id); ?>">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        <a href="<?php echo e(route('license.edit',$key->id)); ?>" class="btn btn-primary btn-xs", data-toggle="tooltip" title="Editar" data-remote='false'])>   <i class="fa fa-edit"></i>
                                            </a>
                                        <!--
                                            <a href="<?php echo e(url('tests/pdf/')); ?>/<?php echo e($key->id); ?>" target="_blank" class="btn btn-primary btn-xs", data-toggle="tooltip" title="Pdf" ])>   <i class="fa fa-file-pdf-o"></i>
                                            </a>

                                        <a href="<?php echo e(route('license.edit',$key->id)); ?>" class="btn btn-primary btn-xs", data-toggle="tooltip" title="Email" data-remote='true'])>   <i class="fa fa-send"></i>
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