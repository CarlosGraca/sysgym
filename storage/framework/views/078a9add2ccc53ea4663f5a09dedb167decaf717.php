<div class="row">
	<?php echo Form::hidden('patient_id', ($type == 'update' ? $employee->id : null), ['class'=>'form-control','id'=>'patient_id']); ?>

	<span ><strong class="title"><?php echo e(trans('adminlte_lang::message.personal_information')); ?></strong></span>
    <hr class="h-divider" >
	<div class="col-lg-3 col-md-4 col-sm-6 text-center">
		<img  src="<?php echo e(url('/')); ?>/<?php echo e(($type == 'update' ? $employee->avatar : 'img/avatar.png')); ?>" class="img-circle avatar-employee" alt="Cinque Terre" width="150" height="150">
		<div style="margin-top: 10px">
			<div class="col-xs-12 text-center">
				<div class="form-group" data-type='employee'>
					<?php echo Form::file('avatar', '', ['class' =>  'filestyle upload_image','data-input'=>'false', 'data-buttonText'=>'Select Image', 'accept'=>'image/*', 'data-placeholder'=> trans('adminlte_lang::message.browser_avatar') ]); ?>

				</div>
			</div>
		</div>
	</div>
    <div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			<?php echo Form::label('name',trans('adminlte_lang::message.name')); ?>

			<?php echo Form::text('name', ($type == 'update' ? $employee->name : null) , ['class'=>'form-control','onfocus'=>'onfocus']); ?>

		</div>
	</div>

	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			<?php echo Form::label('genre',trans('adminlte_lang::message.genre')); ?>

			<?php echo Form::select('genre', [ 'male'=>trans('adminlte_lang::message.male'),'female'=>trans('adminlte_lang::message.female')],($type == 'update' ? $employee->genre : null), ['class'=>'form-control', 'placeholder' => trans('adminlte_lang::message.genre_empty')]); ?>

		</div>
	</div>

	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			<?php echo Form::label('civil_state',trans('adminlte_lang::message.civil_state') ); ?>

			<?php echo Form::select('civil_state', ['single'=>trans('adminlte_lang::message.single'),'married'=>trans('adminlte_lang::message.married'),'divorced'=>trans('adminlte_lang::message.divorced'),'widowed'=>trans('adminlte_lang::message.widowed')],($type == 'update' ? $employee->civil_state : null), ['class'=>'form-control', 'placeholder' => trans('adminlte_lang::message.civil_state_empty')]); ?>

		</div>
	</div>

	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			<?php echo Form::label('birthday', trans('adminlte_lang::message.birthday') ); ?>

			<?php echo Form::date('birthday', ($type == 'update' ? $employee->birthday : null) , ['class'=>'form-control']); ?>

		</div>
	</div>

	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			<?php echo Form::label('nationality',trans('adminlte_lang::message.nationality') ); ?>

			<?php echo Form::text('nationality', ($type == 'update' ? $employee->nationality : null) , ['class'=>'form-control']); ?>

		</div>
	</div>

	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			<?php echo Form::label('bi', trans('adminlte_lang::message.bi') ); ?>

			<?php echo Form::number('bi', ($type == 'update' ? $employee->bi : null) , ['class'=>'form-control']); ?>

		</div>
	</div>

	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			<?php echo Form::label('nif',trans('adminlte_lang::message.nif') ); ?>

			<?php echo Form::number('nif', ($type == 'update' ? $employee->nif : null) , ['class'=>'form-control']); ?>

		</div>
	</div>

	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			<?php echo Form::label('parents',trans('adminlte_lang::message.parents') ); ?>

			<?php echo Form::text('parents', ($type == 'update' ? $employee->parents : null) , ['class'=>'form-control']); ?>

		</div>
	</div>
</div>

<div class="row">
	<span ><strong class="title"><?php echo e(trans('adminlte_lang::message.contact_information')); ?></strong></span>
	<hr class="h-divider" >

	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			<?php echo Form::label('address',trans('adminlte_lang::message.address') ); ?>

			<?php echo Form::text('address', ($type == 'update' ? $employee->address : null) , ['class'=>'form-control']); ?>

		</div>
	</div>

	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			<?php echo Form::label('city',trans('adminlte_lang::message.city') ); ?>

			<?php echo Form::text('city', ($type == 'update' ? $employee->city : null) , ['class'=>'form-control']); ?>

		</div>
	</div>

	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			<?php echo Form::label('island_id',trans('adminlte_lang::message.island') ); ?>

			<?php echo Form::select('island_id', $island, ($type == 'update' ? $employee->island_id : null) , ['class'=>'form-control','id'=>'island','placeholder' => ' (SELECT ISLAND) ']); ?>

		</div>
	</div>

	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			<?php echo Form::label('email',trans('adminlte_lang::message.email') ); ?>

			<?php echo Form::email('email', ($type == 'update' ? $employee->email : null) , ['class'=>'form-control']); ?>

		</div>
	</div>

	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			<?php echo Form::label('mobile',trans('adminlte_lang::message.mobile') ); ?>

			<?php echo Form::text('mobile', ($type == 'update' ? $employee->mobile : null) , ['class'=>'form-control']); ?>

		</div>
	</div>

	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			<?php echo Form::label('phone',trans('adminlte_lang::message.phone') ); ?>

			<?php echo Form::text('phone', ($type == 'update' ? $employee->phone : null) , ['class'=>'form-control']); ?>

		</div>
	</div>

	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			<?php echo Form::label('zip_code',trans('adminlte_lang::message.zip_code') ); ?>

			<?php echo Form::number('zip_code', ($type == 'update' ? $employee->zip_code : null) , ['class'=>'form-control']); ?>

		</div>
	</div>

	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			<?php echo Form::label('website',trans('adminlte_lang::message.website') ); ?>

			<?php echo Form::text('website', ($type == 'update' ? $employee->website : null) , ['class'=>'form-control']); ?>

		</div>
	</div>

	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			<?php echo Form::label('facebook',trans('adminlte_lang::message.facebook') ); ?>

			<?php echo Form::text('facebook', ($type == 'update' ? $employee->facebook : null) , ['class'=>'form-control']); ?>

		</div>
	</div>

	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			<?php echo Form::label('has_secure',trans('adminlte_lang::message.has_secure') ); ?>

			<?php echo Form::select('has_secure',[0 =>trans('adminlte_lang::message.not'), 1 =>trans('adminlte_lang::message.yes') ], ($type == 'update' ? $employee->has_secure : null) , ['class'=>'form-control','id'=>'has_secure']); ?>

		</div>
	</div>

</div>


<div class="row">
	<span ><strong class="title"><?php echo e(trans('adminlte_lang::message.work_information')); ?></strong></span>
	<hr class="h-divider" >
	<div class="col-lg-12 no-padding">
		<div class="col-lg-3 col-md-4 col-sm-6">
			<div class="form-group form-group-sm">
				<?php echo Form::label('category',trans('adminlte_lang::message.category') ); ?>

				<?php echo Form::select('category', $category, ($type == 'update' ? $employee->category_id : null) , ['class'=>'form-control','id'=>'category', 'placeholder' => ' (SELECT CATEGORY) ']); ?>

			</div>
		</div>

		<div class="col-lg-3 col-md-4 col-sm-6">
			<div class="form-group form-group-sm">
				<?php echo Form::label('salary',trans('adminlte_lang::message.salary') ); ?>

				<?php echo Form::number('salary', ($type == 'update' ? $employee->salary : null) , ['class'=>'form-control']); ?>

			</div>
		</div>

		<div class="col-lg-3 col-md-4 col-sm-6">
			<div class="form-group form-group-sm">
				<?php echo Form::label('branch',trans('adminlte_lang::message.branch') ); ?>

				<?php echo Form::select('branch', $branches, ($type == 'update' ? $employee->branch_id : null) , ['class'=>'form-control','id'=>'branch','placeholder' => ' (SELECT BRANCH) ']); ?>

			</div>
		</div>

		<div class="col-lg-3 col-md-4 col-sm-6">
			<div class="form-group form-group-sm">
				<?php echo Form::label('doctor_check',trans('adminlte_lang::message.doctor') ); ?>

				<?php echo Form::select('doctor_check',[0 =>trans('adminlte_lang::message.not'), 1 =>trans('adminlte_lang::message.yes') ], ($type == 'update' ? $employee->doctor : null) , ['class'=>'form-control','id'=>'doctor_check']); ?>

			</div>
		</div>
	</div>
	<div class="col-lg-12 no-padding">
		<div class="col-lg-3 col-md-4 col-sm-6">
			<div class="form-group form-group-sm">
				<?php echo Form::label('start_work', trans('adminlte_lang::message.start_work') ); ?>

				<?php echo Form::date('start_work', ($type == 'update' ? $employee->start_work : \Carbon\Carbon::now()->subDay(0)->format('Y-m-d')) , ['class'=>'form-control']); ?>

			</div>
		</div>

		<div class="col-lg-3 col-md-4 col-sm-6">
			<div class="form-group form-group-sm">
				<?php echo Form::label('end_work', trans('adminlte_lang::message.end_work') ); ?>

				<?php echo Form::date('end_work', ($type == 'update' ? $employee->end_work : \Carbon\Carbon::now()->subDay(0)->format('Y-m-d')) , ['class'=>'form-control']); ?>

			</div>
		</div>

		<div class="col-lg-3 col-md-4 col-sm-6">
			<div class="form-group form-group-sm">
				<?php echo Form::label('note', trans('adminlte_lang::message.note') ); ?>

				<?php echo Form::text('note', ($type == 'update' ? $employee->note : null) , ['class'=>'form-control']); ?>

			</div>
		</div>
	</div>
</div>

<?php echo $__env->make('secure_card.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>