<?php echo Form::hidden('client_id', ($type == 'update' ? $client->id : null), ['class'=>'form-control','id'=>'client_id']); ?>




<?php echo $__env->make('people.form',['people'=>(isset($client) ? $client : null),'type'=>$type,'type_form'=>'client'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="row">
	<span ><strong class="title"><?php echo e(trans('adminlte_lang::message.work_information')); ?></strong></span>
	<hr class="h-divider" >
	<div class="col-lg-4 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			<?php echo Form::label('profession',trans('adminlte_lang::message.profession') ); ?>

			<?php echo Form::text('profession', ($type == 'update' ? $client->profession : null) , ['class'=>'form-control']); ?>

		</div>
	</div>

	<div class="col-lg-4 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			<?php echo Form::label('work_phone',trans('adminlte_lang::message.work_phone') ); ?>

			<?php echo Form::text('work_phone', ($type == 'update' ? $client->work_phone : null) , ['class'=>'form-control']); ?>

		</div>
	</div>

	<div class="col-lg-4 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			<?php echo Form::label('work_address',trans('adminlte_lang::message.work_address') ); ?>

			<?php echo Form::text('work_address', ($type == 'update' ? $client->work_location : null) , ['class'=>'form-control']); ?>

		</div>
	</div>
</div>