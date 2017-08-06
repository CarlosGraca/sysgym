@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.new_client') }}
@endsection

@section('contentheader_title')
  {{ trans('adminlte_lang::message.app_name') }}
@endsection

@section('contentheader_description')
  {{ trans('adminlte_lang::message.new_client') }}
@endsection


@section('main-content')

	<div class="row">
	    <div class="col-lg-12">
	        <div class="box box-default">
	            <div class="box-header with-border">
	              <h3 class="box-title">
					  <a href="{{ \Illuminate\Support\Facades\URL::previous() }}" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.back') }}">
						  <i class="fa  fa-arrow-left"></i> {{ trans('adminlte_lang::message.back') }}
					  </a>
					  <span>{{ trans('adminlte_lang::message.new_client') }}</span>
	              </h3>

					<div class="pull-right box-tools">

						{{--<a href="{{ url('clients') }}" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.show_details') }}" id="client_detail" style="display: none;">--}}
							{{--<i class="fa fa-address-card"></i> {{ trans('adminlte_lang::message.new_client') }}--}}
						{{--</a>--}}

						<a href="#!" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="Edit" id="edit-client-button" style="display: none;">
							<i class="fa fa-edit"></i> {{ trans('adminlte_lang::message.edit') }}
						</a>

						<a href="#" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="Save" id="add-client">
							 <i class="fa fa-save"></i> {{ trans('adminlte_lang::message.save') }}
						</a>
					</div><!-- /. tools -->
	            </div><!-- /.box-header -->

	            <div class="box-body">
					{!! Form::open(['route'=>'clients.store', 'id'=>'client-form','files'=>true]) !!}
	                 	@include('clients.form', ['type'=>'create'])
					{!! Form::close() !!}
				</div>
	        </div>
	    </div>
	</div>
@endsection
