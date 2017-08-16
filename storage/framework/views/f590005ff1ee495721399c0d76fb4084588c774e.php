<div class="row">
	<?php echo Form::hidden('users_id', ($type == 'update' ? $user->id : null), ['class'=>'form-control','id'=>'users_id']); ?>

	<?php echo Form::hidden('info', 'setup', ['class'=>'form-control','id'=>'info']); ?>

    <?php echo Form::hidden('avatar_crop', null , ['class'=>'form-control','id'=>'avatar_crop']); ?>

	<?php echo Form::hidden('avatar_type', null , ['class'=>'form-control','id'=>'avatar_type']); ?>



	<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 text-center">
		<span ><strong class="title" style="text-align: left;"><?php echo e(trans('adminlte_lang::message.avatar')); ?></strong></span>
		<hr class="h-divider" >
		<img  src="<?php echo e(asset( ($type == 'update' ? $user->avatar : 'img/avatar.png') )); ?>" class="img-thumbnail avatar-crop" alt="Cinque Terre" width="150" height="150">
		<div style="margin-top: 10px">
			<div class="col-xs-12 text-center">
				<div class="form-group form-group-sm" style="float: right; max-width: 15%;">
					<button class="btn btn-primary btn-sm" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.capture')); ?>" data-message="<?php echo e(trans('adminlte_lang::message.camera_capture')); ?>" style="padding: 7px 10px;" id="camera-capture">
						<i class="fa  fa-camera"></i>
					</button>
				</div>

				<div class="form-group" data-type='user' data-crop="true"  style="float:left; max-width: 85%;">
                    <?php echo Form::file('avatar', '', ['class' =>  'filestyle upload_image','data-input'=>'false', 'data-buttonText'=>'Select Image', 'data-placeholder'=> trans('adminlte_lang::message.browser_avatar') ]); ?>

                </div>
			</div>
		</div>
	</div>
	<div class="col-lg-9 col-md-6 col-sm-6 col-xs-12">
		<div class="row">
			<span ><strong class="title"><?php echo e(trans('adminlte_lang::message.account_information')); ?></strong></span>
			<hr class="h-divider" >
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="form-group form-group-sm">
					<?php echo Form::label('name','(*) '.trans('adminlte_lang::message.name')); ?>

					<?php echo Form::text('name', ($type == 'update' ? $user->name : null) , ['class'=>'form-control','onfocus'=>'onfocus' ,'required'=>'true']); ?>

				</div>
			</div>

			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="form-group form-group-sm">
					<?php echo Form::label('email','(*) '.trans('adminlte_lang::message.email')); ?>

					<?php echo Form::email('email', ($type == 'update' ? $user->email : null) , ['class'=>'form-control','required'=>'true', ($type == 'update' ? ' ' : '')]); ?>

				</div>
			</div>

			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="form-group form-group-sm">
					<?php echo Form::label('role','(*) '.trans('adminlte_lang::message.role') ); ?>

					<?php echo Form::select('role', $roles, ($type == 'update' ? $user->role->id : null) , ['class'=>'form-control','placeholder'=>' (SELECT ROLE) ']); ?>

				</div>
			</div>

			<?php if($type == 'create'): ?>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="form-group form-group-sm">
						<label for="password"><?php echo e('(*) '.trans('adminlte_lang::message.password')); ?></label>
						<input name="password" type="password" value="<?php echo e(($type == 'update' ? $user->password : null)); ?>" id="password" class="form-control" required>
					</div>
				</div>

				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="form-group form-group-sm">
						<label for="password_confirmation"><?php echo e('(*) '.trans('adminlte_lang::message.retrypepassword')); ?></label>
						<input name="password_confirmation" type="password" value="<?php echo e(($type == 'update' ? $user->password_confirmation : null)); ?>" id="password_confirmation" class="form-control" required>
					</div>
				</div>
			<?php endif; ?>



		</div>



		
			<div class="row">
				<span ><strong class="title"><?php echo e(trans('adminlte_lang::message.branch_permission')); ?></strong></span>
				<hr class="h-divider">
				<?php $__currentLoopData = \Auth::user()->tenant->branch; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $branch): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
					<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
						<div class="form-group form-group-sm">
							<?php echo Form::checkbox('branches[]',$branch->id, ($type == 'update' ? ( !!count( $user->branch_permission->where('branch_id',$branch->id)->first() ) ) : false)); ?>

							<?php echo Form::label('branches',$branch->name); ?>

						</div>
					</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
			</div>
		

	</div>


</div>