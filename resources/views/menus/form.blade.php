<div class="row">
	<span ><strong class="title">{{ trans('adminlte_lang::message.new_menu') }}</strong></span> 
	<hr class="h-divider" >
	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			{!! Form::label('title',trans('adminlte_lang::message.title') ) !!}
			{!! Form::text('title', null , ['class'=>'form-control', 'required'=>true]) !!}
		</div>
	</div>

	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			{!! Form::label('parent_id',trans('adminlte_lang::message.parent') ) !!}
			{!! Form::select('parent_id', [0=>'Escolha a opcão']+ $menu_parents,null, ['class'=>'form-control select2','style'=>'width: 100%;']) !!}
		</div>
	</div>

	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			{!! Form::label('url',trans('adminlte_lang::message.url') ) !!}
			{!! Form::text('url',null , ['class'=>'form-control' , 'required'=>true]) !!}
		</div>
	</div>

	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			{!! Form::label('menu_order',trans('adminlte_lang::message.menu_order') ) !!}
			{!! Form::number('menu_order', null , ['class'=>'form-control']) !!}
		</div>
	</div>

	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			{!! Form::label('status',trans('adminlte_lang::message.status') ) !!}
			{!! Form::select('status',  [''=>'Escolha a opcão']+ $status,null, ['class'=>'form-control select2','style'=>'width: 100%;' ]) !!}
		</div>
	</div>

	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			{!! Form::label('icon',trans('adminlte_lang::message.icon') ) !!}
			{!! Form::text('icon', null , ['class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="row">
	<span ><strong class="title">{{ trans('adminlte_lang::message.associate_tenant') }}</strong></span> 
	<hr class="h-divider" >
     
	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			{!! Form::label('tenants',trans('adminlte_lang::message.company') ) !!}
			{!! Form::select('tenants[]',  [''=>'Escolha a opcão']+ $tenants,null, ['class'=>'form-control select2','multiple'=>true,'style'=>'width: 100%;' ]) !!}
		</div>
	</div> 

	
</div>