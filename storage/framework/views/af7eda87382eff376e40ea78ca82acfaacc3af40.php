<div class="row">
	<span ><strong class="title"><?php echo e(trans('adminlte_lang::message.new_menu')); ?></strong></span> 
	<hr class="h-divider" >
	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			<?php echo Form::label('title',trans('adminlte_lang::message.title') ); ?>

			<?php echo Form::text('title', null , ['class'=>'form-control', 'required'=>true]); ?>

		</div>
	</div>

	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			<?php echo Form::label('parent_id',trans('adminlte_lang::message.parent') ); ?>

			<?php echo Form::select('parent_id', [0=>'Escolha a opcão']+ $menu_parents,null, ['class'=>'form-control select2','style'=>'width: 100%;']); ?>

		</div>
	</div>

	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			<?php echo Form::label('url',trans('adminlte_lang::message.url') ); ?>

			<?php echo Form::text('url',null , ['class'=>'form-control' , 'required'=>true]); ?>

		</div>
	</div>

	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			<?php echo Form::label('menu_order',trans('adminlte_lang::message.menu_order') ); ?>

			<?php echo Form::number('menu_order', null , ['class'=>'form-control']); ?>

		</div>
	</div>

	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			<?php echo Form::label('status',trans('adminlte_lang::message.status') ); ?>

			<?php echo Form::select('status',  [''=>'Escolha a opcão']+ $status,null, ['class'=>'form-control select2','style'=>'width: 100%;' ]); ?>

		</div>
	</div>

	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			<?php echo Form::label('icon',trans('adminlte_lang::message.icon') ); ?>

			<?php echo Form::text('icon', null , ['class'=>'form-control']); ?>

		</div>
	</div>
</div>

<div class="row">
	<span ><strong class="title"><?php echo e(trans('adminlte_lang::message.associate_tenant')); ?></strong></span> 
	<hr class="h-divider" >
     
	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			<?php echo Form::label('tenants',trans('adminlte_lang::message.company') ); ?>

			<?php echo Form::select('tenants[]',  [''=>'Escolha a opcão']+ $tenants,null, ['class'=>'form-control select2','multiple'=>true,'style'=>'width: 100%;' ]); ?>

		</div>
	</div> 

	
</div>