<div class="row">
	{!! Form::hidden('consult_type_id', ($type == 'update' ? $consult_type->id : null), ['class'=>'form-control','id'=>'consult_type_id']) !!}
	{!! Form::hidden('user_id', Auth::user()->id, ['class'=>'form-control','id'=>'user_id']) !!}
	<span ><strong class="title">{{ trans('adminlte_lang::message.personal_information') }}</strong></span>
    <hr class="h-divider" >
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group form-group-sm">
			{!! Form::label('name',trans('adminlte_lang::message.name')) !!}
			{!! Form::text('name', ($type == 'update' ? $consult_type->name : null) , ['class'=>'form-control','onfocus'=>'onfocus']) !!}
		</div>
	</div>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group form-group-sm">
			{!! Form::label('price',trans('adminlte_lang::message.price') ) !!}
			{!! Form::number('price', ($type == 'update' ? $consult_type->price : null) , ['class'=>'form-control']) !!}
		</div>
	</div>
</div>