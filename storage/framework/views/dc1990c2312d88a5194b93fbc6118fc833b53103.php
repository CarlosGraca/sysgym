<?php $__env->startSection('htmlheader_title'); ?>
	<?php echo e(trans('adminlte_lang::message.users')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
	<?php echo e(trans('adminlte_lang::message.app_name')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_description'); ?>
	<?php echo e(trans('adminlte_lang::message.user')); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('main-content'); ?>
     <?php echo $__env->make('layouts.shared.alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<div class="row">
		<div class="col-md-3">

			<!-- Profile Image -->
			<div class="box box-primary">
				<div class="box-body box-profile">
					<div class="text-center">
						<img class="thumbnail" src="<?php echo e(asset($user->avatar)); ?>" style="max-width: 100%; width: 250px; margin: 0 auto; z-index: -1;">
						<h3 class="profile-username text-center user-name"><?php echo e($user->name); ?></h3>
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
						<a href="<?php echo e(url('users')); ?>" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.user_list')); ?>">
							<i class="fa fa-list"></i> <?php echo e(trans('adminlte_lang::message.user_list')); ?>

						</a>
					</div>
				</div>
	            <div class="box-body">
	                <div class="nav-tabs-custom">
					    <ul class="nav nav-tabs">
					        <li class="active">
					             <a href="#profile" data-toggle="tab"><i class="fa fa-address-card-o"></i> <?php echo e(trans('adminlte_lang::message.personal_data')); ?> </a>
					        </li>
					        <li>
					            <a href="#permission" data-toggle="tab"><i class="fa fa-key"></i> <?php echo e(trans('adminlte_lang::message.permissions')); ?></a>
					        </li>
					     </ul>
					     <div class="tab-content">
					        <!-- profile -->
					        <div class="tab-pane active" id="profile">
					            <div class="row">
					        		<div class="col-lg-12">
					        			<ul class="list-group list-group-unbordered">
						                    <li class="list-group-item">
						                      <b><?php echo e(trans('adminlte_lang::message.name')); ?>: </b><a><?php echo e($user->name); ?></a>
						                    </li>
						                    <li class="list-group-item">
						                      <b><?php echo e(trans('adminlte_lang::message.email')); ?>: </b><a><?php echo e($user->email); ?></a>
						                    </li>
											<li class="list-group-item">
												<b><?php echo e(trans('adminlte_lang::message.role')); ?>: </b> <a><?php echo e($user->role->display_name); ?></a>
											</li>
						                    <li class="list-group-item">
						                      <b><?php echo e(trans('adminlte_lang::message.create_date')); ?>: </b> <a><?php echo e(\Carbon\Carbon::parse($user->created_at)->format('d/m/Y')); ?></a>
						                    </li>
						                </ul>
					        		</div>
					        	</div>
							</div>
							 <!-- Reset Password -->
					        <div class="tab-pane " id="permission">
								<table id="table-documents" class="table table-bordered table-striped table-design">
									<thead>
										<tr>
											<th class="col-md-2"><?php echo e(trans('adminlte_lang::message.type')); ?></th>
											<th class="col-md-10"><?php echo e(trans('adminlte_lang::message.name')); ?></th>
										</tr>
									</thead>
									<tbody>
									
									<?php $__currentLoopData = $user->role->permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
										<tr>
											<td><?php echo e($permission->type); ?> </td>
											<td><?php echo e($permission->tenant_menu->menus->title); ?> </td>
										</tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
									</tbody>
								</table>
							</div>
						</div>
	            </div>
	        </div>
	    </div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>