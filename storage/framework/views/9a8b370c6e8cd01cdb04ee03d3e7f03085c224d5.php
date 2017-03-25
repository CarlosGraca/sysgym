<div class="row">
	<?php echo Form::hidden('procedure_group_id', ($type == 'update' ? $procedure_group->id : null), ['class'=>'form-control','id'=>'procedure_group_id']); ?>

	<?php echo Form::hidden('user_id', \Auth::user()->id, ['class'=>'form-control','id'=>'user_id']); ?>

	<span ><strong class="title"><?php echo e(trans('adminlte_lang::message.personal_information')); ?></strong></span>
    <hr class="h-divider" >
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group form-group-sm">
			<?php echo Form::label('code',trans('adminlte_lang::message.code')); ?>

			<?php echo Form::number('code', ($type == 'update' ? $procedure_group->code : null) , ['class'=>'form-control','onfocus'=>'onfocus']); ?>

		</div>
	</div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group form-group-sm">
			<?php echo Form::label('name',trans('adminlte_lang::message.name')); ?>

			<?php echo Form::text('name', ($type == 'update' ? $procedure_group->name : null) , ['class'=>'form-control']); ?>

		</div>
	</div>
</div>