<?php $__env->startSection('htmlheader_title'); ?>
	Lista
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
  <?php echo e(trans('adminlte_lang::message.app_name')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_description'); ?>

	<?php echo e(trans('adminlte_lang::message.domains')); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('main-content'); ?>
     <?php echo $__env->make('layouts.shared.alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
	<div class="row">
	    <div class="col-lg-12">
	        <div class="box box-primary">
	            <div class="box-header with-border">
	              <h3 class="box-title"></h3>
	               <div class="pull-left box-tools">
	                  <a href="<?php echo e(url('domains/create')); ?>"  class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="">

	                       <i class="fa fa-plus"></i> <?php echo e(trans('adminlte_lang::message.new_domain')); ?>


	                  </a>
	                  
	              </div><!-- /. tools -->
	            </div><!-- /.box-header -->
	  
	            <div class="box-body">
		            <div class="box-body table-responsive no-padding">
                        <table class="table table-hover table-design">  
			                <thead>
			                    <tr>		                        
			                        <th >Dominio</th>
			                        <th >Codigo</th>
			                        <th >Significado</th> 
			                        <th>Ações</th>
			                    </tr>
			                </thead>
			                <tbody>
			                    <?php $__currentLoopData = $domains; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dominio): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
			                        <tr>
				                    	<td><?php echo e($dominio->dominio); ?></td> 
				                    	<td><?php echo e($dominio->codigo); ?></td> 
				                    	<td><?php echo e($dominio->significado); ?></td> 
				                    	<td class="actions">
					                        <a href="<?php echo e(route('domains.edit',$dominio->id)); ?>" class="btn btn-primary btn-xs", data-remote='true'])>      <i class="fa fa-edit"></i>
					                        </a>                           
					                        <button type="button" class="btn btn-xs btn-warning btn-flat" data-toggle="modal" data-target="#confirmDelete" data-id="<?php echo e($dominio->id); ?>" data-name="<?php echo e($dominio->name); ?>" data-title="Confirm provider deletion" data-url="/domains/">
					                            <i class="fa fa-trash"></i>
					                        </button>  
					                    </td>
				                    </tr>
			                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
			                </tbody>                                     
			            </table>
		            </div>
	            </div>
	        </div>
	    </div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>