<div class="row">
	<?php echo Form::hidden('procedure_id', ($type == 'update' ? $procedure->id : null), ['class'=>'form-control','id'=>'procedure_id']); ?>

	<?php echo Form::hidden('user_id', \Auth::user()->id, ['class'=>'form-control','id'=>'user_id']); ?>

	<span ><strong class="title"><?php echo e(trans('adminlte_lang::message.personal_information')); ?></strong></span>
    <hr class="h-divider" >
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group form-group-sm">
			<?php echo Form::label('code','(*)'.trans('adminlte_lang::message.code')); ?>

			<?php echo Form::number('code', ($type == 'update' ? $procedure->code : null) , ['class'=>'form-control','onfocus'=>'onfocus']); ?>

		</div>
	</div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group form-group-sm">
			<?php echo Form::label('name','(*)'.trans('adminlte_lang::message.name')); ?>

			<?php echo Form::text('name', ($type == 'update' ? $procedure->name : null) , ['class'=>'form-control']); ?>

		</div>
	</div>

    <div class="col-md-6 col-sm-12 col-xs-12">
        <div class="form-group form-group-sm">
            <?php echo Form::label('procedure_group_id','(*)'.trans('adminlte_lang::message.procedure_group') ); ?>

            <?php echo Form::select('procedure_group_id', $procedure_group, ($type == 'update' ? $procedure->procedure_group_id : null) , ['class'=>'form-control','placeholder' => ' (SELECT PROCEDURE GROUP) ']); ?>

        </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group form-group-sm">
            <?php echo Form::label('price',trans('adminlte_lang::message.price')); ?>

            <?php echo Form::number('price', ($type == 'update' ? $procedure->price : null) , ['class'=>'form-control']); ?>

        </div>
    </div>
</div>