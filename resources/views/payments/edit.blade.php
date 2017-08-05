@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.update_payment') }}
@endsection

@section('contentheader_title')
  {{ trans('adminlte_lang::message.app_name') }}
@endsection

@section('contentheader_description')
  {{ trans('adminlte_lang::message.update_payment') }}
@endsection


@section('main-content')

	<div class="row">
	    <div class="col-lg-12">
	        <div class="box box-default">
	            <div class="box-header with-border">
	              <h3 class="box-title">
	              	 <strong>{{ trans('adminlte_lang::message.payments') }}: </strong><span>{{ $payment->matriculation->client->name }}</span>
	              </h3>
	              <div class="pull-right box-tools">
						<a href="{{ url('payments') }}" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.back') }}">
							 <i class="fa  fa-arrow-left"></i>
						</a>

					  <a href="#" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.edit') }}" id="edit-payment-button" style="display: none;">
						  <i class="fa fa-edit"></i>
					  </a>

						<a href="#" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.save') }}" id="update-payment">
							 <i class="fa fa-save"></i>
						</a>
					</div><!-- /. tools -->
	            </div><!-- /.box-header -->
	            <div class="box-body">
					{!! Form::model($payment, ['method'=>'PATCH','route'=>['payments.update', $payment->id],'id'=>'payment-form','files'=>true])!!}
						@include('payments.form', ['type'=>'update','payment'=>$payment])
					{!! Form::close() !!}
				</div>
	        </div>
	    </div>
	</div>
@endsection
