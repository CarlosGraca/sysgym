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
	                    <?php if($company): ?>
		                    <a href="<?php echo e(route('company.edit',$company->id)); ?>" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="Edit" data-remote="false">
		                       <i class="fa fa-edit"></i>
		                    </a>
	                    <?php else: ?>
	                    	<a href="<?php echo e(url('company/create')); ?>" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="Add" data-remote="false">
		                       <i class="fa fa-plus"></i>
		                    </a>
	                    <?php endif; ?>
	                    
	                </div><!-- /. tools -->						
	            </div><!-- /.box-header -->

	            <div class="box-body">               
		            <div class="row">
		        		<div class="col-lg-3 text-center">
	        		       <?php if(isset($company->logo)): ?>
		        		    	<img  src="<?php echo e(asset($company->logo)); ?>" class="img-thumbnail" alt="Cinque Terre" width="300" height="150">
		        		    <?php else: ?>
		        		    	<img  src="<?php echo e(asset('img/round-logo.jpg')); ?>" class="img-thumbnail" alt="Cinque Terre" width="300" height="150">
	        		        <?php endif; ?>				            				            
		        		</div>
		        		<div class="col-lg-9">
		        			<ul class="list-group list-group-unbordered">
			                    <li class="list-group-item">
									<i class="fa fa-laptop"></i> <b> <?php echo e(trans('adminlte_lang::message.company_name')); ?>: </b><span class="name"><?php echo e($company ? $company->name : null); ?></span> <a href="#" id='setting-name' title='Edit'> </a>
			                    </li>
								<li class="list-group-item">
									<i class="fa fa-user-md"></i> <b> <?php echo e(trans('adminlte_lang::message.owner')); ?>: </b> <?php echo e($company ? $company->owner : null); ?>

								</li>
								<li class="list-group-item">
									<i class="fa fa-heartbeat"></i> <b> <?php echo e(trans('adminlte_lang::message.area')); ?>: </b> <?php echo e($company ? $company->area : null); ?>

								</li>
			                    <li class="list-group-item">
			                       	<i class="fa fa-at"></i> <b> <?php echo e(trans('adminlte_lang::message.email')); ?>: </b><?php echo e($company ? $company->email : null); ?> <a href="#" id='setting-email'>  </a>
			                    </li>
			                    <li class="list-group-item">
									<i class="fa fa-address-card"></i> <b> <?php echo e(trans('adminlte_lang::message.nif')); ?>: </b><span class="nif"><?php echo e($company ? $company->nif : null); ?></span> <a href="#" id='setting-nif' title='Edit'> </a>
			                    </li>
			                    <li class="list-group-item">
									<i class="fa fa-phone"></i> <b> <?php echo e(trans('adminlte_lang::message.contacts')); ?>: </b><?php echo e($company ? $company->phone : null); ?> / <?php echo e($company ? $company->fax : null); ?><a href="#" id='setting-contactos'> </a>
			                    </li>
			                    <li class="list-group-item">
									<i class="fa fa-map-marker"></i> <b> <?php echo e(trans('adminlte_lang::message.address')); ?>: </b><?php echo e($company ? $company->address : null); ?> | <b> <?php echo e(trans('adminlte_lang::message.city')); ?>: </b> <?php echo e($company ? $company->city : null); ?> | <b> <?php echo e(trans('adminlte_lang::message.island')); ?>: </b> <?php echo e($company ? $company->island->name: null); ?>

			                    </li>
								<li class="list-group-item">
									<i class="fa fa-facebook-official"></i> <b> <?php echo e(trans('adminlte_lang::message.facebook')); ?>: </b> <?php echo e($company ? $company->facebook : null); ?>  | <i class="fa fa-globe"></i> <b> <?php echo e(trans('adminlte_lang::message.website')); ?>: </b> <?php echo link_to($company ? $company->website : null, $title = null, $attributes = [], $secure = null); ?>

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