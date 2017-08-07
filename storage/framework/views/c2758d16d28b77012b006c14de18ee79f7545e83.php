<?php echo Form::hidden('employee_id', ($type == 'update' ? $employee->id : null), ['class'=>'form-control','id'=>'employee_id']); ?>

<?php echo Form::hidden('employee_category_id', ($type == 'update' ? $employee->category_id : null), ['class'=>'form-control','id'=>'employee_category_id']); ?>


<?php echo $__env->make('people.form',['people'=>(isset($employee) ? $employee : null),'type'=>$type,'type_form'=>'employee'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="row">
	<span ><strong class="title"><?php echo e(trans('adminlte_lang::message.work_information')); ?></strong></span>
	<hr class="h-divider" >
	<div class="col-lg-12 no-padding">
		<div class="col-lg-3 col-md-4 col-sm-6">
			<div class="form-group form-group-sm">
				<?php echo Form::label('category',trans('adminlte_lang::message.category') ); ?>

				<?php echo Form::text('category', ($type == 'update' ? $employee->employee_category->name : null) , ['class'=>'form-control','id'=>'category', 'placeholder' => trans('adminlte_lang::message.category')]); ?>

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
	</div>
	<div class="col-lg-12 no-padding">
		<div class="col-lg12 col-md-12 col-sm-12">
			<div class="form-group form-group-sm">
				<?php echo Form::label('note', trans('adminlte_lang::message.note') ); ?>

				<?php echo Form::textarea('note', ($type == 'update' ? $employee->note : null) , ['class'=>'form-control']); ?>

			</div>
		</div>
	</div>
</div>