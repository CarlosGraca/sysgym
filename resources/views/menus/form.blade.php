<div class="row">
{{-- <<<<<<< HEAD
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

	
======= --}}
	{!! Form::hidden('menu_id', ($type == 'update' ? $menu->id : null), ['class'=>'form-control','id'=>'menu_id']) !!}
    {!! Form::hidden('user_id', \Auth::user()->id, ['class'=>'form-control','id'=>'user_id']) !!}
    {!! Form::hidden('parent_id', ($type == 'update' ? $menu->parent_id : 0), ['class'=>'form-control','id'=>'parent_id']) !!}

	<span ><strong class="title">{{ trans('adminlte_lang::message.menus_information') }}</strong></span>
    <hr class="h-divider" >
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group form-group-sm">
			{!! Form::label('title','(*) '.trans('adminlte_lang::message.title')) !!}
			{!! Form::text('title', ($type == 'update' ? $menu->title : null) , ['class'=>'form-control','onfocus'=>'onfocus']) !!}
		</div>
	</div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group form-group-sm">
            {!! Form::label('url','(*) '.trans('adminlte_lang::message.url')) !!}
            {!! Form::text('url', ($type == 'update' ? $menu->title : null) , ['class'=>'form-control']) !!}
        </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group form-group-sm">
            {!! Form::label('icon',trans('adminlte_lang::message.icon')) !!}
            {!! Form::text('icon', ($type == 'update' ? $menu->icon : null) , ['class'=>'form-control']) !!}
        </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group form-group-sm">
            {!! Form::label('menu_order',trans('adminlte_lang::message.menu_order')) !!}
            {!! Form::number('menu_order', ($type == 'update' ? $menu->menu_order : null) , ['class'=>'form-control']) !!}
        </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="form-group form-group-sm">
            {!! Form::label('main_menu',trans('adminlte_lang::message.main_menu') ) !!}
            {!! Form::text('main_menu', ($type == 'update' ? ($menu->parent_id == 0 ? null : $menu->parent->title) : null) , ['class'=>'form-control','placeholder'=>'Type Main Menu Title']) !!}
        </div>
    </div>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group form-group-sm">
			{!! Form::label('description',trans('adminlte_lang::message.description') ) !!}
			{!! Form::textarea('description', ($type == 'update' ? $menu->description : null) , ['class'=>'form-control']) !!}
		</div>
	</div>

</div>