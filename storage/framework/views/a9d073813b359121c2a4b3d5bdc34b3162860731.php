<div class="row">
	<?php echo Form::hidden('permission_id', ($type == 'update' ? $permission->id : null), ['class'=>'form-control','id'=>'permission_id']); ?>

	<?php echo Form::hidden('user_id', \Auth::user()->id, ['class'=>'form-control','id'=>'user_id']); ?>

	<span ><strong class="title"><?php echo e(trans('adminlte_lang::message.permissions_information')); ?></strong></span>
    <hr class="h-divider" >
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group form-group-sm">
			<?php echo Form::label('name','(*) '.trans('adminlte_lang::message.name')); ?>

			<?php echo Form::text('name', ($type == 'update' ? $permission->name : null) , ['class'=>'form-control','onfocus'=>'onfocus']); ?>

		</div>
	</div>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group form-group-sm">
			<?php echo Form::label('label',trans('adminlte_lang::message.description') ); ?>

			<?php echo Form::textarea('label', ($type == 'update' ? $permission->label : null) , ['class'=>'form-control']); ?>

		</div>
	</div>
</div>