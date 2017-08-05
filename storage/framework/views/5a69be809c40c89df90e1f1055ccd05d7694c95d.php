<?php $__env->startSection('htmlheader_title'); ?>
	<?php echo e(trans('adminlte_lang::message.system')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
  <?php echo e(trans('adminlte_lang::message.app_name')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_description'); ?>
 <?php echo e(trans('adminlte_lang::message.system')); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('main-content'); ?>
    <?php echo $__env->make('layouts.shared.alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<div class="row">
	    <div class="col-lg-12">
	        <div class="box box-default">
	            <div class="box-header with-border">
	                <h3 class="box-title">
	              		<span><?php echo e(trans('adminlte_lang::message.system_details')); ?></span>
	                </h3>
	                <div class="pull-right box-tools">
	                    <?php if($system): ?>
		                    <a href="<?php echo e(route('system.edit', \Illuminate\Support\Facades\Crypt::encrypt($system->id))); ?>" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="Edit" data-remote="false">
		                       <i class="fa fa-edit"></i>
		                    </a>
	                    <?php else: ?>
	                    	<a href="<?php echo e(url('system/create')); ?>" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="Add" data-remote="false">
		                       <i class="fa fa-plus"></i>
		                    </a>
	                    <?php endif; ?>
	                    
	                </div><!-- /. tools -->						
	            </div><!-- /.box-header -->

	            <div class="box-body">               
		            <div class="row">
						<div class="col-lg-3 text-center">
							<b> <?php echo e(trans('adminlte_lang::message.background_image')); ?>: </b>
						<?php if(isset($system->background_image)): ?>
								<img  src="<?php echo e(asset($system->background_image)); ?>" class="img-thumbnail" alt="Cinque Terre" width="300" height="150">
							<?php else: ?>
								<img  src="<?php echo e(asset('img/photo1.jpg')); ?>" class="img-thumbnail" alt="Cinque Terre" width="300" height="150">
							<?php endif; ?>
						</div>

		        		<div class="col-lg-5">
		        			<ul class="list-group list-group-unbordered">
			                    <li class="list-group-item">
									<i class="fa fa-laptop"></i> <b> <?php echo e(trans('adminlte_lang::message.application_name')); ?>: </b><a class="app-name"><?php echo e($system ? $system->name : null); ?></a>
			                    </li>
								<li class="list-group-item">
									<i class="fa fa-language"></i> <b> <?php echo e(trans('adminlte_lang::message.lang')); ?>: </b> <a class="app-lang"><?php echo e($system ? $lang[$system->lang]: null); ?></a>
								</li>
								<li class="list-group-item">
									<i class="fa fa-tv"></i> <b> <?php echo e(trans('adminlte_lang::message.layout')); ?>: </b><a class="app-layout"><?php echo e($system ? $system->layout : null); ?></a>
								</li>
								<li class="list-group-item">
									<i class="fa fa-info"></i> <b> <?php echo e(trans('adminlte_lang::message.iva')); ?>: </b><a class="app-iva"><?php echo e($system ? $system->iva : null); ?>%</a>
								</li>
							 </ul>
		        		</div>

						<div class="col-lg-4">
							<ul class="list-group list-group-unbordered">
								<li class="list-group-item">
									<i class="fa fa-leaf"></i> <b> <?php echo e(trans('adminlte_lang::message.theme')); ?>: </b> <a class="app-theme"> <?php echo e($system ? $system->theme : null); ?></a>
								</li>
								<li class="list-group-item">
									<i class="fa fa-money"></i> <b> <?php echo e(trans('adminlte_lang::message.currency')); ?>: </b> <a class="app-currency"><?php echo e($system ? $system->currency : null); ?></a>
								</li>
								<li class="list-group-item">
									<i class="fa fa-clock-o"></i> <b> <?php echo e(trans('adminlte_lang::message.timezone')); ?>: </b><a class="app-timezone"><?php echo e($system ? $timezone[$system->timezone] : null); ?></a>
								</li>
								<li class="list-group-item">
									<i class="fa fa-certificate"></i> <b> <?php echo e(trans('adminlte_lang::message.version')); ?>: </b><a class="app-version"><?php echo e(config('app.version')); ?></a>
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