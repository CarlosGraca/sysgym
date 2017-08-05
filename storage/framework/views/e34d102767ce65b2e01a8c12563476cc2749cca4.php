<div class="row">
	<?php echo Form::hidden('users_id', ($type == 'update' ? $user->id : null), ['class'=>'form-control','id'=>'users_id']); ?>

	<?php echo Form::hidden('info', 'setup', ['class'=>'form-control','id'=>'info']); ?>

    <?php echo Form::hidden('avatar_crop', null , ['class'=>'form-control','id'=>'avatar_crop']); ?>


	<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 text-center">
		<span ><strong class="title" style="text-align: left;"><?php echo e(trans('adminlte_lang::message.user_image')); ?></strong></span>
		<hr class="h-divider" >
		<img  src="<?php echo e(asset( ($type == 'update' ? $user->avatar : 'img/avatar.png') )); ?>" class="img-thumbnail avatar-crop" alt="Cinque Terre" width="150" height="150">
		<div style="margin-top: 10px">
			<div class="col-xs-12 text-center">
				<div class="form-group" data-type='user' data-crop="true">
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
					<?php echo Form::label('name',trans('adminlte_lang::message.name')); ?>

					<?php echo Form::text('name', ($type == 'update' ? $user->name : null) , ['class'=>'form-control','onfocus'=>'onfocus' ,'required'=>'true']); ?>

				</div>
			</div>

			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="form-group form-group-sm">
					<?php echo Form::label('email',trans('adminlte_lang::message.email')); ?>

					<?php echo Form::email('email', ($type == 'update' ? $user->email : null) , ['class'=>'form-control','required'=>'true', ($type == 'update' ? 'readonly' : '')]); ?>

				</div>
			</div>

			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="form-group form-group-sm">
                    <?php if($type == 'update') $role =  $user->roles->first(); ?>
                    <?php echo Form::label('role',trans('adminlte_lang::message.role') ); ?>

					<?php echo Form::select('role', $roles, ($type == 'update' ? $role['id'] : null) , ['class'=>'form-control','placeholder'=>' (SELECT ROLE) ']); ?>

				</div>
			</div>


		<?php if($type == 'create'): ?>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="form-group form-group-sm">
						<label for="password"><?php echo e(trans('adminlte_lang::message.password')); ?></label>
						<input name="password" type="password" value="<?php echo e(($type == 'update' ? $user->password : null)); ?>" id="password" class="form-control" required>
					</div>
				</div>

				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="form-group form-group-sm">
						<label for="password_confirmation"><?php echo e(trans('adminlte_lang::message.retrypepassword')); ?></label>
						<input name="password_confirmation" type="password" value="<?php echo e(($type == 'update' ? $user->password_confirmation : null)); ?>" id="password_confirmation" class="form-control" required>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>