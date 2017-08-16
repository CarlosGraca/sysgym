@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.new_payment') }}
@endsection

@section('contentheader_title')
  {{ trans('adminlte_lang::message.app_name') }}
@endsection

@section('contentheader_description')
  {{ trans('adminlte_lang::message.new_payment') }}
@endsection


@section('main-content')

	<div class="row">
	    <div class="col-lg-12">
	        <div class="box box-default">
	            <div class="box-header with-border">
	              <h3 class="box-title">
					  <a href="{{ url('payments') }}" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.back') }}">
						  <i class="fa  fa-arrow-left"></i>  {{ trans('adminlte_lang::message.back') }}
					  </a>
	              	{{--  <strong>{{ trans('adminlte_lang::message.system_user') }}: </strong><span>{{ \Auth::user()->name }}</span> --}}
	              </h3>

				<div class="pull-right box-tools">
					<button class="btn btn-primary btn-sm" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.save') }}" id="add-payment">
						 <i class="fa fa-save"></i>  {{ trans('adminlte_lang::message.save') }}
					</button>
				</div><!-- /. tools -->
	            </div><!-- /.box-header -->

	            <div class="box-body">
					{!! Form::open(['route'=>'payments.store', 'id'=>'payment-form','files'=>true]) !!}
					    {{ csrf_field() }}
	                 	@include('payments.form', ['type'=>'create'])
					{!! Form::close() !!}
				</div>
	        </div>
	    </div>
	</div>
@endsection
