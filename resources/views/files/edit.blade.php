@extends('layouts.modal_ajax')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.update_consult_type') }}
@endsection

@section('contentheader_title')
  {{ trans('adminlte_lang::message.app_name') }}
@endsection

@section('contentheader_description')
  {{ trans('adminlte_lang::message.update_consult_type') }}
@endsection


@section('main-content')

	<div class="row">
	    <div class="col-lg-12">
	        <div class="box box-default">
	            <div class="box-header with-border">
	              <h3 class="box-title">
	              	 <strong>{{ trans('adminlte_lang::message.consult_type') }}: </strong><span>{{ $consult_type->name }}</span>
	              </h3>
	              <div class="pull-right box-tools">
	                    <a href="#"  class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="Save">
	                       <i class="fa fa-save"></i>
	                     </a>
	              </div><!-- /. tools -->

								<div class="pull-right box-tools">
										<a href="{{ url('consult_type') }}" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="Voltar">
											 <i class="fa  fa-arrow-left"></i>
										</a>

										<a href="#" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="Save" id="edit-consult_type">
											 <i class="fa fa-save"></i>
										</a>
								</div><!-- /. tools -->
	            </div><!-- /.box-header -->
	            <div class="box-body">
					{!! Form::model($consult_type, ['method'=>'PATCH','route'=>['consult_type.update', $consult_type->id],'id'=>'consult_type-form','files'=>true])!!}
						@include('consult_type.form', ['type'=>'update','consult_type'=>$consult_type])
					{!! Form::close() !!}
				</div>
	        </div>
	    </div>
	</div>
@endsection
