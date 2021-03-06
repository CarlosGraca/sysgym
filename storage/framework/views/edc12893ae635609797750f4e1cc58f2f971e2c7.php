<?php $__env->startSection('htmlheader_title'); ?>
	<?php echo e(trans('adminlte_lang::message.new_menu')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
  <?php echo e(trans('adminlte_lang::message.app_name')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_description'); ?>
  <?php echo e(trans('adminlte_lang::message.new_menu')); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('main-content'); ?>

	<div class="row">
	    <div class="col-lg-12">
	        <?php echo Form::open(['route'=>'tenant-menu.store', 'id'=>'menu-form','files'=>true]); ?>

	        <div class="box box-default">
	            <div class="box-header with-border">
	              <h3 class="box-title">
	               <a href="<?php echo e(url('menus')); ?>" class="btn btn-primary btn-sm" menu="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.back')); ?>">
						  <i class="fa  fa-arrow-left"></i> <?php echo e(trans('adminlte_lang::message.back')); ?>

					  </a>
	              	
	              </h3>
					<!--
	              <div class="pull-right box-tools">
	                    <a href="#"  class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="Save">
	                       <i class="fa fa-save"></i>
	                     </a>
	              </div><!-- /. tools -->
	             
					<div class="pull-right box-tools">
						<a href="#!" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="Edit" id="edit-menu-button" style="display: none;" >
							<i class="fa fa-edit"></i>
						</a>


						<button class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="Save" id="add-menu" type="submit">
							 <i class="fa fa-save"></i>
						</button>
					</div><!-- /. tools -->
	            </div><!-- /.box-header -->

	            <div class="box-body">
					
	                  	<?php echo $__env->make('tenant_menu.form', ['type'=>'create'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
					
				</div>
				
	        </div>
	        <?php echo Form::close(); ?>

	    </div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>