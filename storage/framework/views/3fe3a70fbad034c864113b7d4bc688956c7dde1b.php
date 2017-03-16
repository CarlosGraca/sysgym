<?php $__env->startSection('htmlheader_title'); ?>
	<?php echo e(trans('adminlte_lang::message.consult_type')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
  <?php echo e(trans('adminlte_lang::message.app_name')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_description'); ?>
  <?php echo e(trans('adminlte_lang::message.consult_type')); ?>

<?php $__env->stopSection(); ?>

<?php $Defaults = app('App\Http\Controllers\Defaults'); ?>

<?php $__env->startSection('main-content'); ?>
	<div class="row">
	    <div class="col-lg-12">
	        <div class="box box-default">
	            <div class="box-header with-border">
	              <h3 class="box-title"></h3>
	              <div class="pull-left box-tools">
	                  <a href="<?php echo e(url('consult_type/create')); ?>" data-url="<?php echo e(url('consult_type/create')); ?>" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.new_consult_type')); ?>" id="add-consult_type-modal-older">
	                       <i class="fa fa-plus"></i> <?php echo e(trans('adminlte_lang::message.new_consult_type')); ?>

	                  </a>

	              </div><!-- /. tools -->
	            </div><!-- /.box-header -->

	            <div class="box-body">
	                <table id="table-consult_type" class="table table-bordered table-striped table-design">
		                <thead>
		                  <tr>
		                    
		                    <th class="col-md-8"><?php echo e(trans('adminlte_lang::message.name')); ?></th>
		                    <th class="col-md-3"><?php echo e(trans('adminlte_lang::message.price')); ?></th>
		                    <th class="col-md-1"></th>
		                  </tr>
		                </thead>
		                <tbody class="consult_type_table">
                          <?php $__currentLoopData = $consult_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <tr data-key="<?php echo e($type->id); ?>">
                                    
                                    <td class="name"><?php echo e($type->name); ?></td>
                                    <td class="price"><?php echo e($Defaults->currency($type->price)); ?></td>
                                    <td>
                                        <a href="#"  data-toggle="tooltip" data-target="#confirmDelete" title="<?php echo e(trans('adminlte_lang::message.remove')); ?>" data-product_id="<?php echo e($type->id); ?>" data-product_name="<?php echo e($type->id); ?>">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                        <a href="<?php echo e(route('consult_type.edit',$type->id)); ?>"  data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.edit')); ?>" id="edit-consult_type">   <i class="fa fa-edit"></i>
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