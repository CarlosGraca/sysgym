<?php $__env->startSection('htmlheader_title'); ?>
	Profile
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
	<?php echo e(trans('adminlte_lang::message.app_name')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_description'); ?>
	<?php echo e(trans('adminlte_lang::message.my_profile')); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('main-content'); ?>
     <?php echo $__env->make('layouts.shared.alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<div class="row">
		<div class="col-md-3">

			<!-- Profile Image -->
			<div class="box box-primary">
				<div class="box-body box-profile">
					<div class="text-center">
						<img class="avatar thumbnail" src="<?php echo e(asset(Auth::user()->avatar)); ?>" style="max-width: 100%; width: 250px; margin: 0 auto; z-index: -1;">
						<h3 class="profile-username text-center"><?php echo e(Auth::user()->name); ?></h3>
					</div>

				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->

		</div>
	    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
	        <div class="box box-solid">
				<div class="box-header with-border">
					<h3 class="box-title"><?php echo e(trans('adminlte_lang::message.user_profile')); ?></h3>
					<div class="pull-right box-tools">
						<?php if(\Auth::user()->employee_id != 0): ?>
							<a href="<?php echo e(route('employees.show',\Auth::user()->employee_id)); ?>" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.show_details')); ?>">
								<?php echo e(trans('adminlte_lang::message.view_profile')); ?> <i class="fa fa-address-card"></i>
							</a>
						<?php endif; ?>
					</div>
				</div>
	            <div class="box-body">
	                <div class="nav-tabs-custom">
					    <ul class="nav nav-tabs">
					        <li class="active">
					             <a href="#profile" data-toggle="tab"><i class="fa fa-user"></i> My Profile</a>
					        </li>
					        <li>
					            <a href="#password" data-toggle="tab"><i class="fa fa-key"></i> Reset Password</a>
					        </li>
					     </ul>
					     <div class="tab-content">
					        <!-- profile -->
					        <div class="tab-pane active" id="profile">
					            <div class="row">
					        		<div class="col-lg-12">
					        			<ul class="list-group list-group-unbordered">
						                    <li class="list-group-item">
						                      <b>Name: </b><span class="name"><?php echo e(Auth::user()->name); ?></span> <a href="#" id='user-name' title='Edit'> <i class="fa fa-pencil"></i> </a>
						                    </li>
						                    <li class="list-group-item">
						                      <b>Email: </b><?php echo e(Auth::user()->email); ?> <a href="#" id='user-email'>  <i class="fa fa-pencil"></i> </a>
						                    </li>
						                    <li class="list-group-item">
						                      <b>Created At: </b> <?php echo e(\Carbon\Carbon::parse(\Auth::user()->created_at)->format('d-m-Y')); ?>

						                    </li>
						                </ul>



					        		</div>
					        	</div>
							</div>
							 <!-- Reset Password -->
					        <div class="tab-pane " id="password">
					            <form action="<?php echo e(url('/password/reset')); ?>" method="post" class="form-horizontal">
									<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
									<div class="form-group has-feedback">
					                     <label for="old_password" class="col-sm-2 control-label">Current  Password *</label>
					                     <div class="col-sm-10">
						                    <input type="password" class="form-control" placeholder="Current  Password" id="old_password" name="old_password"  />
						                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
					                    </div>
					                </div>
					                <div class="form-group has-feedback">
					                     <label for="password" class="col-sm-2 control-label">Password *</label>
					                     <div class="col-sm-10">
						                    <input type="password" class="form-control" placeholder="Password" id="password" name="password"/>
						                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
					                    </div>
					                </div>

					                <div class="form-group has-feedback">
					                    <label for="password_confirmation" class="col-sm-2 control-label">Confirm Password *</label>
					                    <div class="col-sm-10">
						                    <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation"/>
						                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
						                 </div>
					                </div>

					                <div class="row">
					                    <div class="col-xs-2">
					                    </div><!-- /.col -->
					                    <div class="col-xs-8">
					                        <button type="submit" class="btn btn-primary "><?php echo e(trans('adminlte_lang::message.passwordreset')); ?></button>
					                    </div><!-- /.col -->
					                    <div class="col-xs-2">
					                    </div><!-- /.col -->
					                </div>
					            </form>
							</div>
						</div>
	            </div>
	        </div>
	    </div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>