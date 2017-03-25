@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.update_procedure_group') }}
@endsection

@section('contentheader_title')
  {{ trans('adminlte_lang::message.app_name') }}
@endsection

@section('contentheader_description')
  {{ trans('adminlte_lang::message.update_procedure_group') }}
@endsection


@section('main-content')

	<div class="row">
	    <div class="col-lg-12">
	        <div class="box box-default">
	            <div class="box-header with-border">
				  	<h3 class="box-title">
					 	<strong>{{ trans('adminlte_lang::message.procedure_group') }}: </strong><span>{{ $procedure_group->name }}</span>
				  	</h3>

					<div class="pull-right box-tools">
						<a href="{{ url('procedure_group') }}" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.back') }}">
							 <i class="fa  fa-arrow-left"></i>
						</a>

						<a href="#" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="Save" id="edit-procedure_group">
							 <i class="fa fa-save"></i>
						</a>

						<a href="#!" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.edit') }}" id="edit-procedure_group-button" style="display: none;">
							<i class="fa fa-edit"></i>
						</a>
					</div><!-- /. tools -->
	            </div><!-- /.box-header -->
	            <div class="box-body">
					{!! Form::model($procedure_group, ['method'=>'PATCH','route'=>['procedure_group.update', $procedure_group->id],'id'=>'procedure_group-form','files'=>true])!!}
						@include('procedure_group.form', ['type'=>'update','procedure_group'=>$procedure_group])
					{!! Form::close() !!}
				</div>
	        </div>
	    </div>
	</div>
@endsection
