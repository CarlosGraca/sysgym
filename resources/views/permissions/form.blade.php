<div class="row">
	{{-- {!! Form::hidden('permission_id', ($type == 'update' ? $permission->id : null), ['class'=>'form-control','id'=>'permission_id']) !!}
	{!! Form::hidden('user_id', \Auth::user()->id, ['class'=>'form-control','id'=>'user_id']) !!}
	<span ><strong class="title">{{ trans('adminlte_lang::message.permissions_information') }}</strong></span>
    <hr class="h-divider" >
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group form-group-sm">
			{!! Form::label('name','(*) '.trans('adminlte_lang::message.name')) !!}
			{!! Form::text('name', ($type == 'update' ? $permission->name : null) , ['class'=>'form-control','onfocus'=>'onfocus']) !!}
		</div>
	</div>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group form-group-sm">
			{!! Form::label('label',trans('adminlte_lang::message.description') ) !!}
			{!! Form::textarea('label', ($type == 'update' ? $permission->label : null) , ['class'=>'form-control']) !!}
		</div>
	</div> --}}
    <span ><strong class="title">{{ trans('adminlte_lang::message.permissions_information') }}</strong></span>
    <hr class="h-divider" >
	<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12" >
        <div class="form-group has-feedback">
            {!! Form::select('role_id',  [''=>'Escolha o Perfil'] + $profiles,null, ['class'=>'form-control select2','style'=>'width: 100%;', 'required'=>true]) !!}
        </div>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12" >
        <div class="form-group has-feedback">
        {!! Form::select('permissions_menus[]' ,$menus, $m_menus, ['class'=>'form-control select2','multiple'=>'multiple', 'style'=>'width: 100%;'])  !!}         
          </div>
    </div>
    {{-- <div class="col-xs-12">      
        {!! Form::submit('Gravar',['class'=>'btn btn-primary pull-right']) !!}      
    </div>
 --}}</div>