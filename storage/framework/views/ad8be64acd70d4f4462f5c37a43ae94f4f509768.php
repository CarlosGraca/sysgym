<?php $__env->startSection('htmlheader_title'); ?>
	home
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
	<?php echo e(trans('adminlte_lang::message.app_name')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_description'); ?>
  <?php echo e(trans('adminlte_lang::message.home')); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('main-content'); ?>
	<div class="row">
	    <div class="col-md-12 col-sm-12 col-xs-12">
			<div class="row">
				<div class="col-lg-12">
					<?php echo $__env->make('components.tools_bar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				</div>

				
					
						
							
							
                                
                                
							
						
						
							
							
								
									
									
									
								
								
									

										

									
									
									

										

									
									
								
								
							

						
					

				

			</div>


		</div>
		<div class="col-md-4 col-sm-12 col-xs-12">
			<div class="row">
				<div class="col-lg-12">
					
				</div>
				<div class="col-lg-12">
					<?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('view_users_page')): ?>
						<?php echo $__env->make('users.user_list', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
					<?php endif; ?>
				</div>
			</div>

		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>