<div class="row">
	{!! Form::hidden('secure_comparticipation_id', ($type == 'update' ? $secure_comparticipation->id : null), ['class'=>'form-control','id'=>'secure_comparticipation_id']) !!}
	{!! Form::hidden('user_id', Auth::user()->id, ['class'=>'form-control','id'=>'user_id']) !!}
	<span ><strong class="title">{{ trans('adminlte_lang::message.secure_comparticipation_information') }}</strong></span>
    <hr class="h-divider" >

	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
		<div class="form-group form-group-sm">
			{!! Form::label('secure_agency_id',trans('adminlte_lang::message.secure_agency') ) !!}
			{!! Form::select('secure_agency_id', $secure_agency, ($type == 'update' && $secure_comparticipation != null ? $secure_comparticipation->secure_agency_id : null) , ['class'=>'form-control','id'=>'secure_agency','placeholder'=>' (SELECT SECURITY AGENCY) ']) !!}
		</div>
	</div>

	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
		<div class="form-group form-group-sm">
			{!! Form::label('consult_type_id',trans('adminlte_lang::message.consult_type') ) !!}
			{!! Form::select('consult_type_id', $consult_type, ($type == 'update' && $secure_comparticipation != null ? $secure_comparticipation->consult_type_id : null) , ['class'=>'form-control','id'=>'consult_type_id','placeholder'=>' (SELECT CONSULT TYPE) ']) !!}
		</div>
	</div>

    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
		<div class="form-group form-group-sm">
			{!! Form::label('code',trans('adminlte_lang::message.code')) !!}
			{!! Form::number('code', ($type == 'update' ? $secure_comparticipation->code : null) , ['class'=>'form-control','onfocus'=>'onfocus']) !!}
		</div>
	</div>

	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
		<div class="form-group form-group-sm">
			{!! Form::label('max_frequency',trans('adminlte_lang::message.max_frequency') ) !!}
			{!! Form::number('max_frequency', ($type == 'update' ? $secure_comparticipation->max_frequency : null) , ['class'=>'form-control']) !!}
		</div>
	</div>

	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
		<div class="form-group form-group-sm">
			{!! Form::label('deadline',trans('adminlte_lang::message.deadline') ) !!}
			{!! Form::number('deadline', ($type == 'update' ? $secure_comparticipation->deadline : null) , ['class'=>'form-control']) !!}
		</div>
	</div>


	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
		<div class="form-group form-group-sm">
			{!! Form::label('max_value',trans('adminlte_lang::message.max_value') ) !!}
			{!! Form::number('max_value', ($type == 'update' ? $secure_comparticipation->max_value : null) , ['class'=>'form-control']) !!}
		</div>
	</div>

</div>