<div class="row">
	
	<div class="col-lg-3 col-md-4 col-sm-6">
        <div class="form-group form-group-sm">
			{!! Form::label('dominio', 'Dominio:') !!}
			{!! Form::text('dominio', null, ['class'=>'form-control']) !!}
		</div>
	</div>

	<div class="col-lg-3 col-md-4 col-sm-6">
        <div class="form-group form-group-sm">
			{!! Form::label('codigo', 'Codigo:') !!}
			{!! Form::text('codigo', null, ['class'=>'form-control']) !!}
		</div>
	</div>
	<div class="col-lg-3 col-md-4 col-sm-6">
        <div class="form-group form-group-sm">
			{!! Form::label('significado', 'Significado:') !!}
			{!! Form::text('significado', null, ['class'=>'form-control']) !!}
		</div>
	</div>
	<div class="col-xs-12">      
        {!! Form::submit($submitButtonText,['class'=>'btn btn-primary pull-right']) !!}      
    </div>
</div>