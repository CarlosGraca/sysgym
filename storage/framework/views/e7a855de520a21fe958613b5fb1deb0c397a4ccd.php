<div class="row">
	<?php echo Form::hidden('consult_agenda_id', ($type == 'update' ? $consult_agenda->id : null), ['class'=>'form-control','id'=>'consult_agenda_id']); ?>

	<?php echo Form::hidden('user_id', Auth::user()->id, ['class'=>'form-control','id'=>'user_id']); ?>

	<?php echo Form::hidden('branch_id', Auth::user()->logged_branch, ['class'=>'form-control','id'=>'branch_id']); ?>

	<span ><strong class="title"><?php echo e(trans('adminlte_lang::message.consult_information')); ?></strong></span>
    <hr class="h-divider" >
	<div class="col-md-12 col-sm-6">
		<div class="col-md-6 col-sm-12 col-xs-12">
			<div class="form-group form-group-sm">
				<?php echo Form::label('patient_id','(*)'.trans('adminlte_lang::message.patient') ); ?>

				<?php echo Form::select('patient_id', $patients, ($type == 'update' ? $consult_agenda->patient_id : null) , ['class'=>'form-control','id'=>'consult_patient','placeholder' => ' (SELECT PATIENT) ']); ?>

			</div>
		</div>

		<div class="col-md-6 col-sm-12 col-xs-12">
			<div class="form-group form-group-sm">
				<?php echo Form::label('consult_type_id','(*)'.trans('adminlte_lang::message.consult_type') ); ?>

				<?php echo Form::select('consult_type_id', $consult_type, ($type == 'update' ? $consult_agenda->consult_type_id : null) , ['class'=>'form-control','id'=>'consult_type','placeholder' => ' (SELECT CONSULT TYPE) ']); ?>

			</div>
		</div>
	</div>
	<div class="col-md-12 col-sm-6">
		<div class="col-md-6 col-sm-12 col-xs-12">
			<div class="form-group form-group-sm">
				<?php echo Form::label('doctor_id','(*)'.trans('adminlte_lang::message.doctor') ); ?>

				<?php echo Form::select('doctor_id', $doctor, ($type == 'update' ? $consult_agenda->doctor_id : null) , ['class'=>'form-control','id'=>'doctor','placeholder' => ' (SELECT DOCTOR) ']); ?>

			</div>
		</div>

		<div class="col-md-6 col-sm-12 col-xs-12">
			<div class="form-group form-group-sm">
				<?php echo Form::label('date','(*)'.trans('adminlte_lang::message.date') ); ?>

				<?php echo Form::date('date', ($type == 'update' ? $consult_agenda->date : null) , ['class'=>'form-control']); ?>

			</div>
		</div>
	</div>
	<div class="col-md-12 col-sm-6">
		<div class="col-md-6 col-sm-12 col-xs-12">
			<div class="form-group form-group-sm">
				<?php echo Form::label('start_time','(*)'.trans('adminlte_lang::message.start_time') ); ?>

				<?php echo Form::time('start_time', ($type == 'update' ? $consult_agenda->start_time : null) , ['class'=>'form-control','step'=>'1']); ?>

			</div>
		</div>

		<div class="col-md-6 col-sm-12 col-xs-12">
			<div class="form-group form-group-sm">
				<?php echo Form::label('end_time','(*)'.trans('adminlte_lang::message.end_time') ); ?>

				<?php echo Form::time('end_time', ($type == 'update' ? $consult_agenda->end_time : null) , ['class'=>'form-control','step'=>'1']); ?>

			</div>
		</div>
	</div>
	<div class="col-md-12 col-sm-6">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="form-group">
				<?php echo Form::label('note',trans('adminlte_lang::message.note')); ?>

				<?php echo Form::textarea('note', ($type == 'update' ? $consult_agenda->note : null) , ['class'=>'form-control','onfocus'=>'onfocus','rows'=>'3','style'=>'width: 100%;']); ?>

			</div>
		</div>
	</div>
</div>

<script>
	$('#consult_patient').select2();
	$('#consult_type').select2();
	$('#doctor').select2();
</script>