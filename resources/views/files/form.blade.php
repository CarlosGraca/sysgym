<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group form-group-sm">
			{!! Form::label('file','(*) '.trans('adminlte_lang::message.file')) !!}
			{!! Form::file('file', '', ['class' =>  'filestyle','data-input'=>'false', 'data-buttonText'=>'Select File', 'accept'=>'*', 'data-placeholder'=> trans('adminlte_lang::message.browser_avatar') ]) !!}
		</div>
	</div>
	<!--
	<div class="col-lg-5 col-md-5 col-sm-5 col-xs-10">
		<div class="form-group form-group-sm">
			{!! Form::label('file_type','(*) '.trans('adminlte_lang::message.file_type') ) !!}
			{!! Form::select('file_type', ['pdf'=>trans('adminlte_lang::message.pdf'),'image'=>trans('adminlte_lang::message.image'),'doc'=>trans('adminlte_lang::message.doc'),'video'=>trans('adminlte_lang::message.video')],null, ['class'=>'form-control', 'placeholder' => trans('adminlte_lang::message.file_type_empty')]) !!}

		</div>
	</div>
-->
	<div class="col-lg-5 col-md-5 col-sm-5 col-xs-10">
		<div class="form-group form-group-sm">
			{!! Form::label('description', trans('adminlte_lang::message.description') ) !!}
			{!! Form::textarea('description', null, ['class'=>'form-control', 'placeholder' => trans('adminlte_lang::message.description')]) !!}

		</div>
	</div>
	<div class="col-md-1 col-sm-1 col-xs-2">
		<div class="form-group form-group-sm">
			{!! Form::label('','Add',['style'=>'visibility: hidden;'] ) !!}
			{!! Form::button('<i class="fa fa-upload"></i>', ['class'=>'form-control btn btn-primary btn-sm','id'=>'add-file']) !!}
		</div>
	</div>
</div>