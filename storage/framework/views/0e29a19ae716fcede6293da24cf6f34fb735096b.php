<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<?php echo Form::hidden('budget_id', ($type == 'update' ? $budget_type->id : null), ['class'=>'form-control','id'=>'budget_type_id']); ?>

		<?php echo Form::hidden('patient_id','', ['class'=>'form-control','id'=>'patient_id']); ?>

		<?php echo Form::hidden('user_id', Auth::user()->id, ['class'=>'form-control','id'=>'user_id']); ?>

		<div class="row">
			<span ><strong class="title"><?php echo e(trans('adminlte_lang::message.patient_information')); ?></strong></span>
			<hr class="h-divider" >
			<div class="col-lg-3 col-md-4 col-sm-6 text-center">
				<div class="form-group form-group-sm">
					<?php echo Form::label('patient_avatar',trans('adminlte_lang::message.photo'),['style'=>'visibility: hidden;']); ?>

					<img  src="<?php echo e(url('/')); ?>/<?php echo e(($type == 'update' ? $patient->avatar : 'img/avatar.png')); ?>" class="img-circle avatar-patient" alt="Cinque Terre" width="150" height="150" id="patient_avatar">
				</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<div class="form-group form-group-sm">
					<?php echo Form::label('patient',trans('adminlte_lang::message.patient')); ?>

					<?php echo Form::text('patient', ($type == 'update' ? $budget_type->patient : null) , ['class'=>'form-control','onfocus'=>'onfocus','placeholder'=>trans('adminlte_lang::message.type_patient_name')]); ?>

				</div>
			</div>

			<div class="col-lg-4 col-md-4 col-sm-6">
				<div class="form-group form-group-sm">
					<?php echo Form::label('email',trans('adminlte_lang::message.email') ); ?>

					<?php echo Form::email('email', ($type == 'update' ? $patient->email : null) , ['class'=>'form-control','readonly'=>'readonly']); ?>

				</div>
			</div>

			<div class="col-lg-4 col-md-4 col-sm-6">
				<div class="form-group form-group-sm">
					<?php echo Form::label('mobile',trans('adminlte_lang::message.mobile') ); ?>

					<?php echo Form::text('mobile', ($type == 'update' ? $patient->mobile : null) , ['class'=>'form-control','readonly'=>'readonly']); ?>

				</div>
			</div>

			<div class="col-lg-4 col-md-4 col-sm-6">
				<div class="form-group form-group-sm">
					<?php echo Form::label('phone',trans('adminlte_lang::message.phone') ); ?>

					<?php echo Form::text('phone', ($type == 'update' ? $patient->phone : null) , ['class'=>'form-control','readonly'=>'readonly']); ?>

				</div>
			</div>

			<div class="col-lg-4 col-md-4 col-sm-6">
				<div class="form-group form-group-sm">
					<?php echo Form::label('has_secure',trans('adminlte_lang::message.has_secure') ); ?>

					<?php echo Form::select('has_secure',[0 =>trans('adminlte_lang::message.not'), 1 =>trans('adminlte_lang::message.yes') ], ($type == 'update' ? $patient->has_secure : null) , ['class'=>'form-control','id'=>'has_secure','disabled'=>'disabled']); ?>

				</div>
			</div>

			<div class="col-md-4 col-sm-10 col-xs-10" id="secure_agency" style="display: none;">
				<div class="form-group form-group-sm">
					<?php echo Form::label('secure_agency_id',trans('adminlte_lang::message.secure_agency') ); ?>

					<?php echo Form::select('secure_agency_id', $secure_agency, ($type == 'update' && $secure_comparticipation != null ? $secure_comparticipation->consult_type_id : null) , ['class'=>'form-control','id'=>'secure_agency_id','placeholder'=>' (SELECT SECURE AGENCY) ','disabled'=>'disabled']); ?>

				</div>
			</div>

		</div>

		<div class="row">
			<span ><strong class="title"><?php echo e(trans('adminlte_lang::message.procedure_consult')); ?></strong></span>
			<hr class="h-divider" >
			<div class="col-md-4 col-sm-10 col-xs-10">
				<div class="form-group form-group-sm">
					<?php echo Form::label('consult_type_id',trans('adminlte_lang::message.consult_type') ); ?>

					<?php echo Form::select('consult_type_id', $consult_type, ($type == 'update' && $secure_comparticipation != null ? $secure_comparticipation->consult_type_id : null) , ['class'=>'form-control','id'=>'budget_consult_type_id','placeholder'=>' (SELECT CONSULT TYPE) ','disabled'=>'disabled']); ?>

				</div>
			</div>
			<div class="col-md-1 col-sm-1 col-xs-2">
				<div class="form-group form-group-sm">
					<?php echo Form::label('','Add',['style'=>'visibility: hidden;'] ); ?>

					<?php echo Form::button('<i class="fa fa-plus"></i>', ['class'=>'form-control btn btn-primary btn-sm disabled','id'=>'add-budget_consult']); ?>


				</div>
			</div>
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="box box-default">
					<div class="box-header with-border">
						<h3 class="box-title"><?php echo e(trans('adminlte_lang::message.procedure_consult')); ?></h3>
						<div class="pull-right">
							<b>Total: </b><span id="sum-total" data-value="0">0</span>
						</div>
					</div><!-- /.box-header -->

					<div class="box-body">
						<table id="table-budget" class="table table-bordered table-striped">

							<thead id="budget_with_secure" style="display: none;">
								<th class="col-md-4"><?php echo e(trans('adminlte_lang::message.consult_type')); ?></th>
								<th class="col-md-4"><?php echo e(trans('adminlte_lang::message.price')); ?></th>
								<th class="col-md-2"><?php echo e(trans('adminlte_lang::message.secure_service_price')); ?></th>
								<th class="col-md-2"><?php echo e(trans('adminlte_lang::message.total')); ?></th>
								<th class="col-md-1"></th>
							</thead>

							<thead id="budget_without_secure" style="display: none;">
								<th class="col-md-4"><?php echo e(trans('adminlte_lang::message.consult_type')); ?></th>
								<th class="col-md-4"><?php echo e(trans('adminlte_lang::message.price')); ?></th>
								<th class="col-md-4"><?php echo e(trans('adminlte_lang::message.total')); ?></th>
								<th class="col-md-1"></th>
							</thead>

							<tbody>

							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>