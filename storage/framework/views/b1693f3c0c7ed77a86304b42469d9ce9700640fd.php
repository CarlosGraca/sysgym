<div class="row">
	<?php echo Form::hidden('employees_category_id', ($type == 'update' ? $employees_category->id : null), ['class'=>'form-control','id'=>'employees_category_id']); ?>


	<span ><strong class="title"><?php echo e(trans('adminlte_lang::message.personal_information')); ?></strong></span>
    <hr class="h-divider" >
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group form-group-sm">
			<?php echo Form::label('name',' (*) '.trans('adminlte_lang::message.name')); ?>

			<?php echo Form::text('name', ($type == 'update' ? $employees_category->name : null) , ['class'=>'form-control','onfocus'=>'onfocus']); ?>

		</div>
	</div>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group form-group-sm">
			<?php echo Form::label('salary_base',' (*) '.trans('adminlte_lang::message.salary_base') ); ?>

			<?php echo Form::number('salary_base', ($type == 'update' ? $employees_category->salary_base : null) , ['class'=>'form-control']); ?>

		</div>
	</div>
</div>