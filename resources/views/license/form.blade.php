<div class="row">
	{!! Form::hidden('license_id', ($type == 'update' ? $license->id : null), ['class'=>'form-control','id'=>'license_id']) !!}
	<span ><strong class="title">{{ trans('adminlte_lang::message.personal_information') }}</strong></span>
    <hr class="h-divider" >

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group form-group-sm">
			{!! Form::label('license_to',trans('adminlte_lang::message.license_to') ) !!}
			{!! Form::text('license_to', ($type == 'update' ? $license->license_to : null) , ['class'=>'form-control']) !!}
		</div>
	</div>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group form-group-sm">
			{!! Form::label('product_key',trans('adminlte_lang::message.product_key')) !!}
			{!! Form::text('product_key', ($type == 'update' ? $license->product_key : null) , ['class'=>'form-control','onfocus'=>'onfocus']) !!}
		</div>
	</div>
</div>