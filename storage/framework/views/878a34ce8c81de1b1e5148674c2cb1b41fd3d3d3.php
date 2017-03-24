<?php $__env->startSection('htmlheader_title'); ?>
	<?php echo e(trans('adminlte_lang::message.campaign_message')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
  <?php echo e(trans('adminlte_lang::message.app_name')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_description'); ?>
  <?php echo e(trans('adminlte_lang::message.campaign_message')); ?>

<?php $__env->stopSection(); ?>

<?php $Defaults = app('App\Http\Controllers\Defaults'); ?>

<?php $__env->startSection('main-content'); ?>
	<div class="row">
	    <div class="col-lg-12">
	        <div class="box box-default">
	            <div class="box-header with-border">
	              <h3 class="box-title"></h3>
	              <div class="pull-left box-tools">
	                  <a href="<?php echo e(url('campaign_messages/create')); ?>" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.new_campaign_message')); ?>">
	                       <i class="fa fa-plus"></i> <?php echo e(trans('adminlte_lang::message.new_campaign_message')); ?>

	                  </a>

	              </div><!-- /. tools -->
	            </div><!-- /.box-header -->

	            <div class="box-body">
	                <table id="table-category" class="table table-bordered table-striped">
		                <thead>
		                  <tr>
		                    <th style="width: 10px" class="col-md-1">#</th>
		                    <th class="col-md-8"><?php echo e(trans('adminlte_lang::message.name')); ?></th>
		                    <th class="col-md-2"><?php echo e(trans('adminlte_lang::message.salary_base')); ?></th>
		                    <th class="col-md-1"></th>
		                  </tr>
		                </thead>
		                <tbody>
                          
                                
                                    
                                    
                                    
                                    
                                        
                                            
                                        
                                        
                                            
                                        
                                            
                                            

                                        
                                        
                                            
                                    
                                
                            
		                <tbody>
                    </table>
	            </div>
	        </div>
	    </div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>