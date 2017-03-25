<?php $__env->startSection('htmlheader_title'); ?>
	<?php echo e(trans('adminlte_lang::message.teeth')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
  <?php echo e(trans('adminlte_lang::message.app_name')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_description'); ?>
  <?php echo e(trans('adminlte_lang::message.teeth')); ?>

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
	              <h3 class="box-title"> <?php echo e(trans('adminlte_lang::message.list_teeth')); ?> </h3>
	              <div class="pull-left box-tools">
	                  <a href="<?php echo e(url('teeth/create')); ?>" data-url="<?php echo e(url('teeth/create')); ?>" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.new_teeth')); ?>" id="add-teeth-modal-older">
	                       <i class="fa fa-plus"></i> <?php echo e(trans('adminlte_lang::message.new_teeth')); ?>

	                  </a>

	              </div><!-- /. tools -->
	            </div><!-- /.box-header -->

	            <div class="box-body">
	                <table id="table-teeth" class="table table-hover table-design">
		                <thead>
		                  <tr>
							  <th class="col-md-1"><?php echo e(trans('adminlte_lang::message.teeth')); ?></th>
							  <th class="col-md-1"><?php echo e(trans('adminlte_lang::message.number')); ?></th>
							  <th class="col-md-9"><?php echo e(trans('adminlte_lang::message.name')); ?></th>
							  <th class="col-md-1"></th>
		                  </tr>
		                </thead>
		                <tbody class="teeth_table">
                          <?php $__currentLoopData = $teeth; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <tr data-key="<?php echo e($type->id); ?>" class="bg-<?php echo e($status_color[$type->status]); ?>">
                                    <td class="text-center" > <img src="<?php echo e(asset($type->avatar)); ?>" alt=""> </td>
                                    <td class="text-center" ><?php echo e($type->number); ?></td>
									<td><?php echo e($type->name); ?></td>
									<td class="text-center">
                                        <a href="#disable" style="display: <?php echo e($type->status == 1 ? 'initial' : 'none'); ?>;" data-toggle="tooltip" id="disable-teeth" title="<?php echo e(trans('adminlte_lang::message.disable')); ?>" data-key="<?php echo e($type->id); ?>" data-name="<?php echo e($type->name); ?>">
                                            <i class="fa fa-user-o"></i>
                                        </a>

                                        <a href="#enable" style="display: <?php echo e($type->status == 0 ? 'initial' : 'none'); ?>;" data-toggle="tooltip" id="enable-teeth" title="<?php echo e(trans('adminlte_lang::message.enable')); ?>" data-key="<?php echo e($type->id); ?>" data-name="<?php echo e($type->name); ?>">
                                            <i class="fa fa-user"></i>
                                        </a>
                                        <a href="<?php echo e(route('teeth.edit',$type->id)); ?>"  data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.edit')); ?>" id="update-teeth">
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