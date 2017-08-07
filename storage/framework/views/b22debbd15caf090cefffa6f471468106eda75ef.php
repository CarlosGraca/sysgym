<?php $__env->startSection('htmlheader_title'); ?>
	<?php echo e(trans('adminlte_lang::message.company')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
  <?php echo e(trans('adminlte_lang::message.app_name')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_description'); ?>
 <?php echo e(trans('adminlte_lang::message.company')); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('main-content'); ?>
    <?php echo $__env->make('layouts.shared.alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<div class="row">
	    <div class="col-lg-12">
	        <div class="box box-default">
	            <div class="box-header with-border">
	                <h3 class="box-title">
	              		<span><?php echo e(trans('adminlte_lang::message.company_details')); ?></span>
	                </h3>
	                <div class="pull-right box-tools">
	                    <a href="<?php echo e(route('company.edit',$company->id)); ?>" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="Edit" data-remote="false">
	                       <i class="fa fa-edit"></i> <?php echo e(trans('adminlte_lang::message.edit')); ?>

	                    </a>
	                </div><!-- /. tools -->						
	            </div><!-- /.box-header -->

	            <div class="box-body">               
		            <div class="row">
		        		<div class="col-lg-3 text-center">
		        		    <img  src="<?php echo e(asset($company->logo)); ?>" class="img-thumbnail" alt="Cinque Terre" width="300" height="150">		            
		        		</div>
		        		<div class="col-lg-9">
		        			<ul class="list-group list-group-unbordered">
			                    <li class="list-group-item">
									<i class="fa fa-laptop"></i> <b> <?php echo e(trans('adminlte_lang::message.company_name')); ?>: </b><a class="name"><?php echo e($company ? $company->company_name : null); ?></a>
			                    </li>
			                    
			                       	
			                    
			                    <li class="list-group-item">
									<i class="fa fa-address-card"></i> <b> <?php echo e(trans('adminlte_lang::message.nif')); ?>: </b><a><?php echo e($company ? $company->nif : null); ?></a>
			                    </li>
			                    <li class="list-group-item">
									<i class="fa fa-phone"></i> <b> <?php echo e(trans('adminlte_lang::message.contacts')); ?>: </b><a> <?php echo e($company ? $company->phone : null); ?> / <?php echo e($company ? $company->fax : null); ?></a>
			                    </li>
			                    <li class="list-group-item">
									<i class="fa fa-map-marker"></i> <b> <?php echo e(trans('adminlte_lang::message.address')); ?>: </b> <a> <?php echo e($company ? $company->address_1 : null); ?> , <?php echo e($company ? $company->city : null); ?>, <?php echo e($company ? $company->country : null); ?></a>
			                    </li>
								<li class="list-group-item">
									<i class="fa fa-facebook-official"></i> <b> <?php echo e(trans('adminlte_lang::message.facebook')); ?>: </b> <a><?php echo e($company ? $company->facebook : null); ?></a>   | <i class="fa fa-globe"></i> <b> <?php echo e(trans('adminlte_lang::message.website')); ?>: </b> <?php echo link_to($company ? $company->website : null, $title = null, $attributes = [], $secure = null); ?>

								</li>
								<li class="list-group-item">
									<i class="fa fa-address-card"></i> <b> <?php echo e(trans('adminlte_lang::message.zip_code')); ?>: </b> <?php echo e($company ? $company->zip_code : null); ?>

								</li>
			                </ul>
		        		</div>
		        	</div>
	            </div>
	        </div>
	    </div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>