<?php $__env->startSection('htmlheader_title'); ?>
	<?php echo e(trans('adminlte_lang::message.modality')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
  <?php echo e(trans('adminlte_lang::message.app_name')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_description'); ?>
  <?php echo e(trans('adminlte_lang::message.modality')); ?>

<?php $__env->stopSection(); ?>

<?php $Defaults = app('App\Http\Controllers\Defaults'); ?>
<?php
$status = [trans('adminlte_lang::message.deleted'),trans('adminlte_lang::message.active'),trans('adminlte_lang::message.expired')];
$status_color = ['danger','success','info'];
?>


<?php $__env->startSection('main-content'); ?>
	<div class="row">
	    <div class="col-lg-12">
	        <div class="box box-primary">
	            <div class="box-header with-border">
	              <h3 class="box-title"> <?php echo e(trans('adminlte_lang::message.list_modality')); ?> </h3>
	              <div class="pull-left box-tools">
	                  <a href="<?php echo e(url('modalities/create')); ?>" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.new_modality')); ?>">
	                       <i class="fa fa-plus"></i> <?php echo e(trans('adminlte_lang::message.new_modality')); ?>

	                  </a>

	              </div><!-- /. tools -->
	            </div><!-- /.box-header -->

	            <div class="box-body">
	                <table id="table-modality" class="table table-hover table-design">
		                <thead>
		                  <tr>
							  <th class="col-md-7"><?php echo e(trans('adminlte_lang::message.name')); ?></th>
							  <th class="col-md-3 text-center"><?php echo e(trans('adminlte_lang::message.price')); ?></th>
							  <th class="col-md-1 text-center"><?php echo e(trans('adminlte_lang::message.status')); ?></th>
							  <th class="col-md-1"></th>
		                  </tr>
		                </thead>
		                <tbody class="modality_table">
                          <?php $__currentLoopData = $modalities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modality): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <tr data-key="<?php echo e($modality->id); ?>" class="bg-<?php echo e($status_color[$modality->status]); ?>">
                                    <td><?php echo e($modality->name); ?></td>
									<td class="text-center"><?php echo e($Defaults->currency($modality->price)); ?></td>
									<td><span class="label label-<?php echo e($status_color[$modality->status]); ?>"><?php echo e($status[$modality->status]); ?></span></td>
									<td class="text-center">
										<a href="<?php echo e(route('modalities.show',$modality->id)); ?>"  data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.view')); ?>">
											<i class="fa fa-eye"></i>
										</a>
										<a href="<?php echo e(route('modalities.edit',$modality->id)); ?>"  data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.edit')); ?>">
											<i class="fa fa-edit"></i>
										</a>
                                        <a href="#disable" style="display: <?php echo e($modality->status == 1 ? 'initial' : 'none'); ?>;" data-toggle="tooltip" id="disable-modality" title="<?php echo e(trans('adminlte_lang::message.disable')); ?>" data-key="<?php echo e($modality->id); ?>" data-name="<?php echo e($modality->name); ?>">
                                            <i class="fa fa-user-o"></i>
                                        </a>

                                        <a href="#enable" style="display: <?php echo e($modality->status == 0 ? 'initial' : 'none'); ?>;" data-toggle="tooltip" id="enable-modality" title="<?php echo e(trans('adminlte_lang::message.enable')); ?>" data-key="<?php echo e($modality->id); ?>" data-name="<?php echo e($modality->name); ?>">
                                            <i class="fa fa-user"></i>
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