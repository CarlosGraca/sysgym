<div class="row">
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