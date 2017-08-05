{!! Form::hidden('client_id', ($type == 'update' ? $client->id : null), ['class'=>'form-control','id'=>'client_id']) !!}
{!! Form::hidden('avatar_crop', null , ['class'=>'form-control','id'=>'avatar_crop']) !!}
@include('people.form',['people'=>(isset($client) ? $client : null),'type'=>$type,'type_form'=>'client'])

<div class="row">
	<span ><strong class="title">{{ trans('adminlte_lang::message.work_information') }}</strong></span>
	<hr class="h-divider" >
	<div class="col-lg-4 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			{!! Form::label('profession',trans('adminlte_lang::message.profession') ) !!}
			{!! Form::text('profession', ($type == 'update' ? $client->profession : null) , ['class'=>'form-control']) !!}
		</div>
	</div>

	<div class="col-lg-4 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			{!! Form::label('work_phone',trans('adminlte_lang::message.work_phone') ) !!}
			{!! Form::text('work_phone', ($type == 'update' ? $client->work_phone : null) , ['class'=>'form-control']) !!}
		</div>
	</div>

	<div class="col-lg-4 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			{!! Form::label('work_address',trans('adminlte_lang::message.work_address') ) !!}
			{!! Form::text('work_address', ($type == 'update' ? $client->work_location : null) , ['class'=>'form-control']) !!}
		</div>
	</div>
</div>

{{--@include('secure_card.form')--}}