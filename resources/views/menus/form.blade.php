<div class="row">
	{{-- <span ><strong class="title">{{ trans('adminlte_lang::message.work_information') }}</strong></span> 
	<hr class="h-divider" >--}}
	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			{!! Form::label('title',trans('adminlte_lang::message.title') ) !!}
			{!! Form::text('title', ($type == 'update' ? $client->profession : null) , ['class'=>'form-control']) !!}
		</div>
	</div>

	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			{!! Form::label('parent_id',trans('adminlte_lang::message.parent') ) !!}
			{!! Form::select('parent_id', [''=>'Escolha a opcão']+ $menu_parents,null, ['class'=>'form-control select2','style'=>'width: 100%;']) !!}
		</div>
	</div>

	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			{!! Form::label('url',trans('adminlte_lang::message.url') ) !!}
			{!! Form::text('url', ($type == 'update' ? $client->work_phone : null) , ['class'=>'form-control']) !!}
		</div>
	</div>

	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			{!! Form::label('menu_order',trans('adminlte_lang::message.menu_order') ) !!}
			{!! Form::number('menu_order', ($type == 'update' ? $client->work_location : null) , ['class'=>'form-control']) !!}
		</div>
	</div>

	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			{!! Form::label('status',trans('adminlte_lang::message.status') ) !!}
			{!! Form::select('status',  [''=>'Escolha a opcão']+ $status,null, ['class'=>'form-control select2','style'=>'width: 100%;']) !!}
		</div>
	</div>

	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			{!! Form::label('icon',trans('adminlte_lang::message.icon') ) !!}
			{!! Form::text('icon', ($type == 'update' ? $client->work_location : null) , ['class'=>'form-control']) !!}
		</div>
	</div>
</div>