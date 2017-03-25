@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.update_procedure') }}
@endsection

@section('contentheader_title')
  {{ trans('adminlte_lang::message.app_name') }}
@endsection

@section('contentheader_description')
  {{ trans('adminlte_lang::message.update_procedure') }}
@endsection


@section('main-content')

	<div class="row">
	    <div class="col-lg-12">
	        <div class="box box-default">
	            <div class="box-header with-border">
				  	<h3 class="box-title">
					 	<strong>{{ trans('adminlte_lang::message.procedure') }}: </strong><span>{{ $procedure->name }}</span>
				  	</h3>

					<div class="pull-right box-tools">
						<a href="{{ url('procedure') }}" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.back') }}">
							 <i class="fa  fa-arrow-left"></i>
						</a>

						<a href="#" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="Save" id="edit-procedure">
							 <i class="fa fa-save"></i>
						</a>

						<a href="#!" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.edit') }}" id="edit-procedure-button" style="display: none;">
							<i class="fa fa-edit"></i>
						</a>
					</div><!-- /. tools -->
	            </div><!-- /.box-header -->
	            <div class="box-body">
					{!! Form::model($procedure, ['method'=>'PATCH','route'=>['procedure.update', $procedure->id],'id'=>'procedure-form','files'=>true])!!}
						@include('procedure.form', ['type'=>'update','procedure'=>$procedure])
					{!! Form::close() !!}
				</div>
	        </div>
	    </div>
	</div>
@endsection
