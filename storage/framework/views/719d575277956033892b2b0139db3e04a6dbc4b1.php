<div class="row">
    <?php echo Form::hidden('avatar_crop', null , ['class'=>'form-control','id'=>'avatar_crop']); ?>


	<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 text-center">
		<span ><strong class="title" style="text-align: left;"><?php echo e(trans('adminlte_lang::message.avatar')); ?></strong></span>
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
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group form-group-sm">
					<?php echo Form::label('name',trans('adminlte_lang::message.name')); ?>

					<?php echo Form::text('name', ($type == 'update' ? $user->name : null) , ['class'=>'form-control','onfocus'=>'onfocus' ,'required'=>'true']); ?>

				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group form-group-sm">
					<?php echo Form::label('username',trans('adminlte_lang::message.username')); ?>

					<?php echo Form::text('username', ($type == 'update' ? $user->username : null) , ['class'=>'form-control']); ?>

				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group form-group-sm">
					<?php echo Form::label('email',trans('adminlte_lang::message.email')); ?>

					<?php echo Form::email('email', ($type == 'update' ? $user->email : null) , ['class'=>'form-control','required'=>'true', ($type == 'update' ? 'readonly' : '')]); ?>

				</div>
			</div>
		</div>

		<div class="row">
			<span ><strong class="title"><?php echo e(trans('adminlte_lang::message.branch_default')); ?></strong></span>
			<hr class="h-divider" >

			

			<?php $__currentLoopData = $user->branch_permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $branch): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
				<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
					<div class="form-group form-group-sm">
						
						<?php echo Form::radio('branches', $branch->branch_id , ($type == 'update' ? ( $user->branch_default_id == $branch->branch_id ? true : false  ) : false)); ?>

						<?php echo Form::label('branches',$branch->branch->name); ?>

					</div>
				</div>

			<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

		</div>

	</div>


</div>