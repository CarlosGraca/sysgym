<?php $__env->startSection('htmlheader_title'); ?>
	<?php echo e(trans('adminlte_lang::message.secure_comparticipation')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
  <?php echo e(trans('adminlte_lang::message.app_name')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_description'); ?>
  <?php echo e(trans('adminlte_lang::message.secure_comparticipation')); ?>

<?php $__env->stopSection(); ?>

<?php $Defaults = app('App\Http\Controllers\Defaults'); ?>

<?php $__env->startSection('main-content'); ?>
	<div class="row">
	    <div class="col-lg-12">
	        <div class="box box-default">
	            <div class="box-header with-border">
	              <h3 class="box-title"></h3>
	              <div class="pull-left box-tools">
	                  <a href="<?php echo e(url('secure_comparticipation/create')); ?>" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.new_secure_comparticipation')); ?>">
	                       <i class="fa fa-plus"></i> <?php echo e(trans('adminlte_lang::message.new_secure_comparticipation')); ?>

	                  </a>

	              </div><!-- /. tools -->
	            </div><!-- /.box-header -->

	            <div class="box-body">
	                <table id="table-secure_comparticipation" class="table table-bordered table-striped table-design">
		                <thead>
		                  <tr>
		                    
							<th class="col-md-3"><?php echo e(trans('adminlte_lang::message.secure_agency')); ?></th>
							<th class="col-md-1"><?php echo e(trans('adminlte_lang::message.code')); ?></th>
							<th class="col-md-3"><?php echo e(trans('adminlte_lang::message.consult_type')); ?></th>
							<th class="col-md-1"><?php echo e(trans('adminlte_lang::message.max_frequency')); ?></th>
							<th class="col-md-1"><?php echo e(trans('adminlte_lang::message.deadline')); ?></th>
							<th class="col-md-2"><?php echo e(trans('adminlte_lang::message.max_value')); ?></th>
		                    <th class="col-md-1"></th>
		                  </tr>
		                </thead>
		                <tbody>
                          <?php $__currentLoopData = $secure_comparticipation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comparticipation): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <tr>
									
									<td><?php echo e($comparticipation->secure_agency->name); ?></td>
									<td><?php echo e($comparticipation->code); ?></td>
									<td><?php echo e($comparticipation->consult_type->name); ?></td>
									<td><?php echo e($comparticipation->max_frequency); ?></td>
									<td><?php echo e($comparticipation->deadline); ?></td>
                                    <td><?php echo e($Defaults->currency($comparticipation->max_value)); ?></td>
                                    <td>
                                        <button type="button" class="btn btn-xs btn-warning btn-flat" data-toggle="modal" data-target="#confirmDelete" data-toggle="tooltip" title="Delete" data-product_id="<?php echo e($comparticipation->id); ?>" data-product_name="<?php echo e($comparticipation->id); ?>">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        <a href="<?php echo e(route('secure_comparticipation.edit',$comparticipation->id)); ?>" class="btn btn-primary btn-xs", data-toggle="tooltip" title="Editar" data-remote='false'])>   <i class="fa fa-edit"></i>
                                            </a>
                                        <!--
                                            <a href="<?php echo e(url('tests/pdf/')); ?>/<?php echo e($comparticipation->id); ?>" target="_blank" class="btn btn-primary btn-xs", data-toggle="tooltip" title="Pdf" ])>   <i class="fa fa-file-pdf-o"></i>
                                            </a>

                                        <a href="<?php echo e(route('secure_comparticipation.edit',$comparticipation->id)); ?>" class="btn btn-primary btn-xs", data-toggle="tooltip" title="Email" data-remote='true'])>   <i class="fa fa-send"></i>
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