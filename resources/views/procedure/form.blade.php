<div class="row">
	{!! Form::hidden('procedure_id', ($type == 'update' ? $procedure->id : null), ['class'=>'form-control','id'=>'procedure_id']) !!}
	{!! Form::hidden('user_id', \Auth::user()->id, ['class'=>'form-control','id'=>'user_id']) !!}
	<span ><strong class="title">{{ trans('adminlte_lang::message.personal_information') }}</strong></span>
    <hr class="h-divider" >
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group form-group-sm">
			{!! Form::label('code','(*)'.trans('adminlte_lang::message.code')) !!}
			{!! Form::number('code', ($type == 'update' ? $procedure->code : null) , ['class'=>'form-control','onfocus'=>'onfocus']) !!}
		</div>
	</div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group form-group-sm">
			{!! Form::label('name','(*)'.trans('adminlte_lang::message.name')) !!}
			{!! Form::text('name', ($type == 'update' ? $procedure->name : null) , ['class'=>'form-control']) !!}
		</div>
	</div>

    <div class="col-md-6 col-sm-12 col-xs-12">
        <div class="form-group form-group-sm">
            {!! Form::label('procedure_group_id','(*)'.trans('adminlte_lang::message.procedure_group') ) !!}
            {!! Form::select('procedure_group_id', $procedure_group, ($type == 'update' ? $procedure->procedure_group_id : null) , ['class'=>'form-control','placeholder' => ' (SELECT PROCEDURE GROUP) ']) !!}
        </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group form-group-sm">
            {!! Form::label('price',trans('adminlte_lang::message.price')) !!}
            {!! Form::number('price', ($type == 'update' ? $procedure->price : null) , ['class'=>'form-control']) !!}
        </div>
    </div>
</div>