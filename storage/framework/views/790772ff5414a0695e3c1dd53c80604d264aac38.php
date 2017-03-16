
<div class="row" id="secure_card" style="display: none;">
	<span ><strong class="title"><?php echo e(trans('adminlte_lang::message.secure_card_information')); ?></strong></span>
	<hr class="h-divider" >

	<div class="col-lg-6 col-md-6 col-sm-6">
		<div class="form-group form-group-sm">
			<?php echo Form::label('secure_agency',trans('adminlte_lang::message.secure_agency') ); ?>

			<?php echo Form::select('secure_agency', $secure_agency, ($type == 'update' && $card != null ? $card->secure_agency_id : null) , ['class'=>'form-control','id'=>'secure_agency','placeholder'=>' (SELECT SECURITY AGENCY) ']); ?>

		</div>
	</div>

	<div class="col-lg-6 col-md-6 col-sm-6">
		<div class="form-group form-group-sm">
			<?php echo Form::label('secure_number', trans('adminlte_lang::message.secure_number') ); ?>

			<?php echo Form::number('secure_number', ($type == 'update' && $card != null ? $card->secure_number : null) , ['class'=>'form-control']); ?>

		</div>
	</div>

	<div class="col-lg-6 col-md-6 col-sm-6">
		<div class="form-group form-group-sm">
			<?php echo Form::label('start_date', trans('adminlte_lang::message.start_date') ); ?>

			<?php echo Form::date('start_date', ($type == 'update' && $card != null ? $card->start_date : \Carbon\Carbon::now()->subDay(0)->format('Y-m-d')) , ['class'=>'form-control']); ?>

		</div>
	</div>

	<div class="col-lg-6 col-md-6 col-sm-6">
		<div class="form-group form-group-sm">
			<?php echo Form::label('end_date', trans('adminlte_lang::message.end_date') ); ?>

			<?php echo Form::date('end_date', ($type == 'update' && $card != null ? $card->end_date : \Carbon\Carbon::now()->subDay(0)->format('Y-m-d')) , ['class'=>'form-control']); ?>

		</div>
	</div>

	<div class="col-lg-6 col-md-6 col-sm-6">
		<div class="form-group form-group-sm">
			<?php echo Form::label('note_card', trans('adminlte_lang::message.note') ); ?>

			<?php echo Form::text('note_card', ($type == 'update' && $card != null ? $card->note : null) , ['class'=>'form-control']); ?>

		</div>
	</div>
</div>
