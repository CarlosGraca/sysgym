<?php $__env->startSection('htmlheader_title'); ?>
	<?php echo e(trans('adminlte_lang::message.menus')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
  <?php echo e(trans('adminlte_lang::message.app_name')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_description'); ?>
  <?php echo e(trans('adminlte_lang::message.menus')); ?>

<?php $__env->stopSection(); ?>

<?php
$status = [trans('adminlte_lang::message.deleted'),trans('adminlte_lang::message.active'),trans('adminlte_lang::message.expired')];
$status_color = ['danger','success','info'];
?>


 <?php $__env->startSection('main-content'); ?>

 
	<div class="row">
	    <div class="col-lg-12">
	        <div class="box box-primary">
	            <div class="box-header with-border">
	              <h3 class="box-title"><?php echo e(trans('adminlte_lang::message.menu_list')); ?></h3>
	              <div class="pull-left box-tools">
					  
						  <a href="<?php echo e(url('menus/create')); ?>" class="btn btn-primary btn-sm" menu="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.new_menu')); ?>">
							   <i class="fa fa-plus"></i> <?php echo e(trans('adminlte_lang::message.new_menu')); ?>

						  </a>
					  

	              </div><!-- /. tools -->
	            </div><!-- /.box-header -->

	            <div class="box-body">
                    <!-- <div class="table-responsive"> -->
    	                <table id="table-menus" class="table-design display" cellspacing="0" width="100%">
    		                <thead>
    		                  <tr>
    							<th ><?php echo e(trans('adminlte_lang::message.title')); ?></th>
    							<th ><?php echo e(trans('adminlte_lang::message.url')); ?></th>
    							<th ><?php echo e(trans('adminlte_lang::message.icon')); ?></th>
                                <th ><?php echo e(trans('adminlte_lang::message.menu_order')); ?></th>
    							<th><?php echo e(trans('adminlte_lang::message.status')); ?></th>
    							<th ></th>
    		                  </tr>
    		                </thead>
    		                <tbody class="menus_table">
                              <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
    							  <tr class="bg-<?php echo e($status_color[$menu->status]); ?>">
                                        <td><?php echo e($menu->title); ?></td>
                                        <td><?php echo e($menu->url); ?></td>
    									<td class="text-center"><i class="<?php echo e($menu->icon); ?>"></i></td>
                                        <td><?php echo $menu->menu_order; ?></td>
    								  	<td><span class="label label-<?php echo e($status_color[$menu->status]); ?>"><?php echo e($status[$menu->status]); ?></span></td>
    								   <td>
                                            <a href="<?php echo e(route('tenant-menu.create','id='.$menu->id)); ?>" , data-remote='false' data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.associate_tenant')); ?>">      <i class="fa fa-snowflake-o"></i>
                                            </a> 
    											<a href="<?php echo e(route('menus.show',$menu->id)); ?>"  data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.view')); ?>">
    												<i class="fa fa-eye"></i>
    											</a>
    											<a href="<?php echo e(route('menus.edit',$menu->id)); ?>"  data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.edit')); ?>" id="edit-menu">
    												<i class="fa fa-edit"></i>
    											</a>
    										<a href="#disable" style="display: <?php echo e($menu->status == 1 ? 'initial' : 'none'); ?>;  color: #dd4b39;" data-toggle="tooltip" id="disable-menu" title="<?php echo e(trans('adminlte_lang::message.disable')); ?>" data-key="<?php echo e($menu->id); ?>" data-name="<?php echo e($menu->name); ?>">
    											<i class="fa fa-key"></i>
    										</a>
    										<a href="#enable" style="display: <?php echo e($menu->status == 0 ? 'initial' : 'none'); ?>;  color: #00a65a;" data-toggle="tooltip" id="enable-menu" title="<?php echo e(trans('adminlte_lang::message.enable')); ?>" data-key="<?php echo e($menu->id); ?>" data-name="<?php echo e($menu->name); ?>">
    											<i class="fa fa-key"></i>
    										</a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    		                <tbody>
                        </table>
                    <!-- </div> -->
	            </div>
	        </div>
	    </div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>