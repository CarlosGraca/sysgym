<div class="row">
	<?php echo Form::hidden('patient_id', ($type == 'update' ? $patient->id : null), ['class'=>'form-control','id'=>'patient_id']); ?>

	<?php echo Form::hidden('avatar_crop', null , ['class'=>'form-control','id'=>'avatar_crop']); ?>

	<span style="display: none;"> </span>
	<span ><strong class="title"><?php echo e(trans('adminlte_lang::message.personal_information')); ?></strong></span>
    <hr class="h-divider" >
	<div class="col-lg-3 col-md-4 col-sm-6 text-center">
		<img  src="<?php echo e(url('/')); ?>/<?php echo e(($type == 'update' ? $patient->avatar : 'img/avatar.png')); ?>" class="img-thumbnail avatar-crop" alt="Cinque Terre" width="150" height="150">
		<div style="margin-top: 10px">
			<div class="col-xs-12 text-center">
				<div class="form-group" data-type='patient' data-crop="true">
					<?php echo Form::file('avatar', '', ['class' =>  'filestyle upload_image','data-input'=>'false', 'data-buttonText'=>'Select Image', 'data-placeholder'=> trans('adminlte_lang::message.browser_avatar') ]); ?>

				</div>
			</div>
		</div>
	</div>
    <div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			<?php echo Form::label('name','(*) '.trans('adminlte_lang::message.name')); ?>

			<?php echo Form::text('name', ($type == 'update' ? $patient->name : null) , ['class'=>'form-control','onfocus'=>'onfocus','required'=>'']); ?>

			<p class="has-error" style="display: none"></p>
		</div>
	</div>

	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			<?php echo Form::label('genre','(*) '.trans('adminlte_lang::message.genre')); ?>

			<?php echo Form::select('genre', [ 'male'=>trans('adminlte_lang::message.male'),'female'=>trans('adminlte_lang::message.female')],($type == 'update' ? $patient->genre : null), ['class'=>'form-control', 'placeholder' => trans('adminlte_lang::message.genre_empty')]); ?>

			<p class="has-error" style="display: none"></p>
		</div>
	</div>

	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			<?php echo Form::label('civil_state','(*) '.trans('adminlte_lang::message.civil_state') ); ?>

			<?php echo Form::select('civil_state', ['single'=>trans('adminlte_lang::message.single'),'married'=>trans('adminlte_lang::message.married'),'divorced'=>trans('adminlte_lang::message.divorced'),'widowed'=>trans('adminlte_lang::message.widowed')],($type == 'update' ? $patient->civil_state : null), ['class'=>'form-control', 'placeholder' => trans('adminlte_lang::message.civil_state_empty')]); ?>

			<p class="has-error" style="display: none"></p>
		</div>
	</div>

	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			<?php echo Form::label('birthday', '(*) '.trans('adminlte_lang::message.birthday') ); ?>

			<?php echo Form::date('birthday', ($type == 'update' ? $patient->birthday : null) , ['class'=>'form-control']); ?>

			<p class="has-error" style="display: none"></p>
		</div>
	</div>

	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			<?php echo Form::label('nationality',trans('adminlte_lang::message.nationality') ); ?>

			<?php echo Form::text('nationality', ($type == 'update' ? $patient->nationality : null) , ['class'=>'form-control']); ?>

		</div>
	</div>

	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			<?php echo Form::label('bi', trans('adminlte_lang::message.bi') ); ?>

			<?php echo Form::number('bi', ($type == 'update' ? $patient->bi : null) , ['class'=>'form-control']); ?>

		</div>
	</div>

	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			<?php echo Form::label('nif',trans('adminlte_lang::message.nif') ); ?>

			<?php echo Form::number('nif', ($type == 'update' ? $patient->nif : null) , ['class'=>'form-control']); ?>

		</div>
	</div>

	<div class="col-lg-6 col-md-8 col-sm-12">
		<div class="form-group form-group-sm">
			<?php echo Form::label('parents',trans('adminlte_lang::message.parents') ); ?>

			<?php echo Form::textarea('parents', ($type == 'update' ? $patient->parents : null) , ['class'=>'form-control']); ?>

		</div>
	</div>
</div>

<div class="row">
	<span ><strong class="title"><?php echo e(trans('adminlte_lang::message.contact_information')); ?></strong></span>
	<hr class="h-divider" >

	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			<?php echo Form::label('address','(*) '.trans('adminlte_lang::message.address') ); ?>

			<?php echo Form::text('address', ($type == 'update' ? $patient->address : null) , ['class'=>'form-control']); ?>

			<p class="has-error" style="display: none"></p>
		</div>
	</div>

	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			<?php echo Form::label('city','(*) '.trans('adminlte_lang::message.city') ); ?>

			<?php echo Form::text('city', ($type == 'update' ? $patient->city : null) , ['class'=>'form-control']); ?>

			<p class="has-error" style="display: none"></p>
		</div>
	</div>

	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			<?php echo Form::label('island_id','(*) '.trans('adminlte_lang::message.island') ); ?>

			<?php echo Form::select('island_id', $island, ($type == 'update' ? $patient->island_id : null) , ['class'=>'form-control','id'=>'island_id','placeholder' => ' (SELECT ISLAND) ']); ?>

			<p class="has-error" style="display: none"></p>
		</div>
	</div>

	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			<?php echo Form::label('email',trans('adminlte_lang::message.email') ); ?>

			<?php echo Form::email('email', ($type == 'update' ? $patient->email : null) , ['class'=>'form-control']); ?>

		</div>
	</div>

	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			<?php echo Form::label('mobile',trans('adminlte_lang::message.mobile') ); ?>

			<?php echo Form::text('mobile', ($type == 'update' ? $patient->mobile : null) , ['class'=>'form-control']); ?>

		</div>
	</div>

	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			<?php echo Form::label('phone',trans('adminlte_lang::message.phone') ); ?>

			<?php echo Form::text('phone', ($type == 'update' ? $patient->phone : null) , ['class'=>'form-control']); ?>

		</div>
	</div>

	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			<?php echo Form::label('zip_code',trans('adminlte_lang::message.zip_code') ); ?>

			<?php echo Form::number('zip_code', ($type == 'update' ? $patient->zip_code : null) , ['class'=>'form-control']); ?>

		</div>
	</div>

	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			<?php echo Form::label('website',trans('adminlte_lang::message.website') ); ?>

			<?php echo Form::text('website', ($type == 'update' ? $patient->website : null) , ['class'=>'form-control']); ?>

		</div>
	</div>

	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			<?php echo Form::label('facebook',trans('adminlte_lang::message.facebook') ); ?>

			<?php echo Form::text('facebook', ($type == 'update' ? $patient->facebook : null) , ['class'=>'form-control']); ?>

		</div>
	</div>

	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			<?php echo Form::label('has_secure',trans('adminlte_lang::message.has_secure') ); ?>

			<?php echo Form::select('has_secure',[0 =>trans('adminlte_lang::message.not'), 1 =>trans('adminlte_lang::message.yes') ], ($type == 'update' ? $patient->has_secure : null) , ['class'=>'form-control','id'=>'has_secure']); ?>

		</div>
	</div>

</div>


<div class="row">
	<span ><strong class="title"><?php echo e(trans('adminlte_lang::message.work_information')); ?></strong></span>
	<hr class="h-divider" >
	<div class="col-lg-4 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			<?php echo Form::label('profession',trans('adminlte_lang::message.profession') ); ?>

			<?php echo Form::text('profession', ($type == 'update' ? $patient->profession : null) , ['class'=>'form-control']); ?>

		</div>
	</div>

	<div class="col-lg-4 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			<?php echo Form::label('work_phone',trans('adminlte_lang::message.work_phone') ); ?>

			<?php echo Form::text('work_phone', ($type == 'update' ? $patient->work_phone : null) , ['class'=>'form-control']); ?>

		</div>
	</div>

	<div class="col-lg-4 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			<?php echo Form::label('work_address',trans('adminlte_lang::message.work_address') ); ?>

			<?php echo Form::text('work_address', ($type == 'update' ? $patient->work_location : null) , ['class'=>'form-control']); ?>

		</div>
	</div>
</div>

<?php echo $__env->make('secure_card.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>